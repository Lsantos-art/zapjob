<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\models\Categories;
use App\models\Posts;
use App\User;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts($id)
    {
        $carbon = Carbon::now(new DateTimeZone('America/Sao_Paulo'))->toDateString();
        $today = date_format(new DateTime($carbon), 'd-m-Y');

        $user = User::find($id);
        $posts = $user->posts()->get();

        return view('master.users.posts', compact('user', 'posts', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $user = auth()->user();
        return view('master.profile.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function postsMasterIndex()
    {
        $carbon = Carbon::now(new DateTimeZone('America/Sao_Paulo'))->toDateString();
        $today = date_format(new DateTime($carbon), 'd/m/Y');

        $user = auth()->user();
        $posts = Posts::where('user_id', $user->id)->latest()->paginate(50);

        return view('master.posts.index', compact('user', 'posts', 'today'));
    }


    public function postsMasterForm()
    {
        return view('master.posts.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postMasterCreate(Request $request, Categories $categories, Posts $posts)
    {

        $user = auth()->user();
        $data = $request->all();
        $data['hash'] = mt_rand();
        $data['user_id'] = $user->id;
        $data['category_id'] = $request->categorie;
        $data['periodo'] = date_format(new DateTime($request->periodo), 'd-m-Y');
        $data['contato'] = 'email';
        $data['email'] = $request->email;
        $data['whatsapp'] = 'none';


        if ($request->salario == null) {
            $data['salario'] = 'Informado na entrevista';
        }

        $success = $posts->create($data);

        if ($success) {
            return redirect()
                        ->route('master.index')
                        ->with('success', 'Anúncio publicado com sucesso!');
        }else{
            return redirect()
                        ->route('master.index')
                        ->with('error', 'Houve um erro, tente novamente mais tarde...');
        }
    }


    public function postMasterEdit($id)
    {
        $post = Posts::find($id);
        $postcategorie = Categories::find($post->category_id);
        return view('master.posts.edit', compact('post', 'postcategorie'));
    }


    public function postMasterUpdate(Request $request, Categories $categories, Posts $posts)
    {
        $post = $posts->find($request->id);

        $data = $request->all();
        $data['category_id'] = $request->categorie;
        $data['periodo'] = date_format(new DateTime($request->periodo), 'd-m-Y');
        $data['contato'] = 'email';
        $data['email'] = $request->email;
        $data['whatsapp'] = 'none';


        if ($request->salario == null) {
            $data['salario'] = 'Informado na entrevista';
        }

        $success = $post->update($data);

        if ($success) {
            return redirect()
                        ->back()
                        ->with('success', 'Anúncio editado com sucesso!');
        }else{
            return redirect()
                        ->back()
                        ->with('error', 'Houve um erro, tente novamente mais tarde...');
        }

    }


    public function postDestroy($id)
    {
        $post = Posts::find($id);
        if ($post) {
            $post->delete();
            return redirect()
                        ->back()
                        ->with('success', 'Postagem deletada com sucesso!');
        }
        return redirect()
                        ->back()
                        ->with('error', 'Postagem não encontrada!');
    }
}
