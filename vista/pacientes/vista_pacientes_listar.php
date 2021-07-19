<script text="text/javascript" src="../js/pacientes.js?rev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">PACIENTES</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-2">
                    <button class="btn btn-primary" onclick="AbrirModalRegistroPaciente()"><i class="glyphicon glyphicon-plus"></i>&nbsp;Nuevo Paciente</button>
                </div>
            </div><br><br>
            <table id="tabla_pacientes" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Fecha de nacimiento</th>
                        <th>Correo Personal</th>
                        <th>Correo Institucional</th>
                        <th>Celular</th>
                        <th>Datos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Fecha de nacimiento</th>
                        <th>Correo Personal</th>
                        <th>Correo Institucional</th>
                        <th>Celular</th>
                        <th>Datos</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_registro_paciente" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"><b>Registro de Nuevo Paciente</b></h2>
                    <hr>
                    <h3 class="modal-title"><b>Datos Personales</b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Cédula</label>
                            <input type="text" class="form-control" id="txt_cedula" placeholder="Ingrese la cédula de identidad">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="txt_fecha_nacimiento" placeholder="Ingrese la fecha de nacimiento">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" id="txt_nombres" placeholder="Ingrese los nombres">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Apellidos</label>
                            <input type="text" class="form-control" id="txt_apellidos" placeholder="Ingrese los apellidos">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Correo Personal</label>
                            <input type="text" class="form-control" id="txt_correo_personal" placeholder="Ingrese un correo personal">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Correo Institucional</label>
                            <input type="text" class="form-control" id="txt_correo_institucional" placeholder="Ingrese un correo institucional">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Género</label><br>
                            <select class="form-control" name="txt_genero" id="txt_genero">
                                <option>Selecione una opción</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Teléfono celular</label>
                            <input type="text" class="form-control" id="txt_telefono" placeholder="Ingrese un teléfono celular">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="modal-header">
                            <h3 class="modal-title"><b>Datos Médicos</b></h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-6">
                                <label for="">Peso</label>
                                <input type="text" class="form-control" id="txt_peso_insert" placeholder="Ingrese el peso, ejemplo (70.3)">
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Estatura</label>
                                <input type="text" class="form-control" id="txt_estatura_insert" placeholder="Ingrese la estatura, ejemplo (1.72)">
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Patología</label>
                                <select class="form-control" name="txt_patologia" id="txt_patologia_insert">
                                    <option value="">Selecione una opción</option>
                                    <option value="Miopía">Miopía</option>
                                    <option value="Hipermetropía">Hipermetropía</option>
                                    <option value="Astigmatismo">Astigmatismo</option>
                                    <option value="Estrabismo">Estrabismo</option>
                                    <option value="Ninguna">Ninguna</option>
                                    <option value="Otra">Otra</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Otra patología visual</label>
                                <input type="text" class="form-control" id="txt_otra_patologia" placeholder="Patología que no se encuentra en la lista anterior" disabled=true>
                                <br>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Lesión visual</label>
                                <select class="form-control" id="txt_lesion_insert">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-lg-8">
                                <label for="">Qué lesión?</label>
                                <input type="text" class="form-control" id="txt_lesion_cual" placeholder="Qué lesión ha sufrido el paciente?" disabled=true>
                                <br>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Cirugía visual</label>
                                <select class="form-control" id="txt_cirugia_insert">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-lg-8">
                                <label for="">Qué cirugía?</label>
                                <input type="text" class="form-control" id="txt_cirugia_cual" placeholder="Qué cirugía ha tenido el paciente?" disabled=true>
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">El paciente sufre de diabetes?</label>
                                <select class="form-control" id="txt_diabetes_insert">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">El paciente sufre de hipertensión?</label>
                                <select class="form-control" id="txt_hipertension_insert">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="modal-header">
                            <h3 class="modal-title"><b>Datos Profesionales</b></h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-6">
                                <label for="">Profesión</label>
                                <select class="form-control" name="txt_profesion" id="txt_profesion" onchange="datosMilitares(this.value)">
                                    <option>Selecione una opción</option>
                                    <option value="1">Ingeniero</option>
                                    <option value="2">Medico</option>
                                    <option value="3">Conductor</option>
                                    <option value="4">Militar</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-lg-6" hidden=true id="datos_arma">
                                <label for="">Arma</label>
                                <select class="form-control" id="datos_arma_in">
                                    <option value="">Seleccione una opción</option>
                                </select><br>
                            </div>
                            <div class="col-lg-6" hidden=true id="datos_unidad">
                                <label for="">Unidad</label>
                                <select class="form-control" id="datos_unidad_in">
                                </select><br>
                            </div>
                            <div class="col-lg-6" hidden=true id="datos_fuerza">
                                <label for="">Fuerza</label>
                                <select class="form-control" id=datos_fuerza_in>
                                    <option value="">Selecione una opción</option>
                                    <option value="Ejército">Ejército</option>
                                    <option value="Armada">Armada</option>
                                    <option value="Fuerza Aérea">Fuerza Aérea</option>
                                </select><br>
                            </div>
                            <div class="col-lg-6" hidden=true id="datos_rango1">
                                <label for="">Rango 1</label>
                                <select class="form-control" id="datos_rango1_in" onchange="datosRango2(this.value)">
                                    <option value="">Selecione una opción</option>
                                    <option value="Oficial">Oficial</option>
                                    <option value="Tropa">Tropa</option>
                                </select><br>
                            </div>
                            <div class="col-lg-6" hidden=true id="datos_rango2">
                                <label for="">Rango 2</label>
                                <select class="form-control" id="datos_rango2_in" onchange="datosRango3(this.value)">
                                </select><br>
                            </div>
                            <div class="col-lg-6" hidden=true id="datos_rango3">
                                <label for="">Rango 3</label>
                                <select class="form-control" id="datos_rango3_in">
                                </select><br>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarPaciente();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--MODAL MODIFICAR DATOS PACIENTE NO MILITAR-->
