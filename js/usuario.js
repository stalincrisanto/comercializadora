function VerificarUsuario()
{
    let usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if(usu.length == 0 || con.length == 0)
    {
        return swal("Mensaje de advertencia","Llene los campos vacíos","warning");
    }

    $.ajax({
        url:'../controlador/usuario/controlador_verificar_usuario.php',
        type: 'POST',
        data: {
            user: usu,
            pass: con
        }
    }).done(function(resp){
        if(resp==0)
        {
            return Swal.fire("Mensaje de Error","Usuario y/o contraseña incorrectos","error");
        }
        else
        {
            var data = JSON.parse(resp);
            if(data.STATUS_USUARIO==="Inactivo")
            {
                return Swal.fire("Mensaje de advertencia","El usuario: "+usu+" se encuentra inactivo, comuníquese con el administrador","warning");
            }
            $.ajax({
                url:'../controlador/usuario/controlador_crear_session.php',
                type: 'POST',
                data: {
                    idusuario: data.ID_USUARIO,
                    user: data.USUARIO,
                    rol: data.ID_ROL,
                    nombre: data.NOMBRE_USUARIO,
                    apellido: data.APELLIDO_USUARIO
                }
            }).done(function(resp){
                let timerInterval
                Swal.fire({
                title: 'Bienvenido al sistema',
                html: 'Ingresando',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                        b.textContent = Swal.getTimerLeft()
                        }
                    }
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    //location.reload();
                    alert("algo")
                }
                })
            })
        }
    })
}
var table;
function listarUsuario()
{
    table = $("#tabla_usuario").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
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
            "url":"../controlador/usuario/controlador_usuario_listar.php",
            type:'POST'
        },
        "columns":[
            {"data":"USUARIO"},
			{"data":"NOMBRE_USUARIO"},
			{"data":"APELLIDO_USUARIO"},
			{"data":"CORREO_USUARIO"},
            {"data":"NOMBRE_ROL"},
            {"data":"STATUS_USUARIO",
            render: function (data, type, row ) {
                if(data=='Activo'){
                    return "<span class='label label-success'>"+data+"</span>";                   
                }else{
                  return "<span class='label label-danger'>"+data+"</span>";                 
                }
              }
            },
            {"data":"STATUS_USUARIO",
            render: function (data, type, row ) {
                if(data=='Activo'){
                    return `
                    <button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;
                    <button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-close'></i></button>&nbsp;
                    <button style='font-size:13px;' type='button' class='activar btn btn-warning' disabled><i class='fa fa-check'></i></button>&nbsp;
                    <button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash'></i></button>
                    `;                   
                }else{
                  return `
                  <button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;
                  <button style='font-size:13px;' type='button' class='desactivar btn btn-danger' disabled><i class='fa fa-close'></i></button>&nbsp;
                  <button style='font-size:13px;' type='button' class='activar btn btn-warning'><i class='fa fa-check'></i></button>
                  <button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash'></i></button>
                  `;                 
                }
              }
            },
        ],
        "language":idioma_espanol,
        select: true
    });
}

$("#tabla_usuario").on('click','.editar',function(){
    var data = table.row($(this).parents('tr')).data();
    //CODIGO PARA QUE FUNCIONE EN RESPONSIVE
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false}) 
    $("#modal_editar").modal('show');
    $("#txt_idusuario").val(data.ID_USUARIO);
    $("#txt_nombres_modificar").val(data.NOMBRE_USUARIO);
    $("#txt_apellidos_modificar").val(data.APELLIDO_USUARIO);
    $("#txt_correo_modificar").val(data.CORREO_USUARIO);
    $("#txt_usu_modificar").val(data.USUARIO);
    document.querySelector(`#txt_genero_modificar option[value="${data.GENERO}"]`).selected = true;
    document.querySelector(`#txt_rol_modificar option[value="${data.ID_ROL}"]`).selected = true;
})

$("#tabla_usuario").on('click','.desactivar',function(){
    var data = table.row($(this).parents('tr')).data();
    //CODIGO PARA QUE FUNCIONE EN RESPONSIVE
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Está seguro de desactivar al usuario?',
        text: "El usuario no tendrá acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) 
        {
            ModificarStatus(data.ID_USUARIO,'Inactivo')
        }
      })
})

