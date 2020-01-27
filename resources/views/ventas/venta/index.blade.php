@extends ('layouts.admin')
@section ('contenido')
<div class="row">


</div>

<div class="card content">
    <div class="card-header content-header">
      <div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
          <h3><em>Listado de Ventas </em> <a href="venta/create"><button class="btn btn-success"><i class="fa fa-share-square-o" aria-hidden="true"> Nuevo</i></button></a></h3>
          @include('ventas.venta.search')
      </div>
    </div>
    <div class="card-body was-validated">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-condensed table-hover">
                      <thead>
                          <th>Fecha</th>
                          <th>Cliente</th>
                          <th>Comprobante</th>
                          <th>Total</th>
                          <th>Estado</th>
                          <th>Opciones</th>
                      </thead>
                      <tbody>
                      @foreach ($ventas as $ven)
                          <tr>
                              <td>{{$ven->fecha_hora}}</td>
                              <td>{{$ven->nombre}}</td>
                              <td>{{$ven->tipo_comprobante. ': '. $ven->num_comprobante}}</td>
                              <td>{{$ven->total_venta}}</td>
                              <td>{{$ven->estado}}</td>
                              <td>
                                  <a href="{{ route('venta.show',$ven->idventa)}}">
                                    <button class="btn btn-primaty"><i class="fa fa-book" aria-hidden="true"> Detalles</i></button>
                                  </a>
                                  <a href="" data-target="#modal-delete-{{ $ven->idventa }}" data-toggle="modal">
                                    <button class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"> Anular</i></button>
                                  </a>
                              </td>
                          </tr>
                          @include('ventas.venta.modal')
                      @endforeach
                      </tbody>
                  </table>
              </div>
              {{$ventas->render()}}
          </div>
      </div>
    </div>
</div>
@endsection
