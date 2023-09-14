<x-layout>
  <div class="col mb-4">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Solicitudes</h6>
      </div>
      <div class="card-body">
        <div class="list-group">
          @forelse ($solicitudes as $user)
          <div class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1 fw-semibold">{{ucfirst($user->registro_usuario->nombre)}}</h5>
              <small class="fw-semibold">Fecha de Solicitud</small>
            </div>
            <div class="d-flex w-100 justify-content-between">
              <p class="mb-1 fw-normal">{{$user->registro_usuario->direccion}}, {{$user->registro_usuario->parroquia->parroquia}}-{{$user->registro_usuario->parroquia->municipio->municipio}}</p>
              <small>{{date('d-m-Y', strtotime($user->created_at))}}</small>
            </div>
            <div class="d-flex w-100 justify-content-between">
              <small>{{$user->registro_usuario->telefono}} | {{$user->registro_usuario->correo}} </small>
              <form action="{{route('comunitaria.respuesta')}}" method="post">
                @csrf
                <button class="btn btn-primary col-2">Respondido</button>
              </form>
            </div>
          </div>
          @empty
          <h2>No hay Solicitudes</h2>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</x-layout>
