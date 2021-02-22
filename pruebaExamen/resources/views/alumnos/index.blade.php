@extends('plantillas.plantilla1')
@section('titulo')
Alumnos
@endsection
@section('encabezado')
Alumnos
@endsection
@section('contenido')
@if($texto=Session::get('mensaje'))
    <p class="alert alert-success my-3 p-3">{{$texto}}</p>
@endif
<a href="{{route("alumnos.create")}}" class="btn btn-success my-3">Nuevo Alumno</a>
<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">Detalle</th>
          <th scope="col">Apellidos y Nombre</th>
          <th scope="col">Correo Electrónico</th>
          <th scope="col">Foto</th>
          <th scope="col">Teléfono</th>
        </tr>
      </thead>
      <tbody>
          @foreach($alumnos as $alumno)
        <tr>
          <td><a href="{{route('alumnos.show', $alumno)}}" class="btn btn-info">Detalle</a></td>
          <td>{{$alumno->apellidos, ", ",$alumno->nombre}}</td>
          <td>{{$alumno->email}}</td>
          <td><img src="{{asset($alumno->foto)}}" width="95rem" height="90rem" class="rounded-circe"></td>
          <td>{{$alumno->telefono}}</td>
          <td>
    <form name="borrar" class="form-inline" method="POST" action="{{route('alumnos.destroy', $alumno)}}">
        @csrf
        @method("DELETE")
<a href="{{route('alumnos.edit', $alumno)}}" class="btn btn-warning">Editar</a>
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Borrar Alumno?')">Borrar</button>

    </form>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
  {{$libros->links('pagination::bootstrap-4')}}
@endsection