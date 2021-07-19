<script text="text/javascript" src="../js/comercializacion/productos.js?newversion"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">Gestión de electrodomésticos</h1>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-2">
                    <button class="btn btn-primary" onclick="ModalRegistroProducto();"><i class="glyphicon glyphicon-plus"></i> Agregar electrodoméstico</button>
                </div>
            </div><br><br>
            <table id="tabla_productos" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Imagen</th>    
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<form autocomplete="FALSE" method='POST' enctype="multipart/form-data" onsubmit="return false" action="">
    <div class="modal fade" id="modal_registro_producto" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registro de Nuevo Producto</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-7" style="border-style: ridge;">
                            <h4>Información del producto</h4><br>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Código de Producto</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="codigo_producto" placeholder="Ingrese el código del producto" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nombre de Producto</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nombre_producto" placeholder="Ingrese el nombre del producto" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Precio de Producto</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="precio_producto" placeholder="Ingrese el precio del producto" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5" style="border-style: ridge;">
                            <h4>Imagen del Producto</h4>
                            <div class="card">
                                <img class="card-img-top card-user-img" src="../resources/default.png" width="205" height="205" alt="Card image cap" id="imagen_producto">
                                <div class="card-body" style="width: auto;">
                                    <input type="file" value="Seleccionar archivo" style="color: transparent; background-color: transparent;" id="imagen_producto_input" src="" />
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-row">
                        <div class="form-group col-md-12" style="border-style: ridge;">
                            <div class="col-md-12">
                                <div class="tabs" style="text-align: center;">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#info_adicional" data-toggle="tab">Información adicional</a>
                                        </li>
                                        <li>
                                            <a href="#info_usuario" data-toggle="tab">Información de Marcas</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="info_adicional" class="tab-pane active">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Descripción del producto</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="descripcion_producto" placeholder="Ingrese la descripción del producto" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="info_usuario" class="tab-pane">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Marca del producto</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="" id="marca_producto" style="width: 100%;">
                                                        <option value="LG">LG</option>
                                                        <option value="Whirpool">Whirpool</option>
                                                        <option value="Indurama">Indurama</option>
                                                        <option value="Sony">Sony</option>
                                                        <option value="Ecasa">Ecasa</option>
                                                        <option value="Mabe">Mabe</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarProducto();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        ListarProductos();
        $('.js-example-basic-single').select2();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imagen_producto').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    var src = document.getElementById("imagen_producto_input");
    $("#imagen_producto_input").change(function() {
        readURL(this);
    });
</script>