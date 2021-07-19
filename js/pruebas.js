var table;
function ListarPruebaOrientacion(tipoPrueba) {
  //let tipoPrueba = 1;
  table = $("#tabla_prueba_orientacion").DataTable({
    dom: "Bfrtip",
    buttons: ["pdf", "print"],
    responsive: true,
    ordering: true,
    paging: true,
    searching: { regex: true },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../controlador/pruebas/controlador_pruebas_listar.php",
      type: "POST",
      data: {
        tipoPrueba: tipoPrueba,
      },
    },
    columns: [
      { data: "PACIENTE" },
      { data: "EVALUADOR" },
      { data: "NOMBRE_PRUEBA" },
      { data: "FECHA" },
      { data: "HORA" },
      {
        data: "STATUS",
        render: function (data, type, row) {
          if (data == "Pendiente") {
            return "<span class='label label-warning'>" + data + "</span>";
          } else if (data == "Cancelado") {
            return "<span class='label label-danger'>" + data + "</span>";
          } else {
            return "<span class='label label-success'>" + data + "</span>";
          }
        },
      },
      {
        defaultContent:
          "<button style='font-size:13px;' type='button' class='editar btn btn-info'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='cancelar btn btn-danger'><i class='fa fa-times-circle'></i></button>",
      },
    ],

    language: idioma_espanol,
    select: true,
  });
}

function ListarPacientes()
{
  $.ajax({
      url: "../controlador/pruebas/controlador_pruebas_listarpacientes.php",
      type: 'POST',
  }).done(function(resp) {
      let datos_paciente = JSON.parse(resp);
      let cadena = "";
      cadena += "<option value=''>Cédula - Nombre y Apellido</option>"
      if (datos_paciente.length > 0) {
          for (let i = 0; i < datos_paciente.length; i++) {
              cadena += "<option value='" + datos_paciente[i].ID_PACIENTE + "'>" + datos_paciente[i].CEDULA_PACIENTE + " - " + datos_paciente[i].NOMBRE_PACIENTE + "</option>";
          }
          $("#datos_paciente").html(cadena);
      } else {
          cadena += "<option value=''>No se encontraron resultados</option>"
          $("#datos_paciente").html(cadena);
      }
  })
}

function ListarTiposPruebas()
{
  $.ajax({
      url: "../controlador/pruebas/controlador_pruebas_listartipospruebas.php",
      type: 'POST',
  }).done(function(resp) {
      let datos_tipo_prueba = JSON.parse(resp);
      
      let cadena = "";
      cadena += "<option value=''>Tipo de prueba</option>"
      if (datos_tipo_prueba.length > 0) {
          for (let i = 0; i < datos_tipo_prueba.length; i++) {
              cadena += "<option value='" + datos_tipo_prueba[i].ID_TIPO_PRUEBA + "'>" + datos_tipo_prueba[i].NOMBRE_PRUEBA  + "</option>";
          }
          $("#datos_tipo_prueba").html(cadena);
      } else {
          cadena += "<option value=''>No se encontraron resultados</option>"
          $("#datos_tipo_prueba").html(cadena);
      }
  })
}

