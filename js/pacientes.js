var table;
function ListarPacientes()
{
    table = $("#tabla_pacientes").DataTable({
        "responsive":true,
        "ordering":true,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"../controlador/pacientes/controlador_pacientes_listar.php",
            type:'POST'
        },
        "columns":[
            {"data":"CEDULA_PACIENTE"},
            {"data":"NOMBRES"},
            {"data":"NACIMIENTO_PACIENTE",
                render: function (data) {
                    let fecha = data.split("-");
                    return fecha[2] + '/'+ fecha[1] + '/' + fecha[0];
                }
            },
			{"data":"CORREO_PERSONAL_PACIENTE"},
			{"data":"CORREO_INSTITUCIONAL_PACIENTE"},
            {"data":"CELULAR_PACIENTE"},
            {"defaultContent":"&nbsp;&nbsp;&nbsp;<button style='font-size:13px;'  type='button' class='datos btn btn-warning'><i class='fa fa-info-circle'></i></button>"},  
            {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash'></i></button>"}
        ],

        "language":idioma_espanol,
        select: true
    });
}

$("#tabla_pacientes").on('click','.datos',function(){
    var data = table.row($(this).parents('tr')).data();
    //CODIGO PARA QUE FUNCIONE EN RESPONSIVE
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    if(data.ID_PROFESION!=4)
    {
        $.ajax({
            url:"../controlador/pacientes/controlador_pacientes_datos.php",
            type:'POST',
            data:{
                paciente: data.ID_PACIENTE,
                profesion: data.ID_PROFESION
            }
        }).done(function(resp){
            $("#modal_datos").modal({backdrop:'static',keyboard:false}) 
            $("#modal_datos").modal('show');
            let datos = JSON.parse(resp);
            $("#txt_id_paciente").val(datos.ID_PACIENTE);
            $("#txt_peso").val(datos.PESO_PACIENTE);
            $("#txt_estatura").val(datos.ESTATURA_PACIENTE);
            $("#txt_patologia").val(datos.PATOLOGIA_VISUAL);
            $("#txt_lesion").val(datos.LESION_VISUAL);
            $("#txt_cirugia").val(datos.CIRUGIA);
            $("#txt_diabetes").val(datos.DIABETES);
            $("#txt_hipertension").val(datos.HIPERTENSION);
            $("#txt_profesion_mostrar").val(datos.PROFESION);
        })
    }
    else
    {
        $.ajax({
            url:"../controlador/pacientes/controlador_pacientes_datos.php",
            type:'POST',
            data:{
                paciente: data.ID_PACIENTE,
                profesion: data.ID_PROFESION
            }
        }).done(function(resp){
            $("#modal_datos_militar").modal({backdrop:'static',keyboard:false}) 
            $("#modal_datos_militar").modal('show');
            let datos = JSON.parse(resp);
            $("#txt_id_paciente_militar").val(datos.ID_PACIENTE);
            $("#txt_peso_militar").val(datos.PESO_PACIENTE);
            $("#txt_estatura_militar").val(datos.ESTATURA_PACIENTE);
            $("#txt_patologia_militar").val(datos.PATOLOGIA_VISUAL);
            $("#txt_lesion_militar").val(datos.LESION_VISUAL);
            $("#txt_cirugia_militar").val(datos.CIRUGIA);
            $("#txt_diabetes_militar").val(datos.DIABETES);
            $("#txt_hipertension_militar").val(datos.HIPERTENSION);
            $("#txt_profesion_militar").val(datos.PROFESION);
            $("#txt_fuerza_militar").val(datos.FUERZA);
            $("#txt_arma_militar").val(datos.ARMAS);
            $("#txt_unidad_militar").val(datos.UNIDAD);
            $("#txt_rango1_militar").val(datos.RANGO1);
            $("#txt_rango2_militar").val(datos.RANGO2);
            $("#txt_rango3_militar").val(datos.RANGO3);
        })
    }
})

function AbrirModalRegistroPaciente()
{
    $("#modal_registro_paciente").modal({backdrop:'static',keyboard:false}) 
    $("#modal_registro_paciente").modal('show');
}

