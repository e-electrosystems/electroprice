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
$codigo_barra = $_GET['barcode'];
$estado=false;
$date =  date("Y-m-d h:i:s");



//echo $_GET["user_id"];
//echo $codigo_barra;

$sql = "select estado from herramienta where codigo_barra='$codigo_barra';";
$result=$con->query($sql);

if($result->num_rows > 0){
//return $result;
 while ($row = $result->fetch_assoc()) {
 	echo $row['estado'];

 	if($row['estado'] == null || $row['estado'] == 0){
 		$estado = 1;

 	}else{
 		$estado = 0;
 	}

 }



}

echo $estado;

if($estado == 1){

$sql = "update herramienta set user_id=?,estado=?,fecha_salida=? where codigo_barra=?;";

$stmt = $con->prepare($sql);
$stmt->bind_param("iisi",$_GET['user_id'],$estado,$date,$_GET['barcode']);
$stmt->execute();
$stmt->close();
$con->close();
}else{

	$sql = "update herramienta set user_id=?,estado=?,fecha_entrada=? where codigo_barra=?;";

$stmt = $con->prepare($sql);
$stmt->bind_param("iisi",$_GET['user_id'],$estado,$date,$_GET['barcode']);
$stmt->execute();
$stmt->close();
$con->close();
}
//}
//}



echo $_GET['barcode'];
}

?>
