<x-app>
  <form class="row gx-3 gy-2 form w-75 mt-3 mt-md-1" action="/registro" method="POST">
    @csrf
    <div class="col-12 col-md-6">
      <label for="nombre" class="form-label">
        Nombre
      </label>
      <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Completo" aria-label="First name">
    </div>
    <div class="col-12 col-md-6">
      <label for="cedula" class="form-label">
        Cédula
      </label>
      <input type="text" id="cedula" name="cedula" class="form-control" placeholder="Cedula" aria-label="Last name">
    </div>
    <div class="col-12 col-md-6">
      <label for="correo" class="form-label">
        Correo
      </label>
      <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo Electronico" aria-label="First name">
    </div>
    <div class="col-12 col-md-6">
      <label for="contraseña" class="form-label">
        Contraseña
      </label>
      <input type="password" id="contraseña" name="contraseña" class="form-control" placeholder="Contraseña" aria-label="Last name">
    </div>
    <div class="col-12 col-md-6">
      <label for="municipio" class="form-label">
        Municipio
      </label>
      <select id="municipio" name="municipio" class="form-select">
        <option value="all">Choose...</option>
        <option value="other">...</option>
      </select>
    </div>
    <div class="col-12 col-md-6">
      <label for="parroquia" class="form-label">
        Parroquia
      </label>
      <select id="parroquia" name="parroquia" class="form-select">
        <option>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="col-12 col-md-6">
      <label for="ccomunal" class="form-label">
        Consejo Comunal
      </label>
      <input type="text" id="ccomunal" name="consejo_comunal" class="form-control" placeholder="Consejo Comunal" aria-label="First name">
    </div>
    <div class="col-12 col-md-6">
      <label for="telefono" class="form-label">
        Teléfono
      </label>
      <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" aria-label="Last name">
    </div>
    <div class="col-12">
      <label for="direccion" class="form-label">
        Dirección
      </label>
      <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" aria-label="First name">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary mt-2">Registrarse</button>
    </div>
  </form>
</x-app>
