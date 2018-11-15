<?php 

	require_once('conexion.php');

	$conexion=conectarBD();
		
		$cod=$_POST['codigoe'];
		$desc=$_POST['descripcione'];
		$uni=$_POST['unidade'];
		$ubi=$_POST['ubicacione'];
		$part=$_POST['partidae'];

		$cod = strtoupper($cod);
		$desc = strtoupper($desc);
		$uni = strtoupper($uni);
		$ubi = strtoupper($ubi);
		
		echo $res=pg_query($conexion,"SELECT alm.busqueda_prueba('$cod','$desc','$uni','$ubi',$part);");


 ?>