<?php
//include 'Database.php';

class Proveedor{

private $database=null;

function __construct(){
	global $database;
   $database = new Database();
}


public function addProveedor($values){

global $database;
$date = date("Y-m-d",strtotime($values['recivido']));

$sql = "insert into proveedor (numero_serie,nombre,status,recivido) values(?,?,?,?);";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ssss",$values['numero_serie'],$values['nombre'],$values['status'],$date);

$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}


return "Algun equipo contiene la clave sat establecida";

}

public function updateProveedor($values,$numero_serie){

global $database;
$date = date("Y-m-d",strtotime($values['recivido']));
$sql = "update proveedor set numero_serie=?,nombre=?,status=?,recivido=? where numero_serie=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("sssss",$values['numero_serie'],$values['nombre'],$values['status'],$date,$numero_serie);
$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";
}

}

public function deleteProveedor($numero_serie){
global $database;
$sql = "delete from proveedor where numero_serie=?;";
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

public function selectProveedor($numero_serie){
global $database;
$sql = "select * from proveedor where numero_serie='$numero_serie';";
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

public function selectAllProveedor(){
global $database;
$sql = "select * from proveedor;";
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

/*$proveedor = new Proveedor();
$values = array('clave_sat'=> '0123456',
				'nombre' => 'nombre',
				'status' => 'pendinte',
				'recivido' => date('m/d/Y'));

$proveedor->addProveedor($values);

print_r($proveedor->selectProveedor('0123456'));*/


?>
