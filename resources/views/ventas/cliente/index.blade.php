@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-header">
      <div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
          <h3><em>Listado de Clientes </em> <a href="cliente/create"><button class="btn btn-success"><i class="fa fa-share-square-o" aria-hidden="true"> Nuevo</i></button></a></h3>
          @include('ventas.cliente.search')
      </div>
    </div>
    <div class="card-body was-validated">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Tipo Doc.</th>
                      <th>Numero Doc.</th>
                      <th>Telefono</th>
                      <th>Email</th>
                      <th>Ciudad</th>
                      <th>Empresa</th>
                      <th>Opciones</th>
                  </thead>
                  <tbody>
                  @foreach ($personas as $per)
                      <tr>
                          <td>{{$per->idpersona}}</td>
                          <td>{{$per->nombre}}</td>
                          <td>{{$per->tipo_documento}}</td>
                          <td>{{$per->num_documento}}</td>
                          <td>{{$per->telefono}}</td>
                          <td>{{$per->email}}</td>
                          <td>{{$per->ciudad}}</td>
                          <td>{{$per->empresa}}</td>
                          <td>
                              <a href="{{ route('cliente.edit',$per->idpersona)}}">
                                <button class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"> Editar</i></button>
                              </a>
                              <a href="" data-target="#modal-delete-{{ $per->idpersona }}" data-toggle="modal">
                                <button class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"> Eliminar</i></button>
                              </a>
                          </td>
                      </tr>
                      @include('ventas.cliente.modal')
                  @endforeach
                  </tbody>
              </table>
          </div>
          {{$personas->render()}}
      </div>
    </div>
</div>
@endsection
