<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Taquilla Única MTA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  {{-- <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" /> --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/main.css')}}" />
</head>
<body>
  @if (session()->has('success'))
  <script>
    window.addEventListener('load', () => {
      $.notify("{{session('success')}}", "success");
    })

  </script>
  @endif
  @if (session()->has('error'))
  <script>
    window.addEventListener('load', () => {
      $.notify("{{session('error')}}", "error");
    })

  </script>
  @endif

  <div class="row page d-flex">
    <div class="col-12 col-md-6 px-0 img-page order-last order-md-first">
      {{-- <img src="https://images.unsplash.com/photo-1675050757561-741bd739bc06?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDEwfHx8ZW58MHx8fHx8&auto=format&fit=crop&w=900&q=60" alt="image from unsplash" class="img" /> --}}
      <img src="{{asset('assets/img/3141113.jpg')}}" alt="pasos a seguir" class="img-fluid h-100" />

    </div>


    @auth
    <div class="col-12 col-md-6 px-0">
      <nav class="navbar navbar-dark bg-light">
        <div class="container-fluid">
          <a class="navbar-brand text-primary" href="http://www.aguasdemerida.com.ve">
            <img src="{{asset('assets/img/logo_aguas.png')}}" alt="Logo" width="30" class="d-inline-block align-text-top">
            <strong>Aguas de Mérida</strong>
          </a>

          <div class="nav-item dropdown me-4">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ucfirst(strtok(auth()->user()->nombre, " "));}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <form action="{{route('logout')}}" method="post">
                  @csrf
                  <input class="dropdown-item" type="submit" value="Logout" />
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      {{$slot}}
      {{-- <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">Copyright &copy; {{date('Y')}} <a href="/" class="text-muted">Aguas de Mérida</a>. All rights reserved.</p>
      </footer> --}}
    </div>
    @else
    <div class="col-12 col-md-6 d-flex my-5 my-md-0 order-first order-md-last flex-column align-items-center justify-content-center main-page">


      <div class="welcome text-center my-4">
        <a href="http://www.aguasdemerida.com.ve">
          <img src="{{asset('assets/img/logo_aguas.png')}}" alt="logoaguas" class="imgLogo" />
        </a>
        <h2 class="mt-2 mb-0">Taquilla Única Aguas de Mérida</h2>
        <span class="">MESAS TÉCNICAS DE AGUAS</span>
      </div>
      {{$slot}}
      {{-- <footer class="border-top text-center small text-muted">
        <p class="m-0">Copyright &copy; {{date('Y')}} <a href="/" class="text-muted">Aguas de Mérida</a>.</p>
      </footer> --}}
    </div>
    @endauth



  </div>

  <!-- footer begins -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('assets/js/notify.min.js')}}"></script>

</body>
</html>
