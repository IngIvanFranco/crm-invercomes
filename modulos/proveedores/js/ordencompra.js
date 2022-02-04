$(document).ready(function() {
  
    
    let usr = document.getElementById('usr').value;
    let opcion = 4;

    tablaproductos = $('#tablaproductos').DataTable({
       
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "ajax":{
            "url":"funcionesphp/ordencompra.php",
            "method":'POST',
            "data":{
                opcion:opcion,
                usr:usr
            },
            "dataSrc":""
        },
        dom: 'Blfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        responsive: true,

        "columns":[
            {"data":"id_producto"},
            {"data":"nombre_producto"},
            {"data":"descripcion_producto"},
            {"data":"stok"},
            {"data":"valor"},
            {"data":"codigo_proveedor"},
            {"data":"numerodeparte"},
            {"data":"utilidad"},
            {"defaultContent":"<div class='conten_btn'>  <button class='add_btn' id='btnadd'><img src='img/addproduc.svg'></button></div>"}
        ]
    });


    //limpia los campos y para registrar un nuevo cliente
    $("#show-modal").click(function() {
        opcion = 1;
       $('#formproducnuevo').trigger("reset");

    });


    $(document).on("click",".btnEditar", function() {
        opcion= 2;
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        descripcion = fila.find('td:eq(2)').text();
        cantidad = fila.find('td:eq(3)').text();
        precio = fila.find('td:eq(4)').text();
        codigo = fila.find('td:eq(5)').text();
        numeroparte = fila.find('td:eq(6)').text();
        utilidad = fila.find('td:eq(7)').text();
        $("#nombre").val(nombre);
        $("#descripcion2").val(descripcion);
        $("#valor").val(precio);
        $("#cantidad2").val(cantidad);
        $("#utilidad2").val(utilidad);
        $("#codigo2").val(codigo);
        $("#numeroparte2").val(numeroparte);
        
        location.href = '#modal3';
    });


$("#guardar").click(function() {
    
    event.preventDefault();
    nombre=$.trim($("#nombre").val());
    valor=$.trim($("#valor").val());
    cantidad=$.trim($("#cantidad2").val());
    utilidad=$.trim($("#utilidad2").val());
    codigo=$.trim($("#codigo2").val());
    numeroparte=$.trim($("#numeroparte2").val());
    descripcion=$.trim($("#descripcion2").val());
if (utilidad < 8) {
    util = 8
    alert("Por dispocision de la gerencia la utilidad minima es del 8%");
}else{
    util = utilidad;
}
   //alert(+usr+" "+opcion+" "+nit+" "+nombre+" "+direccion+" "+ciudad+" "+contacto+" "+telefono+" "+correo+" "+telefono+" "+web+" ");

    $.ajax({
        url:"funcionesphp/ordencompra.php",
        type: "POST",
       datatype:"json",
        data:{
            idp:id,
            nombre:nombre,
            usr:usr,
            valor:valor,
            cantidad:cantidad,
            utilidad:util,
            codigo:codigo,
            numeroparte:numeroparte,
            descripcion:descripcion,
            opcion:opcion
        },

        success: function(respuesta) {
            tablaproductos.ajax.reload(null,false);
           location.href = '#';
        }
    });




});



   
$(document).on("click",".add_btn", function() {
          
      
   

    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    cantidad = fila.find('td:eq(3)').text();
    precio = fila.find('td:eq(4)').text();
    codigo = fila.find('td:eq(5)').text();
    numeroparte = fila.find('td:eq(6)').text();
    utilidad = fila.find('td:eq(7)').text();
    $("#name3").val(nombre);
    $("#descripcion3").val(descripcion);
    $("#precio3").val(precio);
    $("#cantidad3").val(cantidad);
    $("#utilidad3").val(utilidad);
    $("#codigo3").val(codigo);
    $("#numeroparte3").val(numeroparte);
    $("#id").val(id);
    
    location.href = '#modal2';


});


})
