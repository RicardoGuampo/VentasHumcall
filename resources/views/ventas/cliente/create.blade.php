@extends ('layouts.admin')
@section ('contenido')
<div class="card-header content-headr">
  <h3><em>Nuevo Cliente</em></h3>
  @if(count($errors)>0)
      <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
          </ul>
      </div>
  @endif
</div>
<div class="card-body was-validated">
  <form method="POST" action="/ventas/cliente" accept-charset="UTF-8" enctype="multipart/form-data">
      <div class="row">
          {{ csrf_field() }}
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre...." value="{{ old('nombre') }}" required>
              </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input type="text" name="direccion" class="form-control" placeholder="Direccion...." value="{{ old('direccion') }}">
              </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                  <label for="tipo_documento">Documento</label>
                  <select name="tipo_documento" id="" class="form-control selectpicker" data-live-search="true">
                      <option value="" selected>-- Selecciona --</option>
                      <option value="CI">CI</option>
                      <option value="DNI">DNI</option>
                      <option value="PAS">PAS</option>
                  </select>
              </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                  <label for="num_documento">Numero documento</label>
                  <input type="text" name="num_documento" class="form-control" placeholder="Numero del Documento...." value="{{ old('num_documento') }}">
              </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                  <label for="telefono">Celular</label>
                  <input type="number" min="1" pattern="^[0-9]+"  name="telefono" class="form-control" placeholder="Celular..." value="{{ old('celular') }}">
              </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email..." value="{{ old('email') }}">
              </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                  <label for="ciudad">Ciudad</label>
                  <select name="ciudad" id="" class="form-control selectpicker" data-live-search="true">
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
                  </select>
              </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                  <label for="empresa">Empresa</label>
                  <input type="text" name="empresa" class="form-control" placeholder="Empresa..." value="{{ old('empresa') }}">
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
