@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-header">
      <div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
          <h3><em>Listado de Ingresos </em> <a href="ingreso/create"><button class="btn btn-success"><i class="fa fa-share-square-o" aria-hidden="true"> Nuevo</i></button></a></h3>
          @include('compras.ingreso.search')
      </div>
    </div>
    <div class="card-body was-validated">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                      <th>Fecha</th>
                      <th>Proveedor</th>
                      <th>Comprobante</th>
                      <th>Total</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                  </thead>
                  <tbody>
                  @foreach ($ingresos as $ing)
                      <tr>
                          <td>{{$ing->fecha_hora}}</td>
                          <td>{{$ing->nombre}}</td>
                          <td>{{$ing->tipo_comprobante. ': '. $ing->num_comprobante}}</td>
                          <td>{{$ing->total}}</td>
                          <td>{{$ing->estado}}</td>
                          <td>
                              <a href="{{ route('ingreso.show',$ing->idingreso)}}">
                                <button class="btn btn-primaty"><i class="fa fa-book" aria-hidden="true"> Detalles</i></button>
                              </a>
                              <a href="" data-target="#modal-delete-{{ $ing->idingreso }}" data-toggle="modal">
                                <button class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"> Anular</i></button>
                              </a>
                          </td>
                      </tr>
                      @include('compras.ingreso.modal')
                  @endforeach
                  </tbody>
              </table>
          </div>
          {{$ingresos->render()}}
      </div>
    </div>
</div>
@endsection
