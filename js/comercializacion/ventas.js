
function ListarClientes()
{
    $.ajax({
        url: "../controlador/comercializacion/listar_clientes.php",
        type: "POST",
      }).done(function (resp) {
        let datos_clientes = JSON.parse(resp);
        let cadena = "";
        cadena += "<option value=''>Cliente - Cédula de identidad</option>";
        if (datos_clientes.length > 0) {
          for (let i = 0; i < datos_clientes.length; i++) {
            cadena += `
                <option value="${datos_clientes[i].ID_CLIENTE}">${datos_clientes[i].NOMBRES} -- ${datos_clientes[i].CEDULA_CLIENTE}</option>
            `;
          }
          $("#buscar_cliente").html(cadena);
        } else {
          cadena += "<option value=''>No se encontraron resultados</option>";
          $("#buscar_cliente").html(cadena);
        }
    });
}

function BuscarCliente(id_cliente)
{
    $.ajax({
        url: "../controlador/comercializacion/buscar_cliente.php",
        type: "POST",
        data: {
            id_cliente: id_cliente
        }
    }).done(function(resp){
        if(resp.length>0)
        {
            let datos_cliente = JSON.parse(resp);
            $("#id_cliente").val(datos_cliente.ID_CLIENTE);
            $("#cedula_cliente").val(datos_cliente.CEDULA_CLIENTE);
            $("#nombre_cliente").val(datos_cliente.NOMBRES);
            $("#direccion_cliente").val(datos_cliente.DIRECCION_CLIENTE);
            $("#telefono_cliente").val(datos_cliente.TELEFONO_CLIENTE);
        }
    })
}

function ModalProductoDetalle()
{
    $("#modal_registro_detalle").modal({backdrop:'static',keyboard:false}) 
    $("#modal_registro_detalle").modal('show');
    
    $.ajax({
        url: "../controlador/comercializacion/productos_listar.php",
        type: "POST",
      }).done(function (resp) {
        let datos_productos = JSON.parse(resp);
        let cadena = "";
        cadena += "<option value=''>Listado de productos</option>";
        if (datos_productos.length > 0) {
          for (let i = 0; i < datos_productos.length; i++) {
            cadena += `
                <option value="${datos_productos[i].ID_PRODUCTO}">${datos_productos[i].CODIGO_PRODUCTO}--${datos_productos[i].NOMBRE_PRODUCTO}</option>
            `;
          }
          $("#productos").html(cadena);
        } else {
          cadena += "<option value=''>No se encontraron resultados</option>";
          $("#productos").html(cadena);
        }
    });
}

function VerificarProducto(id_producto)
{
    document.getElementById("content_precio").hidden=false;
    document.getElementById("content_cantidad").hidden=false;
    document.getElementById("content_total").hidden=false;
    $.ajax({
        url: "../controlador/comercializacion/producto_detalle.php",
        type: "POST",
        data:{
            id_producto:id_producto
        }
    }).done(function (resp) {
        let datos_producto = JSON.parse(resp);
        $("#precio_producto").val(datos_producto.PRECIO_PRODUCTO);
        $("#codigo_producto").val(datos_producto.CODIGO_PRODUCTO);
        $("#nombre_producto").val(datos_producto.NOMBRE_PRODUCTO);
    });
}

function CalcularTotal(cantidad)
{
    let precio_producto = $("#precio_producto").val();
    let total = cantidad * precio_producto;
    $("#precio_total_producto").val(total);
}