//CAMBIAR EL NOMBRE DE ESTA FUNCION: ya no se trata de una sola prueba
function AbrirModalRegistroPruebaOrientacion() {
  $("#modal_registro_prueba_orientacion").modal({
    backdrop: "static",
    keyboard: false,
  });
  $("#modal_registro_prueba_orientacion").modal("show");
  $.ajax({
    url: "../controlador/pruebas/controlador_pruebas_listarpacientes.php",
    type: "POST",
  }).done(function (resp) {
    let datos_paciente = JSON.parse(resp);
    let cadena = "";
    cadena += "<option value=''>Cédula - Nombre y Apellido</option>";
    if (datos_paciente.length > 0) {
      for (let i = 0; i < datos_paciente.length; i++) {
        cadena +=
          "<option value='" +
          datos_paciente[i].ID_PACIENTE +
          "'>" +
          datos_paciente[i].CEDULA_PACIENTE +
          " - " +
          datos_paciente[i].NOMBRE_PACIENTE +
          "</option>";
      }
      $("#datos_paciente").html(cadena);
    } else {
      cadena += "<option value=''>No se encontraron resultados</option>";
      $("#datos_paciente").html(cadena);
    }
  });
  $.ajax({
    url: "../controlador/pruebas/controlador_pruebas_listarevaluadores.php",
    type: "POST",
  }).done(function (resp) {
    let datos_evaluador = JSON.parse(resp);
    let cadena = "";
    cadena += "<option value=''>Cédula - Nombre y Apellido</option>";
    if (datos_evaluador.length > 0) {
      for (let i = 0; i < datos_evaluador.length; i++) {
        cadena +=
          "<option value='" +
          datos_evaluador[i].ID_EVALUADOR +
          "'>" +
          datos_evaluador[i].CEDULA_EVALUADOR +
          " - " +
          datos_evaluador[i].NOMBRE_EVALUADOR +
          "</option>";
      }
      $("#datos_evaluador").html(cadena);
    } else {
      cadena += "<option value=''>No se encontraron resultados</option>";
      $("#datos_evaluador").html(cadena);
    }
  });
}

function RegistrarPruebaOrientacion() {
  let paciente = $("#datos_paciente").val();
  let evaluador = $("#datos_evaluador").val();
  let fecha = $("#txtfecha").val();
  let hora = $("#txthora").val();
  let tipo_prueba = $("#id_tipo_prueba").val();

  if (
    paciente.length == 0 ||
    evaluador.length == 0 ||
    fecha.length == 0 ||
    hora.length == 0
  ) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Debe completar todos los campos",
      "warning"
    );
  }
  $.ajax({
    url: "../controlador/pruebas/controlador_prueba_registrarprueba.php",
    type: "POST",
    data: {
      paciente: paciente,
      evaluador: evaluador,
      fecha: fecha,
      hora: hora,
      tipo_prueba: tipo_prueba,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire(
          "Mensaje de confirmación",
          "Datos registrados de forma correcta",
          "success"
        );
        ListarPruebaOrientacion(tipo_prueba);
        LimpiarRegistro();
        $("#modal_registro_prueba_orientacion").modal("hide");
      } else {
        LimpiarRegistro();
        Swal.fire(
          "Mensaje de advertencia",
          "Algo falló en el registro",
          "warning"
        );
      }
    } else {
      LimpiarRegistro();
      Swal.fire(
        "Mensaje de error",
        "No se pudo completar el registro",
        "error"
      );
    }
  });
}

function BuscarPruebasPorPaciente() {
  let paciente = $("#datos_paciente").val();
  let tipo_prueba = $("#tipo_prueba").val();

  if (paciente.length == 0 || tipo_prueba.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Debe seleccionar los dos campos",
      "warning"
    );
  }

  $.ajax({
    url: "../controlador/pruebas/controlador_prueba_buscarprueba.php",
    type: "POST",
    data: {
      paciente: paciente,
      tipo_prueba: tipo_prueba,
    },
  }).done(function (resp) {
    if (resp == -1) {
      Swal.fire(
        "Mensaje de error",
        "El paciento no ha sido asignado a la prueba seleccionada",
        "error"
      );
    } else {
      let data = JSON.parse(resp);
      if (data.STATUS == "Realizada") {
        return Swal.fire(
          "Mensaje de error",
          "La prueba ya ha sido realizada",
          "error"
        );
      } else {
        $("#nombre_paciente_resultado").val(data.PACIENTE);
        $("#profesion_paciente_resultado").val(data.NOMBRE_PROFESION);
        $("#nombre_evaluador_resultado").val(data.EVALUADOR);
        $("#tipo_prueba_resultado").val(data.NOMBRE_PRUEBA);
        $("#fecha_prueba_resultado").val(data.FECHA_PRUEBA);
        $("#hora_prueba_resultado").val(data.HORA_PRUEBA);
        $("#status_prueba_resultado").val(data.STATUS);
        $("#id_prueba").val(data.ID_PRUEBA);
        $("#id_tipo_prueba").val(data.ID_TIPO_PRUEBA);
        $("#id_paciente").val(data.ID_PACIENTE);
        $("#id_profesion").val(data.ID_PROFESION);
        $("#id_evaluador").val(data.ID_EVALUADOR);
      }
    }
  });
}

