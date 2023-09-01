<x-app>
  <form class="row g-3 form justify-content-center mt-5" action="{{route('reset.post')}}" method="POST">
    @csrf
    <div class="col-10">
      <p class="text-muted">Olvidaste tu contraseña? No te preocupes. Ingresa el correo que usaste a la hora de registrarte y te enviaremos un link para recuperar tu contraseña.</p>
      <label for="cedula" class="form-label">
        Correo
      </label>
      <input name="correo" type="email" class="form-control form-control-lg" id="correo" placeholder="Correo del registro" />
      @error('correo')
      <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
      @enderror
    </div>

    <div class="col-10 mx-auto">
      <button class="btn btn-primary btn-lg p-2" type="submit">Enviar</button>
    </div>

  </form>
</x-app>
