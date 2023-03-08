@extends("layout")
@section("contenido")

    <a href="{{route("producto.create")}}">Crear nuevo producto</a>

    <table class="rounded-lg border-separate border border-slate-500">
        <caption>Listado de productos</caption>
        <tr style="text-align:justify">
            <th >Nombre</th>
            <th >Apellido</th>
            <th >Dirección</th>
            <th >DNI</th>
        </tr>

        @foreach($alumnos as $alumno)
            <tr>
                <td >{{$alumno->nombre}}</td>
                <td >{{$alumno->apellido}}</td>
                <td>{{$alumno->direccion}}</td>
                <td>{{$alumno->dni}}</td>

                <td class="border-double border-4 border-sky-500">
                    <a href="{{route("alumnos.edit", $alumno->id)}}">Editar</a>
                </td>

                <td class="border-double border-4 border-sky-500">
                    <form action="{{route("alumnos.destroy",$alumno->id)}}" method="POST">
                        <!--Con ruta absoluta:
                        <form action="/alumnos/llavellave $alumno->id llavellave" method="POST">-->
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
