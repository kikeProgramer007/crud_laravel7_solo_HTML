<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>frmProducto</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <div class="contenedor">
    <div class="hijo">
      <a href="{{url('/')}}">Categorias</a>
      <a href="{{url('/productos')}}">Productos</a>
    <br>
  <h2>FORMULARIO</h2>
    @include('productos.frmproducto')
    <br>
  {{-- FORMULARIO DE BUSQUEDA --}}
    <form action="{{url('/productos')}}" method="POST">
        @method('GET')
        @csrf
        Buscar por:
        <select name="criterio" id="criterio" onchange="actualizar(this)" >
            <option value="" selected disabled >Columna</option>
            <option value="id">Id</option>
            <option value="descripcion">Descripción</option>
            <option value="id_categoria">Categoría</option>
        </select>
        <input type="text"id="datoText" name="buscar" type="text" disabled  style="display: inline; " >
        <select id="datoSelect" name="buscar" style="display: none; width: 177px">
          <option selected disabled value="">Seleccionar</option>
            @foreach ($categorias as $categoria)
                <option value ="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>

        <button type="submit">Buscar</button>



    </form>
    
    @if (isset($mensaje))
      <p>{{$mensaje}}</p>
    @else
        @if (session('agregar'))
          <p>{{session('agregar')}}</p>
        @else
          <br>
        @endif
    @endif
   
    <center>
    <table border="1">
        <caption>Productos</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($productos as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->descripcion}}</td>
                <td>{{$item->precio}}</td>
                <td>{{$item->categoria}}</td>
                <td><a href="{{url('/productos/editar',$item->id)}}">Editar</a></td>
                <td>
                  <form action="{{url('/productos/eliminar',$item->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Eliminar</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5"><center>No se encontraron registros.</center></td>
              </tr>
            @endforelse
        </tbody>
        <tfoot>
          <tr>
            <th>Id</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th colspan="2">Acciones</th>
          </tr>
        </tfoot>
      </table>
    </center>
      @if (session('delete'))
      <p>{{session('delete')}}</p>
      @endif
    </div>
  </div>


  <script>
    var i = 0;
    function tag(id) {
     return document.getElementById(id);
    }

    function actualizar(opcion){
    var categoria=null;
      if ( opcion.value == 'id_categoria') {
        categoria = opcion.value;
      }
         tag('datoSelect').style.display = (categoria) ? "inline" : "none";
         tag('datoText').style.display = (!categoria) ? "inline" : "none";
         tag('datoSelect').disabled = !categoria;
         tag('datoText').disabled = categoria;
         i = categoria ? 1 : 0;
    }

    </script>

</body>
</html>