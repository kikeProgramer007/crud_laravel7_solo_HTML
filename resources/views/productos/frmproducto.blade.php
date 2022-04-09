@if (!empty($producto->id))
{{-- FORMULARIO PARA EDITAR --}}
  <h3>Editar de Producto: {{$producto->id}}</h3>
    <form action="/productos/modificar/{{$producto->id}}" method = "POST">
        @method('PUT')
        @csrf
        <table>
            <tr>
              <td>Descripción</td>
              <td><input type="text" id="descripcion" name="descripcion" value="{{$producto->descripcion}}" required></td>
            </tr>
            <tr>
              <td>Precio</td>
              <td><input type="text" id="precio" name="precio" value="{{$producto->precio}}" required></td>
            </tr>
            <tr>
              <td>Categoria</td>
              <td>
                <select id="id_categoria" name="id_categoria"  required>
                  <option disabled value="">Seleccionar categoría</option>
                  @foreach ($categorias as $categoria)
                   <option value ="{{$categoria->id}}" @if($categoria->id==$producto->id_categoria) selected @endif>{{$categoria->nombre}}</option>
                  @endforeach
              </select>  
              </td>
            </tr>
            <tr>
                <td colspan="2"><br><button type="submit">Modificar</button> <a href="/productos">Regresar</a></td>
            </tr>
        </table>
      
    </form>
   
@else
{{-- FORMULARIO PARA AGREGAR --}}
<h3>Registro de Productos</h3>
    <form action="/productos/registrar" method = "POST">
        @csrf
        <table>
            <tr>
              <td>Descripción</td>
              <td><input type="text" id="descripcion" name="descripcion"  required></td>
            </tr>
            <tr>
              <td>Precio</td>
              <td><input type="text" id="precio" name="precio" required></td>
            </tr>
            <tr>
              <td>Categoria</td>
              <td>
                <select id="id_categoria" name="id_categoria"  required>
                <option selected disabled value="">Seleccionar</option>
                  @foreach ($categorias as $categoria)
                    <option value ="{{$categoria->id}}">{{$categoria->nombre}}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr><td><br><button type="submit">Guardar</button></td></tr>
        </table>
    </form>
@endif