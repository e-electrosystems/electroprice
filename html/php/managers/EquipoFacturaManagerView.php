<?php

//session_start();
//unset($_SESSION['alert']);



include '/var/www/html/cotizacion/html/php/managers/EquipoManager.php';
//include '/var/www/html/cotizacion/html/php/managers/ProveedorManager.php';
include '/var/www/html/cotizacion/html/php/managers/ClienteManager.php';
//include '/var/www/html/cotizacion/html/php/managers/BodegaManager.php';

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; Filename=yourcoolwordfile.doc");

//$mode=$_GET["mode"];

$mode="new";

/*if ($mode == "new"){
$numero_serie = strtoupper($_POST["numero_serie"]);
}else if($mode == "edit" || $mode == "delete"){
$numero_serie = strtoupper($_GET["numero_serie"]);
}*/

$values = $_POST['numeros_serie'];
$equipo = new EquipoManager();
$cliente = new ClienteManager();

$nombre = $_POST['nombre_cliente'];
$po_cliente = $_POST['po_cliente'];
$recivido_cliente = $_POST['recivido_cliente'];
$solicitado_cliente = $_POST['solicitado_cliente'];
$folio = $_GET['folio'];

$mes = date("m");
$year = date("Y");

switch ($mes) {
	case 1:
		$mes = "enero";
		break;
	
	case 2:
		$mes = "febrero";
		break;
	
	case 3:
		$mes = "marzo";
		break;
	case 4:
		$mes = "abril";
		break;
	case 5:
		$mes= "mayo";
		break;
	case 6:
		$mes = "junio";
		break;
	case 7:
		$mes = "julio";
		break;

	case 8:
		$mes = "agosto";
		break;
	case 9:
		$mes = "septiembre";
		break;

	case 10:
		$mes = "octubre";
		break;
	case 11:
		$mes = "noviembre";
		break;

	case 12:
		$mes = "diciembre";
		break;
	default:
		# code...
		break;
}


foreach ($values as $val) {
	/*echo $val."<br>";
	echo $nombre."<br>";
	echo $po_cliente."<br>";
	echo $recivido_cliente."<br>";
	echo $solicitado_cliente."<br>";
	echo $folio."<br>";*/


$values_cliente = array('numero_serie' => $val,
				'nombre' => $nombre,
				'po_cliente' => $po_cliente,
				'recivido' => $recivido_cliente,
				'solicitado' => $solicitado_cliente,
				'folio' => $folio
				);

/*$values_cliente = array('numero_serie' => $val,
				'nombre' => $nombre,
				'po_cliente' => $po_cliente,
				'recivido' => $recivido_cliente,
				'solicitado' => $solicitado_cliente,
				'folio' => $folio
				);*/

//$cliente->managerCliente($mode,$val,$values_cliente);
$res = $cliente->managerCliente("delete",$val,$values_cliente);			
$res = $cliente->managerCliente($mode,$val,$values_cliente);
$res = $equipo->managerEquipo("factura",$val,$nombre);				
}


/*$values_cliente = array('numero_serie' => $val,
				'nombre' => $nombre,
				'po_cliente' => $po_cliente,
				'recivido' => $recivido_cliente,
				'solicitado' => $solicitado_cliente,
				'folio' => $folio
				);*/

if($mode == "new"){


if($cliente){

//header('Location: /cotizacion/html/equipo/edit.php?numero_serie='.$numero_serie);

}
}else if($mode == "edit"){
if($cliente){


//header('Location: /cotizacion/html/equipo/edit.php?numero_serie='.$numero_serie);

}

}else if($mode == "delete"){

//header('Location: /cotizacion/html/equipo/records.php?sort=default');

}


