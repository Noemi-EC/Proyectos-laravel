<h1 class="text-center">{{ $modo }} voluntario</h1>
<div class="container">

    <label for="nombres">Nombres: </label>
    <input type="text" class="form-control" id="nombres" name="nombres" value="{{ isset($voluntario->nombres) ? $voluntario->nombres : '' }}">

    <label for="apellidos">Apellidos: </label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ isset($voluntario->apellidos) ? $voluntario->apellidos : '' }}">

    <label for="edad">Edad: </label>
    <input class="form-control" type="number" max="70" min="15" id="edad" name="edad" value="{{ isset($voluntario->edad) ? $voluntario->edad : '' }}">

    <label for="imagen">Fotografía: </label>
    @if( isset($voluntario->imagen) )
        <img src="{{ asset('storage/'.$voluntario->imagen) }}" width="100" alt="">
    @endif
    {{-- <input class="form-control" type="file" id="imagen" name="imagen" value="{{ asset($voluntario->imagen) }}"> --}}
    <input class="form-control" type="file" id="imagen" name="imagen" value="">

    <label for="email">Email: </label>
    <input class="form-control" type="email" id="email" name="email" value="{{ isset($voluntario->email) ? $voluntario->email : '' }}">

    <label for="telefono">Número de teléfono: </label>
    <input class="form-control" type="tel" max="12" min="8" id="telefono" name="telefono" value="{{ isset($voluntario->telefono) ? $voluntario->telefono : '' }}">

    <input class="btn btn-primary" type="submit" value="Guardar datos">
    <a href="{{ url('/voluntario') }}">Volver</a>

</div>
