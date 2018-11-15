<?php 
$num = $_GET["num"];
require_once('../config/conf.php');
$Datos = "SELECT * from alm.salida where numero = $num LIMIT 1";
$resId = pg_query($Datos)or die('consulta fallida'.pg_last_error());
while ($rowID = pg_fetch_row($resId)) {
  $id = $rowID[0];
}

$DatosIt = "SELECT DISTINCT descripcion, id_item FROM alm.items";
$resDatosIt = pg_query($DatosIt)or die('consulta fallida'.pg_last_error());

 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script type="text/javascript" scr="script.js"></script>
	<!--<script src="jquery-3.3.1.min"></script>-->
	<title></title>
	<!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link src="../bootstrap/js/bootstrap.min.js" >
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../alertifyjs/css/themes/default.css">
    <script src="../js1/jquery-3.1.1.min.js"></script>
    <script src="../js1/main.js"></script>
  	<script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>
  	<script src="../alertifyjs/alertify.js"></script>
</head>
<body>
	
	<div class="container-fluid">
		<div class="row">
			
			<!-- inicio menu de navegacion-->	
			<nav class="navbar navbar-inverse">
				<ul class="nav navbar-nav">
					<li><a href="../index.php"> INICIO</a></li>
					<li><a href="../vistas/usuario.php"> USUARIOS</a></li>
					<li><a href="../index.php"> ITEMS</a></li>
					<li><a href="../entradas.php"> ENTRADAS</a></li>
					<li><a href="../salidas.php"> SALIDAS</a></li>
				</ul>
			</nav>
			<!-- fin menu de navegacion-->
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<h1>Nota de salida numero: <?php echo $num ?></h1>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevomodal"><span class="glyphicon glyphicon-plus"></span> Nuevo Item</button>
				

				<div class="row">
 	<div class="col-sm-12">

 		<table class="table table-striped" >
 			
 			<tr>
 				<td>Eliminar</td>
 				<td>Item</td>
 				<td>Unidad</td>
 				<td>Importe</td>
 				<td>Valor unitario</td>
 				<td>cantidad</td>
 			</tr>


 			<?php
 			$DatosT = "SELECT it.descripcion,dt.unidad,dt.importe,dt.valor_unitario,dt.cantidad from alm.detalle_salida dt
						inner join alm.items it on (it.id_item=dt.id_item)
						 where id_salida = $id";
 			$resTabla = pg_query($DatosT)or die('consulta fallida'.pg_last_error());
 			
 			
 			?>
 				<?php
				
					while($row=pg_fetch_array($resTabla, null, PGSQL_ASSOC))
					 {

					echo '<tbody>
								<tr>
								<td><a href=" " class="btn role="button">Eliminar</a></td>
								<td>'.$row['descripcion'].'</td>
								<td>'.$row['unidad'].'</td>
								<td>'.$row['importe'].'</td>
								<td>'.$row['valor_unitario'].'</td>
								<td>'.$row['cantidad'].'</td>
								</tr>
							</tbody>';

					 
					 }
						
				?>
 										

 		</table>
 		<a class="btn btn-success glyphicon glyphicon-save" href="../salidas.php" role="button">Guardar</a>
 		<a onclick="return checkDelete()" href="eliminarSalida.php?id=<?php echo $id; ?>" class="btn btn-danger "  role="button">Volver</a>
 		<script language="JavaScript" type="text/javascript">
              function checkDelete(){
                  return confirm('No se guardaran los registros!');
              }
          </script>
 	</div>
 </div>
			</div>





			</div>
			<div class="col-sm-1"></div>

			
			


			<!-- div de la tabla items-->
			<div class="container">
				<div id="tabla"></div>
			</div>
			<!-- fin del div de la tabla items-->
		</div>
	</div>

	
		<!-- modal de editar items-->
	<div class="modal fade" id="nuevomodal" role="dialog">
		<div class="modal-dialog modal-xs">
			<div class="modal-content">

				<div class="modal-header">
					<button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
					<h3 class="modal-title"><strong>EDITAR ITEM</strong></h3>
				</div>

				<div class="modal-body">
					<form class="form-horizontal" action="registro_detalle.php" method="POST">
						<fieldset>
							<legend>Detalles del Item</legend>
							<input type="text" hidden="" id="idpersone" name="">

							<div class="form-group">
								<label class="control-label col-sm-4" for="descripcione">Item:</label>
								<select class="" name="item">
							    	<option selected="selected" disabled="disabled">seleccione una opcion</option>
							    	<?php 
							    		while($rowIt=pg_fetch_array($resDatosIt, null, PGSQL_ASSOC))
						 	{
									echo '<option value='.$rowIt['id_item'].'>'.$rowIt['descripcion'].'</option>';
							}
							    	 ?>
							    </select>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4" for="codigoe">Cantidad:</label>
								<div class="col-sm-7">
									<input type="hidden" name="id_salida" value="<?php echo $id ?>">
									<input type="hidden" name="num" value="<?php echo $num ?>">
									<input type="text" class="form-control" required id="cantidad" placeholder="EIngrese la cantidad" name="cantidad">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4" for="unidade">Unidad:</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" required id="unidad" placeholder="Tipo de unidad" name="unidad">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4" for="ubicacione">Valor unitario:</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" required id="val" placeholder="Valor unitario del producto" name="val">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4" for="partidae">Importe:</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" required id="imp" placeholder="Importe del producto" name="imp">
								</div>
							</div>

						</fieldset>
						<div class="form-group">        
							<div class="col-sm-offset-4 col-sm-8">
								<button type="submit" name="edita" class="btn btn-default"  >Ingresar</button>
							</div>
						</div>
					</form> 

				</div>

				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Volver</button>
				</div>

			</div>
		</div>
	</div>
			<!-- fin del modal de items-->


	<!--<script type="text/javascript">
		$(document).ready(function() {
			$('#actualizadatos').click(function() {
				actualizaDatos();
			});
		});
	</script>-->

</body>
</html>