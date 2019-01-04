<?php

include '/var/www/html/cotizacion/html/php/classes/Herramienta.php';

class HerramientaManager{

function managerHerramienta($mode,$codigo_barra,$values){
$alert = false;

$herramienta = new Herramienta();

if($mode == "new"){
$res = $herramienta->addHerramienta($values);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=new');

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$values['clave_sat']);

}
}else if($mode == "edit"){
$res = $herramienta->updateHerramienta($values,$codigo_barra);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);
}


}else if($mode == "delete"){
$res = $herramienta->deleteHerramienta($codigo_barra);
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

