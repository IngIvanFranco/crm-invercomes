<?php
require'funcionesphp/seguridad.php';
?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="css/agenda.css">
    <link rel="stylesheet" href="css/generales.css">
    <link rel="stylesheet" href="css/grid.css">    
    <link rel="stylesheet" href="iconos/styles.css">

   

    
    <title>Agenda</title>
</head>
<body>
<div class="container">
  <div class="trabajo">
     <?php
if (empty($_REQUEST['mes']) || $_REQUEST['mes'] == 13  ) {
	$month= date("n");
}else {
	$month= $_REQUEST['mes'];
	
}

     
     $year=date("Y");
     $diaActual=date("j");
      
     # Obtenemos el dia de la semana del primer dia
     # Devuelve 0 para domingo, 6 para sabado
     $diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
     # Obtenemos el ultimo dia del mes
     $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
      
     $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
     "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");


     ?>



<table id="calendar">
	<caption><?php echo $meses[$month]." ".$year?> </caption>
	<tr>
		<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
		<th>Vie</th><th>Sab</th><th>Dom</th>
	</tr>
	<tr ">
		<?php
		$last_cell=$diaSemana+$ultimoDiaMes;
		// hacemos un bucle hasta 42, que es el máximo de valores que puede
		// haber... 6 columnas de 7 dias
		for($i=1;$i<=49;$i++)
		{
			if($i==$diaSemana)
			{
				// determinamos en que dia empieza
				$day=1;
			}
			if($i<$diaSemana || $i>=$last_cell)
			{
				// celca vacia
				echo "<td>&nbsp;</td>";
			}else{
				// mostramos el dia
				if($day==$diaActual && $month==date("n"))
					echo "<td class='hoy'><a href=verdia.php?dia=$day&mes=$month>$day</a></td>";
				else
					echo "<td><a href=verdia.php?dia=$day&mes=$month>$day</a></td>";
				$day++;
			}
			// cuando llega al final de la semana, iniciamos una columna nueva
			if($i%7==0)
			{
				echo "</tr><tr>\n";
			}
		}
	?>
	</tr>
</table>
<div class="contenmes">
<a class="btn_volver" href="agenda.php?mes=<?php echo $month -1 ?>">Atras</a>
<a  class="btn_volver"href="agenda.php?mes=<?php echo $month + 1 ?>">Siguiente</a>

</div>
  </div>
  <div class="cabecera">
<h1>Agenda</h1>
  </div>
  <div class="menu">
     
        <?php
        include'vistas/menu.php';
        ?>
  </div>
</div>
</body>
</html>