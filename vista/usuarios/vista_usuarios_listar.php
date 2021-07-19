<script text="text/javascript" src="../js/usuario.js?rev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">USUARIOS</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <!--<div class="col-lg-10">
                    <div class="input-group">
                        <input type="text" class="global filter form-control" id="globarl-filter" placeholder="Ingresar datos a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>-->
                <div class="col-lg-2">
                    <button class="btn btn-primary" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i> Nuevo Usuario</button>
                </div>
            </div><br><br>
            <!--<table id="tabla_usuario" class="table table-bordered table-striped" width="100%">-->
            <table id="tabla_usuario" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Status</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_registro_usuario" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registro de Usuario Nuevo</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="">Nombres</label>
                        <input type="text" class="form-control" id="txt_nombres" placeholder="Ingrese los nombres">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control" id="txt_apellidos" placeholder="Ingrese los apellidos">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Correo electrónico</label>
                        <input type="mail" class="form-control" id="txt_correo" placeholder="Ingrese el correo electrónico">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txt_usu" placeholder="Ingrese el usuario">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" id="txt_con1" placeholder="Ingrese la contraseña">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Repita la contraseña</label>
                        <input type="password" class="form-control" id="txt_con2" placeholder="Repita la contraseña">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Género</label>
                        <select name="genero" id="txt_genero" class="js-example-basic-single" style="width: 100%;">
                            <option>Seleccione una opción</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <br><label for="">Seleccione un rol</label>
                        <select name="rol" id="txt_rol" class="js-example-basic-single" style="width: 100%;">
                            <option>Seleccione una opción</option>
                            <option value="1">Administrador</option>
                        </select>
                        <br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarUsuario();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar datos del usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <input type="hidden" id="txt_idusuario">
                        <label for="">Nombres</label>
                        <input type="text" class="form-control" id="txt_nombres_modificar" placeholder="Ingrese los nombres">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control" id="txt_apellidos_modificar" placeholder="Ingrese los apellidos">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Correo electrónico</label>
                        <input type="mail" class="form-control" id="txt_correo_modificar" placeholder="Ingrese el correo electrónico">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txt_usu_modificar" placeholder="Ingrese el usuario">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Género</label>
                        <select name="genero" class="form-control" id="txt_genero_modificar" style="width: 100%;">
                            <option>Seleccione una opción</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <br><label for="">Seleccione un rol</label>
                        <select id="txt_rol_modificar" class="form-control" style="width: 100%;">
                            <option>Seleccione una opción</option>
                            <option value="1">Administrador</option>
                        </select>
                        <br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="ModificarUsuario();"><i class="fa fa-check"></i>&nbsp;Modificar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        listarUsuario();

        $("#modal_registro_usuario").on('show.bs.modal', function() {
            $("#txt_usu").focus();
        })

        $('.js-example-basic-single').select2();

    });
</script>