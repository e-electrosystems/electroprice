<?php

//include 'Database.php';

class Bodega{

private $database=null;

function __construct(){
	global $database;
   $database = new Database();
}


public function addBodega($values){

global $database;

$recivido = date("Y-m-d",strtotime($values['recivido']));
$sql = "insert into bodega (numero_serie,nombre,recivido) values(?,?,?);";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("sss",$values['numero_serie'],$values['nombre'],$recivido);

$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}


return "Algun equipo contiene la clave sat establecida";

}

public function updateBodega($values,$numero_serie){
global $database;

$recivido = date("Y-m-d",strtotime($values['recivido']));
$sql = "update bodega set numero_serie=?,nombre=?,recivido=? where clave_sat=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ssss",$values['numero_serie'],$values['nombre'],$recivido,$clave_sat);
$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";
}

}

public function deleteBodega($numero_serie){
global $database;
$sql = "delete from bodega where numero_serie=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("s",$clave_sat);
$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}

}

public function selectBodega($numero_serie){
global $database;
$sql = "select * from bodega where numero_serie='$numero_serie';";
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

public function selectAllBodega(){
global $database;
$sql = "select * from bodega;";
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

/*$bodega = new Bodega();
$values = array('clave_sat'=> '0123456',
				'nombre' => 'nombre test',
				'po_cliente' => 'hfi0264hs',
				'recivido' => date('m/d/Y'),
				'solicitado' => date('m/d/Y'));

$bodega->deleteBodega('0123456');
$bodega->addBodega($values);
$bodega->updateBodega($values,'0123456');

print_r($bodega->selectBodega('0123456'));*/

?>
