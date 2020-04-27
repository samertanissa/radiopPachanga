<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Carrusel;

class CarruselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Carrusel::all();
        return view('admin.carrusel.indexEdit',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carrusel.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = request()->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'titulo' => 'max:20',
            'texto' => 'max:60',
        ]);
        $files = $request->file('imagen');
        if ($files){
            $destino = public_path('/banner/');
            $imagen = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destino, $imagen);
        // Save In Database
			$imagemodel= new Carrusel();
            $imagemodel->imagen="$imagen";
			$imagemodel->titulo=$request->titulo;
			$imagemodel->texto=$request->texto;
            $imagemodel->estado="1";
            $imagemodel->save();
            return back()->with('success', 'Imagen cargada correctamente');

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
        $data = Carrusel::find($id);
        return view('admin.carrusel.update', compact('data'));

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
        $validate = request()->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'titulo' => 'max:20',
            'texto' => 'max:60',
        ]);
        $files = $request->file('imagen');
        if ($files){
            $destino = public_path('/banner/');
            $imagen = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destino, $imagen);
        // Save In Database
        $datos = Carrusel::find($id);
        $datos->titulo = $request->titulo;
        $datos->texto = $request->texto;
        $datos->imagen = $imagen;
        $datos->estado = "1";
        $datos->save();
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
        $dato = Carrusel::find($id);
        $dato->delete();
        return redirect()->route('carrusel.index');
    }
}
