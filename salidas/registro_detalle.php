<?php 
require_once('../config/conf.php');
$id_salida = $_POST['id_salida'];
$cantidad = $_POST['cantidad'];
$unidad = $_POST['unidad'];
$unidad = strtoupper($unidad);
$valu = $_POST['val'];
$impo = $_POST['imp'];
$item = $_POST['item'];
$num = $_POST['num'];
$query="SELECT * FROM alm.insertar_salida($item, '$unidad', $impo, $valu, $cantidad, $id_salida)";
$salidas = pg_query($query)or die('consulta fallida'.pg_last_error());
echo "<script>location.href='detalle.php?num=$num'</script>";
 ?>