function LimpiarRegistro() {
  $("#txthora").val("");
  $("#txtfecha").val("");
  $("#id_tipo_prueba").val("");
}

function AbrirModalesResultados() {
  let id_tipo_prueba = document.getElementById("id_tipo_prueba").value;
  switch (id_tipo_prueba) {
    case "1":
      $("#modal_prueba_orientacion").modal({
        backdrop: "static",
        keyboard: false,
      });
      $("#modal_prueba_orientacion").modal("show");
      break;

    case "2":
      $("#modal_prueba_visiocolor").modal({
        backdrop: "static",
        keyboard: false,
      });
      $("#modal_prueba_visiocolor").modal("show");
      break;

    case "3":
      $("#modal_prueba_estereopsis").modal({
        backdrop: "static",
        keyboard: false,
      });
      $("#modal_prueba_estereopsis").modal("show");
      break;
    
    case "4":
      $("#modal_prueba_ocularmove").modal({
        backdrop: "static",
        keyboard: false,
      });
      $("#modal_prueba_ocularmove").modal("show");
      break;
    
    case "5":
      $("#modal_prueba_lang").modal({
        backdrop: "static",
        keyboard: false,
      });
      $("#modal_prueba_lang").modal("show");
      break;
    
    case "6":
      $("#modal_prueba_ishihara").modal({
        backdrop: "static",
        keyboard: false,
      });
      $("#modal_prueba_ishihara").modal("show");
      break;

    default:
      break;
  }
}

