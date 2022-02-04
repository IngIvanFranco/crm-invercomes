$(document).ready(function() {
    
    let nit;
    let usr = document.getElementById('usr').value;
    let opcion = 4;

    tablaclientes = $('#tablaclientes').DataTable({
       
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
            "url":"funcionesphp/recliente.php",
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
            {"data":"nit_cliente"},
            {"data":"nombre_cliente"},
            {"data":"ciudad_cliente"},
            {"data":"direccion_cliente"},
            {"data":"contacto"},
            {"data":"telefono_cliente"},
            {"data":"correo_cliente"},
            {"data":"web_cliente"},
            {"defaultContent":"<button class='btnEditar btn_edit'><img src='img/edit_black_24dp.svg'></button>"}
        ]
    });


    //limpia los campos y para registrar un nuevo cliente
    $("#show-modal").click(function() {
        opcion = 1;
       $('#formcliente').trigger("reset");

    });


    $(document).on("click",".btnEditar", function() {
        opcion= 2;
        fila = $(this).closest("tr");
        nit = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        ciudad = fila.find('td:eq(2)').text();
        direccion = fila.find('td:eq(3)').text();
        contacto = fila.find('td:eq(4)').text();
        telefono = fila.find('td:eq(5)').text();
        correo = fila.find('td:eq(6)').text();
        web = fila.find('td:eq(7)').text();
        $("#cliente").val(nombre);
        $("#nit").val(nit);
        $("#direccion").val(direccion);
        $("#ciudad").val(ciudad);
        $("#contacto").val(contacto);
        $("#telefono").val(telefono);
        $("#correo").val(correo);
        $("#web").val(web);
        location.href = '#modal';
    });


$("#guardar").click(function() {
    
    event.preventDefault();
    nit=$.trim($("#nit").val());
    nombre=$.trim($("#cliente").val());
    direccion=$.trim($("#direccion").val());
    ciudad=$.trim($("#ciudad").val());
    contacto=$.trim($("#contacto").val());
    telefono=$.trim($("#telefono").val());
    correo=$.trim($("#correo").val());
    web=$.trim($("#web").val());

   //alert(+usr+" "+opcion+" "+nit+" "+nombre+" "+direccion+" "+ciudad+" "+contacto+" "+telefono+" "+correo+" "+telefono+" "+web+" ");

    $.ajax({
        url:"funcionesphp/recliente.php",
        type: "POST",
       datatype:"json",
        data:{
            nit:nit,
            cliente:nombre,
            usr:usr,
            direccion:direccion,
            ciudad:ciudad,
            contacto:contacto,
            telefono:telefono,
            correo:correo,
            web:web,
            opcion:opcion
        },

        success: function(respuesta) {
           tablaclientes.ajax.reload(null,false);
           location.href = '#';
        }
    });




});


})
