<x-app>
  <form class="row g-3 form justify-content-center" action="{{route('reset.pass.user.post', $token)}}" method="POST">
    @csrf
    <input type="text" name="token" value="{{$token}}" hidden>
    <div class="col-9">
      <label for="correo" class="form-label">
        Correo
      </label>
      <input name="correo" type="email" class="form-control form-control-lg" id="correo" placeholder="Correo" />
      @error('correo')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>
    <div class="col-9">
      <label for="password" class="form-label">
        Contraseña Nueva
      </label>
      <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Contraseña" />
      @error('password')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>

    <div class="col-9">
      <label for="password_confirmation" class="form-label">
        Confirmación de la Contraseña
      </label>
      <input name="password_confirmation" type="password" class="form-control form-control-lg" id="password_confirmation" placeholder="Contraseña" />
      @error('password_confirmation')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>


    <div class="col-9 mx-auto">
      <button class="btn btn-primary btn-lg p-2" type="submit">Cambiar Contraseña</button>
    </div>

  </form>
</x-app>
