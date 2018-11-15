<?php 
	require_once('conexion.php');

	$conexion=conectarBD();
	
		$codigo=$_POST['codigo'];
		$descripcion=$_POST['descripcion'];
		$cantidad=$_POST['cantidad'];
		$unidad=$_POST['unidad'];
		$ubicacion=$_POST['ubicacion'];
		$partida_p=$_POST['partida'];

		$res=pg_query($conexion,"SELECT alm.insertar_item('$descripcion','$codigo','$cantidad','$partida_p','$unidad','$ubicacion');");
		header('location:../index.php');
		
?>