<?php

$con = new mysqli("localhost","root","ldgceaegn","cotizacion");

if($con->connect_error){
die($con->connect_error);
}else{


//include 'php/classes/Database.php';


//if(isset($_GET["user_id"]) && isset($_GET["barcode"])){

/*$con = new mysqli("localhost","root","ldgceaegn","cotizacion");
if($con->connect_error){
echo "Error";
}else{
echo "connected";*/

$codigo_barra = (int)$_GET["codigo_barra"];
$name = strtoupper((string)$_GET["nombre"]);
$estado = 0;

echo "test";

$sql = "insert into herramienta (codigo_barra,nombre,estado) values(?,?,?);";

$stmt = $con->prepare($sql);
$stmt->bind_param("isi",$codigo_barra,$name,$estado);
$stmt->execute();
$stmt->close();
$con->close();
//}
//}



//echo $_GET['barcode'];
}


?>
