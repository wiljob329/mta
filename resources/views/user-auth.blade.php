<x-app>
  <div class="container-fluid p-0">
    <div class="row my-5 mx-2">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Registro de Mesa Técnica</h5>
            <p class="card-text">Aquí podrá cargar los documentos para registrar la mesa tecnica en Aguas de Mérida.</p>
            <a href="#" class="btn btn-primary">Registrar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 mt-3 mt-md-0">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Solicitud</h5>
            <p class="card-text">Para conformar la mesa técnica, se enviara un promotor de Aguas de Mérida para lorem ipsum</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#solicitudVisita" @if($solicitud) disabled @endif>
              Solicitar Visita
            </button>
          </div>
        </div>
      </div>
      @if($solicitud)

      <div class="col mt-5">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <strong>Solicitud hecha el día</strong>
            <strong>Estado</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{date('d-m-Y', strtotime($solicitud->created_at))}}
            @if($solicitud->estado == 1)
            <span class="badge bg-warning rounded-pill">En Espera</span>
            @elseif($solicitud->estado == 2)
            <span class="badge bg-success rounded-pill">Visto</span>
            @else
            <span class="badge bg-primary rounded-pill">Respondido</span>
            @endif
          </li>
        </ul>
      </div>
      @endif
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="solicitudVisita" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="solicitudVisitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="solicitudVisitaLabel">Solicitud de Visita</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Sus Datos seran enviados a la gerencia de Participación Comunitaria de Aguas de Mérida para planificar la visita y constitución de la Mesa Tecnica</p>
        </div>
        <div class="modal-footer">
          <form class="row g-3" action="{{route('solicitud')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Enviar Datos</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app>
