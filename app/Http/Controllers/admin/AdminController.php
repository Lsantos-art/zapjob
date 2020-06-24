<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\AdminNotifications;
use App\models\Notifications;
use App\models\Posts;
use App\User;
use Carbon\Carbon;
use Carbon\Traits\Date;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = auth()->user()->posts()->count();
        if (!$limit) {
            $limit = 10;
        }else{
            $count = 10 - $limit;
            $limit = $count;
        }

        return view('admin.index', compact('limit'));
    }


    public function posts(AdminNotifications $notifications)
    {
        $carbon = Carbon::now(new DateTimeZone('America/Sao_Paulo'))->toDateString();
        $today = date_format(new DateTime($carbon), 'd-m-Y');

        $id = auth()->user()->id;
        $notification = auth()->user()->notifications();

        if ($notifications) {
            $notification->delete();
        }

        $posts = Posts::where('user_id', $id)->get();
        return view('admin.posts.index', compact('posts', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postEdit($id)
    {
        //
    }

    public function postsDestroy($id)
    {
        $post = Posts::find($id);
        if ($post) {
            $post->delete();
            return redirect()->back()->with('success', 'Postagem deletada com sucesso!');
        }
        return redirect()->back()->with('error', 'Ops, houve um erro, tente mais tarde!');
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
        return view('admin.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        $exists = User::where('email', $request->email)->first();

        //myself email or not exist
        if ($exists && $exists->id == $id || !$exists) {
            $data['email'] = $request->email;
        }

        //email from another user
        if ($exists && $exists->id != $id) {
            return redirect()
                            ->back()->with('error', 'Já existe uma conta utilizando este email!');
        }

        $data['name'] = $request->name;
        $data['whatsapp'] = $request->whatsapp;

        $prefix = 'https://zapjob.s3.amazonaws.com/';

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();

            if ($extension != 'jpg') {
                return redirect()
                                ->back()->with('error', 'Apenas arquivos .jpg são aceitos!');
            }

            $name = 'user-'.$id.'.'.$extension;
            $avatar = $prefix.$file->storeAs('users', $name, $options = ['ACL' => 'public-read']);
            $data['avatar'] = $avatar;
        }

        $user->update($data);

        return redirect()
                        ->back()->with('success', 'Conta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level == 1) {
            return redirect()
                ->back()->with('error', 'Você não pode deletar uma conta padrão!');
        }
        $user = User::find($id);
        $name = 'user-'.$id.'.jpg';

        if ($user) {
            Storage::delete('users/'.$name);
            $user->delete();
            return redirect()
                ->route('login')->with('success', 'Sua conta foi deletada com sucesso!');
        }

        return redirect()
                ->back()->with('error', 'Houve um erro, tente novamente!');
    }
}