function RegistrarPaciente()
{
    let cedula_pac = $("#txt_cedula").val();
    let nombre_pac = $("#txt_nombres").val();
    let apellido_pac = $("#txt_apellidos").val();
    let nacimiento_pac = $("#txt_fecha_nacimiento").val();
    let correo_per_pac = $("#txt_correo_personal").val();
    let correo_inst_pac = $("#txt_correo_institucional").val();
    let telefono_pac = $("#txt_telefono").val();
    let genero_pac = $("#txt_genero").val();
    let peso_pac = $("#txt_peso_insert").val();
    let estatura_pac = $("#txt_estatura_insert").val();
    if($("#txt_patologia_insert").val()=='Otra')
    {
        var patologia_pac = $("#txt_otra_patologia").val();
    }
    else
    {
        var patologia_pac = $("#txt_patologia_insert").val();
    }
    if($("#txt_lesion_insert").val()=='Si')
    {
        var lesion_pac = $("#txt_lesion_cual").val();
    }
    else
    {
        var lesion_pac = $("#txt_lesion_insert").val();
    }
    if($("#txt_cirugia_insert").val()=='Si')
    {
        var cirugia_pac = $("#txt_cirugia_cual").val();
    }
    else
    {
        var cirugia_pac = $("#txt_cirugia_insert").val();
    }
    let diabetes_pac = $("#txt_diabetes_insert").val();
    let hipertension_pac = $("#txt_hipertension_insert").val();

    //DATOS PROFESIONALES
    let profesion_pac = $("#txt_profesion").val();
    var fuerza = $("#datos_fuerza_in").val();
    var arma = $("#datos_arma_in").val();
    var unidad = $("#datos_unidad_in").val();
    var rango1 = $("#datos_rango1_in").val();
    var rango2 = $("#datos_rango2_in").val();
    var rango3 = $("#datos_rango3_in").val();

    if(cedula_pac.length==0||nombre_pac.length==0||apellido_pac.length==0||nacimiento_pac.length==0||
        correo_per_pac.length==0||correo_inst_pac.length==0||telefono_pac.length==0||genero_pac.length==0||
        peso_pac.length==0||estatura_pac.length==0||profesion_pac.length==0)
     {
         return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
     }
    
    //Datos para otras profesiones
    if(profesion_pac!="4")
    {
        $.ajax({
            "url":"../controlador/pacientes/controlador_paciente_registrar.php",
            type:'POST',
            data:{
                cedula_paciente: cedula_pac,
                nombre_paciente: nombre_pac,
                apellido_paciente: apellido_pac,
                nacimiento_paciente: nacimiento_pac,
                correo_personal_paciente: correo_per_pac,
                correo_institucional_paciente: correo_inst_pac,
                telefono_paciente: telefono_pac,
                genero_paciente: genero_pac,
                peso_paciente: peso_pac,
                estatura_paciente: estatura_pac,
                patologia_paciente: patologia_pac,
                lesion_paciente: lesion_pac,
                cirugia_paciente: cirugia_pac,
                diabetes_paciente: diabetes_pac,
                hipertension_paciente: hipertension_pac,
                profesion_paciente: profesion_pac 
            }
        }).done(function(resp){
            if(resp>0)
            {
                if(resp==1)
                {
                    Swal.fire("Mensaje de confirmación","Datos registrados de forma correcta","success")
                    ListarPacientes();
                    LimpiarRegistro();
                    $("#modal_registo_paciente").modal('hide');
                }
                else
                {
                    LimpiarRegistro();
                    Swal.fire("Mensaje de advertencia","La cédula ingresada ya se ha registrado anteriormente","warning")
                }
            }
            else
            {
                LimpiarRegistro();
                Swal.fire("Mensaje de error","No se pudo completar el registro","error");
            }
        })   
    }
    //Datos para militares
    else
    {
        $.ajax({
            "url":"../controlador/pacientes/controlador_paciente_registrar.php",
            type:'POST',
            data:{
                cedula_paciente: cedula_pac,
                nombre_paciente: nombre_pac,
                apellido_paciente: apellido_pac,
                nacimiento_paciente: nacimiento_pac,
                correo_personal_paciente: correo_per_pac,
                correo_institucional_paciente: correo_inst_pac,
                telefono_paciente: telefono_pac,
                genero_paciente: genero_pac,
                peso_paciente: peso_pac,
                estatura_paciente: estatura_pac,
                patologia_paciente: patologia_pac,
                lesion_paciente: lesion_pac,
                cirugia_paciente: cirugia_pac,
                diabetes_paciente: diabetes_pac,
                hipertension_paciente: hipertension_pac,
                profesion_paciente: profesion_pac,
                fuerza: fuerza,
                arma: arma,
                unidad: unidad,
                rango1: rango1,
                rango2: rango2,
                rango3: rango3 
            }
        }).done(function(resp2){
            if(resp2>0)
            {
                if(resp2==1)
                {
                    Swal.fire("Mensaje de confirmación","Datos registrados de forma correcta","success")
                    ListarPacientes();
                    LimpiarRegistro();
                    $("#modal_registo_paciente").modal('hide');
                }
                else
                {
                    LimpiarRegistro();
                    Swal.fire("Mensaje de advertencia","La cédula ingresada ya se ha registrado anteriormente","warning")
                }
            }
            else
            {
                LimpiarRegistro();
                Swal.fire("Mensaje de error","No se pudo completar el registro","error");
            }
        })
    }
}

