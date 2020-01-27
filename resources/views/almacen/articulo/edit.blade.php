@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-heade">
      <h3><em>Editar Articulo: {{ $articulo->nombre }}</em></h3>
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
      <form method="POST" action="{{ route('articulo.update',$articulo->idarticulo) }}"  enctype="multipart/form-data">
          <div class="row">
              {{ method_field('PATCH') }}
              {{ csrf_field() }}
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" class="form-control" placeholder="Nombre...." value="{{ $articulo->nombre }}" required>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="">Categoria</label>
                      <select name="idcategoria" id="" class="form-control selectpicker" data-live-search="true">
                          @foreach ($categorias as $cat)
                              @if($cat->idcategoria == $articulo->idcategoria)
                                  <option value="{{ $cat->idcategoria }}" selected>{{ $cat->nombre }}</option>
                              @else
                                  <option value="{{ $cat->idcategoria }}">{{ $cat->nombre }}</option>
                              @endif
                          @endforeach
                      </select>
                      <!--<input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">-->
                      <!--<small id="helpId" class="text-muted">Help text</small>-->
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="codigo">Codigo</label>
                      <input type="text" name="codigo" class="form-control" placeholder="Codigo del articulo" value="{{ $articulo->codigo }}">
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="number" min="0" pattern="^[0-9]+"  name="stock" class="form-control" placeholder="Stock del articulo" value="{{ $articulo->stock }}" required>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <textarea  name="descripcion" class="form-control" rows="2" placeholder="Descripcion del articulo">{{ $articulo->descripcion }}</textarea>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                      <label for="imagen">Imagen</label>
                      <input type="file" name="imagen" class="form-control">
                      @if(($articulo->imagen) != "")
                          <img src="{{ asset('imagenes/articulos/'.$articulo->imagen) }}" height="200px" width="180px">
                      @endif
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
