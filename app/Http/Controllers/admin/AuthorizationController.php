<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\PostDenied;
use App\models\Authorization;
use App\models\Categories;
use App\models\MasterNotifications;
use App\models\Posts;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Author;

class AuthorizationController extends Controller
{
    protected $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorizations = Authorization::latest()->paginate(20);
        return view('master.authorization.index', compact('authorizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Categories $categories, Authorization $authorization, MasterNotifications $notifications)
    {
        $user = auth()->user()->name;
        if (auth()->user()->posts()->count() == 10) {
            return redirect()
                            ->back()
                            ->with('error', 'Você atingiu o limite máximo de anúncios!');
        }
        $data = $request->all();
        $data['hash'] = mt_rand();
        $data['user_id'] = auth()->user()->id;
        $data['periodo'] = date_format(new DateTime($request->periodo), 'd-m-Y');
        $data['category_id'] = $categories->find($request->categorie)->id;
        $email = auth()->user()->email;
        $whatsapp = auth()->user()->whatsapp;


        if ($request->contato == 'email') {
            $data['email'] = $email;
        }else{
            $data['whatsapp'] = $whatsapp;
        }


        if ($request->salario == null) {
            $data['salario'] = 'Informado na entrevista';
        }

        $success = $authorization->create($data);

        if ($success) {
            $notification = $notifications->get()->first();

            if (!$notification) {
                $notifications->new($notifications, $data, $user);
                return redirect()
                        ->route('admin.index')
                        ->with('success', 'Seu anúncio foi enviado para análise, em até 24 horas estará ativo na plataforma!');
            }else{
                $notification->add($notification, $data, $user);
                return redirect()
                            ->route('admin.index')
                            ->with('success', 'Seu anúncio foi enviado para análise, em até 24 horas estará ativo na plataforma!');
            }
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $postcategorie = Categories::find($post->category_id);
        return view('admin.posts.edit', compact('post', 'postcategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories, Authorization $authorization, MasterNotifications $notifications)
    {

        $user = auth()->user()->name;
        $post = Posts::find($request->id);
        $data = $request->all();
        $data['hash'] = $post->hash;

        $waiting = $authorization->where('hash', $data['hash'])->first();
        if ($waiting) {
            return redirect()
                            ->back()
                            ->with('error', 'Já existe uma edição pendente para este anúncio, por favor aguarde...');
        }


        $data['periodo'] = date_format(new DateTime($request->periodo), 'd-m-Y');
        $data['user_id'] = auth()->user()->id;
        $data['category_id'] = $categories->find($request->categorie)->id;
        $email = auth()->user()->email;
        $whatsapp = auth()->user()->whatsapp;


        if ($request->contato == 'email') {
            $data['email'] = $email;
        }else{
            $data['whatsapp'] = $whatsapp;
        }


        if ($request->salario == null) {
            $data['salario'] = 'Informado na entrevista';
        }

        $data['role'] = 'edit';
        $statusPost['role'] = 'edit';
        $success = $authorization->create($data);
        $status = $post->update($statusPost);

        if ($success && $status) {
            $notification = $notifications->get()->first();


            if (!$notification) {
                $notifications->new($notifications, $data, $user);
                return redirect()
                        ->route('admin.index')
                        ->with('success', 'Seu anúncio foi enviado para análise, em até 24 horas a edição estará ativa na plataforma!');
            }else{
                $notification->add($notification, $data, $user);
                return redirect()
                            ->route('admin.index')
                            ->with('success', 'Seu anúncio foi enviado para análise, em até 24 horas a edição estará ativa na plataforma!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authorization = Authorization::find($id);
        $data = $authorization;
        $user = User::find($authorization->user_id);

        if ($authorization) {
            $authorization->delete();
            $masternotification = MasterNotifications::get()->first();
            $master['qtd'] = $masternotification->qtd - 1;
            $master['message'] = 'Você tem '.$master['qtd'].' solicitações de anúncios!';
            $masternotification->update($master);
            Mail::send(new PostDenied($user, $data));
            return redirect()
                        ->back()
                        ->with('success', 'Anúncio removido com sucesso!');
        }
        return redirect()
                        ->back()
                        ->with('error', 'Houve um erro ao remover este anúncio!');
    }
}
