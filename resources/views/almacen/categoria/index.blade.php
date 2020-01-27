@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-header">
      <div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
          <h3><em>Listado de Categorias</em> <a href="categoria/create"><button class="btn btn-success"><i class="fa fa-share-square-o" aria-hidden="true"> Nuevo</i></button></a></h3>
          @include('almacen.categoria.search')
      </div>
    </div>
    <div class="card-body was-validated">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Opciones</th>
                  </thead>
                  <tbody>
                  @foreach ($categorias as $cat)
                      <tr>
                          <td>{{$cat->idcategoria}}</td>
                          <td>{{$cat->nombre}}</td>
                          <td>{{$cat->descripcion}}</td>
                          <td>
                              <a href="{{ route('categoria.edit',$cat->idcategoria)}}">
                                <button class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"> Editar</i></button>
                              </a>
                              <a href="" data-target="#modal-delete-{{ $cat->idcategoria }}" data-toggle="modal">
                                <button class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"> Eliminar</i></button>
                              </a>
                          </td>
                      </tr>
                      @include('almacen.categoria.modal')
                  @endforeach
                  </tbody>
              </table>
          </div>
          {{$categorias->render()}}
      </div>
    </div>
</div>
@endsection
