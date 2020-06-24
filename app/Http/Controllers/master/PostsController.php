<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Mail\PostDenied;
use App\models\AdminNotifications;
use App\models\Authorization;
use App\models\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users, $id)
    {
        $user = $users->find($id);
        return view('master.posts.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Posts $posts, AdminNotifications $notification)
    {
        $authorization = Authorization::find($id);
        $user = User::find($authorization->user_id);

        if ($user->posts()->count() == 10) {
            return redirect()
                            ->back()
                            ->with('error', 'Este usuário atingiu o limite máximo de anúncios!');
        }

        $success = $posts->new($authorization, $posts, $notification);

        return redirect()
                    ->route('authorization.index')
                    ->with('success', 'Anúncio ativado com sucesso!');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $user = User::find($post->user_id);
        $data = $post;

        if ($post) {
            $post->delete();
            Mail::send(new PostDenied($user, $data));
            return redirect()->back()->with('success', 'Postagem deletada com sucesso!');
        }
        return redirect()->back()->with('error', 'Ops, houve um erro, tente mais tarde!');
    }
}
