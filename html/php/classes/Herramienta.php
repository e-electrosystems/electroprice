<?php
include 'Database.php';

class Herramienta{

private $database=null;

function __construct(){
	global $database;
   $database = new Database();
}

public function addHerramienta($values){

global $database;

//if($this->selectHerramienta($values['codigo_barra']) == null){
//$fecha_entrada = date("Y-m-d",strtotime($values['fecha_entrada']));
//$fecha_salida = date("Y-m-d",strtotime($values['fecha_salida']));
$estado =0;

$sql = "insert into herramienta (codigo_barra,nombre,estado) values(?,?,?);";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("isi", $values['codigo_barra'],$values['nombre'],$estado);

$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}
//}

return "Alguna herramienta contiene el numero de serie";

}

public function updateHerramienta($values,$codigo_barra){
global $database;

$fecha_entrada = date("Y-m-d",strtotime($values['fecha_entrada']));
$fecha_salida = date("Y-m-d",strtotime($values['fecha_salida']));

$sql = "update herramienta set codigo_barra=?,nombre=?,fecha_entrada=?,fecha_salida=?,estado=? where numero_serie=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("issssi",$values['codigo_barra'],$values['nombre'],$values['fecha_entrada'],$values['fecha_salida'],$values['estado'],$codigo_barra);

$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";

}

}

public function deleteHerramienta($codigo_barra){
global $database;
$sql = "delete from herramienta where codigo_barra=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("i",$codigo_barra);
$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}

}

public function selectHerramienta($codigo_barra){
global $database;
$sql = "select * from herramienta where codigo_barra='$codigo_barra';";
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


public function selectAllHerramienta($sort){
global $database;

if($sort == "default"){
	$sql = "select * from herramienta;";
}else{
	$sql = "select * from herramienta order by ".$sort.";";
	
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

public function selectAllUserHerramienta($sort,$user_id){
global $database;

if($sort == "default"){
	$sql = "select * from herramienta where user_id=".$user_id.";";
}else{
	$sql = "select * from herramienta where user_id=".$user_id." order by ".$sort.";";
	
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



//$equipo = new Equipo();

/*$values = array('clave_sat' => "123456",
				'numero_serie' => "123456",
				'modelo' => "modelo",
				'marca' => "marca",
				'tipo' => "tipo",
				'costo_lista' => 50,
				'costo_real' => 50,
				'factura' => 0);
*/
/*$res = $equipo->selectAllEquipo();
print_r($res);*/
?>



