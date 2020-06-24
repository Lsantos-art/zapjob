<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\models\Categories;
use App\models\Posts;
use App\User;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::latest()->paginate(20);
        $carbon = Carbon::now(new DateTimeZone('America/Sao_Paulo'))->toDateString();
        $today = date_format(new DateTime($carbon), 'd-m-Y');


        return view('site.index', compact('posts', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byCateg($slug, $id)
    {
        $categorie = Categories::find($id);
        $posts = Posts::where('category_id', $id)->latest()->paginate(50);
        return view('site.byCateg', compact('posts', 'categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, Posts $postsSearch)
    {
        $data['titulo'] = $request->search;
        $posts = $postsSearch->search($data);
        $search = $data['titulo'];
        return view('site.search', compact('posts', 'search'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        $carbon = Carbon::now(new DateTimeZone('America/Sao_Paulo'))->toDateString();
        $today = date_format(new DateTime($carbon), 'd-m-Y');

        $post = Posts::find($id);
            if ($post) {
                $user = User::find($post->user_id);
            if ($post->salario != 'Informado na entrevista') {
                $formated = ' com salário de R$'.number_format($post->salario,2,",",".");
                $salario = $formated;
            }else{
                $salario = ', participe do processo seletivo!';
            }
            return view('site.show', compact('post', 'salario', 'user', 'today'));
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sobre()
    {
        return view('site.about.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        return view('site.about.terms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function share(Request $request)
    {
        $url = $request->url;
        $zap = $request->zap;
        $link = 'https://api.whatsapp.com/send?phone=55'.$zap.'&text=Esta%20vaga%20pode%20lhe%20interessar%3A%20%20'.$url;
        return redirect($link);
    }

    public function zap(Request $request)
    {
        $user = User::find($request->id);
        $url = $request->url;
        $zap = $user->whatsapp;
        $link = 'https://api.whatsapp.com/send?phone=55'.$zap.'&text=Ol%C3%A1%2C%20vi%20este%20an%C3%BAncio%20na%20*Zap%20Job*%20e%20gostaria%20de%20saber%20como%20participar%20da%20sele%C3%A7%C3%A3o.%20%20'.$url;
        return redirect($link);
    }
}