function LimpiarRegistro()
{
    $("#txt_cedula").val("");
    $("#txt_nombres").val("");
    $("#txt_apellidos").val("");
    $("#txt_fecha_nacimiento").val("");
    $("#txt_correo_personal").val("");
    $("#txt_correo_institucional").val("");
    $("#txt_telefono").val("");
    $("#txt_genero").val("Seleccione una opción");
    $("#txt_peso_insert").val("");
    $("#txt_estatura_insert").val("");

    $("#txt_otra_patologia").val("");
    $("#txt_patologia_insert").val("");
    $("#txt_lesion_insert").val("");
    $("#txt_lesion_cual").val("");
    $("#txt_lesion_insert").val("");
    $("#txt_cirugia_insert").val("");
    $("#txt_cirugia_cual").val("");
    $("#txt_cirugia_insert").val("");
    $("#txt_diabetes_insert").val("");
    $("#txt_hipertension_insert").val("");
    $("#txt_profesion").val("");
    $("#datos_arma_in").val("");
    $("#datos_unidad_in").val("");
    $("#datos_fuerza_in").val("");
    $("#datos_rango1_in").val("");
    $("#datos_rango2_in").val("");
    $("#datos_rango3_in").val("");
}

function ListarCampos()
{
    $.ajax({
        url:"../controlador/pacientes/controlador_pacientes_listarcampos.php",
        type:'POST'
    }).done(function(resp){
        let datos_arma = JSON.parse(resp);
        let cadena = "";
        if(datos_arma.length>0)
        {
            cadena = "<option value=''>Seleccione una opción</option>"
            for(let i = 0; i < datos_arma.length; i++)
            {
                cadena += "<option value='"+datos_arma[i].ARMA+"'>"+datos_arma[i].ARMA+"</option>";
            }
            $("#datos_arma_in").html(cadena);
        }
        else
        {
            cadena += "<option value=''>No se encontraron resultados</option>"
            $("#datos_arma_in").html(cadena);
        }
    })
}

function ListarUnidades()
{
    $.ajax({
        url:"../controlador/pacientes/controlador_pacientes_listarunidades.php",
        type:'POST'
    }).done(function(resp){
        let datos_unidad = JSON.parse(resp);
        let cadena = "";
        if(datos_unidad.length>0)
        {
            cadena = "<option value=''>Seleccione una opción</option>"
            for(let i = 0; i < datos_unidad.length; i++)
            {
                cadena += "<option value='"+datos_unidad[i].UNIDAD+"'>"+datos_unidad[i].UNIDAD+"</option>";
            }
            $("#datos_unidad_in").html(cadena);
        }
        else
        {
            cadena += "<option value=''>No se encontraron resultados</option>"
            $("#datos_unidad_in").html(cadena);
        }
    })
}

function ListarRangos(dato,fuerza)
{
    $.ajax({
        url:"../controlador/pacientes/controlador_pacientes_listarrangos.php",
        type:'POST',
        data:{
            dato: dato,
            fuerza: fuerza
        }
    }).done(function(resp){
        let datos_rango2 = JSON.parse(resp);
        let cadena = "";
        if(datos_rango2.length>0)
        {
            cadena = "<option value=''>Seleccione una opción</option>"
            for(let i = 0; i < datos_rango2.length; i++)
            {
                cadena += "<option value='"+datos_rango2[i].RANGO2+"'>"+datos_rango2[i].RANGO2+"</option>";
            }
            $("#datos_rango2_in").html(cadena);
        }
        else
        {
            cadena += "<option value=''>No se encontraron resultados</option>"
            $("#datos_rango2_in").html(cadena);
        }
    })
}

function ListarRangosFinal(rango1_in,rango2_in,fuerza)
{
    $.ajax({
        url:"../controlador/pacientes/controlador_pacientes_listarrangosfinal.php",
        type:'POST',
        data:{
            rango1: rango1_in,
            rango2:rango2_in,
            fuerza: fuerza
        }
    }).done(function(resp){
        let datos_rango3 = JSON.parse(resp);
        let cadena = "";
        if(datos_rango3.length>0)
        {
            cadena = "<option value=''>Seleccione una opción</option>"
            for(let i = 0; i < datos_rango3.length; i++)
            {
                cadena += "<option value='"+datos_rango3[i].RANGO3+"'>"+datos_rango3[i].RANGO3+"</option>";
            }
            $("#datos_rango3_in").html(cadena);
        }
        else
        {
            cadena += "<option value=''>No se encontraron resultados</option>"
            $("#datos_rango3_in").html(cadena);
        }
    })
}

