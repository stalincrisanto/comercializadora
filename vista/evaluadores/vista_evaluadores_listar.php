<script text="text/javascript" src="../js/evaluadores.js?rev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">EVALUADORES</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-2">
                    <button class="btn btn-primary" onclick="AbrirModalRegistroEvaluador()"><i class="glyphicon glyphicon-plus"></i>Nuevo Evaluador</button>
                </div>
            </div><br><br>
            <table id="tabla_evaluadores" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha de nacimiento</th>
                        <th>Correo Personal</th>
                        <th>Correo Institucional</th>
                        <th>Celular</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha de nacimiento</th>
                        <th>Correo Personal</th>
                        <th>Correo Institucional</th>
                        <th>Celular</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_registro_evaluador" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registro de Nuevo Evaluador</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="">Cédula</label>
                        <input type="text" class="form-control" id="txt_cedula" placeholder="Ingrese la cédula de identidad">
                        <br>
                    </div>
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
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="txt_fecha_nacimiento" placeholder="Ingrese la fecha de nacimiento">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Correo Personal</label>
                        <input type="text" class="form-control" id="txt_correo_personal" placeholder="Ingrese un correo personal">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Correo Institucional</label>
                        <input type="text" class="form-control" id="txt_correo_institucional" placeholder="Ingrese un correo institucional">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Teléfono celular</label>
                        <input type="text" class="form-control" id="txt_telefono" placeholder="Ingrese un teléfono celular">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarEvaluador();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_editar_evaluador" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Editar Datos de Evaluador</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <input type="hidden" id="txt_id_evaluador">
                        <label for="">Cédula</label>
                        <input type="text" class="form-control" id="txt_cedula_evaluador_edit" placeholder="Ingrese la cédula de identidad">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Nombres</label>
                        <input type="text" class="form-control" id="txt_nombres_evaluador_edit" placeholder="Ingrese los nombres">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control" id="txt_apellidos_evaluador_edit" placeholder="Ingrese los apellidos">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="txt_fecha_nacimiento_evaluador_edit" placeholder="Ingrese la fecha de nacimiento">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Correo Personal</label>
                        <input type="text" class="form-control" id="txt_correo_personal_evaluador_edit" placeholder="Ingrese un correo personal">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Correo Institucional</label>
                        <input type="text" class="form-control" id="txt_correo_institucional_evaluador_edit" placeholder="Ingrese un correo institucional">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Teléfono celular</label>
                        <input type="text" class="form-control" id="txt_telefono_evaluador_edit" placeholder="Ingrese un teléfono celular">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="ModificarEvaluador();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_editar_evaluador" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar datos del usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <input type="hidden" id="txt_id_evaluador">
                        <label for="">Cédula de I</label>
                        <input type="text" class="form-control" id="txt_nombres_modificar" placeholder="Ingrese los nombres">
                        <br>
                    </div>
                    <div class="col-lg-12">
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
                        <select name="genero" id="txt_genero_modificar" class="js-example-basic-single" style="width: 100%;">
                            <option>Seleccione una opción</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <br><label for="">Seleccione un rol</label>
                        <select id="txt_rol_modificar" class="js-example-basic-single" style="width: 100%;">
                            <option>Seleccione una opción</option>
                            <option value="1">Administrador</option>
                        </select>
                        <br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="ModificarUsuario();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>-->

<script>
    $(document).ready(function() {
        ListarEvaluadores();

        $("#modal_registro").on('show.bs.modal', function() {
            $("#txt_usu").focus();
        })

        /**$('.js-example-basic-single').select2();**/

    });
</script>