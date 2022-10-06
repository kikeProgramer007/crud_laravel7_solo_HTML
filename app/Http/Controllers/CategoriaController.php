<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $criterio = $request->criterio; //id o nombre
        $buscar = $request->buscar;
        if($buscar == '' || $criterio==''){
            $categorias = Categoria::all();
        }else{
            $categorias = Categoria::where($criterio,'like','%'.$buscar.'%')->get();
        }
        return view('categorias.principal',compact('categorias'));
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|min:3|max:15',
        ]);

        $categorias = new Categoria();
        $categorias->nombre = $request->nombre;
        $categorias->save();
        return back()->with('agregar','Se ha registrado satisfatoriamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categorias = Categoria::all();
        return view('categorias.principal',compact('categorias','categoria'));
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
        $request->validate([
            'nombre'=>'required|min:3|max:15',
        ],[
            'nombre.required' =>'El :attribute es requerido'
        ]);

        $categoria = Categoria::findOrFail($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->save();
        $mensaje = 'Datos actualizados correctamente';
        $categorias = Categoria::all();
        return view('categorias.principal',compact('categorias','mensaje'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return back()->with('delete','Registro eliminado correctamente');
    }
}