function RegistrarResultados() 
{
  let tipo_prueba = $("#id_tipo_prueba").val();

  switch(tipo_prueba)
  {
    case "1":
      let id_prueba = $("#id_prueba").val();
      let id_paciente = $("#id_paciente").val();
      let id_profesion = $("#id_profesion").val();
      let id_evaluador = $("#id_evaluador").val();    
      let tiempo_orientacion = $("#tiempo_orientacion").val();
      let errores_orientacion = $("#errores_orientacion").val();
      let aciertos_orientacion = $("#aciertos_orientacion").val();
      let observaciones_orientacion = $("#observaciones_orientacion").val();

      if (tiempo_orientacion.length == 0 || errores_orientacion.length == 0 || aciertos_orientacion.length == 0
          ||observaciones_orientacion.length == 0) 
      {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
      }
      $.ajax({
        url: "../controlador/pruebas/controlador_prueba_registrarresultados.php",
        type: "POST",
        data: {
          id_prueba: id_prueba,
          id_paciente: id_paciente,
          id_profesion: id_profesion,
          id_evaluador: id_evaluador,
          tipo_prueba: tipo_prueba,
          tiempo_orientacion: tiempo_orientacion,
          errores_orientacion: errores_orientacion,
          aciertos_orientacion: aciertos_orientacion,
          observaciones_orientacion: observaciones_orientacion
        },
      }).done(function (resp) {
        if (resp > 0) 
        {
          if (resp == 1) 
          {
            $("#modal_prueba_orientacion").modal("hide");
            Swal.fire({
              text: "Resultados registrados correctamente",
              title: "Datos de confirmación",
              icon: "success",
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Imprimir Reporte'
            }).then((result)=>{
              if(result.value){
                window.open("../vista/reportes/reportes_pruebas/reporte.php?id_prueba="+parseInt(id_prueba)+"#zoom=100%","Reporte de la prueba realizada","scrollbars=NO"); 
              }
            })
            //Swal.fire("Mensaje de confirmación","Resultados agregados correctamente","success");
          } 
          else 
          {
            Swal.fire("Mensaje de advertencia","Algo falló al registrar los resultados","warning");
          }
        } 
        else 
        {
          Swal.fire("Mensaje de error","Algo falló al registrar los resultados","error");
        }
      });
    break;

    case "2":
      let id_prueba_visiocolor = $("#id_prueba").val();
      let id_paciente_visiocolor = $("#id_paciente").val();
      let id_profesion_visiocolor = $("#id_profesion").val();
      let id_evaluador_visiocolor = $("#id_evaluador").val();    
      let tiempo_visiocolor = $("#tiempo_visiocolor").val();
      let errores_visiocolor = $("#errores_visiocolor").val();
      let aciertos_visiocolor = $("#aciertos_visiocolor").val();
      let observaciones_visiocolor = $("#observaciones_visiocolor").val();

      if (tiempo_visiocolor.length == 0 || errores_visiocolor.length == 0 || aciertos_visiocolor.length == 0) 
      {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
      }
      $.ajax({
        url: "../controlador/pruebas/controlador_prueba_registrarresultados.php",
        type: "POST",
        data: {
          id_prueba_visiocolor: id_prueba_visiocolor,
          id_paciente_visiocolor: id_paciente_visiocolor,
          id_profesion_visiocolor: id_profesion_visiocolor,
          id_evaluador_visiocolor: id_evaluador_visiocolor,
          tipo_prueba: tipo_prueba,
          tiempo_visiocolor: tiempo_visiocolor,
          errores_visiocolor: errores_visiocolor,
          aciertos_visiocolor: aciertos_visiocolor,
          observaciones_visiocolor: observaciones_visiocolor
        },
      }).done(function (resp) {
        if (resp > 0) 
        {
          if (resp == 1) 
          {
            $("#modal_prueba_visiocolor").modal("hide");
            Swal.fire({
              text: "Resultados registrados correctamente",
              title: "Datos de confirmación",
              icon: "success",
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Imprimir Reporte'
            }).then((result)=>{
              if(result.value){
                window.open("../vista/reportes/reportes_pruebas/reporte.php?id_prueba="+parseInt(id_prueba_visiocolor)+"#zoom=100%","Reporte de la prueba realizada","scrollbars=NO"); 
              }
            })
          } 
          else 
          {
            Swal.fire("Mensaje de advertencia","Algo falló al registrar los resultados","warning");
          }
        } 
        else 
        {
          Swal.fire("Mensaje de error","Algo falló al registrar los resultados","error");
        }
      });
    break;

    case "3":
      let id_prueba_estereopsis = $("#id_prueba").val();
      let id_paciente_estereopsis = $("#id_paciente").val();
      let id_profesion_estereopsis = $("#id_profesion").val();
      let id_evaluador_estereopsis = $("#id_evaluador").val();    
      let tiempo_estereopsis = $("#tiempo_estereopsis").val();
      let errores_estereopsis = $("#errores_estereopsis").val();
      let aciertos_estereopsis = $("#aciertos_estereopsis").val();
      let observaciones_estereopsis = $("#observaciones_estereopsis").val();

      if (tiempo_estereopsis.length == 0 || errores_estereopsis.length == 0 || aciertos_estereopsis.length == 0) 
      {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
      }
      $.ajax({
        url: "../controlador/pruebas/controlador_prueba_registrarresultados.php",
        type: "POST",
        data: {
          id_prueba_estereopsis: id_prueba_estereopsis,
          id_paciente_estereopsis: id_paciente_estereopsis,
          id_profesion_estereopsis: id_profesion_estereopsis,
          id_evaluador_estereopsis: id_evaluador_estereopsis,
          tipo_prueba: tipo_prueba,
          tiempo_estereopsis: tiempo_estereopsis,
          errores_estereopsis: errores_estereopsis,
          aciertos_estereopsis: aciertos_estereopsis,
          observaciones_estereopsis: observaciones_estereopsis
        },
      }).done(function (resp) {
        if (resp > 0) 
        {
          if (resp == 1) 
          {
            $("#modal_prueba_estereopsis").modal("hide");
            Swal.fire({
              text: "Resultados registrados correctamente",
              title: "Datos de confirmación",
              icon: "success",
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Imprimir Reporte'
            }).then((result)=>{
              if(result.value){
                window.open("../vista/reportes/reportes_pruebas/reporte.php?id_prueba="+parseInt(id_prueba_estereopsis)+"#zoom=100%","Reporte de la prueba realizada","scrollbars=NO"); 
              }
            })
          } 
          else 
          {
            Swal.fire("Mensaje de advertencia","Algo falló al registrar los resultados","warning");
          }
        } 
        else 
        {
          Swal.fire("Mensaje de error","Algo falló al registrar los resultados","error");
        }
      });
    break;
  
    case "4":
      let id_prueba_ocularmove = $("#id_prueba").val();
      let id_paciente_ocularmove = $("#id_paciente").val();
      let id_profesion_ocularmove = $("#id_profesion").val();
      let id_evaluador_ocularmove = $("#id_evaluador").val();    
      let tiempo_ocularmove = $("#tiempo_ocularmove").val();
      let errores_ocularmove = $("#errores_ocularmove").val();
      let aciertos_ocularmove = $("#aciertos_ocularmove").val();
      let observaciones_ocularmove = $("#observaciones_ocularmove").val();

      if (tiempo_ocularmove.length == 0 || errores_ocularmove.length == 0 || aciertos_ocularmove.length == 0) 
      {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
      }
      $.ajax({
        url: "../controlador/pruebas/controlador_prueba_registrarresultados.php",
        type: "POST",
        data: {
          id_prueba_ocularmove,
          id_paciente_ocularmove,
          id_profesion_ocularmove,
          id_evaluador_ocularmove,
          tipo_prueba,
          tiempo_ocularmove,
          errores_ocularmove,
          aciertos_ocularmove,
          observaciones_ocularmove
        },
      }).done(function (resp) {
        if (resp > 0) 
        {
          if (resp == 1) 
          {
            $("#modal_prueba_ocularmove").modal("hide");
            Swal.fire({
              text: "Resultados registrados correctamente",
              title: "Datos de confirmación",
              icon: "success",
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Imprimir Reporte'
            }).then((result)=>{
              if(result.value){
                window.open("../vista/reportes/reportes_pruebas/reporte.php?id_prueba="+parseInt(id_prueba_ocularmove)+"#zoom=100%","Reporte de la prueba realizada","scrollbars=NO"); 
              }
            })
          } 
          else 
          {
            Swal.fire("Mensaje de advertencia","Algo falló al registrar los resultados","warning");
          }
        } 
        else 
        {
          Swal.fire("Mensaje de error","Algo falló al registrar los resultados","error");
        }
      });
    break;

    case "5":
      let id_prueba_lang = $("#id_prueba").val();
      let id_paciente_lang = $("#id_paciente").val();
      let id_profesion_lang = $("#id_profesion").val();
      let id_evaluador_lang = $("#id_evaluador").val();    
      let tiempo_lang = $("#tiempo_lang").val();
      let errores_lang = $("#errores_lang").val();
      let aciertos_lang = $("#aciertos_lang").val();
      let observaciones_lang = $("#observaciones_lang").val();

      if (tiempo_lang.length == 0 || errores_lang.length == 0 || aciertos_lang.length == 0) 
      {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
      }
      $.ajax({
        url: "../controlador/pruebas/controlador_prueba_registrarresultados.php",
        type: "POST",
        data: {
          id_prueba_lang,
          id_paciente_lang,
          id_profesion_lang,
          id_evaluador_lang,
          tipo_prueba,
          tiempo_lang,
          errores_lang,
          aciertos_lang,
          observaciones_lang
        },
      }).done(function (resp) {
        if (resp > 0) 
        {
          if (resp == 1) 
          {
            $("#modal_prueba_lang").modal("hide");
            Swal.fire({
              text: "Resultados registrados correctamente",
              title: "Datos de confirmación",
              icon: "success",
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Imprimir Reporte'
            }).then((result)=>{
              if(result.value){
                window.open("../vista/reportes/reportes_pruebas/reporte.php?id_prueba="+parseInt(id_prueba_lang)+"#zoom=100%","Reporte de la prueba realizada","scrollbars=NO"); 
              }
            })
          } 
          else 
          {
            Swal.fire("Mensaje de advertencia","Algo falló al registrar los resultados","warning");
          }
        } 
        else 
        {
          Swal.fire("Mensaje de error","Algo falló al registrar los resultados","error");
        }
      });
    break;

    case "6":
      let id_prueba_ishihara = $("#id_prueba").val();
      let id_paciente_ishihara = $("#id_paciente").val();
      let id_profesion_ishihara = $("#id_profesion").val();
      let id_evaluador_ishihara = $("#id_evaluador").val();    
      let tiempo_ishihara = $("#tiempo_ishihara").val();
      let errores_ishihara = $("#errores_ishihara").val();
      let aciertos_ishihara = $("#aciertos_ishihara").val();
      let observaciones_ishihara = $("#observaciones_ishihara").val();

      if (tiempo_ishihara.length == 0 || errores_ishihara.length == 0 || aciertos_ishihara.length == 0) 
      {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
      }
      $.ajax({
        url: "../controlador/pruebas/controlador_prueba_registrarresultados.php",
        type: "POST",
        data: {
          id_prueba_ishihara,
          id_paciente_ishihara,
          id_profesion_ishihara,
          id_evaluador_ishihara,
          tipo_prueba,
          tiempo_ishihara,
          errores_ishihara,
          aciertos_ishihara,
          observaciones_ishihara
        },
      }).done(function (resp) {
        if (resp > 0) 
        {
          if (resp == 1) 
          {
            $("#modal_prueba_ishihara").modal("hide");
            Swal.fire({
              text: "Resultados registrados correctamente",
              title: "Datos de confirmación",
              icon: "success",
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Imprimir Reporte'
            }).then((result)=>{
              if(result.value){
                window.open("../vista/reportes/reportes_pruebas/reporte.php?id_prueba="+parseInt(id_prueba_ishihara)+"#zoom=100%","Reporte de la prueba realizada","scrollbars=NO"); 
              }
            })
          } 
          else 
          {
            Swal.fire("Mensaje de advertencia","Algo falló al registrar los resultados","warning");
          }
        } 
        else 
        {
          Swal.fire("Mensaje de error","Algo falló al registrar los resultados","error");
        }
      });
    break;
    
      default:
        alert("NINGUNO DE LOS CASOS");
      break;
  }
}

