<x-app>
  <form class="row g-3 form justify-content-center" action="/login" method="POST">
    @csrf
    <div class="col-9">
      <label for="cedula" class="form-label">
        Cédula
      </label>
      <input name="cedula" type="text" class="form-control form-control-lg" id="cedula" placeholder="Cédula" />
      @error('cedula')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-9">
      <label for="password" class="form-label">
        Contraseña
      </label>
      <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Contraseña" />
      @error('password')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>

    <p class="error"></p>

    <div class="col-9 justify-content-end">
      <a href="#!">Olvidaste tu contraseña?</a>
    </div>
    <div class="col-9 mx-auto">
      <button class="btn btn-primary btn-lg p-2">Iniciar sesión</button>
    </div>
    <div class="col-9 text-center">
      <p><a href="{{route('registro')}}">No tienes cuenta? Registrate aquí</a></p>
    </div>

  </form>
</x-app>
