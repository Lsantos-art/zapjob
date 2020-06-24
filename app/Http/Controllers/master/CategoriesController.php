<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategRequest;
use App\models\Categories;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesview = Categories::orderBy('name', 'asc')->paginate(30);
        return view('master.categories.index', compact('categoriesview'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategRequest $request)
    {

        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['user_id'] = auth()->user()->id;
        $response = Categories::create($data);


        $prefix = 'https://zapjob.s3.amazonaws.com/';

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();

            if ($extension != 'jpg') {
                return redirect()
                    ->back()->with('error', 'Apenas arquivos .jpg são aceitos!');
            }

            $name = 'categ-'.$response->id.'.'.$extension;
            $avatar = $prefix.$file->storeAs('categories', $name, $options = ['ACL' => 'public-read']);
            $data = [];
            $categorie = Categories::find($response->id);
            $data['avatar'] = $avatar;
            $categorie->update($data);
        }

        return redirect()
                ->route('categories.index')->with('success', 'Categoria adicionada com sucesso!');
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
        $categorie = Categories::find($id);
        return view('master.categories.edit', compact('categorie'));
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

        $id = $request->id;
        $categorie = Categories::find($id);
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['user_id'] = auth()->user()->id;

        $prefix = 'https://zapjob.s3.amazonaws.com/';

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();

            if ($extension != 'jpg') {
                return redirect()
                    ->back()->with('error', 'Apenas arquivos .jpg são aceitos!');
            }

            $name = 'categ-'.$id.'.'.$extension;
            $avatar = $prefix.$file->storeAs('categories', $name, $options = ['ACL' => 'public-read']);
            $data['avatar'] = $avatar;
        }

        $categorie->update($data);

        return redirect()
                ->back()->with('success', 'Categoria editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categories::find($id);
        $name = 'categ-'.$id.'.jpg';

        if ($categorie) {
            Storage::delete('categories/'.$name);
            $categorie->delete();
            return redirect()
                ->route('categories.index')->with('success', 'Categoria deletada com sucesso!');
        }

        return redirect()
                ->route('categories.index')->with('error', 'Houve um erro, tente novamente!');

    }
}
