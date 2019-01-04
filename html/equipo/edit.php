<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/custom.css">
  </head>
<title>
COtizacion
</title>
  <body>
  	<div>
 <div id="alert-container">
<?php
if(isset($_SESSION['alert'])){
if($_SESSION['alert'] != null){
echo $_SESSION['alert'];

}
}
?> 
</div>	
</div>
</div>

	<div class="jumbotron" id="header"><h2>ElectroPrice</h2></div>
<div class="container-fluid">
<br>
<br>
<br>
<div class="container-fluid">

	<?php

		/*$template = $_GET['template'];
		$type = $_GET['type'];

		if($template == "records"){

		if($type == "herramienta"){
			echo "<div class='row'>
			<div class='col-sm-9 text-right'>
			</div>
			<div class='col-sm-3 text-right'>";
			echo "<form action='php/managers/Manager.php?template=herramienta&mode=search' method='post'>";
			echo "<input type='text' class='form-control' id='user_id' name='user_id' placeholder='Id de Usuario'>";
			echo " <button type='submit' class='btn btn-secondary'>Buscar</button>
					</form>";
			echo "</div></div><br><br>";	

		}
		}*/
		?>


	<div class='row'>
		

		<div class='col-sm-6'>
		<a href='/cotizacion/html/equipo/records.php?sort=default'>Lista de Equipo</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='/cotizacion/html/herramienta/records.php?sort=default'>Lista de Herramienta</a>&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	

		<?php
		/*if($template == "records"){

		if($type == "herramienta"){
		echo "<div class='col-sm-6 text-right'>";
		echo "<form action='php/managers/Manager.php?template=herramienta&mode=new' method='post'>";
    	echo "<input name='codigo_barra' type='text' placeholder='Codigo de Barra'>";
    	echo "<input name='tool_name' type='text' placeholder='Nombre'>";
    	echo "<button type='submit' class='btn btn-secondary'>Agregar</button>";
		echo "</form>";
		echo "</div>";
		}
		}*/
		?>
		<?php

	
		




		/*$template = 'records';
		$type = "proyecto";*/

		/*if($template == "records" && $type == "equipo"){
	    echo "<a title='Nuevo Equipo' href='/cotizacion/html/main.php?template=equipo&mode=new'><i class='fa fa-plus'></i></a>";

		}else if($template == "records" && $type == "proyecto"){
		echo "<a title='Nuevo Proyecto' href='/cotizacion/html/main.php?template=proyecto&mode=new'><i class='fa fa-plus'></i></a>";

		}*/
	    ?>
		</div>
		</div>
<br>
<div id="cotizacion_display">
<?php
	include '/var/www/html/cotizacion/html/php/views/EquipoView.php';	
	include '/var/www/html/cotizacion/html/php/views/ProveedorView.php';
	//include 'php/views/ClienteView.php';
	include '/var/www/html/cotizacion/html/php/views/BodegaView.php';	
	//include 'php/views/HerramientaView.php';
	//include 'php/views/ProyectoView.php';*/
	$numero_serie = $_GET['numero_serie'];

		$equipo = new EquipoView;
		$proveedor = new ProveedorView;
		$bodega = new BodegaView;



