<x-app>
  <div class="container-fluid p-0">
    <div class="row my-5 mx-2">
      <div class="col-sm-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Solicitud</h5>
            {{-- <p class="card-text">Para conformar la mesa técnica, se enviara un promotor de Aguas de Mérida para su comunidad.</p> --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#solicitudVisita" @if($solicitud OR $registromta) disabled @endif>
              Solicitar Visita
            </button>
          </div>
        </div>
      </div>
      <div class="col-sm-6 mt-3 mt-md-0">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Constitución de Mesa Técnica</h5>
            {{-- <p class="card-text">Aquí podrás adjuntar los documentos para registrar tu mesa técnica en Aguas de Mérida.</p> --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroMta" @if($registromta) disabled @endif>
              Constitución
            </button>
          </div>
        </div>
      </div>
      <div class="col-sm-6 mt-3 mt-md-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Registro de Mesa Técnica</h5>
            {{-- <p class="card-text">Aquí podrás adjuntar los documentos para registrar tu mesa técnica en Aguas de Mérida.</p> --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroMta" @if($registromta) disabled @endif>
              Registrar
            </button>
          </div>
        </div>
      </div>
      <div class="col-sm-6 mt-3 mt-md-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Actualización de Mesa Técnica</h5>
            {{-- <p class="card-text">Aquí podrás adjuntar los documentos para registrar tu mesa técnica en Aguas de Mérida.</p> --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#actualizacionMta">
              Actualizar
            </button>
          </div>
        </div>
      </div>
      {{-- <div class="col-sm-6">
        <div class="card shadow">
          <div class="card-body">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h5>Registro de Mesa Técnica</h5>
            </button>
            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p class="card-text">Aquí podrás adjuntar los documentos para registrar tu mesa técnica en Aguas de Mérida.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroMta">
                  Registrar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div> --}}


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

      @if($registromta)
      <div class="col mt-5">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <strong>Registro hecho el día</strong>
            <strong>Estado</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{date('d-m-Y', strtotime($registromta->created_at))}}
            @if($registromta->mesa_tecnica->estado == 1)
            <span class="badge bg-warning rounded-pill">En Espera</span>
            @elseif($registromta->mesa_tecnica->estado == 2)
            <span class="badge bg-success rounded-pill">Registrado en sistema</span>
            {{-- @else
            <span class="badge bg-primary rounded-pill"></span> --}}
            @endif
          </li>
        </ul>
      </div>
      @endif
    </div>
  </div>

  <!-- Modal solicitud -->
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



  <!-- Modal registro -->
  <div class="modal fade" id="registroMta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="solicitudVisitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="solicitudVisitaLabel">Registro Mesa Técnica</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <form class="row g-3" action="{{route('registro.mta')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-2 col-md-6">
                <label for="nombre_mta" class="form-label fw-600">Nombre de la Mesa Técnica</label>
                <input type="text" name="nombre_mta" class="form-control" id="nombre" placeholder="Mesa Técnica" value="{{old('nombre_mta')}}">
                @error('nombre_mta')
                <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
                @enderror
              </div>
              <div class="mb-2 col-md-6">
                <label for="doc_constitucion_mta" class="form-label">Documento de Constitución</label>
                <input type="file" name="doc_constitucion_mta" class="form-control" id="doc_constitucion_mta" placeholder="Documento">
                @error('doc_constitucion_mta')
                <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
                @enderror
              </div>
              <div class="mb-2 col-md-6">
                <label for="doc_constancia_cc" class="form-label">Constancia del Consejo Comunal</label>
                <input type="file" name="doc_constancia_cc" class="form-control" id="doc_constancia_cc" placeholder="Documento">
                @error('doc_constancia_cc')
                <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
                @enderror
              </div>
              <div class="mb-2 col-md-6">
                <label for="doc_rif_mta" class="form-label">RIF de la Mesa Técnica</label>
                <input type="file" name="doc_rif_mta" class="form-control" id="doc_rif_mta" placeholder="Documento">
                @error('doc_rif_mta')
                <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
                @enderror
              </div>
              <div class="mb-2 col-md-6">
                <label for="telefono_encargado" class="form-label">Número de teléfono de contacto</label>
                <input type="text" name="telefono_encargado" class="form-control" id="telefono_encargado" placeholder="Número de Teléfono" value="{{old('telefono_encargado')}}">
                @error('telefono_encargado')
                <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
                @enderror
              </div>
              <div class="mb-2 col-md-6">
                <label for="correo_encargado" class="form-label">Correo electronico</label>
                <input type="email" name="correo_encargado" class="form-control" id="correo_encargado" placeholder="Email@mail.com" value="{{old('correo_encargado')}}">
                @error('correo_encargado')
                <p class="m-0 p-2 small alert alert-danger shadow-sm"> {{$message}} </p>
                @enderror
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Enviar Información</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app>
