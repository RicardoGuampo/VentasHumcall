@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-headr">
      <h3><em>Nueva Articulo</em></h3>
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
      <form method="POST" action="/almacen/articulo"  enctype="multipart/form-data">
          <div class="row">
              {{ csrf_field() }}
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" class="form-control" placeholder="Nombre...." value="{{ old('nombre') }}" required>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="">Categoria</label>
                      <select name="idcategoria" id="" class="form-control selectpicker" data-live-search="true" required>
                         <option value="" selected>-- Selecciona --</option>
                          @foreach ($categorias as $cat)
                              <option value="{{ $cat->idcategoria }}">{{ $cat->nombre }}</option>
                          @endforeach
                      </select>
                      <!--<input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">-->
                      <!--<small id="helpId" class="text-muted">Help text</small>-->
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="codigo">Codigo</label>
                      <input type="text" name="codigo" class="form-control" placeholder="Codigo del articulo" value="{{ old('codigo') }}">
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="number" min="0" pattern="^[0-9]+" name="stock" class="form-control" placeholder="Stock del articulo" value="{{ old('stock') }}" required>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <textarea  name="descripcion" class="form-control" rows="2" placeholder="Descripcion del articulo"></textarea>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="imagen">Imagen</label>
                      <input type="file" name="imagen" class="form-control" >
                  </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-check-square-o" aria-hidden="true"> Guardar</i></button>
                    <button class="btn btn-danger" type="reset"><i class="fa fa-close" aria-hidden="true"> Cancelar</i></button>
                    <a href="{{ url('/almacen/articulo') }}" title="Regresar"  class="btn btn-success " role="button" aria-pressed="true">
                        <i class="fa fa-backward" aria-hidden="true"> Regresar</i>
                    </a>
                  </div>
              </div>
          </div>
      </form>
    </div>
</div>
@endsection
