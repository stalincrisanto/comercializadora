<script text="text/javascript" src="../js/comercializacion/ventas.js?newversion"></script>
<div class="row" id="contenido_principal">
</div>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">Ventas de electrodomésticos</h1>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <h2>Generar Nueva Venta</h2>
            <div class="form-group col-md-12" style="border-style: ridge;">
                <h4>Información del cliente</h4><br>
                <input type="hidden" id="id_vendedor" value="1">
                <div class="form-group">
                    <label for="txt_paciente_resultados" class="col-sm-2 col-form-label">Buscar Cliente</label>
                    <div class="col-sm-12">
                        <select class="js-example-basic-single form-control" name="state" id="buscar_cliente" onchange="BuscarCliente(this.value)" style="width: 100%;">
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="names_costumer">Fecha</label>
                        <input type="text" class="form-control" id="fecha_venta" placeholder="" disabled="true" value="" />
                    </div>
                    <div class="form-group col-md-6">
                        <input type="hidden" id="id_cliente">
                        <label for="document_costumer">Cédula de identidad</label>
                        <input type="text" class="form-control" id="cedula_cliente" placeholder="Cédula de identidad" disabled="true">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="names_costumer">Cliente</label>
                        <input type="text" class="form-control" id="nombre_cliente" placeholder="Nombres y apellidos del cliente" disabled="true" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="names_costumer">Dirección</label>
                        <input type="text" class="form-control" id="direccion_cliente" placeholder="Dirección del cliente" disabled="true" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="document_costumer">Teléfono</label>
                        <input type="text" class="form-control" id="telefono_cliente" placeholder="Teléfono del cliente" disabled="true">
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12" style="border-style: ridge;">
                <h4>Detalles de la venta</h4>

                <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" onclick="ModalProductoDetalle();"><i class="fa fa-plus"></i>&nbsp;Agregar producto a detalle</button>
                <br><br>
                <table id="tabla_detalle" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th data-column-id="id_producto" style="display: none;"></th>
                            <th data-column-id="codigo_producto">Código Producto</th>
                            <th data-column-id="nombre_producto">Nombre</th>
                            <th data-column-id="precio_producto">Precio</th>
                            <th data-column-id="cantidad_producto">Cantidad</th>
                            <th data-column-id="total_producto">Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_detalle_body">

                    </tbody>
                </table>
                <br><br>
                <hr>
                <div class="form-group col-md-12">
                    <label for="names_costumer">Forma de pago</label>
                    <select name="" id="forma_pago" onchange="FormaPago(this.value)">
                        <option value="">Seleccione una opción</option>
                        <option value="1">Efectivo</option>
                        <option value="2">Tarjeta</option>
                    </select>
                </div>
                <div class="form-group col-md-4" id="pago_tarjeta" hidden="true">
                    <label for="document_costumer">Número de cuotas</label>
                    <input type="text" class="form-control" id="meses_pagar" placeholder="Cuotas para el crédito">
                    <br>
                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-warning" onclick="TablaAmortizacion();"><i class="fa fa-exclamation-triangle"></i>&nbsp;Generar Tabla</button>
                </div><br>
                <div class="form-group col-md-12">
                    <table id="tabla_amortizacion" class="display responsive nowrap" style="width:100%">
                    </table>
                </div>


                <!--<table id="tabla_amortizacion" class="display" hidden="true" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cuota</th>
                            <th>Valor cuota</th>
                            <th>Interes Pagado</th>
                            <th>Capital Pagado</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_detalle_body">

                    </tbody>
                </table>-->

                <div class="form-group col-md-12">
                    <hr>
                    <h3 class="total">Total de la venta: <span class="badge badge-info" id="total_venta">0.00</span></h3>
                    <input type="hidden" id="total_oculto">
                </div><br>
                <div class="form-group col-md-12" id="descuento" hidden="true">
                    <h3 class="descuento">Descuento realizado: <span class="badge badge-info" id="descuento_venta">0.00</span></h3>
                    <input type="hidden" id="descuento_oculto">
                </div><br>
                <div class="form-group col-md-12" id="total_final" hidden="true">
                    <h3 class="total_final">Total luego del descuento: <span class="badge badge-info" id="total_final_venta">0.00</span></h3>
                    <input type="hidden" id="total_final_oculto">
                </div><br>
                <div class="form-group col-md-4">
                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-success" onclick="GenerarVenta();"><i class="fa fa-check"></i>&nbsp;Generar Venta</button>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<form autocomplete="FALSE" method='POST' enctype="multipart/form-data" onsubmit="return false" action="">
    <div class="modal fade" id="modal_registro_detalle" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Agregar producto a detalle</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="tabs" style="text-align: center;">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a href="#info_producto_detalle" data-toggle="tab">Producto</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="info_producto_detalle" class="tab-pane active">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Seleccione el producto</label>
                                        <div class="col-sm-8">
                                            <select class="js-example-basic-single form-control" name="state" id="productos" onchange="VerificarProducto(this.value)" style="width: 100%;">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden=true id="content_precio">
                                        <label for="nombre_marca" class="col-sm-3 col-form-label">Precio Producto</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" id="codigo_producto">
                                            <input type="hidden" id="nombre_producto">
                                            <input type="number" class="form-control" id="precio_producto" placeholder="Ingrese la cantidad a vender" disabled="true">
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden=true id="content_cantidad">
                                        <label for="nombre_marca" class="col-sm-3 col-form-label">Cantidad</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="cantidad" placeholder="Ingrese la cantidad a vender" onchange="CalcularTotal(this.value);">
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden=true id="content_total">
                                        <label for="nombre_marca" class="col-sm-3 col-form-label">Precio Total</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="precio_total_producto" placeholder="Ingrese la cantidad a vender" disabled="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="AgregarProductoDetalle();"><i class="fa fa-plus"></i>&nbsp;Agregar Producto</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        function zero(n) {
            return (n > 9 ? '' : '0') + n;
        }
        var date = new Date();
        var strDate = zero(date.getDate()) + "-" + zero((date.getMonth() + 1)) + "-" + date.getFullYear();
        document.getElementById("fecha_venta").value = strDate;
        $('.js-example-basic-single').select2();
        ListarClientes();
    });
</script>