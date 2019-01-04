<?php

include '/var/www/html/cotizacion/html/php/classes/Equipo.php';

class EquipoManager{

function managerEquipo($mode,$numero_serie,$values){
$alert = false;

$equipo = new Equipo();

if($mode == "new"){
$res = $equipo->addEquipo($values);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=new');

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$values['clave_sat']);

}
}else if($mode == "edit"){
$res = $equipo->updateEquipo($values,$numero_serie);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);
}


}else if($mode == "delete"){
$res = $equipo->deleteEquipo($numero_serie);
if($res != null){
$alert = false;
}else{
$alert = true;
}

}else if($mode == "factura"){
$res = $equipo->updateEquipoFactura($numero_serie,$values,1);
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
