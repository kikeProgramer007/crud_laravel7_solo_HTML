@if (!empty($producto->id))
{{-- FORMULARIO PARA EDITAR --}}
  <h3>Editar de Producto: {{$producto->id}}</h3>
    <form action="{{url('/productos/modificar',[$producto->id])}}" method = "POST">
        @method('PUT')
        @csrf
        <table>
            <tr>
              <td>Descripción</td>
              <td><input type="text" id="descripcion" name="descripcion" value="{{$producto->descripcion}}"></td>
            </tr>
            @error('descripcion')
              <tr>
                <td colspan="2">
                  <small style="color:red;">{{$message}}</small>
                </td>
              </tr>
            @enderror
            <tr>
              <td>Precio</td>
              <td><input type="text" id="precio" name="precio" value="{{$producto->precio}}"></td>
            </tr>
            @error('precio')
              <tr>
                <td colspan="2">
                  <small style="color:red;">{{$message}}</small>
                </td>
              </tr>
            @enderror
            <tr>
              <td>Categoria</td>
              <td>
                <select id="id_categoria" name="id_categoria">
                  <option disabled value="">Seleccionar categoría</option>
                  @foreach ($categorias as $categoria)
                   <option value ="{{$categoria->id}}" @if($categoria->id==$producto->id_categoria) selected @endif>{{$categoria->nombre}}</option>
                  @endforeach
              </select>  
              </td>
            </tr>
            @error('id_categoria')
              <tr>
                <td colspan="2">
                  <small style="color:red;">{{$message}}</small>
                </td>
              </tr>
            @enderror
            <tr>
                <td colspan="2"><br><button type="submit">Modificar</button> <a href="{{url('/productos')}}">Cancelar</a></td>
            </tr>
        </table>
      
    </form>
   
@else
{{-- FORMULARIO PARA AGREGAR --}}
<h3>Registro de Productos</h3>
    <form action="{{url('/productos/registrar')}}" method = "POST">
        @method('POST')
        @csrf
        <table>
            <tr>
              <td>Descripción</td>
              <td><input type="text" id="descripcion" name="descripcion" value="{{old('descripcion')}}"></td>
            </tr>
            @error('descripcion')
              <tr>
                <td colspan="2">
                  <small style="color:red;">{{$message}}</small>
                </td>
              </tr>
            @enderror
            <tr>
              <td>Precio</td>
              <td><input type="text" id="precio" name="precio" value="{{old('precio')}}"></td>
            </tr>
            @error('precio')
              <tr>
                <td colspan="2">
                  <small style="color:red;">{{$message}}</small>
                </td>
              </tr>
            @enderror
            <tr>
              <td>Categoria</td>
              <td>
                <select id="id_categoria" name="id_categoria"  >
                <option selected disabled value="">Seleccionar</option>
                  @foreach ($categorias as $categoria)
                    @if (old('id_categoria') == $categoria->id)
                      <option value ="{{$categoria->id}}" selected>{{$categoria->nombre}}</option>
                    @else
                      <option value ="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endif
                    
                  @endforeach
                </select>
              </td>
            </tr>
            @error('id_categoria')
              <tr>
                <td colspan="2">
                  <small style="color:red;">{{$message}}</small>
                </td>
              </tr>
            @enderror

            <tr><td><br><button type="submit">Guardar</button></td></tr>
        </table>
    </form>
@endif