/*$clave_sat = null;

if($mode == "edit" || $mode == "delete"){
$clave_sat = $_GET['clave_sat'];

}else if($mode == "new"){

$clave_sat = $_POST['clave_sat'];	
}


$values_equipo = array('clave_sat' => $clave_sat,
				'numero_serie' => $_POST['numero_serie'],
				'modelo' => $_POST['modelo'],
				'marca' => $_POST['marca'],
				'tipo' => $_POST['tipo'],
				'costo_lista' => $_POST['costo_lista'],
				'costo_real' => $_POST['costo_real'],
				'factura' => $_POST['factura'],
				'descripcion' => $_POST['descripcion']
				);

$values_proveedor = array('clave_sat' => $clave_sat,
						  'nombre' => $_POST['nombre_proveedor'], 
						  'status' => $_POST['status'],
						  'recivido' => $_POST['recivido_proveedor']);


$values_bodega =  array('clave_sat' => $clave_sat,
						'nombre' => $_POST['nombre_bodega'],
						'recivido' => $_POST['recivido_bodega']);
						


$equipo = new EquipoManager();
$proveedor = new ProveedorManager();
$bodega = new BodegaManager();


$equipo->managerEquipo($mode,$clave_sat,$values_equipo);
$proveedor->managerProveedor($mode,$clave_sat,$values_proveedor);
$bodega->managerBodega($mode,$clave_sat,$values_bodega);



if($equipo && $proveedor && $cliente && $bodega){
$_SESSION['alert'] = "<div class='alert alert-info' role='alert'>
  		Registro guardado exitosamente
</div>";

if($mode == "delete"){
header('Location: /cotizacion/html/main.php?template=equipo&mode=edit&clave_sat='.$clave_sat);
}else if($mode == "new"){
header('Location: /cotizacion/html/main.php?template=equipo&mode=new');
}else if($mode == "edit"){
header('Location: /cotizacion/html/main.php?template=equipo&mode=edit&clave_sat='.$clave_sat);
}


}else{
$_SESSION['alert'] = "<div class='alert alert-danger' role='alert'>".$res."</div>";

if($mode == "new"){
$clave_sat = $_POST['clave_sat'];
header('Location: t/cotizacion/html/equipo/edit.php?clave_sat='.$clave_sat);
}else if($mode == "edit"){
header('Location: /cotizacion/html/equipo/edit.php?clave_sat='.$clave_sat);
}else if($mode == "delete"){
header('Location: /cotizacion/html/equipo/records.php?sort=default');
}
}*/







/*else if($template == "herramienta"){

$codigo_barra = null;

if($mode == "edit" || $mode == "delete"){
$codigo_barra = $_GET['codigo_barra'];

}else if($mode == "new"){

$codigo_barra = $_POST['codigo_barra'];	
}else if($mode == "search"){
$user_id = $_POST['user_id'];
header('Location: /cotizacion/html/main.php?template=records&type=herramienta&sort=default&user_id=.'.$user_id);

}


$values_herramienta = array('nombre' => $_POST['tool_name'],
							'codigo_barra' => $_POST['codigo_barra']
							);



$equipo = new EquipoManager();
$herramienta = new HerramientaManager();



$herramienta->managerHerramienta($mode,$codigo_barra,$values_herramienta);


if($herramienta){
$_SESSION['alert'] = "<div class='alert alert-info' role='alert'>
  		Registro guardado exitosamente
</div>";

if($mode == "delete"){
header('Location: /cotizacion/html/main.php?template=records&type=herramienta&sort=default');

}else if($mode == "new"){
header('Location: /cotizacion/html/main.php?template=records&type=herramienta&sort=default');
}else if($mode == "edit"){
header('Location: /cotizacion/html/main.php?template=herramienta&mode=edit&codigo_barra='.$codigo_barra);
}


}else{
$_SESSION['alert'] = "<div class='alert alert-danger' role='alert'>".$res."</div>";

if($mode == "new"){
$codigo_barra = $_POST['codigo_barra'];
header('Location: /cotizacion/html/main.php?template=herramienta&mode=new');
}else if($mode == "edit"){
header('Location: /cotizacion/html/main.php?template=herramienta&mode=edit&codigo_barra='.$codigo_barra);
}else if($mode == "delete"){
header('Location: /cotizacion/html/main.php?template=herramienta&mode=new');
}
}	
}*/


