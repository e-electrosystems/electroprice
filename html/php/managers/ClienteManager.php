<?php
include '/var/www/html/cotizacion/html/php/classes/Cliente.php';

class ClienteManager{

function managerCliente($mode,$numero_serie,$values){

$alert = false;

$cliente = new Cliente();

if($mode == "new"){
$res = $cliente->addCliente($values);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=new');

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$values['clave_sat']);

}
}else if($mode == "edit"){
$res = $cliente->updateCliente($values,$clave_sat);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);
}

}else if($mode == "delete"){
$res = $cliente->deleteCliente($numero_serie);
if($res != null){
$alert = false;
}else{
$alert = true;
}
	




}

return $alert;

}
}



?>
