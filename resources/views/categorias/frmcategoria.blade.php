    @if (!empty($categoria->id))
    {{-- FORMULARIO PARA EDITAR --}}
        <form action="{{ url('/modificar', [$categoria->id]) }}" method = "POST">
            @method('PUT')
            @csrf
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" id="nombre" name="nombre" value="{{$categoria->nombre}}"></td>
                    <td><button type="submit">Modificar</button></td>
                    <td><a href="{{ url('/') }}">Cancelar</a></td>
                </tr>
            </table>
        </form>
    @else
    {{-- FORMULARIO PARA AGREGAR --}}
        <form action="{{ url('/registrar')}}" method = "POST">
            @csrf
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" id="nombre" name="nombre" value="{{old('nombre')}}"></td>
                    <td ><button type="submit">Guardar</button></td>
                </tr>
               
            </table>
       
        </form>
    @endif
    @error('nombre')
        <small style="color:red;">{{$message}}</small><br>
    @enderror
