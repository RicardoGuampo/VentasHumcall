@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-head">
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
              <label for="cliente">Cliente</label>
              <p>{{$venta->nombre}}</p>
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
              <label for="comprobante">Comprobante</label>
              <p>{{$venta->tipo_comprobante}}</p>
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
              <label for="num_comprobante">Numero Comprobante</label>
              <p>{{$venta->num_comprobante}}</p>
          </div>
      </div>
    </div>
    <div class="card-body was-validated">
      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
          <thead style="background-color:#A9D0F5">
            <th>Articulos</th>
            <th>Cantidad</th>
            <th>Precio Venta</th>
            <th>Descuento</th>
            <th>Subtotal</th>
          </thead>
          <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><h4 id="total">{{$venta->total_venta}}</h4></th>
          </tfoot>
          <tbody>
            @foreach($detalles as $det)
              <tr>
                <td>{{$det->articulo}}</td>
                <td>{{$det->cantidad}}</td>
                <td>{{$det->precio_venta}}</td>
                <td>{{$det->descuento}}</td>
                <td>{{$det->cantidad*$det->precio_venta-$det->descuento}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
          <div class="form-group">
            <a href="{{ url('/ventas/venta') }}" title="Regresar"  class="btn btn-success " role="button" aria-pressed="true">
                <i class="fa fa-backward" aria-hidden="true"> Regresar</i>
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
