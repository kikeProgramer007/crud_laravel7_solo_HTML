<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $criterio = $request->criterio; //id o descripcion o categoria
        $buscar = $request->buscar;
        $categorias= Categoria::all();
        if($buscar == '' || $criterio==''){
            $productos = Producto::join('categorias','productos.id_categoria','=','categorias.id')
            ->select('productos.id','productos.descripcion','productos.precio','productos.id_categoria','categorias.nombre as categoria')->get();
        }else{
           //CONSULTA ENTRE DOS TABLAS
            // if($criterio=='id_categoria'){
            //     $buscar = Categoria::where('nombre','like','%'.$buscar.'%')->get()->first();
            //     $buscar = $buscar->id;
            // }

            $productos = Producto::join('categorias','productos.id_categoria','=','categorias.id')
            ->select('productos.id','productos.descripcion','productos.precio','productos.id_categoria','categorias.nombre as categoria')
            ->where('productos.'.$criterio,'like','%'.$buscar.'%')
            ->get();
        }
        return view('productos.principal',compact('productos','categorias'));
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
            'descripcion' => 'required|min:3|max:20',
            'precio' =>'required|numeric',
            'id_categoria' => 'required|string'
        ]);
        $productos = new Producto();
        $productos->descripcion = $request->descripcion;
        $productos->precio = $request->precio;
        $productos->id_categoria = $request->id_categoria;
        $productos->save();
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
        $producto = Producto::findOrFail($id);
        $productos = Producto::join('categorias','productos.id_categoria','=','categorias.id')
        ->select('productos.id','productos.descripcion','productos.precio','productos.id_categoria','categorias.nombre as categoria')->get();
        $categorias= Categoria::all();
        return view('productos.principal',compact('productos','producto','categorias'));
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
            'descripcion' => 'required|min:3|max:20',
            'precio' =>'required|numeric',
            'id_categoria' => 'required|string'
        ]);
        
        $producto = Producto::findOrFail($request->id);
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->id_categoria = $request->id_categoria;
        $producto->save();
        $mensaje = 'Datos actualizados correctamente';
        $productos = Producto::join('categorias','productos.id_categoria','=','categorias.id')
        ->select('productos.id','productos.descripcion','productos.precio','productos.id_categoria','categorias.nombre as categoria')->get();
        $categorias= Categoria::all();
        return view('productos.principal',compact('productos','mensaje','categorias'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return back()->with('delete','Registro eliminado correctamente');
    }
}
