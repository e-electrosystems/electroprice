<?php

//session_start();
//unset($_SESSION['alert']);

include '/var/www/html/cotizacion/html/php/managers/HerramientaManager.php';

$mode=$_GET["mode"];
$codigo_barra = null;

echo $mode;


if ($mode == "new"){
$codigo_barra = strtoupper($_POST["codigo_barra"]);
}else if($mode == "edit" || $mode == "delete"){
$codigo_barra = strtoupper($_GET["codigo_barra"]);
}else if($mode == "search"){
$user_id = $_POST['user_id'];
header('Location: /cotizacion/html/herramienta/records.php?sort=default&user_id='.$user_id);

}



$values_herramienta = array(
				'codigo_barra' => $codigo_barra,
				'nombre' => strtoupper($_POST['tool_name'])
				);

$herramienta = new HerramientaManager();

$herramienta->managerHerramienta($mode,$codigo_barra,$values_herramienta);


if($mode == "new"){


if($herramienta){
echo $codigo_barra;

header('Location: /cotizacion/html/herramienta/records.php?sort=default');

}
}else if($mode == "edit"){
if($herramienta){
header('Location: /cotizacion/html/herramienta/records.php?sort=default');
}

}else if($mode == "delete"){

header('Location: /cotizacion/html/herramienta/records.php?sort=default');
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
