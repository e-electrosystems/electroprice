<?php

//session_start();
//unset($_SESSION['alert']);

include '/var/www/html/cotizacion/html/php/managers/EquipoManager.php';
include '/var/www/html/cotizacion/html/php/managers/ProveedorManager.php';
include '/var/www/html/cotizacion/html/php/managers/ClienteManager.php';
include '/var/www/html/cotizacion/html/php/managers/BodegaManager.php';


$mode=$_GET["mode"];
$numero_serie = null;

echo $mode;


if ($mode == "new"){
$numero_serie = strtoupper($_POST["numero_serie"]);
}else if($mode == "edit" || $mode == "delete"){
$numero_serie = strtoupper($_GET["numero_serie"]);
}

$factura = null;
$dll = null;
$mx = null;

if($_POST['factura'] == null){
$factura = 0;
}else if($_POST['factura'] == 0) {
$factura = 1;
}

if($_POST['dll'] == null){
$dll = 0;
}else if($_POST['dll'] == 0) {
$dll = 1;
}

if($_POST['mx'] == null){
$mx = 0;
}else if($_POST['mx'] == 0) {
$mx = 1;
}


echo $dll;
echo $mx;


$values_equipo = array(
				'numero_serie' => strtoupper($_POST['numero_serie']),
				'modelo' => strtoupper($_POST['modelo']),
				'marca' => strtoupper($_POST['marca']),
				'tipo' => strtoupper($_POST['tipo']),
				'costo_lista' => strtoupper($_POST['costo_lista']),
				'costo_real' => strtoupper($_POST['costo_real']),
				'factura' => strtoupper($factura),
				'descripcion' => strtoupper($_POST['descripcion']),
				'dll' => $dll,
				'mx' => $mx
				);

$values_proveedor = array('numero_serie' => $numero_serie,
						  'nombre' => strtoupper($_POST['nombre_proveedor']), 
						  'status' => strtoupper($_POST['status']),
						  'recivido' => strtoupper($_POST['recivido_proveedor']));


$values_bodega =  array('numero_serie' => $numero_serie,
						'nombre' => strtoupper($_POST['nombre_bodega']),
						'recivido' => strtoupper($_POST['recivido_bodega']));





$equipo = new EquipoManager();
$proveedor = new ProveedorManager();
$bodega = new BodegaManager();


$equipo->managerEquipo($mode,$numero_serie,$values_equipo);
$proveedor->managerProveedor($mode,$numero_serie,$values_proveedor);
$bodega->managerBodega($mode,$numero_serie,$values_bodega);

if($mode == "new"){


if($equipo && $proveedor && $bodega){


header('Location: /cotizacion/html/equipo/edit.php?numero_serie='.$numero_serie);

}
}else if($mode == "edit"){
if($equipo && $proveedor && $bodega){


header('Location: /cotizacion/html/equipo/edit.php?numero_serie='.$numero_serie);

}

}else if($mode == "delete"){

header('Location: /cotizacion/html/equipo/records.php?sort=default');

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