$("#tabla_usuario").on('click','.activar',function(){
    var data = table.row($(this).parents('tr')).data();
    //CODIGO PARA QUE FUNCIONE EN RESPONSIVE
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Está seguro de activar al usuario?',
        text: "El usuario tendrá acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) 
        {
            ModificarStatus(data.ID_USUARIO,'Activo')
        }
      })
})

function ModificarUsuario()
{
    let id_usu = $("#txt_idusuario").val();
    let nombre_usu = $("#txt_nombres_modificar").val();
    let apellido_usu = $("#txt_apellidos_modificar").val();
    let correo_usu = $("#txt_correo_modificar").val();
    let usu = $("#txt_usu_modificar").val();
    let genero = $("#txt_genero_modificar").val();
    let rol = $("#txt_rol_modificar").val();
    
    if(nombre_usu.length==0||apellido_usu.length==0||correo_usu.length==0||usu.length==0
        ||genero.length==0||rol.length==0)
    {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
    }

    $.ajax({
        "url":"../controlador/usuario/controlador_usuario_modificar.php",
        type:'POST',
        data:{
            id_usuario : id_usu,
            nombre_usuario : nombre_usu,
            apellido_usuario : apellido_usu,
            correo_usuario : correo_usu,
            usuario : usu,
            genero_usuario : genero,
            rol_usuario : rol
        }
    }).done(function(resp){
        if(resp>0)
        {
            ObtenerUsuarioPorId();
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje de confirmación","Datos modificados de forma correcta","success")
            .then((value)=>{
                table.ajax.reload();
            })
        }
        else
        {
            Swal.fire("Mensaje de error","Error al completar la actualización","error");
        }
    })
}

function ModificarStatus(id_usu,status_usu)
{
    $.ajax({
        url: "../controlador/usuario/controlador_modificar_status_usuario.php",
        type: 'POST',
        data: {
            id_usuario: id_usu,
            status_usuario: status_usu
        }
    }).done(function(resp){
        if(resp>0)
        {
            Swal.fire("Mensaje de confirmación","Estado modificado correctamente","success")
                .then((value)=>{
                    table.ajax.reload();
                })
        }
    })
}

function AbrirModalRegistro()
{
    $("#modal_registro_usuario").modal({backdrop:'static',keyboard:false}) 
    $("#modal_registro_usuario").modal('show');
}

function RegistrarUsuario()
{
    let nombre_usu = $("#txt_nombres").val();
    let apellido_usu = $("#txt_apellidos").val();
    let correo_usu = $("#txt_correo").val();
    let usu = $("#txt_usu").val();
    let contraseña1_usu = $("#txt_con1").val();
    let contraseña2_usu = $("#txt_con2").val();
    let genero = $("#txt_genero").val();
    let rol = $("#txt_rol").val();
    if(nombre_usu.length==0||apellido_usu.length==0||correo_usu.length==0||usu.length==0||
       contraseña1_usu.length==0||contraseña2_usu.length==0||genero.length==0||rol.length==0)
    {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
    }

    if(contraseña1_usu != contraseña2_usu)
    {
        return Swal.fire("Mensaje de Advertencias","Las contraseñas deben coincidir","warning");
    }

    $.ajax({
        "url":"../controlador/usuario/controlador_usuario_registrar.php",
        type:'POST',
        data:{
            nombre_usuario : nombre_usu,
            apellido_usuario : apellido_usu,
            correo_usuario : correo_usu,
            usuario : usu,
            contraseña_usuario : contraseña1_usu,
            genero_usuario : genero,
            rol_usuario : rol
        }
    }).done(function(resp){
        if(resp>0)
        {
            if(resp==1)
            {
                Swal.fire("Mensaje de confirmación","Datos registrados de forma correcta","success")
                LimpiarRegistro();
                listarUsuario();
                $("#modal_registro_usuario").modal('hide');
            }
            else
            {
                Swal.fire("Mensaje de advertencia","El nombre de usuario ya se ha registrado","warning")
            }
        }
        else
        {
            Swal.fire("Mensaje de error","No se pudo completar el registro","error");
        }
    })
}

function LimpiarRegistro()
{
    $("#txt_nombres").val("");
    $("#txt_apellidos").val("");
    $("#txt_correo").val("");
    $("#txt_usu").val("");
    $("#txt_con1").val("");
    $("#txt_con2").val("");
    $("#txt_genero").val("");
    $("#txt_rol").val("");
}

