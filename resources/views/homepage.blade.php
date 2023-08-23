<x-app>
  <div class="welcome text-center mb-3">
    <a href="http://aguasdemerida.com.ve">
      <img src="./img/logo_aguas.png" alt="logoaguas" class="imgLogo" />
    </a>
    <h2 class="mt-2">Taquilla Unica Aguas de Mérida</h2>
    <span class="guide">Mesas Tecnicas de Aguas</span>
  </div>
  <form class="row g-3 form justify-content-center" action="#!">
    <div class="col-9">
      <label for="email" class="form-label">
        Email
      </label>
      <input name="email" type="email" class="form-control form-control-lg" id="email" placeholder="Enter your email" />
    </div>
    <div class="col-9">
      <label for="password" class="form-label">
        Password
      </label>
      <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Enter your password" />
    </div>

    <p class="error"></p>

    <div class="col-9 justify-content-end">
      <a href="#!">Forgot Password?</a>
    </div>
    <div class="col-9 mx-auto">
      <button class="btn btn-primary btn-lg p-2">Sign in</button>
    </div>
    <div class="col-9 text-center">
      <p><a href="#!">Don't have an account? Sign up</a></p>
    </div>

  </form>
</x-app>
