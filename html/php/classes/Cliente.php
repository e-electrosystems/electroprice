<?php

//include 'Database.php';

class Cliente{

private $database=null;

function __construct(){
	global $database;
   $database = new Database();
}


public function addCliente($values){

global $database;
$recivido = date("Y-m-d",strtotime($values['recivido']));
$solicitado = date("Y-m-d",strtotime($values['solicitado']));

//$sql = "insert into cliente (numero_serie,nombre,po_cliente,recivido,solicitado,folio) values(?,?,?,?,?,?);";
$sql = "insert into cliente (numero_serie,nombre,po_cliente,recivido,solicitado,folio) values(?,?,?,?,?,?);";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("sssssi",$values['numero_serie'],$values['nombre'],$values['po_cliente'],$recivido,$solicitado,$values['folio']);
$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}


return "Algun equipo contiene la clave sat establecida";

}

public function updateCliente($values,$clave_sat){
global $database;

$recivido = date("Y-m-d",strtotime($values['recivido']));
$solicitado = date("Y-m-d",strtotime($values['solicitado']));

$sql = "update cliente set clave_sat=?,nombre=?,po_cliente=?,recivido=?,solicitado=? where clave_sat=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ssssss",$values['clave_sat'],$values['nombre'],$values['po_cliente'],$recivido,$solicitado,$clave_sat);
$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";
}

}

public function deleteCliente($numero_serie){
global $database;
$sql = "delete from cliente where numero_serie=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("s",$numero_serie);
$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}

}

public function deleteClienteProyecto($numero_proyecto){
global $database;
$sql = "delete from cliente where numero_proyecto=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("s",$numero_proyecto);
$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}

}


public function selectCliente($clave_sat){
global $database;
$sql = "select * from cliente where clave_sat='$clave_sat';";
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

public function selectClienteProyecto($numero_proyecto){
global $database;
$sql = "select * from cliente where numero_proyecto='$numero_proyecto';";
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

public function selectAllCliente($sort){
global $database;

if($sort == "default"){
	$sql = "select * from cliente;";
}else{
	$sql = "select * from cliente order by ".$sort.";";
	
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


/*$cliente = new Cliente();
$values = array('numero_serie'=> '1234erf',
				'nombre' => 'nombre',
				'po_cliente' => 'hfi0264hs',
				'recivido' => date('m/d/Y'),
				'solicitado' => date('m/d/Y'),
				'folio' => 2341234);

$cliente->deleteCliente('0123456');
$cliente->addCliente($values);
$cliente->updateCliente($values,'0123456');

print_r($cliente->selectAllCliente());*/


?>