$("#tabla_pacientes").on('click','.eliminar',function(){
    var data = table.row($(this).parents('tr')).data();
    //CODIGO PARA QUE FUNCIONE EN RESPONSIVE
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Está seguro de eliminar al paciente ?',
        text: "Se eliminarán los datos del paciente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) 
        {
            EliminarPaciente(data.ID_PACIENTE);
        }
      })
})

function EliminarPaciente(id_paciente)
{
    $.ajax({
        url: "../controlador/pacientes/controlador_paciente_eliminar.php",
        type: 'POST',
        data: {
            id_paciente: id_paciente,
        }
    }).done(function(resp){
        if(resp>0)
        {
            Swal.fire("Mensaje de confirmación","Paciente eliminado corectamente","success")
                .then((value)=>{
                    table.ajax.reload();
                })
        }
    })
}

$("#tabla_pacientes").on('click','.editar',function(){
    var data = table.row($(this).parents('tr')).data();
    //CODIGO PARA QUE FUNCIONE EN RESPONSIVE
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    if(data.ID_PROFESION!=4)
    {
        $.ajax({
            url:"../controlador/pacientes/controlador_pacientes_editar.php",
            type:'POST',
            data:{
                paciente: data.ID_PACIENTE,
                profesion: data.ID_PROFESION
            }
        }).done(function(resp){
            $("#modal_editar_paciente_nomilitar").modal({backdrop:'static',keyboard:false}) 
            $("#modal_editar_paciente_nomilitar").modal('show');
            let datos = JSON.parse(resp);
            //alert(datos.PROFESION);
            $("#txt_id_paciente_modificar").val(datos.ID_PACIENTE);
            $("#txt_cedula_modificar").val(datos.CEDULA_PACIENTE);
            $("#txt_fecha_nacimiento_modificar").val(datos.NACIMIENTO_PACIENTE);
            $("#txt_nombres_modificar").val(datos.NOMBRE_PACIENTE);
            $("#txt_apellidos_modificar").val(datos.APELLIDO_PACIENTE);
            $("#txt_correo_personal_modificar").val(datos.CORREO_PERSONAL_PACIENTE);
            $("#txt_correo_institucional_modificar").val(datos.CORREO_INSTITUCIONAL_PACIENTE);
            $("#txt_genero_modificar").val(datos.GENERO_PACIENTE);
            $("#txt_telefono_modificar").val(datos.CELULAR_PACIENTE);


            $("#txt_peso_modificar").val(datos.PESO_PACIENTE);
            $("#txt_estatura_modificar").val(datos.ESTATURA_PACIENTE);
            $("#txt_patologia_modificar").val(datos.PATOLOGIA_VISUAL);
            $("#txt_lesion_modificar").val(datos.LESION_VISUAL);
            $("#txt_cirugia_modificar").val(datos.CIRUGIA);
            $("#txt_diabetes_modificar").val(datos.DIABETES);
            $("#txt_hipertension_modificar").val(datos.HIPERTENSION);
            $("#txt_profesion_modificar").val(datos.PROFESION);
        })
    }
    else
    {
        $.ajax({
            url:"../controlador/pacientes/controlador_pacientes_datos.php",
            type:'POST',
            data:{
                paciente: data.ID_PACIENTE,
                profesion: data.ID_PROFESION
            }
        }).done(function(resp){
            $("#modal_datos_militar").modal({backdrop:'static',keyboard:false}) 
            $("#modal_datos_militar").modal('show');
            let datos = JSON.parse(resp);
            $("#txt_id_paciente_militar").val(datos.ID_PACIENTE);
            $("#txt_peso_militar").val(datos.PESO_PACIENTE);
            $("#txt_estatura_militar").val(datos.ESTATURA_PACIENTE);
            $("#txt_patologia_militar").val(datos.PATOLOGIA_VISUAL);
            $("#txt_lesion_militar").val(datos.LESION_VISUAL);
            $("#txt_cirugia_militar").val(datos.CIRUGIA);
            $("#txt_diabetes_militar").val(datos.DIABETES);
            $("#txt_hipertension_militar").val(datos.HIPERTENSION);
            $("#txt_profesion_militar").val(datos.PROFESION);
            $("#txt_fuerza_militar").val(datos.FUERZA);
            $("#txt_arma_militar").val(datos.ARMAS);
            $("#txt_unidad_militar").val(datos.UNIDAD);
            $("#txt_rango1_militar").val(datos.RANGO1);
            $("#txt_rango2_militar").val(datos.RANGO2);
            $("#txt_rango3_militar").val(datos.RANGO3);
        })
    }
})