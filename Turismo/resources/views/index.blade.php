@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD Lugares turísticos</h2>
        </div>
        <div>
            <a href="{{route('lugars.create')}}" class="btn btn-primary">Añadir Lugar</a>
        </div>
    </div>

    @if(Session::get('success'))
        <div class="alert alert-success mt2">
            <strong>{{Session::get('success')}}</strong><br><br>
        </div>
    @endif

    <div class="col-16 mt-4 table-responsive">
        <table class="table table-bordered table-dark table-hover align-middle">
            <tr class="text-secondary">
                <th>Lugar</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Página web</th>
                <th>Acción</th>
            </tr>

            @foreach ($lugares as $lugar)
                <tr>
                    <td class="fw-bold">{{$lugar->nombre}}</td>
                    <td>{{$lugar->descripcion}}</td>
                    <td>{{$lugar->imagen}}</td>
                    <td>{{$lugar->url}}</td>
                    <td>
                        <a href="{{route('lugars.edit', $lugar)}}" class="btn btn-warning">Editar</a>

                        <form action="{{route('lugars.destroy', $lugar)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$lugares->links()}}
</div>
@endsection
