<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Crear registro</title>
</head>
<body>

    <form class="form-control" action="{{ url('/voluntario') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        @include('voluntario.form', ['modo' => 'Crear'])
    </form>

</body>
</html>
