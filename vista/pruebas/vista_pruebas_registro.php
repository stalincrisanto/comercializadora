<script text="text/javascript" src="../js/pruebas.js?rev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">REGISTRO DE PRUEBAS A REALIZAR</h3>
        </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="box-body">
                <div class="form-group">
                    <div class="col-lg-2">
                        <button class="btn btn-primary" onclick="AbrirModalRegistroPruebaOrientacion()"><i class="glyphicon glyphicon-plus"></i> Nueva Prueba</button>
                    </div>
                </div><br><br>
                <table id="tabla_prueba_orientacion" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Evaluador</th>
                            <th>Tipo de prueba</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Paciente</th>
                            <th>Evaluador</th>
                            <th>Tipo de prueba</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_registro_prueba_orientacion" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Nueva Prueba de Orientación</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12" id="div_paciente">
                            <label for="">Seleccione el paciente</label><br>
                            <select class="js-example-basic-single" name="state" id="datos_paciente" style="width: 100%;">
                            </select>
                            <br><br><br>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Seleccione el evaluador</label><br>
                            <select class="js-example-basic-single" name="state" id="datos_evaluador" style="width: 100%;">
                            </select>
                            <br><br><br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Seleccione la fecha</label><br>
                            <input type="date" id="txtfecha" class="form-control">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Seleccione la hora</label><br>
                            <input type="time" id="txthora" class="form-control">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Seleccione el tipo de prueba</label><br>
                            <select class="form-control" id="id_tipo_prueba">
                                <option value="">Selecione la prueba a realizar</option>
                                <option value="1">Orientación</option>
                                <option value="2">Visio Color</option>
                                <option value="3">Escleropsis</option>
                                <option value="4">Ocular Move</option>
                                <option value="5">Lang</option>
                                <option value="6">Ishihara</option>
                            </select><br>
                            <br><br><br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarPruebaOrientacion();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        let tipoPrueba = 1;
        ListarPruebaOrientacion(tipoPrueba);

        $("#modal_registro").on('show.bs.modal', function() {
            $("#txt_usu").focus();
        })

        $('.js-example-basic-single').select2();

    });
</script>