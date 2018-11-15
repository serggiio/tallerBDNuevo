<?php
require_once('config/conf.php');
require_once('controlador/metodos.php');

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script type="text/javascript" scr="script.js"></script>
	<!--<script src="jquery-3.3.1.min"></script>-->
	<title></title>
	<!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link src="bootstrap/js/bootstrap.min.js" >
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="alertifyjs/css/themes/default.css">
    <script src="js1/jquery-3.1.1.min.js"></script>
    <script src="js1/main.js"></script>
  	<script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  	<script src="alertifyjs/alertify.js"></script>
</head>
<body>
	
	<div class="container-fluid">
		<div class="row">
			
			<!-- inicio menu de navegacion-->	
			<nav class="navbar navbar-inverse">
				<ul class="nav navbar-nav">
					<li><a href="index.php"> INICIO</a></li>
					<li><a href="vistas/usuario.php"> USUARIOS</a></li>
					<li><a href="index.php"> ITEMS</a></li>
					<li><a href="entradas.php"> ENTRADAS</a></li>
					<li><a href="salidas.php"> SALIDAS</a></li>
				</ul>
			</nav>
			<!-- fin menu de navegacion-->

			<!-- Panel de busqueda-->
			<div class="container">
				<h1>Gestion Entradas Kardex</h1>
				<div class="panel panel-default">

                    <div class="panel-heading"><strong>Nueva Entrada</strong></div>
                    <div class="panel-body">

                    	<form class="form-inline" action="" method="POST">

                    		<div class="form-group">
                    			<label class="control-label col-sm-4" for="codigo">Codigo:</label>
                    			<div class="col-sm-7">
                    				<input type="text" class="form-control" id="codigo" placeholder="Introduce tu Codigo" name="codigo" required="true">
                    			</div>
                    		</div>

                    		<div class="form-group">
                    			<label class="control-label col-sm-4" for="descripcion">Descripcion:</label>
                    			<div class="col-sm-7">
                    				<input type="text" class="form-control" id="descripcion" placeholder="Introduce tu descripcion" name="descripcion" required="true">
                    			</div>
                    		</div>

                    		<div class="form-group">
                    			<label class="control-label col-sm-4" for="cantidad">Cantidad:</label>
                    			<div class="col-sm-7">
                    				<input type="text" class="form-control" id="cantidad" placeholder="Introduce tu cantidad" name="cantidad">
                    			</div>
                    		</div>

                    		<div class="form-group">
                    			<label class="control-label col-sm-4" for="unidad">Unidad:</label>
                    			<div class="col-sm-7">
                    				<input type="text" class="form-control" id="unidad" placeholder="Introduce tu unidad" name="unidad">
                    			</div>
                    		</div>

                    		<div class="form-group">
                    			<label class="control-label col-sm-4" for="ubicacion">Ubicacion:</label>
                    			<div class="col-sm-7">
                    				<input type="text" class="form-control" id="ubicacion" placeholder="Introduce tu ubicacion" name="ubicacion">
                    			</div>
                    		</div>

                    		<div class="form-group">
                    			<label class="control-label col-sm-4" for="partida">Partida Presupuestaria:</label>
                    			<div class="col-sm-7">
                    				<input type="text" class="form-control" id="partida" placeholder="Introduce tu partida" name="partida">
                    			</div>
                    		</div>

                    		<div class="form-group">        
                    			<div class="col-sm-offset-4 col-sm-8">
                    				<button type="submit" name="submit" class="btn btn-default" >Grabar</button>
                    			</div>
                    		</div>
                    		<div class="form-group">        
                    			<div class="col-sm-offset-4 col-sm-8">
                    				<button type="reset" class="btn btn-default">Cancelar</button>
                    			</div>
                    		</div>
                    	</form>
                    </div>
				</div>	
			</div>
			<!-- Fin del Panel de busqueda-->


            <!-- div de la tabla items-->
            <div class="container">
                <div id="tablaentradas"></div>
            </div>
            <!-- fin del div de la tabla items-->

		</div>
	</div>

        <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaentradas').load('include/tablaEntradas.php');  

            /*$('#actualizadatos').click(function() {
                actualizaDatos();
            });*/

        });
    </script>



</body>
</html>