/*else if($template == "proyecto"){
echo $template;
$numero_proyecto = null;

if($mode == "edit" || $mode == "delete"){
$numero_proyecto = $_GET['numero_proyecto'];

}if($mode == "new"){
$numero_proyecto = null;
}


$values_proyecto = array('numero_proyecto' => $numero_proyecto,
				'descripcion' => $_POST['descripcion'],
				'tiempo_entrega' => $_POST['tiempo_entrega'],
				'fecha_instalacion' => $_POST['fecha_instalacion'],
				'tipo_viaje' => $_POST['tipo_viaje'],
				'personal' => $_POST['personal'],
				'tipo_instalacion' => $_POST['tipo_instalacion'],
				'tipo_paquete' => $_POST['tipo_paquete'],
				'subtotal' => $_POST['subtotal'],
				'cargo_unico' => $_POST['cargo_unico'],
				'unidades' => $_POST['unidades']
				);




$equipo = new EquipoManager();
$proyecto = new ProyectoManager();
$cliente = new ClienteManager();

//echo $clave_sat;

//$equipo->managerEquipo($mode,$clave_sat,$values_equipo);
$last = $proyecto->managerProyecto($mode,$numero_proyecto,$values_proyecto);



$values_cliente = array('clave_sat' => $null,
						'nombre' => $_POST['nombre_cliente'],
						'po_cliente' => $_POST['po_cliente'],
						'recivido' => $_POST['recivido_cliente'],
						'solicitado' => $_POST['solicitado_cliente'],
						'numero_proyecto' => $last);



if($mode == "delete"){
$cliente->managerCliente($mode,"proyecto",$numero_proyecto,$values_cliente);

}else{


$cliente->managerCliente($mode,null,null,$values_cliente);
echo $mode;
}
if($proyecto){
$_SESSION['alert'] = "<div class='alert alert-info' role='alert'>
  		Registro guardado exitosamente
</div>";


if($mode == "delete"){
//header('Location: /cotizacion/html/main.php?template=records&type=proyecto&sort=default');
}else if($mode == "new"){
//header('Location: /cotizacion/html/main.php?template=proyecto&mode=edit&numero_proyecto='.$last);
}else if($mode == "edit"){
//header('Location: /cotizacion/html/main.php?template=proyecto&mode=edit&numero_proyecto='.$numero_proyecto);
}


}else{
$_SESSION['alert'] = "<div class='alert alert-danger' role='alert'>".$res."</div>";

if($mode == "new"){
$numero_proyecto = $_POST['numero_proyecto'];
header('Location: /cotizacion/html/main.php?template=proyecto&mode=new');
}else if($mode == "edit"){
//header('Location: /cotizacion/html/main.php?template=proyecto&mode=edit&numero_proyecto='.$numero_proyecto);
}else if($mode == "delete"){
//header('Location: /cotizacion/html/main.php?template=proyecto&mode=new');
}
}

}
*/
//$proveedor = new ProveedorManager($mode,$clave_sat,$values_proveedor);
//$cliente = new ClienteManager($mode,$clave_sat,$values_cliente);
//$bodega = new BodegaManager($mode,$clave_sat,$values_bodega);

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
  <body>


  		<img src="/var/www/html/cotizacion/html/images/logo6.png" style="width:200px;">
  	
  		<div  class="text-right"><h3>FOLIO: <?php echo $_GET['folio'];?></h3></div>


  		<center><h1><strong>ACTA DE ENTREGA</strong></h1></center>
  		
  		<p>La empresa de Electrosystems S. de R.L. de C.V., a los 13 dias del mes de <?php echo $mes;?> del <?php echo $year?>, hace entrega a la empresa de <?php echo $nombre; ?> de CV el
  			siguiente equipo solicitado con la PO: <?php echo $po_cliente;?>
  		</p>
  		
		<h4>No. Serie de Equipo</h4>
		
		<?php
		foreach ($values as $val) {
			echo $val."<br>";
		}

		?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

		__________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________<br>
		&nbsp;&nbsp;&nbsp;Persona que Entrega&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Persona que Recibe
		
		
		<br>
		<br>
		<br>
		<br>
		<br>
	<p style="font-size:9pt;">Electrosystems S. De R.L. De C.V., Calle Sembrador #1924, Col. Granero, Cd. Juarez Chih., C.P. 32690, RFC: ELE0509275V1, Tel. (656)623-0794</p>

  </body>
  </html>