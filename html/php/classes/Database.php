<?php

class Database{

public function createConnection(){
$con = new mysqli("localhost","root","ldgceaegn","cotizacion");

if($con->connect_error){
return null;

}
return $con;
}

}
?>
