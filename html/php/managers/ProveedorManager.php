<?php

include '/var/www/html/cotizacion/html/php/classes/Proveedor.php';

class ProveedorManager{

function managerProveedor($mode,$numero_serie,$values){

$alert = false;

$proveedor = new Proveedor();

if($mode == "new"){
$res = $proveedor->addProveedor($values);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=new');

}else{
$alert = true;

//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$values['clave_sat']);

}
}else if($mode == "edit"){
$res = $proveedor->updateProveedor($values,$numero_serie);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);
}

}else if($mode == "delete"){
$res = $proveedor->deleteProveedor($numero_serie);
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
