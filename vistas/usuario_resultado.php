
<?php
require_once('../config/conf.php');
require_once('../controlador/metodos.php');
$usuario= $_POST['usuario'];
$clave= $_POST['clave'];
$nombres= $_POST['nombres'];
$paterno= $_POST['paterno'];
$materno= $_POST['materno'];
$estado= $_POST['estado'];

$Datos = "SELECT * FROM alm.usuarios_busqueda('$usuario','$clave','$nombres','$paterno','$materno',$estado)";
$resDatos = pg_query($Datos)or die('consulta fallida'.pg_last_error());
$rows=pg_num_rows($resDatos);

 ?>

<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" scr="script.js"></script>
<script src="jquery-3.3.1.min"></script>
	<title></title>
	<!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/js/bootstrap.min.js" rel="stylesheet">
    <link href="../bootstrap/body.css" rel="stylesheet">
</head>
<body>
	

	<nav class="navbar navbar-inverse">
		<ul class="nav navbar-nav">
			<li><a href="../index.php">INICIO</a></li>
			<li><a href="usuario.php">USUARIOS</a></li>
			<li><a href="../index.php">ITEMS</a></li>
		</ul>
	</nav>


	<div class="row">
		
		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h1>Gestion usuarios</h1>
			<div class="panel panel-default">

				<div class="panel-heading">Buscar usuarios</div>
  					<div class="panel-body">


  						<form class="form-inline" method="POST" action="usuario_resultado.php">
  						<div class="row">

  							<div class="col-md-1"></div>

  							<div class="col-md-10">
						  <div class="form-group">
						    <label for="exampleInputName2" class="control-label">Usuario</label> 
							    <input type="text" class="form-control"  name="usuario" placeholder="">
						  </div>

						  <div class="form-group">
						    <label for="exampleInputName2">Nombres</label>
						    <input type="text" class="form-control" id="textonombres"  placeholder="nombre1 nombre2" name="nombres" placeholder="">
						  </div><br><br>


						  <div class="form-group">
						    <label for="exampleInputName2">Paterno</label>
						    <input type="text" class="form-control" id="textopaterno"  name="paterno" placeholder="">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputName2">Materno</label>
						    <input type="text" class="form-control" id="textomaterno"  name="materno" placeholder="">
						  </div> <br><br>
						  <div class="form-group">
						    <label for="exampleInputName2">Estado</label>
						    <select name="estado" >
						    	<option value="0">activo</option>
						    	<option value="1">inactivo</option>
						    </select>
						  </div>
						  <div class="form-group" >
						    <label for="exampleInputName2">Clave</label>
						    <input  type="text" class="form-control" id="textoclave  name="clave" placeholder="">
						  </div><br><br>
						 
						  
						  <input  class="btn btn-primary" type="submit" id="btn-submit" value="Buscar">
						  </div>

						  <div class="col-md-1"></div>
						</div>
						</form>
  					</div>
			</div>	
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoUsuario"><span class="glyphicon glyphicon-plus-sign"></span> Nuevo Usuario</button>
				<?php include_once('../modal/newuser.php'); ?> <!-- llamando al modalpara nuevo usuario -->
			<a href="" class="btn btn-success">Imprimir</a><br>
			<hr>

			
        <table class="table table-striped" >
	                <tr>
	                  <td>Comando</td>
	                  <td>Clave</td>
	                  <td>Usuario</td>
	                  <td>nombres</td>
	                  <td>paterno</td>
	                  <td>materno</td>
	                  <td>observacion</td>
	                  <td>estado</td>
	                </tr>

	                
					<?php
				
					while($row=pg_fetch_array($resDatos, null, PGSQL_ASSOC))
					 {
					 	if ($row['r_activo']==0) {
					 		$estado = 'activo';
					 	}else{
					 		$estado='inactivo';
					 	}

					echo '<tbody>
								<tr>
								<td><a href=" " class="btn role="button">Añadir</a><a href=" " class="btn role="button">Editar</a></td>
								<td>'.$row['r_clave'].'</td>
								<td>'.$row['r_usuario'].'</td>
								<td>'.$row['r_nombres'].'</td>
								<td>'.$row['r_paterno'].'</td>
								<td>'.$row['r_materno'].'</td>
								<td>'.$row['r_observacion'].'</td>
								<td>'.$estado.'</td>
								</tr>
							</tbody>';

					 
					 }
						
					?>
								
					

								
									
								
	
	    
        
	      </table>
     
			


		</div>

		<div class="col-md-2"></div>



	</div>

</body>
</html>