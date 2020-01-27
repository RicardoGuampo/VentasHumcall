@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-heade">
      <h3><em>Editar Cliente: {{ $persona->nombre }}</em></h3>
      @if(count($errors)>0)
          <div class="alert alert-danger alert-block" data-dismiss="alert">
              <ul>
              @foreach ($errors->all() as $error)
                  <li>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $error }}</strong>
                  </li>
              @endforeach
              </ul>
          </div>
      @endif
    </div>
    <div class="card-body was-validated">
      <form method="POST" action="{{ route('cliente.update',$persona->idpersona) }}"  enctype="multipart/form-data">
          <div class="row">
              {{ method_field('PATCH') }}
              {{ csrf_field() }}
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" class="form-control" placeholder="Nombre...." value="{{ $persona->nombre }}" required>
                  </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                      <label for="direccion">Direccion</label>
                      <input type="text" name="direccion" class="form-control" placeholder="Direccion...." value="{{ $persona->direccion }}">
                  </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                      <label for="tipo_documento">Documento</label>
                      <select name="tipo_documento" id="" class="form-control selectpicker" data-live-search="true">
                          @if ($persona->tipo_documento=='DNI')
                            <option value="">-- Selecciona --</option>
                            <option value="DNI" selected>DNI</option>
                            <option value="CI">CI</option>
                            <option value="PAS">PAS</option>
                          @elseif ($persona->tipo_documento=='PAS')
                            <option value="">-- Selecciona --</option>
                            <option value="PAS" selected>PAS</option>
                            <option value="CI">CI</option>
                            <option value="DNI">DNI</option>
                          @elseif ($persona->tipo_documento=='CI')
                            <option value="">-- Selecciona --</option>
                            <option value="PAS">PAS</option>
                            <option value="CI" selected>CI</option>
                            <option value="DNI">DNI</option>
                          @else
                            <option value="" selected>-- Selecciona --</option>
                            <option value="CI">CI</option>
                            <option value="PAS">PAS</option>
                            <option value="DNI">DNI</option>
                          @endif
                      </select>
                  </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                      <label for="num_documento">Numero documento</label>
                      <input type="text" name="num_documento" class="form-control" placeholder="Numero del Documento...." value="{{ $persona->num_documento }}">
                  </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                      <label for="telefono">Celular</label>
                      <input type="number" min="1" pattern="^[0-9]+"  name="telefono" class="form-control" placeholder="Celular..." value="{{ $persona->telefono }}">
                  </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email..." value="{{ $persona->email }}" >
                  </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                      <label for="ciudad">Ciudad</label>
                      <select name="ciudad" id="" class="form-control selectpicker" data-live-search="true">
                        @if ($persona->ciudad=='Beni')
                          <option value="">-- Selecciona --</option>
                          <option value="Beni" selected>Beni</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Cochabamba">Cochabamba</option>
                          <option value="La Paz">La Paz</option>
                          <option value="Oruro">Oruro</option>
                          <option value="Pando">Pando</option>
                          <option value="Potosi">Potosi</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Tarija">Tarija</option>
                        @elseif ($persona->ciudad=='Sucre')
                          <option value="">-- Selecciona --</option>
                          <option value="Beni">Beni</option>
                          <option value="Sucre" selected>Sucre</option>
                          <option value="Cochabamba">Cochabamba</option>
                          <option value="La Paz">La Paz</option>
                          <option value="Oruro">Oruro</option>
                          <option value="Pando">Pando</option>
                          <option value="Potosi">Potosi</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Tarija">Tarija</option>
                        @elseif ($persona->ciudad=='Cochabamba')
                          <option value="">-- Selecciona --</option>
                          <option value="Beni">Beni</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Cochabamba" selected>Cochabamba</option>
                          <option value="La Paz">La Paz</option>
                          <option value="Oruro">Oruro</option>
                          <option value="Pando">Pando</option>
                          <option value="Potosi">Potosi</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Tarija">Tarija</option>
                        @elseif ($persona->ciudad=='La Paz')
                          <option value="">-- Selecciona --</option>
                          <option value="Beni">Beni</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Cochabamba">Cochabamba</option>
                          <option value="La Paz" selected>La Paz</option>
                          <option value="Oruro">Oruro</option>
                          <option value="Pando">Pando</option>
                          <option value="Potosi">Potosi</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Tarija">Tarija</option>
                        @elseif ($persona->ciudad=='Oruro')
                          <option value="">-- Selecciona --</option>
                          <option value="Beni">Beni</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Cochabamba">Cochabamba</option>
                          <option value="La Paz">La Paz</option>
                          <option value="Oruro" selected>Oruro</option>
                          <option value="Pando">Pando</option>
                          <option value="Potosi">Potosi</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Tarija">Tarija</option>
                        @elseif ($persona->ciudad=='Pando')
                          <option value="">-- Selecciona --</option>
                          <option value="Beni">Beni</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Cochabamba">Cochabamba</option>
                          <option value="La Paz">La Paz</option>
                          <option value="Oruro">Oruro</option>
                          <option value="Pando" selected>Pando</option>
                          <option value="Potosi">Potosi</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Tarija">Tarija</option>
                        @elseif ($persona->ciudad=='Potosi')
                          <option value="">-- Selecciona --</option>
                          <option value="Beni">Beni</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Cochabamba">Cochabamba</option>
                          <option value="La Paz">La Paz</option>
                          <option value="Oruro">Oruro</option>
                          <option value="Pando">Pando</option>
                          <option value="Potosi" selected>Potosi</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Tarija">Tarija</option>
                        @elseif ($persona->ciudad=='Santa Cruz')
                          <option value="">-- Selecciona --</option>
                          <option value="Beni">Beni</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Cochabamba">Cochabamba</option>
                          <option value="La Paz">La Paz</option>
                          <option value="Oruro">Oruro</option>
                          <option value="Pando">Pando</option>
                          <option value="Potosi">Potosi</option>
                          <option value="Santa Cruz" selected>Santa Cruz</option>
                          <option value="Tarija">Tarija</option>
                        @elseif ($persona->ciudad=='Tarija')
                          <option value="">-- Selecciona --</option>
                          <option value="Beni">Beni</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Cochabamba">Cochabamba</option>
                          <option value="La Paz">La Paz</option>
                          <option value="Oruro">Oruro</option>
                          <option value="Pando">Pando</option>
                          <option value="Potosi">Potosi</option>
                          <option value="Santa Cruz" selected>Santa Cruz</option>
                          <option value="Tarija" selected>Tarija</option>
                        @else
                          <option value="" selected>-- Selecciona --</option>
                          <option value="Beni">Beni</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Cochabamba">Cochabamba</option>
                          <option value="La Paz">La Paz</option>
                          <option value="Oruro">Oruro</option>
                          <option value="Pando">Pando</option>
                          <option value="Potosi">Potosi</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Tarija">Tarija</option>
                        @endif
                      </select>
                  </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                      <label for="empresa">Empresa</label>
                      <input type="text" name="empresa" class="form-control" placeholder="Empresa..." value="{{ $persona->empresa }}">
                  </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-check-square-o" aria-hidden="true"> Guardar</i></button>
                      <button class="btn btn-danger" type="reset"><i class="fa fa-close" aria-hidden="true"> Cancelar</i></button>
                      <a href="{{ url('/ventas/cliente') }}" title="Regresar"  class="btn btn-success " role="button" aria-pressed="true">
                          <i class="fa fa-backward" aria-hidden="true"> Regresar</i>
                      </a>
                  </div>
              </div>
          </div>
      </form>
    </div>
</div>
@endsection
