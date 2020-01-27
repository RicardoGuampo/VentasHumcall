@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-header">
      <div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
          <h3><em>Listado de Articulos</em> <a href="articulo/create"><button class="btn btn-success"><i class="fa fa-share-square-o" aria-hidden="true"> Nuevo</i></button></a></h3>
          @include('almacen.articulo.search')
      </div>
    </div>
    <div class="card-body was-validated">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Codigo</th>
                      <th>Categoria</th>
                      <th>Stock</th>
                      <th>Imagen</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                  </thead>
                  <tbody>
                  @foreach ($articulos as $art)
                      <tr>
                          <td>{{$art->idarticulo}}</td>
                          <td>{{$art->nombre}}</td>
                          <td>{{$art->codigo}}</td>
                          <td>{{$art->categoria}}</td>
                          <td>{{$art->stock}}</td>
                          <td>
                              <img src="{{ asset('imagenes/articulos/'.$art->imagen) }}" alt="{{ $art->nombre }}" height="100px" width="100px" class="img-thumbnail">
                          </td>
                          <td>{{$art->estado}}</td>
                          <td>
                              <a href="{{ route('articulo.edit',$art->idarticulo)}}">
                                <button class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"> Editar</i></button>
                              </a>
                              <a href="" data-target="#modal-delete-{{ $art->idarticulo }}" data-toggle="modal">
                                <button class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"> Eliminar</i></button>
                              </a>
                          </td>
                      </tr>
                      @include('almacen.articulo.modal')
                  @endforeach
                  </tbody>
              </table>
          </div>
          {{$articulos->render()}}
      </div>
    </div>
</div>

@endsection