function ObtenerUsuarioPorId ()
{
    let usu = $("#txtusuarioprincipal").val();
    var id_usu = $("#txtidprincipal").val();

    $.ajax({
        url:'../controlador/usuario/controlador_usuarioporid.php',
        type: 'POST',
        data: {
            usuario: usu,
            id_usuario: id_usu
        }
    }).done(function(resp){
        let data = JSON.parse(resp);
        $("#txtcontra_bd").val(data.CONTRASENA_USUARIO);
        if(data.GENERO === "Masculino")
            {
                $("#img_nav").attr("src","../plantilla/dist/img/avatar5.png");
                $("#img_subnav").attr("src","../plantilla/dist/img/avatar5.png");
                $("#img_lateral").attr("src","../plantilla/dist/img/avatar5.png");
            }
            else
            {
                $("#img_nav").attr("src","../plantilla/dist/img/avatar3.png");
                $("#img_subnav").attr("src","../plantilla/dist/img/avatar3.png");
                $("#img_lateral").attr("src","../plantilla/dist/img/avatar3.png");
            }
    })
}

function AbrirModalEditarContraseña()
{
    $("#modal_editar_contra").modal({backdrop:'static',keyboard:false}) 
    $("#modal_editar_contra").modal('show');
    $("#modal_editar_contra").on('show.bs.modal',function(){
        $("#txtcontraactual_editar").focus();
    })
}

function EditarContra()
{
    let idusuario = $("#txtidprincipal").val();
    let contrabd = $("#txtcontra_bd").val();
    let contraescritra = $("#txtcontraactual_editar").val();
    let contranu = $("#txtcontranu_editar").val();
    let contrare = $("#txtcontrare_editar").val();

    if(contraescritra.length == 0 || contranu.length==0 || contrare.length==0)
    {
        return Swal.fire("Mensaje de error","Debe completar todos los campos","error");
    }

    if(contranu != contrare)
    {
        return Swal.fire("Mensaje de advertencia","La contraseña nueva debe coincidar al repetirla","warning");
    }

    $.ajax({
        url: '../controlador/usuario/controlador_contraseña_modificar.php',
        type: 'POST',
        data:{
            idusuario: idusuario,
            contrabd: contrabd,
            contraescritra: contraescritra,
            contranu: contranu
        }
    }).done(function(resp){
        console.log(resp)
        if(resp>0)
        {
            if(resp==1)
            {
                $("#modal_editar_contra").modal('hide');
                return Swal.fire("Mensaje de confirmación","Contraseña actualizada correctamente","success")
                .then((value)=>{
                    ObtenerUsuarioPorId();
                })
            }
            else
            {
                return Swal.fire("Mensaje de error","La contraseña actual no es correcta","error");
            }
        }
        else
        {
            Swal.fire("Mensaje de Error","No se pudo actualizar la contraseña","error");
        }
    })
}

function LimpiarEditarContra()
{
    $("#txtcontrare_editar").val("");
    $("#txtcontranu_editar").val("");
    $("#txtcontraactual_editar").val("");
}

function AbrirModalRestablecer()
{
    $("#modal_restablecer_contra").modal({backdrop:'static',keyboard:false}) 
    $("#modal_restablecer_contra").modal('show');
    $("#modal_restablecer_contra").on('show.bs.modal',function(){
        $("#txt_email").focus();
    })
}

function RestablecerContra()
{
    let email = $("#txt_email").val();
    if(email.length== 0)
    {
        Swil.fire("Mensaje de error","Debe ingresar un correo electrónico","error");
    }
    let caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST0123456789";
    let contrasena = "";
    for(let i = 0; i<5; i++)
    {
        contrasena += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
    }
    $.ajax({
        url: '../controlador/usuario/controlador_restablecer_contra.php',
        type: 'POST',
        data:{
            email: email,
            contrasena: contrasena
        }
    }).done(function(resp){
        //alert(resp)
        if(resp>0)
        {
            if(resp==1)
            {
                $("#modal_restablecer_contra").modal('hide');
                Swal.fire("Mensaje de confirmación","La contraseña a sido enviada a su correo","success");
            }
            else
            {
                Swal.fire("Mensaje de advertencia","El correo electrónico ingresado no existe","warning")
            }
        }
        else
        {
            Swal.fire("Mensaje de error","No se pudo realizar el cambio de contraseña","error");
        }
    })
}
