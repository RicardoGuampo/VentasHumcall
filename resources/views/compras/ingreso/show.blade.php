@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-head">
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
              <label for="proveedor">Proveedor</label>
              <p>{{$ingreso->nombre}}</p>
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
              <label for="comprobante">Comprobante</label>
              <p>{{$ingreso->tipo_comprobante}}</p>
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
              <label for="num_comprobante">Numero Comprobante</label>
              <p>{{$ingreso->num_comprobante}}</p>
          </div>
      </div>
    </div>
    <div class="card-body was-validated">
      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
          <thead style="background-color:#A9D0F5">
            <th>Articulos</th>
            <th>Cantidad</th>
            <th>Precio Compra</th>
            <th>Precio Venta</th>
            <th>Subtotal</th>
          </thead>
          <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><h4 id="total">{{$ingreso->total}}</h4></th>
          </tfoot>
          <tbody>
            @foreach($detalles as $det)
              <tr>
                <td>{{$det->articulo}}</td>
                <td>{{$det->cantidad}}</td>
                <td>{{$det->precio_compra}}</td>
                <td>{{$det->precio_venta}}</td>
                <td>{{$det->cantidad*$det->precio_compra}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
          <div class="form-group">
            <a href="{{ url('/compras/ingreso') }}" title="Regresar"  class="btn btn-success " role="button" aria-pressed="true">
                <i class="fa fa-backward" aria-hidden="true"> Regresar</i>
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
