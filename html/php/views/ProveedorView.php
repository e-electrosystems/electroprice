<?php
include '/var/www/html/cotizacion/html/php/classes/Proveedor.php';

class ProveedorView{

private $proveedor = null; 

function __construct(){
	global $proveedor;
	$proveedor=new Proveedor();
}

public function newForm(){

echo <<<EOT
  	<div class="form-group">
    <label for="nombre_proveedor">Nombre</label>
    <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" placeholder="Nombre">

  	</div>
  	<div class="form-group">
    <label for="status">Status</label>
    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
  	</div>
  	<div class="form-group">
    <label for="recivido_proveedor">Fecha de Recivido</label>
    <input type="date" class="form-control" id="recivido_proveedor" name="recivido_proveedor" placeholder="Fecha de Recivido">
  	</div>
EOT;

}

public function editForm($numero_serie){
	global $proveedor;
  $proveedor=new Proveedor();

  $values = $proveedor->selectProveedor($numero_serie);


if($values != null){
while ($row = $values->fetch_assoc()) {
    $nombre = "<div class='form-group'>
    <label for='nombre_proveedor'>Nombre</label>
    <input type='text' class='form-control' id='nombre_proveedor' name='nombre_proveedor' value=$row[nombre] placeholder='Nombre'>
    </div>";

    $status = "<div class='form-group'>
    <label for='status'>Status</label>
    <input type='text' class='form-control' id='status' name='status' value=$row[status] placeholder='Status'>
    </div>";

    $recivido = "<div class='form-group'>
    <label for='recivido_proveedor'>Fecha de Recivido</label>
    <input type='date' class='form-control' id='recivido_proveedor' name='recivido_proveedor' value=$row[recivido] placeholder='Fecha de Recivido'>
    </div>";

  if($row['nombre'] == null){
    $nombre = "<div class='form-group'>
    <label for='nombre'>Nombre</label>
    <input type='text' class='form-control' id='nombre_proveedor' name='nombre_proveedor' placeholder='Nombre'>
    </div>";

  }

  if($row['status'] == null){
    $status = "<div class='form-group'>
    <label for='status'>Status</label>
    <input type='text' class='form-control' id='stat]' name='status' placeholder='Status'>
    </div>";

  }

  if($row['recivido'] == null){
    $recivido = "<div class='form-group'>
    <label for='recivido_proveedor'>Fecha de Recivido</label>
    <input type='date' class='form-control' id='recivido_proveedor' name='recivido_proveedor' placeholder='Fecha de Recivido'>
    </div>";

  }

	echo $nombre.$status.$recivido;

}
}
}
}

/*
$proveedor = new ProveedorView();
$proveedor->newForm();
$proveedor->editForm('0123456');
*/
?>
