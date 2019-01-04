<?php
include '/var/www/html/cotizacion/html/php/classes/Cliente.php';

class ClienteView{

private $cliente = null; 

function __construct(){
	global $cliente;
	$cliente=new Cliente();
}

public function newForm(){

echo <<<EOT
  	<div class="form-group">
    <label for="nombre_cliente">Nombre</label>
    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre" required>
  	</div>

  	<div class="form-group">
    <label for="po_cliente">Numero de Orden</label>
    <input type="text" class="form-control" id="po_cliente" name="po_cliente" placeholder="Numero de Orden" required>
  	</div>

  	<div class="form-group">
    <label for="recivido_cliente">Fecha de Recivido</label>
    <input type="date" class="form-control" id="recivido_cliente" name="recivido_cliente" placeholder="Fecha de Recivido" required>
  	</div>

  	<div class="form-group">
    <label for="solicitado_cliente">Fecha de Solicitud</label>
    <input type="date" class="form-control" id="solicitado_cliente" name="solicitado_cliente" placeholder="Fecha de Solicitud" required>
  	</div>
EOT;

}


public function editFormProyecto($numero_proyecto){
  global $cliente;
  $cliente=new Cliente();

  $values = $cliente->selectClienteProyecto($numero_proyecto);


if($values != null){
while ($row = $values->fetch_assoc()) {
    $nombre = "<div class='form-group'>
    <label for='nombre_cliente'>Nombre</label>
    <input type='text' class='form-control' id='nombre_cliente' name='nombre_cliente' value=$row[nombre] placeholder='Nombre'>
    </div>";

    $po_cliente = "<div class='form-group'>
    <label for='po_cliente'>Numero de Orden</label>
    <input type='text' class='form-control' id='po_cliente' name='po_cliente' value=$row[po_cliente] placeholder='Status'>
    </div>";

    $recivido = "<div class='form-group'>
    <label for='recivido_cliente'>Fecha de Recivido</label>
    <input type='date' class='form-control' id='recivido_cliente' name='recivido_cliente' value=$row[recivido] placeholder='Fecha de Recivido'>
    </div>";

    $solicitado = "<div class='form-group'>
    <label for='solicitado_cliente'>Fecha de Solicitud</label>
    <input type='date' class='form-control' id='solicitado_cliente' name='solicitado_cliente' value=$row[solicitado] placeholder='Fecha de Solicitud'>
    </div>";



  if($row['nombre'] == null){
    $nombre = "<div class='form-group'>
    <label for='nombre_cliente'>Nombre</label>
    <input type='text' class='form-control' id='nombre_cliente' name='nombre_cliente' placeholder='Nombre'>
    </div>";

  }

  if($row['po_cliente'] == ""){
    $status = "<div class='form-group'>
    <label for='po_cliente'>Numero de Orden</label>
    <input type='text' class='form-control' id='po_cliente' name='po_cliente' placeholder='Numero de Orden'>
    </div>";

  }

  if($row['recivido'] == null){
    $recivido = "<div class='form-group'>
    <label for='recivido_cliente'>Fecha de Recivido</label>
    <input type='date' class='form-control' id='recivido_cliente' name='recivido_cliente' placeholder='Fecha de Recivido'>
    </div>";

  }

   if($row['solicitado'] == null){
    $solicitado = "<div class='form-group'>
    <label for='solicitado_cliente'>Fecha de Solicitud</label>
    <input type='date' class='form-control' id='solicitado_cliente' name='solicitado_cliente' placeholder='Fecha de Solicitud'>
    </div>";

  }

  echo $nombre.$po_cliente.$recivido.$solicitado;

}
}
}

public function editForm($clave_sat){
	global $cliente;
  $cliente=new Cliente();

  $values = $cliente->selectCliente($clave_sat);


if($values != null){
while ($row = $values->fetch_assoc()) {
    $nombre = "<div class='form-group'>
    <label for='nombre_cliente'>Nombre</label>
    <input type='text' class='form-control' id='nombre_cliente' name='nombre_cliente' value=$row[nombre] placeholder='Nombre'>
    </div>";

    $po_cliente = "<div class='form-group'>
    <label for='po_cliente'>Numero de Orden</label>
    <input type='text' class='form-control' id='po_cliente' name='po_cliente' value=$row[po_cliente] placeholder='Status'>
    </div>";

    $recivido = "<div class='form-group'>
    <label for='recivido_cliente'>Fecha de Recivido</label>
    <input type='date' class='form-control' id='recivido_cliente' name='recivido_cliente' value=$row[recivido] placeholder='Fecha de Recivido'>
    </div>";

 	  $solicitado = "<div class='form-group'>
    <label for='solicitado_cliente'>Fecha de Solicitud</label>
    <input type='date' class='form-control' id='solicitado_cliente' name='solicitado_cliente' value=$row[solicitado] placeholder='Fecha de Solicitud'>
    </div>";



  if($row['nombre'] == null){
    $nombre = "<div class='form-group'>
    <label for='nombre_cliente'>Nombre</label>
    <input type='text' class='form-control' id='nombre_cliente' name='nombre_cliente' placeholder='Nombre'>
    </div>";

  }

  if($row['po_cliente'] == ""){
    $status = "<div class='form-group'>
    <label for='po_cliente'>Numero de Orden</label>
    <input type='text' class='form-control' id='po_cliente' name='po_cliente' placeholder='Numero de Orden'>
    </div>";

  }

  if($row['recivido'] == null){
    $recivido = "<div class='form-group'>
    <label for='recivido_cliente'>Fecha de Recivido</label>
    <input type='date' class='form-control' id='recivido_cliente' name='recivido_cliente' placeholder='Fecha de Recivido'>
    </div>";

  }

   if($row['solicitado'] == null){
    $solicitado = "<div class='form-group'>
    <label for='solicitado_cliente'>Fecha de Solicitud</label>
    <input type='date' class='form-control' id='solicitado_cliente' name='solicitado_cliente' placeholder='Fecha de Solicitud'>
    </div>";

  }

	echo $nombre.$po_cliente.$recivido.$solicitado;

}
}
}

public function printRecords($sort){

   global $cliente;
   $cliente=new Cliente();
  $values = $cliente->selectAllCliente($sort);
  if($values != null){
    $index = 0;

  echo "<div class='row alert e-alert-1'>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=equipo&sort=clave_sat'>Clave Sat</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=equipo&sort=nombre'>Nombre</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=equipo&sort=po_cliente'>Numero de Orden</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=equipo&sort=recivido'>Fecha de Recivido</a></center></div></a>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=equipo&sort=solicitado'>Fecha de Solicitud</a></center></div></a>";
  echo "</div>";

  while ($row = $values->fetch_assoc()) {
  if(($index % 2) == 0){
  echo "<div class='row alert alert-light'>";

  }else{

    echo "<div class='row alert alert-secondary'>";
  }

  
  echo "<div class='col-sm-2'>";
  echo "<center><a title='Editar Equipo' href='/cotizacion/html/main.php?template=equipo&mode=edit&clave_sat=$row[clave_sat]'>$row[clave_sat]</a></center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['nombre']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['po_cliente']."</center>";
  echo "</div>";
  
  echo "<div class='col-sm-2'>";
  echo "<center>".$row['recivido']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['solicitado']."</center>";
  echo "</div>";

  echo "</div>";   

  $index=$index+1; 

}


}



}


}


/*$cliente = new ClienteView();
$cliente->printRecords();
$cliente->newForm();
$cliente->editForm('0123456');*/

?>
