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
      <a href="/">Categorias</a>
      <a href="/productos">Productos</a>
    <br>
  <h2>FORMULARIO</h2>
    @include('productos.frmproducto')
    <br>
  {{-- FORMULARIO DE BUSQUEDA --}}
    <form action="/productos" method="POST">
        @method('GET')
        @csrf
        Buscar por:
        <select name="criterio" id="criterio" required>
            <option value="">Seleccione</option>
            <option value="id">Id</option>
            <option value="descripcion">Descripción</option>
        </select>
        <input type="text"id="buscar" name="buscar">
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
            @foreach ($productos as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->descripcion}}</td>
                <td>{{$item->precio}}</td>
                <td>{{$item->categoria}}</td>
                <td><a href="/productos/editar/{{$item->id}}">Editar</a></td>
                <td>
                  <form action="/productos/eliminar/{{$item->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Eliminar</button>
                  </form>
                </td>
              </tr>
            @endforeach
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
</body>
</html>