<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    {{-- Este archivo se encuentra dentro de public/css --}}
    {{-- Recuerda que después de crear o modificar archivos CSS, es posible que debas limpiar la caché de Laravel ejecutando el comando php artisan cache:clear para asegurarte de que los cambios se reflejen correctamente en tu aplicación. --}}
    <title>Cozy Veterinaria y refugio</title>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top navbar-transparent transparent-custom">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Cozy Vet</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#mascotas">Mascotas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#voluntarios">Voluntarios</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li> --}}
            </ul>
          </div>
        </div>
    </nav>

    {{-- Hover carousel--}}
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/images/hermoso-retrato-mascota-perro-gato-pequenos.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-flex align-items-center justify-content-center">
                <div>
                  <h1 class="text-center">COZY VET</h1>
                  <h2 class="text-center">Veterinaria y Refugio</h2>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <img src="/images/primer-plano-hocicos-lindo-perro-gato-sentado-mejilla-mejilla.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-flex align-items-center justify-content-center">
                <div>
                  <h1 class="text-center">COZY VET</h1>
                  <h2 class="text-center">Veterinaria y Refugio</h2>
                </div>
              </div>
          </div>
          {{-- <div class="carousel-item">
            <img src="/images/" class="d-block w-100" alt="...">
          </div> --}}
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Mascotas --}}
    {{-- <h3 id="mascotas">Mascotas</h3> --}}
    {{-- <div class="container text-center">
        <div class="row row-cols-4">
            @foreach ($mascotas as $mascota)
            <div class="col">
                <img src="{{ asset('storage/'.$mascota->imagen) }}" width="150" alt="">
                <p>{{ $mascota->nombre }}</p>
                <p>{{ $mascota->descripcion }}</p>
            </div>
            @endforeach
        </div>
    </div> --}}
    <div class="container text-center">
        <h1 id="mascotas">Mascotas</h1>
        <div class="row row-cols-4">
          @foreach ($mascotas as $mascota)
          <div class="col">
            <div class="card rounded p-3 mb-4">
              <img src="{{ asset('storage/'.$mascota->imagen) }}" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">{{ $mascota->nombre }}</h5>
                <hr class="my-2">
                <p class="card-text">{{ $mascota->descripcion }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>


    {{-- Voluntarios --}}
    <div class="container text-center">
        <h1 id="voluntarios">Voluntarios</h1>
        <div class="row row-cols-4">
            @foreach ($voluntarios as $voluntario)
            <div class="col">
                <div class="card rounded p-3 mb-4">
                    <div class="card-body">
                        <img class="card-img rounded-circle" src="{{ asset('storage/'.$voluntario->imagen) }}" width="150" alt="">
                    </div>
                    <p class="card-title">{{ $voluntario->nombres }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.carousel').carousel();
        });
    </script>
</body>
</html>