<!--<form autocomplete="FALSE" onsubmit="return false" action="">
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
</form>-->
<!--<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_editar_paciente_nomilitar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Datos Médicos del Paciente</b></h4>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6">
                            <input type="hidden" id="txt_id_paciente_modificar">
                            <label for="">Peso</label>
                            <input type="text" class="form-control" id="txt_peso_modificar" >
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Estatura</label>
                            <input type="text" class="form-control" id="txt_estatura_modificar" >
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Patología Visual</label>
                            <input type="text" class="form-control" id="txt_patologia_modificar" >
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Lesión Visual</label>
                            <input type="text" class="form-control" id="txt_lesion_modificar" >
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Cirugía</label>
                            <input type="text" class="form-control" id="txt_cirugia_modificar" >
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Diabetes</label>
                            <input type="text" class="form-control" id="txt_diabetes_modificar" >
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Hipertensión</label>
                            <input type="text" class="form-control" id="txt_hipertension_modificar" >
                            <br>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-header">
                    <h4 class="modal-title"><b>Datos Profesionales del Paciente</b></h4>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6">
                            <label for="">Profesión</label>
                            <input type="text" class="form-control" id="txt_profesion_modificar" >
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>-->
<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_editar_paciente_nomilitar" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"><b>Modificar Datos del Paciente</b></h2>
                    <hr>
                    <h3 class="modal-title"><b>Datos Personales</b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Cédula</label>
                            <input type="text" class="form-control" id="txt_cedula_modificar" placeholder="Ingrese la cédula de identidad">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="txt_fecha_nacimiento_modificar" placeholder="Ingrese la fecha de nacimiento">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" id="txt_nombres_modificar" placeholder="Ingrese los nombres">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Apellidos</label>
                            <input type="text" class="form-control" id="txt_apellidos_modificar" placeholder="Ingrese los apellidos">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Correo Personal</label>
                            <input type="text" class="form-control" id="txt_correo_personal_modificar" placeholder="Ingrese un correo personal">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Correo Institucional</label>
                            <input type="text" class="form-control" id="txt_correo_institucional_modificar" placeholder="Ingrese un correo institucional">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Género</label><br>
                            <select class="form-control" name="txt_genero" id="txt_genero_modificar">
                                <option>Selecione una opción</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Teléfono celular</label>
                            <input type="text" class="form-control" id="txt_telefono_modificar" placeholder="Ingrese un teléfono celular">
                        </div><hr>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="modal-header">
                            <h3 class="modal-title"><b>Datos Médicos</b></h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-6">
                                <label for="">Peso</label>
                                <input type="text" class="form-control" id="txt_peso_modificar" placeholder="Ingrese el peso, ejemplo (70.3)">
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Estatura</label>
                                <input type="text" class="form-control" id="txt_estatura_modificar" placeholder="Ingrese la estatura, ejemplo (1.72)">
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Patología</label>
                                <select class="form-control" name="txt_patologia" id="txt_patologia_modificar">
                                    <option value="">Selecione una opción</option>
                                    <option value="Miopía">Miopía</option>
                                    <option value="Hipermetropía">Hipermetropía</option>
                                    <option value="Astigmatismo">Astigmatismo</option>
                                    <option value="Estrabismo">Estrabismo</option>
                                    <option value="Ninguna">Ninguna</option>
                                    <option value="Otra">Otra</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Otra patología visual</label>
                                <input type="text" class="form-control" id="txt_otra_patologia" placeholder="Patología que no se encuentra en la lista anterior" disabled=true>
                                <br>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Lesión visual</label>
                                <select class="form-control" id="txt_lesion_modificar">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-lg-8">
                                <label for="">Qué lesión?</label>
                                <input type="text" class="form-control" id="txt_lesion_cual" placeholder="Qué lesión ha sufrido el paciente?" disabled=true>
                                <br>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Cirugía visual</label>
                                <select class="form-control" id="txt_cirugia_modificar">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-lg-8">
                                <label for="">Qué cirugía?</label>
                                <input type="text" class="form-control" id="txt_cirugia_cual" placeholder="Qué cirugía ha tenido el paciente?" disabled=true>
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">El paciente sufre de diabetes?</label>
                                <select class="form-control" id="txt_diabetes_modificar">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">El paciente sufre de hipertensión?</label>
                                <select class="form-control" id="txt_hipertension_modificar">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                                <br>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="modal-header">
                            <h3 class="modal-title"><b>Datos Profesionales</b></h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-6">
                                <label for="">Profesión</label>
                                <select class="form-control" name="txt_profesion" id="txt_profesion_modificar" onchange="datosMilitares(this.value)">
                                    <option>Selecione una opción</option>
                                    <option value="1">Ingeniero</option>
                                    <option value="2">Medico</option>
                                    <option value="3">Conductor</option>
                                    <option value="4">Militar</option>
                                </select>
                                <br>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarPaciente();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--MODAL DATOS PACIENTE NO MILITAR-->
