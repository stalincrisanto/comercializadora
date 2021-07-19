<script text="text/javascript" src="../js/pruebas.js?newversion2rev=<?php echo time(); ?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">REPORTES DE PRUEBAS REALIZADAS</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div><br>
        <div class="container">
            <div class="box-body">
                <div class="col-md-11">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#busqueda_paciente" data-toggle="tab" aria-expanded="true">Búsqueda por paciente</a></li>
                            <li class=""><a href="#busqueda_tipo_prueba" data-toggle="tab" aria-expanded="false">Búsqueda por tipo de prueba</a></li>
                            <li class=""><a href="#busqueda_fecha" data-toggle="tab" aria-expanded="false">Búsqueda por fecha</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="busqueda_paciente">
                                <h4><b>Seleccione el paciente a buscar</b></h4><br>
                                <div class="form-group row">
                                    <label for="txt_paciente_resultados" class="col-sm-2 col-form-label">Paciente</label>
                                    <div class="col-sm-6">
                                        <select class="js-example-basic-single form-control" name="state" id="datos_paciente" style="width: 100%;" onchange="ListarPruebasPaciente(this.value);">
                                        </select>
                                    </div>
                                </div><br><br>
                                <table id="tabla_pruebas_paciente" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha de realización</th>
                                            <th>Tipo de prueba</th>
                                            <th>Evaluador</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fecha de realización</th>
                                            <th>Tipo de prueba</th>
                                            <th>Evaluador</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="tab-pane" id="busqueda_tipo_prueba">
                                <h4><b>Seleccione el tipo de prueba</b></h4><br>
                                <div class="form-group row">
                                    <label for="txt_paciente_resultados" class="col-sm-2 col-form-label">Tipo de prueba</label>
                                    <div class="col-sm-6">
                                        <select class="js-example-basic-single form-control" name="state" id="datos_tipo_prueba" style="width: 100%;" onchange="ListarPruebasTipoPrueba(this.value);">
                                        </select>
                                    </div>
                                </div><br><br>
                                <table id="tabla_pruebas_tipo_prueba" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha de realización</th>
                                            <th>Paciente</th>
                                            <th>Evaluador</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fecha de realización</th>
                                            <th>Paciente</th>
                                            <th>Evaluador</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="tab-pane" id="busqueda_fecha">
                                <h4><b>Seleccione el rango de fechas a buscar</b></h4><br>
                                <div class="form-group row">
                                    <label for="txt_fechas" class="col-sm-2 col-form-label">Rango de fechas</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" name="rango_fechas" id="rango_fechas">
                                            <input type="hidden" name="fecha_inicio" id="fecha_inicio">
                                            <input type="hidden" name="fecha_fin" id="fecha_fin">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-success btn-flat" onclick="ListarPruebasFechas();">Buscar reportes</button>
                                    </div>
                                </div><br>
                                <table id="tabla_pruebas_fechas" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha de realización</th>
                                            <th>Paciente</th>
                                            <th>Evaluador</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fecha de realización</th>
                                            <th>Paciente</th>
                                            <th>Evaluador</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('.js-example-basic-single').select2();
        $('input[name="rango_fechas"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            $("#fecha_inicio").val(start.format('YYYY-MM-DD'));
            $("#fecha_fin").val(end.format('YYYY-MM-DD'));
        });
        ListarPacientes();
        ListarTiposPruebas();
    });
</script>