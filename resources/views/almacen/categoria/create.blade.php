@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-headr">
      <h3><em>Nueva Categoria</em></h3>
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
      <form method="POST" action="/almacen/categoria" autocomplete="off">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" class="form-control" placeholder="Nombre....">
          </div>
          <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <input type="text" name="descripcion" class="form-control" placeholder="Descripcion....">
          </div>
          <div class="form-group">
              <button class="btn btn-primary" type="submit"><i class="fa fa-check-square-o" aria-hidden="true"> Guardar</i></button>
              <button class="btn btn-danger" type="reset"><i class="fa fa-close" aria-hidden="true"> Cancelar</i></button>
              <a href="{{ url('/almacen/categoria') }}" title="Regresar"  class="btn btn-success " role="button" aria-pressed="true">
                  <i class="fa fa-backward" aria-hidden="true"> Regresar</i>
              </a>
          </div>
      </form>
    </div>
</div>
@endsection
