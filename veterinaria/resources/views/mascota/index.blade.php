<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Mascotas</title>
</head>
<body class="bg-dark text-white">
    <br>
    <h1 class="text-center">Mascotas</h1>
    <div class="container">
        @if (Session::get('success'))

        <div class="alert alert-success mt-2">
            <strong>{{Session::get('success')}}</strong><br>
        </div>

        @endif
        <br>
        <a href="{{ url('/mascota/create') }}" class="btn btn-primary">
            Registrar nueva mascota
        </a>
        <br><br>
        <table class="table table-bordered text-white">
            <thead class="text-secondary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Edad</th>
                    <th>Imagen</th>
                    <th>Tamaño</th>
                    <th>Género</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->id }}</td>
                        <td>{{ $mascota->nombre }}</td>
                        <td>{{ $mascota->descripcion }}</td>
                        <td>{{ $mascota->estado }}</td>
                        <td>{{ $mascota->edad }}</td>
                        <td>
                            {{-- {{ asset($mascota->imagen) }} --}}
                            <img src="{{ asset('storage/'.$mascota->imagen) }}" width="50" alt="">
                        </td>
                        <td>{{ $mascota->tamanio }}</td>
                        <td>{{ $mascota->genero }}</td>
                        <td>
                            <a href="{{route('mascota.edit', $mascota)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('mascota.destroy', $mascota)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Quiere borrar?')" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $mascotas->links('pagination::bootstrap-5') }}
        <a class="btn btn-light" href="{{ url('/dashboard') }}">Volver</a>
    </div>
</body>
</html>