function AgregarProductoDetalle()
{
    let codigo_producto = $("#codigo_producto").val();
    let id_producto = $("#productos").val();
    let nombre_producto = $("#nombre_producto").val();
    let precio_producto = $("#precio_producto").val();
    let cantidad_producto = $("#cantidad").val();
    let precio_total_producto = $("#precio_total_producto").val();

    /**$("#tabla_detalle tr").each(function (row,tr){
      if(id_producto==$(tr).find('td:eq(0)').text())
      {
        Swal.fire({
          text: "Desea aumentar la cantidad?",
          title: "El producto ya ha sido agregado",
          icon: "success",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Aceptar'
        }).then((result)=>{
          if(result.value){
            parseInt($(tr).find('td:eq(4)').text())+1;
          }
        })
      }
  })**/
    
    let cadena= `
        <td style="display:none;">${id_producto}</td>
        <td>${codigo_producto}</td>
        <td>${nombre_producto}</td>
        <td>${precio_producto}</td>
        <td>${cantidad_producto}</td>
        <td class="count-me">${precio_total_producto}</td>
        <td><button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i></button></td>
    `;
    var tableRef = document.getElementById('tabla_detalle').getElementsByTagName('tbody')[0];
    var newRow = tableRef.insertRow(tableRef.rows.length);
    newRow.innerHTML = cadena;
    
    
    var table = document.getElementById("tabla_detalle"), sumVal = 0;      
    for(var i = 1; i < table.rows.length; i++)
    {
        sumVal = sumVal + parseFloat(table.rows[i].cells[5].innerHTML);
    }
    $(".total span").html(sumVal.toFixed(2));
    $("#total_oculto").val(sumVal.toFixed(2));
    $("#precio_producto").val("");
    $("#cantidad").val("");
    $("#precio_total_producto").val("");
}

function GenerarVenta()
{
    let tabla_detalle = document.getElementById("tabla_detalle");
    let id_cliente =  $("#id_cliente").val();
    let id_vendedor =  $("#id_vendedor").val();
    let total_venta = $("#total_oculto").val();
    let descuento_venta = $("#descuento_oculto").val();
    let total_final_venta = $("#total_final_oculto").val();
    let forma_pago = $("#forma_pago").val();
    let TableData = new Array();

    $("#tabla_detalle tr").each(function (row,tr){
        TableData[row] = {
            "id_producto": $(tr).find('td:eq(0)').text(),
            "cantidad_producto": $(tr).find('td:eq(4)').text(),
            "total_producto": $(tr).find('td:eq(5)').text()
        }
    })
    TableData.shift();
    let detalle_venta = JSON.stringify(TableData);
    
    //console.log(detalle_venta);
    $.ajax({
        url:'../controlador/comercializacion/generar_venta.php',
        type: 'POST',
        data: {
            id_cliente:id_cliente,
            id_vendedor:id_vendedor,
            total_venta:total_venta,
            descuento_venta: descuento_venta,
            total_final_venta: total_final_venta,
            detalle: detalle_venta,
            forma_pago: forma_pago
        },
        dataType: 'json'
    }).done(function(resp){
        if(resp>0)
        {
            Swal.fire({
                text: "La venta ha sido agregada exitosamente",
                title: "Datos de confirmación",
                icon: "success",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Imprimir Reporte'
              }).then((result)=>{
                if(result.value){
                  window.open("../vista/reporte/reporte_ventas/reporte.php?id_cabecera="+parseInt(resp)+"#zoom=100%","Reporte de la venta realizada","scrollbars=NO"); 
                  $("#tabla_detalle_body tr").remove();
                  $(".total span").html("");
                }
              })
        }
        else{
            console.log('ALGO ESTÁ FALLANDO PRRO');
        }
    })
}

/**const obtenerCliente = async (cedula_verificar) => {
       
    let res = await fetch(`https://espe-2021-banquito.herokuapp.com/v1/clients?searchParameter=${cedula_verificar}`),
    json = await res.json();
    
    console.log(json[0].id);
    
    $("#nombres_credito").val(json[0].name);
    $("#apellidos_credito").val(json[0].lastname);
    $("#cedula_credito").val(json[0].numIdentification);
    $("#venta_credito").val($("#total_oculto").val());
}

const VerificarSujetoCredito = async (cedula_verificar) => {
       
    let res = await fetch(`https://espe-2021-banquito.herokuapp.com/v1/clients?searchParameter=${cedula_verificar}`),
    json = await res.json();
    
    console.log(json[0].id);
    
    $("#nombres_credito").val(json[0].name);
    $("#apellidos_credito").val(json[0].lastname);
    $("#cedula_credito").val(json[0].numIdentification);
    $("#venta_credito").val($("#total_oculto").val());
}**/


