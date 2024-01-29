<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Voluntarios</title>
</head>
<body>
    <body class="bg-dark text-white">
        <br>
        <h1 class="text-center">Voluntarios</h1>
        <div class="container">
            @if (Session::get('success'))

            <div class="alert alert-success mt-2">
                <strong>{{Session::get('success')}}</strong><br>
            </div>

            @endif
            <br>
            <a href="{{ url('/voluntario/create') }}" class="btn btn-primary">
                Registrar voluntario
            </a>
            <br><br>
            <table class="table table-bordered text-white">
                <thead class="text-secondary">
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Imagen</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voluntarios as $voluntario)
                        <tr>
                            <td>{{ $voluntario->id }}</td>
                            <td>{{ $voluntario->nombres }}</td>
                            <td>{{ $voluntario->apellidos }}</td>
                            <td>{{ $voluntario->edad }}</td>
                            <td>
                                {{-- {{ asset($voluntario->imagen) }} --}}
                                <img src="{{ asset('storage/'.$voluntario->imagen) }}" width="50" alt="">
                            </td>
                            <td>{{ $voluntario->telefono }}</td>
                            <td>{{ $voluntario->email }}</td>
                            <td>
                                <a href="{{route('voluntario.edit', $voluntario)}}" class="btn btn-warning">Editar</a>
                                <form action="{{route('voluntario.destroy', $voluntario)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Quiere borrar?')" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $voluntarios->links('pagination::bootstrap-5') }}
            <a class="btn btn-light" href="{{ url('/dashboard') }}">Volver</a>
        </div>
    </body>
    </html>

</body>
</html>
