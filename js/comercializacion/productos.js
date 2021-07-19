var tabla_productos;
function ListarProductos()
{
    tabla_productos = $("#tabla_productos").DataTable({
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
            url:"../controlador/comercializacion/productos.php",
            type:'POST'
        },
        "columns":[
            {"data":"IMAGEN_PRODUCTO",
              render: function(data,type,row){
                return `<img src="${data}" width="100" height="100">`;
              }
            },  
            {"data":"CODIGO_PRODUCTO"},  
            {"data":"NOMBRE_PRODUCTO"},  
            {"data":"DESCRIPCION_PRODUCTO"},
            {"data":"PRECIO_PRODUCTO"},
            {"data":"MARCA_PRODUCTO"},
            {"defaultContent":`
            <button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;
            <button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i></button>&nbsp;
            `}
        ],

        "language":idioma_espanol,
        select: true
    });
} 

function ModalRegistroProducto()
{
    $("#modal_registro_producto").modal({backdrop:'static',keyboard:false}) 
    $("#modal_registro_producto").modal('show');
}

function RegistrarProducto()
{
    let codigo_producto = $("#codigo_producto").val();
    let nombre_producto = $("#nombre_producto").val();
    let precio_producto = $("#precio_producto").val();
    let imagen_producto_input = $("#imagen_producto_input").val();
    
    let path_imagen = "../resources/"+imagen_producto_input.replace('C:\\fakepath\\','');
    let descripcion_producto = $("#descripcion_producto").val();
    //let stock_producto = $("#stock_producto").val();
    //let categoria_producto = $("#categoria_producto").val();
    let marca_producto = $("#marca_producto").val();

    $.ajax({
        url:"../controlador/comercializacion/producto_registro.php",
        type:'POST',
        data:{
            codigo_producto: codigo_producto,
            nombre_producto: nombre_producto,
            precio_producto: precio_producto,
            imagen_producto_input: path_imagen,
            descripcion_producto: descripcion_producto,
            //stock_producto: stock_producto,
            //categoria_producto: categoria_producto,
            marca_producto: marca_producto
        },
    }).done(function(resp){
        if(resp>0)
          {
              if(resp==1)
              {
                  Swal.fire("Mensaje de confirmación","Producto registrado de forma correcta","success")
                  LimpiarRegistros
                  ListarProductos();
                  $("#modal_registro_producto").modal('hide');
              }
          }
          else
          {
              LimpiarRegistros();
              Swal.fire("Mensaje de error","No se pudo completar el registro","error");
          }
      })
}

function LimpiarRegistros()
{
    $("#codigo_producto").val("");
    $("#nombre_producto").val("");
    $("#precio_producto").val("");
    $("#imagen_producto_input").val("");
    $("#descripcion_producto").val("");
    $("#stock_producto").val("");
    $("#stock_producto").val("");
    $("#categoria_producto").val("");
    $("#marca_producto").val("");
}