<?php

require '/var/www/html/cotizacion/html/php/classes/Cliente.php';
class RecordView{
	
private $records = null; 


function __construct(){
	global $records;
	$records=new Cliente();
}



}


?>
