<?php

//include 'Database.php';

class User{

private $database=null;

function __construct(){
	global $database;
   $database = new Database();
}


public function addUser($values){

global $database;

$sql = "insert into user (nombre,apellido,user_id) values(?,?,?);";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ssi",$values['nombre'],$values['apellido'],$values['user_id']);

$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}


return "Algun usuario tiene el id asignado";

}

public function updateUser($values,$user_id){
global $database;

$sql = "update user set nombre=?,apellido=? where user_id=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ssi",$values['nombre'],$values['apellido'],$user_id);
$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";
}

}

public function deleteUser($user_id){
global $database;
$sql = "delete from user where user_id=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("i",$user_id);
$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}

}

public function selectUser($user_id){
global $database;
$sql = "select * from user where user_id='$user_id';";
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
$values = array('clave_sat'=> '0123456',
				'nombre' => 'nombre',
				'po_cliente' => 'hfi0264hs',
				'recivido' => date('m/d/Y'),
				'solicitado' => date('m/d/Y'));

$cliente->deleteCliente('0123456');
$cliente->addCliente($values);
$cliente->updateCliente($values,'0123456');

print_r($cliente->selectAllCliente());*/



?>
