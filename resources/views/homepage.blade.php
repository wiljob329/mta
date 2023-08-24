<x-app>
  <form class="row g-3 form justify-content-center" action="#!">
    <div class="col-9">
      <label for="cedula" class="form-label">
        Cédula
      </label>
      <input name="cedula" type="text" class="form-control form-control-lg" id="cedula" placeholder="Cédula" />
    </div>
    <div class="col-9">
      <label for="contraseña" class="form-label">
        Contraseña
      </label>
      <input name="contraseña" type="password" class="form-control form-control-lg" id="contraseña" placeholder="Contraseña" />
    </div>

    <p class="error"></p>

    <div class="col-9 justify-content-end">
      <a href="#!">Olvidaste tu contraseña?</a>
    </div>
    <div class="col-9 mx-auto">
      <button class="btn btn-primary btn-lg p-2">Iniciar sesión</button>
    </div>
    <div class="col-9 text-center">
      <p><a href="./registrar">No tienes cuenta? Registrate aquí</a></p>
    </div>

  </form>
</x-app>