var tabla_pruebas_paciente
function ListarPruebasPaciente(idPaciente)
{
  tabla_pruebas_paciente = $("#tabla_pruebas_paciente").DataTable({
    responsive: true,
    ordering: true,
    paging: true,
    searching: { regex: true },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    "ajax":{
        url:"../controlador/pruebas/controlador_pruebas_paciente.php",
        type:'POST',
        data:{
            idPaciente
        }
    },
    "columns":[
        {"data":"FECHA_PRUEBA"},  
        {"data":"NOMBRE_PRUEBA"},
        {"data":"EVALUADOR"},
        {"data":"STATUS",
          render: function (data, type, row ) {
            if(data=='Realizada'){
              return `<button style='font-size:13px;' type='button' class='reporte btn btn-danger'><i class="fa fa-file-pdf-o"></i></button>&nbsp;`;
            }
            else{
              return `<button style='font-size:13px;' type='button' class='reporte btn btn-danger' disabled><i class="fa fa-file-pdf-o"></i></button>&nbsp;`;
            }
          }
        }
    ],

    "language":idioma_espanol,
    select: true
});
}

$("#tabla_pruebas_paciente").on('click','.reporte', function(){
  var datos = tabla_pruebas_paciente.row($(this).parents('tr')).data();
  if(tabla_pruebas_paciente.row(this).child.isShown())
  {
    var datos = tabla_pruebas_paciente.row(this).data();
  }
  window.open("../vista/reportes/reportes_pruebas/reporte.php?id_prueba="+parseInt(datos.ID_PRUEBA)+"#zoom=100%","Reporte de la prueba realizada","scrollbars=NO");
})