//$clave_sat = $_GET['clave_sat'];
			echo "<a href='/cotizacion/html/php/managers/EquipoManagerView.php?mode=delete&numero_serie=$numero_serie'>Eliminar Registro</a>";
			echo "<form action='/cotizacion/html/php/managers/EquipoManagerView.php?&mode=edit&numero_serie=$numero_serie' method='post'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-3'><h5>Informacion de Equipo</h5>";
			$equipo->editForm($numero_serie);
			echo "</div>";
			echo "<div col-sm-3><h5>Informacion de Proveedor</h5>";
			$proveedor->editForm($numero_serie);
			echo "<br>";
			/*echo "<h5>Informacion de Cliente</h5>";
			$cliente->editForm($_GET['clave_sat']);*/
			echo "</div>";
			echo "<div class='col-sm-3'><h5>Informacion de Bodega</h5>";
			$bodega->editForm($numero_serie);
			echo "</div>";
			echo "</div>";
			echo " <button type='submit' class='btn btn-secondary'>Submit</button>
					</form>";

			echo "<form action='/cotizacion/html/php/scripts/upload.php?numero_serie=$numero_serie' method='post' enctype='multipart/form-data'>";
   			echo "Select image to upload";
    		echo "<input type='file' name='fileToUpload' id='fileToUpload'>";
    		echo "<input type='submit' value='Upload Image' name='submit'>";
			echo "</form>";		





	/*$equipo = new EquipoView();
	$equipo->printRecords($_GET['sort']);*/


	//$template = $_GET['template'];




	//$template = 'records';

	/*if($template == "equipo"){
		$equipo= new EquipoView();
		$proveedor = new ProveedorView();
		$cliente = new ClienteView();
		$bodega = new BodegaView();*/
		//$proyecto = new ProyectoView();

		/*$mode = $_GET['mode'];

		if($mode == "new"){
		
			echo "<form action='php/managers/Manager.php?template=equipo&mode=new' method='post'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-3'><h5>Informacion de Equipo</h5>";

			$equipo->newForm();
			echo "</div>";
			echo "<div class='col-sm-3'><h5>Informacion de Proveedor</h5>";
			$proveedor->newForm();
			echo "<br>";*/
			/*echo "<h5>Informacion de Cliente</h5>";
			$cliente->newForm();
			echo "</div>";*/
			/*echo "<div class='col-sm-3'><h5>Informacion de Bodega</h5>";
			
			$bodega->newForm();
			echo "</div>";
			echo "</div>";
			echo " <button type='submit' class='btn btn-secondary'>Submit</button>
					</form>";
			
		}else if($mode == "edit"){

			$clave_sat = $_GET['clave_sat'];
			echo "<a href='php/managers/Manager.php?template=equipo&mode=delete&clave_sat=$clave_sat'>Eliminar Registro</a>";
			echo "<form action='php/managers/Manager.php?template=equipo&mode=edit&clave_sat=$clave_sat' method='post'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-3'><h5>Informacion de Equipo</h5>";
			$equipo->editForm($_GET['clave_sat']);
			echo "</div>";
			echo "<div col-sm-3><h5>Informacion de Proveedor</h5>";
			$proveedor->editForm($_GET['clave_sat']);
			echo "<br>";*/
			/*echo "<h5>Informacion de Cliente</h5>";
			$cliente->editForm($_GET['clave_sat']);
			echo "</div>";*/
			/*echo "<div class='col-sm-3'><h5>Informacion de Bodega</h5>";
			$bodega->editForm($_GET['clave_sat']);
			echo "</div>";
			echo "</div>";
			echo " <button type='submit' class='btn btn-secondary'>Submit</button>
					</form>";
			echo "<form action='php/scripts/upload.php&clave_sat=$clave_sat' method='post' enctype='multipart/form-data'>";
   			echo "Select image to upload";
    		echo "<input type='file' name='fileToUpload' id='fileToUpload'>";
    		echo "<input type='submit' value='Upload Image' name='submit'>";
			echo "</form>";		

			echo "<form action='php/managers/EquipoProyectoManager.php' method='post'>";
			echo "<input type='text' name='numero_proyecto' id='numero_proyecto'>";
			echo " <button type='submit' class='btn btn-secondary'>Submit</button>";
			echo "</form>";


		}

	}else if($template == "records"){

		$type = $_GET['type'];*/

		//$type = "proyecto";

		/*if($type == "equipo"){
			$cliente = new ClienteView();
			$cliente->printRecords($_GET['sort']);

		}

		
		if($type == "herramienta"){
			$herramienta = new HerramientaView();
			


			if(isset($_GET['user_id'])){

				$herramienta->printRecordsUser($_GET['sort'],$_GET['user_id']);

			}else{

				$herramienta->printRecords($_GET['sort']);
			}

		}

		if($type == "proyecto"){
			$proyecto = new ProyectoView();
			$proyecto->printRecords($_GET['sort']);

		}*/

		//if($type == "proyecto"){
			//echo $type;
			//$proyecto = new ProyectoView();
			//$proyecto->newForm();
			//$proyecto->printRecords('default');
			//echo $_GET['type'];

		
	/*}else if($template == "proyecto"){

		$mode = $_GET['mode'];

		$equipo= new EquipoView();
		$proveedor = new ProveedorView();
		$cliente = new ClienteView();
		$bodega = new BodegaView();
		$proyecto = new ProyectoView();

		if($mode == "new"){


			echo "<form action='php/managers/Manager.php?template=proyecto&mode=new' method='post'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-3'>
			<h5>Informacion de Proyecto</h5>";
			$proyecto->newForm();
			echo "</div>";
			echo "<div class='col-sm-3'>
			<h5>Informacion de Cliente</h5>";
			$cliente->newForm();				
			echo "</div>";
			echo "</div>";
			echo " <button type='submit' class='btn btn-secondary'>Submit</button>
					</form>";


		}else if($mode == "edit"){

			$numero_proyecto = $_GET['numero_proyecto'];
			echo "<a href='php/managers/Manager.php?template=proyecto&mode=delete&numero_proyecto=$numero_proyecto'>Eliminar Registro</a>";
			echo "<form action='php/managers/Manager.php?template=proyecto&mode=edit&numero_proyecto=$numero_proyecto' method='post'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-3'><h5>Informacion de Proyecto</h5>";
			$proyecto->editForm((int)$numero_proyecto);
			echo "</div>";
			echo "<div col-sm-3>";
			echo "<h5>Informacion de Cliente</h5>";
			$cliente->editFormProyecto((int)$numero_proyecto);
			echo "</div>";
			echo "</div>";
			echo " <button type='submit' class='btn btn-secondary'>Submit</button>
					</form>";

		}


	}else if($template == "herramienta"){

		$mode = $_GET['mode'];

		$equipo= new EquipoView();
		$proveedor = new ProveedorView();
		$cliente = new ClienteView();
		$bodega = new BodegaView();
		$proyecto = new ProyectoView();
		$herramienta = new HerramientaView();

		if($mode == "new"){


			echo "<form action='php/managers/Manager.php?template=herramienta&mode=new' method='post'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-3'>
			<h5>Informacion de Herramienta</h5>";
			$herramienta->newForm();
			echo "</div>";
			echo "</div>";
			echo " <button type='submit' class='btn btn-secondary'>Submit</button>
					</form>";


		}else if($mode == "edit"){

			$codigo_barra = $_GET['codigo_barra'];
			echo "<a href='php/managers/Manager.php?template=herramienta&mode=delete&codigo_barra=$codigo_barra'>Eliminar Registro</a>";
			echo "<form action='php/managers/Manager.php?template=herramienta&mode=edit&codigo_barra=$codigo_barra' method='post'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-3'><h5>Informacion de Herramienta</h5>";
			$herramienta->editForm((int)$codigo_barra);
			echo "</div>";
			echo "</div>";
			echo " <button type='submit' class='btn btn-secondary'>Submit</button>
					</form>";

		}

	}*/
?>  

</div>

  </div>
</div>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
    	function clearAlert(){
    		document.getElementById("alert-container").remove();
    	}

    	window.setTimeout(clearAlert, 5000);



    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