function FormaPago(formaPago){
    if(formaPago == 1){
        let descuento = 0.33 * $("#total_oculto").val();
        let total_final = $("#total_oculto").val() - descuento;
        document.getElementById("descuento").hidden = false;
        $(".descuento span").html(descuento.toFixed(2));
        $("#descuento_oculto").val(descuento.toFixed(2));
        document.getElementById("total_final").hidden = false;
        $(".total_final span").html(total_final.toFixed(2));
        $("#total_final_oculto").val(total_final.toFixed(2));
        return Swal.fire("Forma de pago Efectivo","Por su pago en efectivo obtendrá un descuento","warning");
    }
    else{
        Swal.fire("Forma de pago con tarjeta","Para completar el pago se deberá verificar si el cliente es sujeto de crédito","warning");
        document.getElementById("pago_tarjeta").hidden = false;
    }
}

function TablaAmortizacion(){
  let tabla_amortizacion = document.getElementById("tabla_amortizacion");
  let meses_pagar = $("#meses_pagar").val();
  let valor_electrodomestico = $("#total_oculto").val();
  let valor_cuota_mensual = valor_electrodomestico/((1-Math.pow((1+0.0133),-meses_pagar))/0.0133);
  //let capital_pagado = 0;
  var encabezado = `
    <thead>
      <tr>
        <th># Cuota</th>
        <th>Valor cuota</th>
        <th>Interés pagado</th>
        <th>Capital pagado</th>
        <th>Saldo</th>
      </tr>
    </thead>
  `;
  let tbody = document.createElement("tbody");
  for(let i = 1; i<=meses_pagar; i++){
    let interes_pagado = (valor_electrodomestico*0.16)/12;
    let calculo_capital_pagado = valor_cuota_mensual - interes_pagado; 
    let calculo_saldo = valor_electrodomestico - calculo_capital_pagado;
    
    let row = document.createElement("tr");
    let cuota = document.createElement("td");
    let valor = document.createElement("td");
    let interes = document.createElement("td");
    let capital = document.createElement("td");
    let saldo = document.createElement("td");

    let numero_cuota = document.createTextNode(i);
    let valor_valor = document.createTextNode(valor_cuota_mensual.toFixed(2));
    let valor_interes = document.createTextNode(interes_pagado.toFixed(2));
    let valor_capital = document.createTextNode(calculo_capital_pagado.toFixed(2));
    let valor_saldo;
    if(i == meses_pagar){
      valor_saldo = document.createTextNode(0);
    }
    else{
      valor_saldo = document.createTextNode(calculo_saldo.toFixed(2));
    }
    

    valor_electrodomestico = valor_saldo.wholeText;

    cuota.appendChild(numero_cuota);
    valor.appendChild(valor_valor);
    interes.appendChild(valor_interes);
    capital.appendChild(valor_capital);
    saldo.appendChild(valor_saldo);

    row.appendChild(cuota);
    row.appendChild(valor);
    row.appendChild(interes);
    row.appendChild(capital);
    row.appendChild(saldo);

    tbody.appendChild(row);
  }



  tabla_amortizacion.innerHTML = encabezado;
  tabla_amortizacion.appendChild(tbody);
}

var tabla_clientes_facturas;
function ListarFacturasCliente(id_cliente)
{
  tabla_clientes_facturas = $("#tabla_ventas_cliente").DataTable({
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
        url:"../controlador/comercializacion/facturas_cliente.php",
        type:'POST',
        data: {
          id_cliente: id_cliente
        }
    },
    "columns":[
        {"data":"FECHA_EMISION"},  
        {"data":"TOTAL_FACTURA"},
        {"defaultContent":`
        <button style='font-size:13px;' type='button' class='reporte btn btn-danger'><i class='fa fa-file-pdf-o'></i></button>&nbsp;
        `}
    ],

    "language":idioma_espanol,
    select: true
});
}

$("#tabla_ventas_cliente").on('click','.reporte',function(){
  var data = tabla_clientes_facturas.row($(this).parents('tr')).data();
  //CODIGO PARA QUE FUNCIONE EN RESPONSIVE
  if(tabla_clientes_facturas.row(this).child.isShown()){
      var data = tabla_clientes_facturas.row(this).data();
  }
  window.open("../vista/reporte/reporte_ventas/reporte.php?id_cabecera="+parseInt(data.ID_CABECERA)+"#zoom=100%","Reporte de la venta realizada","scrollbars=NO");
})


/**function cargarContenido(contenedor, contenido) {
  $("#" + contenedor).load(contenido);
}**/