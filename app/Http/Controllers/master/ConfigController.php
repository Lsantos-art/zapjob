<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\models\Star;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Star::get()->first();
        return view('master.config.index', compact('stars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function star(Request $request, Star $stars)
    {
            $file = $request->file('file');
            if (!$file) {
                return redirect()->back();
            }


            $star = $stars->get()->first();
            $extension = strtolower($file->getClientOriginalExtension());

            if ($extension != 'jpg') {
                    return redirect()
                            ->back()->with('error', 'Apenas arquivos .jpg são aceitos!');
            }


            if ($request->type == 'star1') {
                $name = 'star1';
                $stars->add($star, $file, $name, $extension);
            }

            if ($request->type == 'star2') {
                $name = 'star2';
                $stars->add($star, $file, $name, $extension);
            }

            if ($request->type == 'star3') {
                $name = 'star3';
                $stars->add($star, $file, $name, $extension);
            }

            return redirect()
                            ->back()
                            ->with('success', 'Imagens alteradas com sucesso!');


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
        //
    }
}
