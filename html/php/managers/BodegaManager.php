<?php

class BodegaManager{

function managerBodega($mode,$numero_serie,$values){
$alert = false;

include '/var/www/html/cotizacion/html/php/classes/Bodega.php';

$bodega = new Bodega();

if($mode == "new"){
$res = $bodega->addBodega($values);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=new');

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$values['clave_sat']);

}
}else if($mode == "edit"){
$res = $bodega->updateBodega($values,$numero_serie);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);
}

}else if($mode == "delete"){
$res = $bodega->deleteBodega($numero_serie);
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
