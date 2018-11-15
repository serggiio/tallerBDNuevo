<?php 
require_once('../config/conf.php');

$Datos = "SELECT * FROM alm.salida";
$salidas = pg_query($Datos)or die('consulta fallida'.pg_last_error());
$rows=pg_num_rows($salidas);
$fecha = date("d/m/y");
if ($rows==0) {
	$num=1;
	$queryDetalle="INSERT INTO alm.salida(numero,fecha_salida,solicitante_id) VALUES ('$num','$fecha',1)";
	$salidas = pg_query($queryDetalle)or die('consulta fallida'.pg_last_error());
	echo "<script>location.href='detalle.php?num=$num'</script>";
}else{
	$num=$rows+1;
	$queryDetalle="INSERT INTO alm.salida(numero,fecha_salida,solicitante_id) VALUES ('$num','$fecha',1)";
	$salidas = pg_query($queryDetalle)or die('consulta fallida'.pg_last_error());
	echo "<script>location.href='detalle.php?num=$num'</script>";
}


 ?>