var tabla_pruebas_tipo_prueba
function ListarPruebasTipoPrueba(idTipoPrueba)
{
  tabla_pruebas_tipo_prueba = $("#tabla_pruebas_tipo_prueba").DataTable({
    responsive: true,
    ordering: true,
    paging: true,
    searching: { regex: true },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    "ajax":{
        url:"../controlador/pruebas/controlador_pruebas_listarportipoprueba.php",
        type:'POST',
        data:{
            idTipoPrueba
        }
    },
    "columns":[
        {"data":"FECHA_PRUEBA"},  
        {"data":"PACIENTE"},
        {"data":"EVALUADOR"},
        {"data":"STATUS",
          render: function (data, type, row ) {
            if(data=='Realizada'){
              return `<button style='font-size:13px;' type='button' class='reporte btn btn-danger'><i class="fa fa-file-pdf-o"></i></button>&nbsp;`;
            }
            else{
              return `<button style='font-size:13px;' type='button' class='reporte btn btn-danger' disabled><i class="fa fa-file-pdf-o"></i></button>&nbsp;`;
            }
          }
        }
    ],

    "language":idioma_espanol,
    select: true
});
}

$("#tabla_pruebas_tipo_prueba").on('click','.reporte', function(){
  var datos = tabla_pruebas_tipo_prueba.row($(this).parents('tr')).data();
  if(tabla_pruebas_tipo_prueba.row(this).child.isShown())
  {
    var datos = tabla_pruebas_tipo_prueba.row(this).data();
  }
  window.open("../vista/reportes/reportes_pruebas/reporte.php?id_prueba="+parseInt(datos.ID_PRUEBA)+"#zoom=100%","Reporte de la prueba realizada","scrollbars=NO");
})

