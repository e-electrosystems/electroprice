<?php
include 'Database.php';

class Equipo{

private $database=null;

function __construct(){
	global $database;
   $database = new Database();
}

public function addEquipo($values){

global $database;

if($this->selectEquipo($values['numero_serie']) == null){

$sql = "insert into equipo (numero_serie,modelo,marca,tipo,costo_lista,costo_real,factura,descripcion,dll,mx) values(?,?,?,?,?,?,?,?,?,?);";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ssssssisii",$values['numero_serie'],$values['modelo'],$values['marca'],$values['tipo'],$values['costo_lista'],$values['costo_real'],$values['factura'],$values['descripcion'],$values['dll'],$values['mx']);

$stmt->execute();
$stmt->close();
$con->close();
return null;

}else{
return "Error al conectarse con la base de datos";

}
}

return "Algun equipo contiene la clave sat establecida";

}

public function updateEquipo($values,$numero_serie){
global $database;

$sql = "update equipo set numero_serie=?,modelo=?,marca=?,tipo=?,costo_lista=?,costo_real=?,factura=?,descripcion=?,dll=?,mx=? where numero_serie=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ssssssisiis",$values['numero_serie'],$values['modelo'],$values['marca'],$values['tipo'],$values['costo_lista'],$values['costo_real'],$values['factura'],$values['descripcion'],$values['dll'],$values['mx'],$numero_serie);
$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";

}

}


public function updateEquipoFactura($numero_serie,$cliente,$factura){

global $database;

$sql = "update equipo set cliente=?,factura=? where numero_serie=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("sis",$cliente,$factura,$numero_serie);
$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";

}


}


public function deleteEquipo($numero_serie){
global $database;
$sql = "delete from equipo where numero_serie=?;";
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

public function selectEquipo($numero_serie){
global $database;
$sql = "select * from equipo where numero_serie='$numero_serie';";
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

public function selectAllEquipo(){
global $database;
$sql = "select * from equipo;";
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

public function selectAllEquipoFactura(){
global $database;
$sql = "select * from equipo where factura=0;";
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



public function insertImagen($clave_sat,$url){
global $database;

$sql = "update equipo set url=? where clave_sat=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("ss",$values['url'],$clave_sat);
$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";

}


}
public function uploadImage($image,$clave_sat){
	$url = "images/";

	$allow = array("jpg", "jpeg", "gif", "png");

$todir = $url;

if ( !!$_FILES['file']['tmp_name'] ) // is the file uploaded yet?
{
    $info = explode('.', strtolower( $_FILES['file']['name']) ); // whats the extension of the file

    if ( in_array( end($info), $allow) ) // is this file allowed
    {

    	$file_path =  $todir . basename($_FILES['file']['name'] );
        if ( move_uploaded_file( $_FILES['file']['tmp_name'], $todir . basename($_FILES['file']['name'] ) ) )
        {
            return null;// the file has been moved correctly
        }
    }
    else
    {
    	return "image cannot be uploaded";
        // error this file ext is not allowed
    }
}


}

public function updateProyecto($numero_proyecto,$clave_sat){
global $database;

$sql = "update equipo set numero_proyecto=? where clave_sat=?;";
$con = $database->createConnection();
if($con != null){
$stmt = $con->prepare($sql);
$stmt->bind_param("is",$numero_proyecto,$clave_sat);
$stmt->execute();
$stmt->close();
$con->close();
return null;
}else{

return "Error al conectarse con la base de datos";

}

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
