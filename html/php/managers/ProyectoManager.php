<?php

include '/var/www/html/cotizacion/html/php/classes/Proyecto.php';

class ProyectoManager{

function managerProyecto($mode,$numero_proyecto,$values){
$alert = false;

$proyecto = new Proyecto();

if($mode == "new"){
$res = $proyecto->addProyecto($values);
return $res;
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=new');

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$values['clave_sat']);

}
}else if($mode == "edit"){
$res = $proyecto->updateProyecto($values,$numero_proyecto);
if($res != null){
$alert = false;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);

}else{
$alert = true;
//header('Location: /cotizacion/html/index.php?template=equipo&mode=edit&clave_sat='.$clave_sat);
}


}else if($mode == "delete"){
$res = $proyecto->deleteProyecto($numero_proyecto);
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
