<h1 class="text-center">{{ $modo }} mascota</h1>
<div class="container">

    <label for="nombre">Nombre de la mascota: </label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ isset($mascota->nombre) ? $mascota->nombre : '' }}">

    <label for="descripcion">Descripción de la mascota: </label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ isset($mascota->descripcion) ? $mascota->descripcion : '' }}">

    <label for="estado">Estado de la mascota: </label>
    <select class="form-select" name="estado" id="estado">
        <option>SELECCIONAR</option>
        <option value="Espera" @isset($mascota->estado) ? @selected("Espera" == $mascota->estado) : '' @endisset >Espera</option>
        {{-- <option value="Espera">Espera</option> --}}
        {{-- <option value="Espera" @selected("Espera" == $mascota->estado)>Espera</option> --}}

        <option value="Solicitado" @isset($mascota->estado) ? @selected("Solicitado" == $mascota->estado) : '' @endisset >Solicitado</option>
        {{-- <option value="Solicitado">Solicitado</option> --}}
        {{-- <option value="Solicitado" @selected("Solicitado" == $mascota->estado)>Solicitado</option> --}}

        <option value="Adoptado" @isset($mascota->estado) ? @selected("Adoptado" == $mascota->estado) : '' @endisset >Adoptado</option>
        {{-- <option value="Adoptado">Adoptado</option> --}}
        {{-- <option value="Adoptado" @selected("Adoptado" == $mascota->estado)>Adoptado</option> --}}
    </select>

    <label for="edad">Edad de la mascota(años humanos): </label>
    <input class="form-control" type="number" max="40" min="0" id="edad" name="edad" value="{{ isset($mascota->edad) ? $mascota->edad : '' }}">

    <label for="imagen">Fotografía de la mascota: </label>
    @if( isset($mascota->imagen) )
        <img src="{{ asset('storage/'.$mascota->imagen) }}" width="100" alt="">
    @endif
    <input class="form-control" type="file" id="imagen" name="imagen" value="">

    <label for="tamanio">Tamaño de la mascota: </label>
    <select class="form-select" name="tamanio" id="tamanio">
        <option>SELECCIONAR</option>
        <option value="Pequeño" @isset($mascota->tamanio) ? @selected("Pequeño" == $mascota->tamanio) : '' @endisset >Pequeño</option>

        <option value="Mediano" @isset($mascota->tamanio) ? @selected("Mediano" == $mascota->tamanio) : '' @endisset >Mediano</option>

        <option value="Grande" @isset($mascota->tamanio) ? @selected("Grande" == $mascota->tamanio) : '' @endisset >Grande</option>
    </select>

    <label for="genero">Género de la mascota: </label>
    <select class="form-select" name="genero" id="genero">
        <option>SELECCIONAR</option>
        <option value="Hembra" @isset($mascota->genero) ? @selected("Hembra" == $mascota->genero) : '' @endisset >Hembra</option>

        <option value="Macho" @isset($mascota->genero) ? @selected("Macho" == $mascota->genero) : '' @endisset >Macho</option>
    </select>

    <input class="btn btn-primary" type="submit" value="Guardar datos">
    <a href="{{ url('/mascota') }}">Volver</a>

</div>
