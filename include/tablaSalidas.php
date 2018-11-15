<?php
require_once('../config/conf.php');
require_once('../controlador/metodos.php');

 ?>
 <div class="row">
 	<div class="col-sm-12">

 		<table class="table table-striped" >
 			<!-- <caption>
 				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevomodal"><span class="glyphicon glyphicon-plus"></span> Nueva Entrada</button>
 				<?php include_once('../modal/newitem.php'); ?> llamando al modalpara nuevo item
 				<a href="" class="btn btn-success">Imprimir</a><br>
 			</caption> -->
 			<tr>
 				<!-- <td>Eliminar</td>
 				<td>Editar</td> -->
 				<td>Id Kardex</td>
 				<td>Descripcion</td>
 				<td>Codigo</td>
 				<td>Unidad</td>
 				<td>Ubicacion</td>
 				<td>Fecha</td>
 				<td>Concepto</td>
 				<td>Entrada Cant.</td>
 				<td>Entrada Valor Unit.</td>
 				<td>Entrada Importe.</td>
 			</tr>


 			<?php
 			$Datos = "SELECT kar.id_kardex,it.descripcion,it.codigo, it.unidad,it.ubicacion,
							kar.fecha, kar.concepto, kar.e_cantidad, kar.e_valor_unitario, kar.e_importe
					from alm.kardex kar
					inner join alm.items it on kar.id_item = it.id_item
					order by id_kardex ";
 			$resDatos = pg_query($Datos)or die('consulta fallida'.pg_last_error());
 			/*$rows=pg_num_rows($resDatos);*/
 			while($ver=pg_fetch_array($resDatos)){
 				$datos= $ver[0]."||".
 				$ver[1]."||".
 				$ver[2]."||".
 				$ver[3]."||".
 				$ver[4]."||".
 				$ver[5]."||".
 				$ver[6]."||".
 				$ver[7]."||".
 				$ver[8]."||".
 				$ver[9];
 				?>
 				<tbody>
 					<tr>
 						<!-- <td>
 							<button class="btn btn-danger glyphicon glyphicon-remove"   
 							onclick="preguntarSiNo('<?php echo $ver[0] ?>')"> Eliminar</button>
 						
 						</td>
 						
 						<td>
 							<button class="btn btn-warning glyphicon glyphicon-pencil " data-toggle="modal" data-target="#editarmodal" onclick="agregaform('<?php echo $datos ?>')"> Editar</button>
 						</td> -->
 						<td><?php echo $ver[0] ?></td>
 						<td><?php echo $ver[1] ?></td>
 						<td><?php echo $ver[2] ?></td>
 						<td><?php echo $ver[3] ?></td>
 						<td><?php echo $ver[4] ?></td>
 						<td><?php echo $ver[5] ?></td>
 						<td><?php echo $ver[6] ?></td>
 						<td><?php echo $ver[7] ?></td>
 						<td><?php echo $ver[8] ?></td>
 						<td><?php echo $ver[9] ?></td>
 					</tr>
 				</tbody>
 				<?php
 			}
 			?>						

 		</table>

 	</div>
 </div>
