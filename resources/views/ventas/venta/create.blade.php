@extends ('layouts.admin')
@section ('contenido')
<div class="card content">
    <div class="card-header content-headr">
      <h3><em>Nueva Venta</em></h3>
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
      <form method="POST" action="/ventas/venta" accept-charset="UTF-8" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="idcliente">Cliente</label>
                <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true" required>
                  <option value="" selected>-- Selecciona --</option>
                  @foreach ($personas as $persona)
                    <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                  @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="comprobante">Comprobante</label>
                <select name="tipo_comprobante" id=""  class="form-control selectpicker" data-live-search="true" required>
                    <option value="" selected>-- Selecciona --</option>
                    <option value="Factura">Factura</option>
                    <option value="Recibo">Recibo</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_comprobante">Numero Comprobante</label>
                <input type="text" name="num_comprobante" class="form-control" placeholder="Numero del comprobante" value="{{ old('num_comprobante') }}" required>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="panel panel-primary">
          <div class="panel-body">
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
              <div class="form-group">
                <label for="pidarticulo">Articulo</label>
                <select class="form-control selectpicker" name="pidarticulo" id="pidarticulo" data-live-search="true" required>
                  <option value="" selected>-- Selecciona --</option>
                  @foreach ($articulos as $articulo)
                    <option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_promedio}}">{{$articulo->articulo}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
              <div class="form-group">
                <label for="pcantidad">Cantidad</label>
                <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="pcantidad" id="pcantidad" placeholder="cantidad">
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
              <div class="form-group">
                <label for="precio_venta">Precio Venta</label>
                <input type="number" min="0" pattern="^[0-9]+" class="form-control" name="pprecio_venta" id="pprecio_venta" placeholder="precio venta">
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
              <div class="form-group">
                <label for="pdescuento">Descuento</label>
                <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="pdescuento" id="pdescuento" placeholder="Descuento">
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
              <div class="form-group">
                <label for="pstock">Stock</label>
                <input type="number" class="form-control" name="pstock" id="pstock" placeholder="Stock" disabled>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <br>
                <button type="button" id="bt_add" class="btn btn-primary"><i class="fa fa-plus-square-o" aria-hidden="true"> Agregar</i></button>
                <a href="{{ url('/ventas/venta') }}" title="Regresar"  class="btn btn-success " role="button" aria-pressed="true">
                    <i class="fa fa-backward" aria-hidden="true"> Regresar</i>
                </a>
              </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
              <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color:#A9D0F5">
                  <th>Opciones</th>
                  <th>Articulo</th>
                  <th>Cantidad</th>
                  <th>Precio Venta</th>
                  <th>Descuento</th>
                  <th>Subtotal</th>
                </thead>
                <tfoot>
                  <th>TOTAL</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><h4 id="total">Bs: 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                </tfoot>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
          <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
          </div>
        </div>
      </div>
      </form>
    </div>
</div>
@push ('scripts')
  <script>
      $(document).ready(function(){
        $("#bt_add").click(function(){
          agregar();
        });
      });
      var cont=0;
      total=0;
      subtotal=[];
      $("#guardar").hide();
      $("#pidarticulo").change(mostrarValores);
      function mostrarValores(){
        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        $("#pprecio_venta").val(datosArticulo[2]);
        $("#pstock").val(datosArticulo[1]);

      }
      function agregar() {
        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        idarticulo=datosArticulo[0];
        articulo=$("#pidarticulo option:selected").text();
        cantidad=$("#pcantidad").val();
        descuento=$("#pdescuento").val();
        precio_venta=$("#pprecio_venta").val();
        stock=$("#pstock").val();
        if (idarticulo != "" && cantidad != "" && cantidad>0   && precio_venta != "") {
          if (parseInt(stock)>=parseInt(cantidad))
          {
            subtotal[cont]=(cantidad*precio_venta-descuento);
            total=total+subtotal[cont];
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" min="1" pattern="^[0-9]+" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" min="1" pattern="^[0-9]+" name="precio_venta[]" value="'+precio_venta+'"></td><td><input type="number" min="0" pattern="^[0-9]+ name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpiar();
            $("#total").html("Bs: " + total);
            $("#total_venta").val(total);
            evaluar();
            $('#detalles').append(fila);
          }else{
            alert("La cantidad a vender es superior a stock!");
          }
        }else{
          alert('Error al ingresar el detalle de la venta, revise los datos del articulo')
        }
      }
      function limpiar(){
        $("#pcantidad").val("");
        $("#pdescuento").val("");
        $("#pprecio_venta").val("");
      }
      function evaluar(){
        if (total >0) {
          $("#guardar").show();
        }else{
          $("#guardar").hide();
        }
      }
      function eliminar(index) {
        total=total-subtotal[index];
        $("#total").html("S/. " + total);
        $("#total_venta").val(total);
        $("#fila" + index).remove();
        evaluar();
      }
  </script>
@endpush
@endsection
