<?php
include '/var/www/html/cotizacion/html/php/classes/Bodega.php';

class BodegaView{

private $bodega = null; 

function __construct(){
	global $bodega;
	$bodega=new Bodega();
}

public function newForm(){

echo <<<EOT
  	<div class="form-group">
    <label for="nombre_bodega">Nombre</label>
    <input type="text" class="form-control" id="nombre_bodega" name="nombre_bodega" placeholder="Nombre">

  	</div>
  	<div class="form-group">
    <label for="recivido_bodega">Fecha de Recivido</label>
    <input type="date" class="form-control" id="recivido_bodega" name="recivido_bodega" placeholder="Fecha de Recivido">
  	</div>
EOT;

}

public function editForm($numero_serie){
	global $bodega;
  $bodega=new Bodega();

  $values = $bodega->selectBodega($numero_serie);


if($values != null){
while ($row = $values->fetch_assoc()) {
    $nombre = "<div class='form-group'>
    <label for='nombre_bodega'>Nombre</label>
    <input type='text' class='form-control' id='nombre_bodega' name='nombre_bodega' value=$row[nombre] placeholder='Nombre'>
    </div>";
    $recivido = "<div class='form-group'>
    <label for='recivido_bodega'>Fecha de Recivido</label>
    <input type='date' class='form-control' id='recivido_bodega' name='recivido_bodega' value=$row[recivido] placeholder='Fecha de Recivido'>
    </div>";

  if($row['nombre'] == null){
    $nombre = "<div class='form-group'>
    <label for='nombre_bodega'>Nombre</label>
    <input type='text' class='form-control' id='nombre_bodega' name='nombre_bodega' placeholder='Nombre'>
    </div>";

  }

  if($row['recivido'] == null){
    $recivido = "<div class='form-group'>
    <label for='recivido_bodega'>Fecha de Recivido</label>
    <input type='date' class='form-control' id='recivido_bodega' name='recivido_bodega' placeholder='Fecha de Recivido'>
    </div>";

  }

	echo $nombre.$recivido;

}
}
}
}

/*$bodega = new BodegaView();
$bodega->newForm();
$bodega->editForm('0123456');*/


?>