<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_datos" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Datos Médicos del Paciente</b></h4>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6">
                            <input type="hidden" id="txt_id_paciente">
                            <label for="">Peso</label>
                            <input type="text" class="form-control" id="txt_peso" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Estatura</label>
                            <input type="text" class="form-control" id="txt_estatura" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Patología Visual</label>
                            <input type="text" class="form-control" id="txt_patologia" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Lesión Visual</label>
                            <input type="text" class="form-control" id="txt_lesion" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Cirugía</label>
                            <input type="text" class="form-control" id="txt_cirugia" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Diabetes</label>
                            <input type="text" class="form-control" id="txt_diabetes" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Hipertensión</label>
                            <input type="text" class="form-control" id="txt_hipertension" disabled>
                            <br>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-header">
                    <h4 class="modal-title"><b>Datos Profesionales del Paciente</b></h4>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6">
                            <label for="">Profesión</label>
                            <input type="text" class="form-control" id="txt_profesion_mostrar" disabled>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--MODAL DATOS MILITAR-->
<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_datos_militar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Datos Médicos del Paciente Militar</b></h4>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6">
                            <input type="hidden" id="txt_id_paciente_militar">
                            <label for="">Peso</label>
                            <input type="text" class="form-control" id="txt_peso_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Estatura</label>
                            <input type="text" class="form-control" id="txt_estatura_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Patología Visual</label>
                            <input type="text" class="form-control" id="txt_patologia_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Lesión Visual</label>
                            <input type="text" class="form-control" id="txt_lesion_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Cirugía</label>
                            <input type="text" class="form-control" id="txt_cirugia_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Diabetes</label>
                            <input type="text" class="form-control" id="txt_diabetes_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Hipertensión</label>
                            <input type="text" class="form-control" id="txt_hipertension_militar" disabled>
                            <br>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-header">
                    <h4 class="modal-title"><b>Datos Profesionales del Paciente</b></h4>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6">
                            <label for="">Profesión</label>
                            <input type="text" class="form-control" id="txt_profesion_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Fuerza</label>
                            <input type="text" class="form-control" id="txt_fuerza_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Arma</label>
                            <input type="text" class="form-control" id="txt_arma_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Unidad</label>
                            <input type="text" class="form-control" id="txt_unidad_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Rango 1</label>
                            <input type="text" class="form-control" id="txt_rango1_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Rango 2</label>
                            <input type="text" class="form-control" id="txt_rango2_militar" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Rango 3</label>
                            <input type="text" class="form-control" id="txt_rango3_militar" disabled>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        ListarPacientes();

        $("#modal_registro").on('show.bs.modal', function() {
            $("#txt_usu").focus();
        })

        document.getElementById('txt_lesion_insert').addEventListener('input', function() {
            campo = event.target;
            if (campo.value == "Si") {
                //document.getElementById('txt_lesion_cual').removeAttribute("disabled");
                document.getElementById('txt_lesion_cual').disabled = false;
            } else {
                document.getElementById('txt_lesion_cual').disabled = true;
            }
        })

        document.getElementById('txt_cirugia_insert').addEventListener('input', function() {
            campo = event.target;
            if (campo.value == "Si") {
                //document.getElementById('txt_lesion_cual').removeAttribute("disabled");
                document.getElementById('txt_cirugia_cual').disabled = false;
            } else {
                document.getElementById('txt_cirugia_cual').disabled = true;
            }
        })

        document.getElementById('txt_patologia_insert').addEventListener('input', function() {
            campo = event.target;
            if (campo.value == "Otra") {
                //document.getElementById('txt_lesion_cual').removeAttribute("disabled");
                document.getElementById('txt_otra_patologia').disabled = false;
            } else {
                document.getElementById('txt_otra_patologia').disabled = true;
            }
        })

    });

    function datosMilitares(campo) 
    {
        if (campo == "4") {
            ListarCampos();
            ListarUnidades();
            document.getElementById('datos_fuerza').hidden = false;
            document.getElementById('datos_arma').hidden = false;
            document.getElementById('datos_unidad').hidden = false;
            document.getElementById('datos_rango1').hidden = false;
        } else {
            document.getElementById('datos_fuerza').hidden = true;
            document.getElementById('datos_arma').hidden = true;
            document.getElementById('datos_unidad').hidden = true;
            document.getElementById('datos_rango1').hidden = true;
            document.getElementById('datos_rango2').hidden = true;
            document.getElementById('datos_rango3').hidden = true;
        }
    }

    function datosRango2(rango1)
    {
        let fuerza = document.getElementById('datos_fuerza_in').value;
        let rango1_in = document.getElementById('datos_rango1_in').value;
        ListarRangos(rango1_in,fuerza);
        document.getElementById('datos_rango2').hidden = false;
    }

    function datosRango3(rango2)
    {
        let fuerza = document.getElementById('datos_fuerza_in').value;
        let rango1_in = document.getElementById('datos_rango1_in').value;
        let rango2_in = document.getElementById('datos_rango2_in').value;
        ListarRangosFinal(rango1_in,rango2_in,fuerza);
        document.getElementById('datos_rango3').hidden = false;
    }

</script>