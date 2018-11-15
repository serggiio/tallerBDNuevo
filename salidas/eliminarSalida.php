<?php 
require_once('../config/conf.php');
$id= $_GET['id'];

$query = "SELECT * FROM alm.eliminar_salida($id)";
$salidas = pg_query($query)or die('consulta fallida'.pg_last_error());
echo "<script>location.href='../salidas.php'</script>";

 ?>