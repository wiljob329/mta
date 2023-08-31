<x-app>
  <form class="row gx-3 gy-2 form w-75 mt-3 mt-md-1" action="/registro" method="POST">
    @csrf
    <div class="col-12 col-md-6">
      <label for="nombre" class="form-label">
        Nombre<span class="text-danger">*</span>
      </label>
      <input value="{{old('nombre')}}" type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Completo" aria-label="First name">
      @error('nombre')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-12 col-md-6">
      <label for="cedula" class="form-label">
        Cédula<span class="text-danger">*</span>
      </label>
      <input value="{{old('cedula')}}" type="text" id="cedula" name="cedula" class="form-control" placeholder="Cedula" aria-label="Last name">
      @error('cedula')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-12 col-md-6">
      <label for="correo" class="form-label">
        Correo<span class="text-danger">*</span>
      </label>
      <input value="{{old('correo')}}" type="email" id="correo" name="correo" class="form-control" placeholder="Correo Electronico" aria-label="First name">
      @error('correo')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-12 col-md-6">
      <label for="password" class="form-label">
        Contraseña<span class="text-danger">*</span>
      </label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" aria-label="Last name">
      @error('password')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-12 col-md-6">
      <label for="municipio" class="form-label">
        Municipio<span class="text-danger">*</span>
      </label>
      <select id="municipio" class="form-select">
        <option selected>Seleccionar Municipio</option>
        @foreach ($municipios as $municipio)
        <option value="{{$municipio->id}}">{{$municipio->municipio}}</option>
        @endforeach
      </select>
      @error('municipio')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-12 col-md-6">
      <label for="parroquia" class="form-label">
        Parroquia<span class="text-danger">*</span>
      </label>
      <select id="parroquia" name="parroquia" class="form-select">
        <option selected>Seleccionar Parroquia</option>
      </select>
      @error('parroquia')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-12 col-md-6">
      <label for="consejo_comunal" class="form-label">
        Consejo Comunal<span class="text-danger">*</span>
      </label>
      <input value="{{old('consejo_comunal')}}" type="text" id="consejo_comunal" name="consejo_comunal" class="form-control" placeholder="Consejo Comunal" aria-label="First name">
      @error('consejo_comunal')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-12 col-md-6">
      <label for="telefono" class="form-label">
        Teléfono<span class="text-danger">*</span>
      </label>
      <input value="{{old('telefono')}}" type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" aria-label="Last name">
      @error('telefono')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-12">
      <label for="direccion" class="form-label">
        Dirección<span class="text-danger">*</span>
      </label>
      <input value="{{old('nombre')}}" type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" aria-label="First name">
      @error('direccion')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary mt-2">Registrarse</button>
    </div>
  </form>
</x-app>
