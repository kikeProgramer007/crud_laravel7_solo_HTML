<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>frmCategoria</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <div class="contenedor">
    <div class="hijo">
    <a href="/">Categorias</a>
    <a href="/productos">Productos</a>
    <h2>FORMULARIO</h2>
    <h3>Registro de Categorias</h3>
    @include('categorias.frmcategoria')
    <br>
    <form action="/" method="POST">
        @method('GET')
        @csrf
        Buscar por:
        <select name="criterio" id="criterio" required>
            <option value="">Seleccione</option>
            <option value="id">Id</option>
            <option value="nombre">nombre</option>
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
        <caption>Categorias</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td><a href="/editar/{{$item->id}}">Editar</a></td>
                <td>
                  <form action="/eliminar/{{$item->id}}" method="POST">
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
            <th>Nombre</th>
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