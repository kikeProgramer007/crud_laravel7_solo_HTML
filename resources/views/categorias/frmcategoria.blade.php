    @if (!empty($categoria->id))
    {{-- FORMULARIO PARA EDITAR --}}
        <form action="/modificar/{{$categoria->id}}" method = "POST">
            @method('PUT')
            @csrf
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" id="nombre" name="nombre" value="{{$categoria->nombre}}" required></td>
                    <td><button type="submit">Modificar</button></td>
                    <td><a href="/">Regresar</a></td>
                </tr>
            </table>
        </form>
    @else
    {{-- FORMULARIO PARA AGREGAR --}}
        <form action="/registrar" method = "POST">
            @csrf
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" id="nombre" name="nombre" required></td>
                    <td ><button type="submit">Guardar</button></td>
                </tr>
            </table>
        </form>
    @endif