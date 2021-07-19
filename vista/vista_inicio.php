<script text="text/javascript" src="../js/inicio.js?rev=<?php echo time(); ?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Bienvenido a la comercializadora monster</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <img src="../login/images/principal.jpg" height="500" alt="JSOFT Admin" />
        </div>
        <div class="box-body">
            <!--<div class="col-lg-4 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 id="num_pacientes"></h3>
                        <p>Pacientes registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer"><br></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 id="num_evaluadores"></h3>
                        <p>Evaluadores registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <a href="#" class="small-box-footer"><br></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3 id="num_pruebas"></h3>
                        <p>Test pendientes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-powerpoint-o"></i>
                    </div>
                    <a href="#" class="small-box-footer"><br></a>
                </div>
            </div>-->
            <br>
            <div class="col-md-12">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_prueba_detalle" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Detalle de la prueba</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="">Nombres y apellidos del paciente</label>
                    <input type="text" class="form-control" id="paciente" disabled>
                    <br>
                </div>
                <div class="col-lg-12">
                    <label for="">Profesión del paciente</label>
                    <input type="text" class="form-control" id="profesion" disabled>
                    <br>
                </div>
                <div class="col-lg-12">
                    <label for="">Nombres y apellidos del evaluador</label>
                    <input type="text" class="form-control" id="evaluador" disabled>
                    <br>
                </div>
                <div class="col-lg-12">
                    <label for="">Tipo de prueba a realizar</label>
                    <input type="text" class="form-control" id="prueba" disabled>
                    <br>
                </div>
                <div class="col-lg-6">
                    <label for="">Fecha de realización de la prueba</label>
                    <input type="text" class="form-control" id="fecha" disabled>
                    <br>
                </div>
                <div class="col-lg-6">
                    <label for="">Hora de realización de la prueba</label>
                    <input type="text" class="form-control" id="hora" disabled>
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        cargarDatosPrincipal();
        iniciarCalendario();
    });
</script>