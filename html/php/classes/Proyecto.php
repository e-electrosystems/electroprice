<?php

include 'Database.php';

class Proyecto{

private $database=null;

function __construct(){
	global $database;
   $database = new Database();
}


public function addProyecto($values){

global $database;
$fecha_instalacion = date("Y-m-d",strtotime($values['fecha_instalacion']));

$sql = "insert into proyecto (descripcion,tiempo_entrega,fecha_instalacion,tipo_viaje,personal,tipo_instalacion,tipo_paquete,subtotal,cargo_unico,unidades) values(?,?,?,?,?,?,?,?,?,?);";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ssssissiii",$values['descripcion'],$values['tiempo_entrega'],$fecha_instalacion,$values['tipo_viaje'],$values['personal'],$values['tipo_instalacion'],$values['tipo_paquete'],$values['subtotal'],$values['cargo_unico'],$values['unidades']);

$stmt->execute();
$last_id =  $stmt->insert_id;
$stmt->close();



$con->close();

return $last_id;

}else{
return "Error al conectarse con la base de datos";

}

}

public function updateProyecto($values,$numero_proyecto){
global $database;

$fecha_instalacion = date("Y-m-d",strtotime($values['fecha_instalacion']));


$sql = "update proyecto set descripcion=?,tiempo_entrega=?,fecha_instalacion=?,tipo_viaje=?,personal=?,tipo_instalacion=?,tipo_paquete=?,subtotal=?,cargo_unico=?,unidades=? where numero_proyecto=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ssssissiiii",$values['descripcion'],$values['tiempo_entrega'],$values['fecha_instalacion'],$values['tipo_viaje'],$values['personal'],$values['tipo_instalacion'],$values['tipo_paquete'],$values['subtotal'],$values['cargo_unico'],$values['unidades'],$numero_proyecto);
$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";
}

}

public function deleteProyecto($numero_proyecto){
global $database;
$sql = "delete from proyecto where numero_proyecto=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("i",$numero_proyecto);
$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}

}

public function selectProyecto($numero_proyecto){
global $database;
$sql = "select * from proyecto where numero_proyecto=$numero_proyecto;";
$con = $database->createConnection();
if($con != null){
$result=$con->query($sql);

if($result->num_rows > 0){
return $result;

}else{

	return null;
}

}
$con->close();

}

public function selectLastRecord(){
global $database;
$sql = "select numero_proyecto from proyecto order by numero_proyecto desc limit 1;";
$con = $database->createConnection();

if($con != null){
$result=$con->query($sql);

if($result->num_rows > 0){
return $result;

}else{

	return null;
}

}
$con->close();

}



public function selectAllProyecto($sort){
global $database;

if($sort == "default"){
	$sql = "select * from proyecto;";
}else{
	$sql = "select * from proyecto order by ".$sort.";";
	
}
$con = $database->createConnection();

if($con != null){
$result=$con->query($sql);


if($result->num_rows > 0){
return $result;

}else{

	return null;
}


}
$con->close();
}
}


//$proyecto = new Proyecto();
//print_r($proyecto->selectAllProyecto('default'));
/*$values = array('descripcion'=> 'descripcion',
				'tiempo_entrega' => '2 semanas',
				'fecha_instalacion' => date('m/d/Y'),
				'tipo_viaje' => 'local',
				'personal' => 10,
				'tipo_instalacion' => 'recurrente',
				'tipo_paquete' => 'telefonia',
				'subtotal' => 300,
				'cargo_unico' => 700,
				'unidades' => 50);

$values_update = array('descripcion'=> 'descripcion updated',
				'tiempo_entrega' => '5 semanas',
				'fecha_instalacion' => date('m/d/Y'),
				'tipo_viaje' => 'locales',
				'personal' => 10,
				'tipo_instalacion' => 'recurrente',
				'tipo_paquete' => 'internet',
				'subtotal' => 500,
				'cargo_unico' => 800,
				'unidades' => 100);*/

//$proyecto->deleteProyecto('100');

//print_r($proyecto->selectLastRecord());
//print_r($proyecto->selectAllProyecto('default'));

//$proyecto->addProyecto($values);				
//$proyecto->updateProyecto($values_update,100);
/*$proyecto->deleteProyecto('0123456');
*/


?>
