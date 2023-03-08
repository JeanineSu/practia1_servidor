@extends("layout")
@section("contenido")

    <a href="{{route("alumnos.create")}}">Crear nuevo alumno</a>
    <tabla filas_serializado="{{$alumnos}}" campos_serializado="{{$campos}}" nombre_serializado="{{$nombre}}"></tabla>

@endsection
