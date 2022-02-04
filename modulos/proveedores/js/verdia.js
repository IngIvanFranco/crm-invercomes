function guardar() {
        
let dia = document.getElementById('dia').value;
let usr = document.getElementById('usr').value;
let hora = document.getElementById('hora').value;
let tipovisita = document.getElementById('tipovisita').value;
let proveedor = document.getElementById('proveedor').value;
let direccion = document.getElementById('direccion').value;
let observacion = document.getElementById('observacion').value;

$.ajax({
    url:"funcionesphp/verdia.php",
    type:"POST",
    data: {
        usr:usr,
        dia:dia, 
        hora:hora, 
        tipovisita:tipovisita, 
        proveedor:proveedor,
        direccion:direccion,
        observacion:observacion
    },
    success: function(respuesta) {
     document.getElementById('dia').value= "";
 document.getElementById('hora').value= "";
 document.getElementById('tipovisita').value= "";
 document.getElementById('proveedor').value= "";
 document.getElementById('direccion').value= "";
 document.getElementById('observacion').value= "";
 
 
     if (respuesta==1) {
         alert("Datos guardados con exito");
         $("#acordeon").load(location.href + " #acordeon");
        
     }else{
        alert("algo salio mal")
     }

     
    
    }
})


}
