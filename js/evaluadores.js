var table;
function ListarEvaluadores()
{
    table = $("#tabla_evaluadores").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pdf', 'print'
        ],
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
            "url":"../controlador/evaluadores/controlador_evaluadores_listar.php",
            type:'POST'
        },
        "columns":[
            {"data":"CEDULA_EVALUADOR"},
            {"data":"NOMBRE_EVALUADOR"},
			{"data":"APELLIDO_EVALUADOR"},
            {"data":"NACIMIENTO_EVALUADOR",
                render: function (data) {
                    let fecha = data.split("-");
                    return fecha[2] + '/'+ fecha[1] + '/' + fecha[0];
                }
            },
			{"data":"CORREO_PERSONAL_EVALUADOR"},
			{"data":"CORREO_INSTITUCIONAL_EVALUADOR"},
            {"data":"CELULAR_EVALUADOR"},  
            {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash'></i></button>"}
        ],

        "language":idioma_espanol,
        select: true
    });
}

function AbrirModalRegistroEvaluador()
{
    $("#modal_registro_evaluador").modal({backdrop:'static',keyboard:false}) 
    $("#modal_registro_evaluador").modal('show');
}

function RegistrarEvaluador()
{
    let cedula_eva = $("#txt_cedula").val();
    let nombre_eva = $("#txt_nombres").val();
    let apellido_eva = $("#txt_apellidos").val();
    let nacimiento_eva = $("#txt_fecha_nacimiento").val();
    let correo_per_eva = $("#txt_correo_personal").val();
    let correo_inst_eva = $("#txt_correo_institucional").val();
    let telefono_eva = $("#txt_telefono").val();
    if(cedula_eva.length==0||nombre_eva.length==0||apellido_eva.length==0||nacimiento_eva.length==0||
       correo_per_eva.length==0||correo_inst_eva.length==0||telefono_eva.length==0)
    {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
    }

    $.ajax({
        "url":"../controlador/evaluadores/controlador_evaluador_registrar.php",
        type:'POST',
        data:{
            cedula_evaluador: cedula_eva,
            nombre_evaluador: nombre_eva,
            apellido_evaluador: apellido_eva,
            nacimiento_evaluador: nacimiento_eva,
            correo_personal_evaluador: correo_per_eva,
            correo_institucional_evaluador: correo_inst_eva,
            telefono_evaluador: telefono_eva
        }
    }).done(function(resp){
        if(resp>0)
        {
            console.log(resp);
            if(resp==1)
            {
                Swal.fire("Mensaje de confirmación","Datos registrados de forma correcta","success")
                ListarEvaluadores();
                LimpiarRegistro();
                $("#modal_registo_evaluador").modal('hide');
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

function LimpiarRegistro()
{
    $("#txt_cedula").val("");
    $("#txt_nombres").val("");
    $("#txt_apellidos").val("");
    $("#txt_fecha_nacimiento").val("");
    $("#txt_correo_personal").val("");
    $("#txt_correo_institucional").val("");
    $("#txt_telefono").val("");
}

$("#tabla_evaluadores").on('click','.editar',function(){
    var data = table.row($(this).parents('tr')).data();
    //CODIGO PARA QUE FUNCIONE EN RESPONSIVE
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    $("#modal_editar_evaluador").modal({backdrop:'static',keyboard:false}) 
    $("#modal_editar_evaluador").modal('show');
    $("#txt_id_evaluador").val(data.ID_EVALUADOR);
    $("#txt_cedula_evaluador_edit").val(data.CEDULA_EVALUADOR);
    $("#txt_nombres_evaluador_edit").val(data.NOMBRE_EVALUADOR);
    $("#txt_apellidos_evaluador_edit").val(data.APELLIDO_EVALUADOR);
    $("#txt_fecha_nacimiento_evaluador_edit").val(data.NACIMIENTO_EVALUADOR);
    $("#txt_correo_personal_evaluador_edit").val(data.CORREO_PERSONAL_EVALUADOR);
    $("#txt_correo_institucional_evaluador_edit").val(data.CORREO_INSTITUCIONAL_EVALUADOR);
    $("#txt_telefono_evaluador_edit").val(data.CELULAR_EVALUADOR);
})

function ModificarEvaluador()
{
    let id_eva = $("#txt_id_evaluador").val();
    console.log(id_eva);
    let cedula_eva = $("#txt_cedula_evaluador_edit").val();
    let nombre_eva = $("#txt_nombres_evaluador_edit").val();
    let apellido_eva = $("#txt_apellidos_evaluador_edit").val();
    let nacimiento_eva = $("#txt_fecha_nacimiento_evaluador_edit").val();
    let correo_per_eva = $("#txt_correo_personal_evaluador_edit").val();
    let correo_inst_eva = $("#txt_correo_institucional_evaluador_edit").val();
    let telefono_eva = $("#txt_telefono_evaluador_edit").val();
    if(cedula_eva.length==0||nombre_eva.length==0||apellido_eva.length==0||nacimiento_eva.length==0||
        correo_per_eva.length==0||correo_inst_eva.length==0||telefono_eva.length==0)
    {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
    }

    $.ajax({
        "url":"../controlador/evaluadores/controlador_evaluadores_modificar.php",
        type:'POST',
        data:{
            id_evaluador : id_eva,
            cedula_evaluador: cedula_eva,
            nombre_evaluador : nombre_eva,
            apellido_evaluador : apellido_eva,
            nacimiento_evaluador: nacimiento_eva,
            correo_personal_evaluador : correo_per_eva,
            correo_institucional_evaluador : correo_inst_eva,
            telefono_evaluador: telefono_eva
        }
    }).done(function(resp){
        if(resp>0)
        {
            //ObtenerUsuarioPorId();
            if(resp==1)
            {
                
                Swal.fire("Mensaje de confirmación","Datos modificados de forma correcta","success")
                .then((value)=>{
                    table.ajax.reload();
                    $("#modal_editar_evaluador").modal('hide')
                })
            }
        }
        else
        {
            Swal.fire("Mensaje de error","Error al completar la actualización","error");
        }
    })
}

$("#tabla_evaluadores").on('click','.eliminar',function(){
    var data = table.row($(this).parents('tr')).data();
    //CODIGO PARA QUE FUNCIONE EN RESPONSIVE
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Está seguro de eliminar al evaluador ?',
        text: "Se eliminarán los datos del evaluador",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) 
        {
            EliminarEvaluador(data.ID_EVALUADOR);
        }
      })
})

function EliminarEvaluador(id_eva)
{
    $.ajax({
        url: "../controlador/evaluadores/controlador_evaluador_eliminar.php",
        type: 'POST',
        data: {
            id_evaluador: id_eva,
        }
    }).done(function(resp){
        if(resp>0)
        {
            Swal.fire("Mensaje de confirmación","Evaluador eliminado corectamente","success")
                .then((value)=>{
                    table.ajax.reload();
                })
        }
    })
}