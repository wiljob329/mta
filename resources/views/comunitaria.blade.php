<x-layout>
  <div class="col mb-4">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Solicitudes</h6>
      </div>
      <div class="card-body">
        <div class="list-group">
          @forelse ($solicitudes as $user)
          <a href="#" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1 fw-semibold">{{ucfirst($user->nombre)}}</h5>
              <small class="fw-semibold">Fecha de Solicitud</small>
            </div>
            <div class="d-flex w-100 justify-content-between">
              <p class="mb-1 fw-normal">{{$user->direccion}}, {{$user->parroquia->parroquia}}-{{$user->parroquia->municipio->municipio}}</p>
              <small>{{date('d-m-Y', strtotime($user->solicitud->created_at))}}</small>
            </div>
            <small>{{$user->telefono}} | {{$user->correo}} </small>
          </a>
          @empty
          <h2>No hay Solicitudes</h2>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</x-layout>
