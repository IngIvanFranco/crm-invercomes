$(document).ready(function() {
    var printCounter = 0;
 
    // datatable proveedores
    $('#example').append('<caption style="caption-side: bottom">Software Desarrollado Por Invercomes S.A.S. </caption>');
 
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'Listado de proveedores Invercomes S.A.S.',
                title: 'Proveedores',
                footer: true ,
                text:      'Exportar a Excel'
               
            },
            {
                extend: 'pdf',
                messageTop: 'Listado de proveedores Invercomes S.A.S.',
                messageBottom: null,
                title: 'Proveedores',
                footer: true,
                text:      'Exportar a Pdf' 
            },
            {
                extend: 'print',
                messageTop: function () {
                    printCounter++;
                    
 
                    if ( printCounter === 1 ) {
                        return 'Listado de proveedores Invercomes S.A.S.';
                    }
                    else {
                        return 'Listado de proveedores Invercomes S.A.S. impresion #'+printCounter+' ';
                    }
                },
                messageBottom: null, 
                title: 'Proveedores',
                text:      'Imprimir'
            }
        ]
    } );

// datatable ordenes

    $('#ordenes').append('<caption style="caption-side: bottom">Software Desarrollado Por Invercomes S.A.S. </caption>');
 
    $('#ordenes').DataTable( {
       
        pageLength:10,
        dom: 'Bfrtip',
        
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'Listado de Ordenes de Compra Invercomes S.A.S.',
                title: 'Ordenes de Compra',
                footer: true,
                text:      'Exportar a Excel'
            },
            {
                extend: 'pdf',
                messageTop: 'Listado de Ordenes de Compra Invercomes S.A.S.',
                messageBottom: null,
                title: ' Ordenes de Compra',
                footer: true,
                text:      'Exportar a Pdf'
            },
            {
                extend: 'print',
                messageTop: function () {
                    printCounter++;
 
                    if ( printCounter === 1 ) {
                        return 'Listado de Ordenes de Compra Invercomes S.A.S.';
                    }
                    else {
                        return 'Listado de Ordenes de Compra Invercomes S.A.S. impresion #'+printCounter+' ';
                    }
                },
                messageBottom: null, 
                title: 'Ordenes de Compra',
                text:      'Imprimir'
            }
        ]
       
          
       
    }   );



// proxima datatabel aqui









} );