var tabla_pruebas_fechas;
function ListarPruebasFechas()
{
  let fecha_inicio = $("#fecha_inicio").val();
  let fecha_fin = $("#fecha_fin").val();

  tabla_pruebas_fechas = $("#tabla_pruebas_fechas").DataTable({
    responsive: true,
    ordering: true,
    paging: true,
    searching: { regex: true },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    "ajax":{
        url:"../controlador/pruebas/controlador_pruebas_listarporfechas.php",
        type:'POST',
        data:{
            fecha_inicio,
            fecha_fin
        }
    },
    "columns":[
        {"data":"FECHA_PRUEBA"},  
        {"data":"PACIENTE"},
        {"data":"EVALUADOR"},
        {"data":"STATUS",
          render: function (data, type, row ) {
            if(data=='Realizada'){
              return `<button style='font-size:13px;' type='button' class='reporte btn btn-danger'><i class="fa fa-file-pdf-o"></i></button>&nbsp;`;
            }
            else{
              return `<button style='font-size:13px;' type='button' class='reporte btn btn-danger' disabled><i class="fa fa-file-pdf-o"></i></button>&nbsp;`;
            }
          }
        }
    ],

    "language":idioma_espanol,
    select: true
  });
}

$("#tabla_pruebas_fechas").on('click','.reporte', function(){
  var datos = tabla_pruebas_fechas.row($(this).parents('tr')).data();
  if(tabla_pruebas_fechas.row(this).child.isShown())
  {
    var datos = tabla_pruebas_fechas.row(this).data();
  }
  window.open("../vista/reportes/reportes_pruebas/reporte.php?id_prueba="+parseInt(datos.ID_PRUEBA)+"#zoom=100%","Reporte de la prueba realizada","scrollbars=NO");
})