<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Portofolio::all();
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
        $portofolio = new Portofolio();
        $request->validate([
            'titulo'=>'required',
            'imagen'=>'required',
            'descripcion'=>'required',
            'link_web'=>'required',
            'link'=>'required',
        ]);
        
        $portofolio->titulo = $request->titulo;
        
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = $file->store('images/featureds');
            $portofolio->imagen  = $path;
        } else {
            $portofolio->imagen  = 'noimagen';
        }
        $portofolio->descripcion = $request->descripcion;
        $portofolio->link_web = $request->link_web;
        $portofolio->link = $request->link;
        $portofolio->save();
        return $portofolio;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        //
        $request->validate([
            'titulo'=>'required',
            'imagen'=>'required',
            'descripcion'=>'required',
            'link_web'=>'required',
            'link'=>'required',
        ]);
        
        $portofolio->titulo = $request->titulo;
        
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = $file->store('images/featureds');
            $portofolio->imagen  = $path;
        } else {
            $portofolio->imagen  = 'noimagen';
        }
        
        $portofolio->descripcion = $request->descripcion;
        $portofolio->link_web = $request->link_web;
        $portofolio->link = $request->link;
        $portofolio->update();
        return $portofolio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        //
        if(is_null($portofolio)){
            return response()->json('No se puede realizar la peticíon ,el portofolio ya no esta ');
        };
        $portofolio->delete();
        
        return response()->noContent();
    }
}