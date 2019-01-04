<?php

include '/var/www/html/cotizacion/html/php/classes/Herramienta.php';

class HerramientaView{

private $herramienta = null; 

function __construct(){
	global $herramienta;
	$herramienta=new Herramienta();
}

public function newForm(){

echo <<<EOT
  	<div class="form-group">
    <label for="codigo_barra">Codigo de Barra</label>
    <input type="text" class="form-control" id="codigo_barra" name="codigo_barra" placeholder="Codigo de Barra">
  	</div>
  	<div class="form-group">
    <label for="tipo">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
  	</div>
  	<div class="form-group">
    <label for="fecha_entrada">Fecha de Entrada</label>
    <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" placeholder="Fecha de Entrada">
  	</div>
  	<div class="form-group">
    <label for="fecha_salida">Fecha de Salida</label>
    <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" placeholder="Fecha de Salida">
  	</div>
EOT;

}

public function editForm($codigo_barra){
	global $herramienta;
  $herramienta=new Herramienta();

  $values = $herramienta->selectHerramienta($codigo_barra);


if($values != null){
while ($row = $values->fetch_assoc()) {
   $codigo_barra = "<div class='form-group'>
    <label for='codigo_barra'>Codigo de Barra</label>
    <input disabled type='text' class='form-control' id='codigo_barra' name='codigo_barra' value=$row[codigo_barra] placeholder='Codigo de Barra'>
    </div>";

    $nombre = "<div class='form-group'>
    <label for='nombre'>Nombre</label>
    <input type='text' class='form-control' id='nombre' name='nombre' value=$row[nombre] placeholder='Nombre'>
    </div>";

    $fecha_entrada = "<div class='form-group'>
    <label for='fecha_entrada'>Fecha de Entrada</label>
    <input type='date' class='form-control' id='fecha_entrada' name='fecha_entrada' value=$row[fecha_entrada] placeholder='Fecha de Entrada'>
    </div>";

    $fecha_salida = "<div class='form-group'>
    <label for='fecha_salida'>Fecha de Salida</label>
    <input type='date' class='form-control' id='fecha_salida' name='fecha_salida' value=$row[fecha_salida] placeholder='Fecha de Salida'>
    </div>";

  if($row['codigo_barra'] == null){
    $codigo_barra = "<div class='form-group'>
    <label for='codigo_barra'>Codigo de Barra</label>
    <input disabled type='text' class='form-control' id='codigo_barra' name='codigo_barra' placeholder='Codigo de Barra'>
    </div>";

  }

  if($row['nombre'] == null){
    $nombre = "<div class='form-group'>
    <label for='nombre'>Nombre</label>
    <input type='text' class='form-control' id='nombre' name='nombre' placeholder='Nombre'>
    </div>";

  }

  if($row['fecha_entrada'] == null){
    $fecha_entrada = "<div class='form-group'>
    <label for='fecha_entrada'>Fecha de Entrada</label>
    <input type='date' class='form-control' id='fecha_entrada' name='fecha_entrada' placeholder='Fecha de Entrada'>
    </div>";

  }

  if($row['fecha_salida'] == null){
    $fecha_salida = "<div class='form-group'>
    <label for='fecha_salida'>Fecha de Salida</label>
    <input type='date' class='form-control' id='fecha_salida' name='fecha_salida' placeholder='Fecha de Salida'>
    </div>";

  }

	echo $codigo_barra.$nombre.$fecha_entrada.$fecha_salida;

}
}
}


public function printRecords($sort){

   global $herramienta;
   $herramienta=new Herramienta();
  $values = $herramienta->selectAllHerramienta($sort);
  if($values != null){
    $index = 0;

  echo "<div class='row alert e-alert-1'>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=codigo_barra'>Codigo de Barra</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=nombre'>Nombre</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=fecha_entrada'>Fecha de Entrada</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=fecha_salida'>Fecha de Salida</a></center></div></a>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=estado'>Estado</a></center></div></a>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=user_id'>Usuario</a></center></div></a>";
  echo "<div class='col-sm-1'><center><a href='#'>Eliminar</a></center></div>";
  
  echo "</div>";

  while ($row = $values->fetch_assoc()) {
  if(($index % 2) == 0){
  echo "<div class='row alert alert-light'>";

  }else{

    echo "<div class='row alert alert-secondary'>";
  }

  
  $codigo_barra = $row['codigo_barra'];
  echo "<div class='col-sm-2'>";
  echo "<center><a title='Editar Herramienta' href='#'>$row[codigo_barra]</a></center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['nombre']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['fecha_entrada']."</center>";
  echo "</div>";
  
  echo "<div class='col-sm-2'>";
  echo "<center>".$row['fecha_salida']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['estado']."</center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['user_id']."</center>";
  echo "</div>";


  echo "<div class='col-sm-1'>";
  echo "<center><a href='/cotizacion/html/php/managers/HerramientaManagerView.php?mode=delete&codigo_barra=$codigo_barra'><h4><strong>X</strong></h4></a></center>";
  echo "</div>";


  echo "</div>";   

  $index=$index+1; 

}


}



}


public function printRecordsUser($sort,$user_id){

   global $herramienta;
   $herramienta=new Herramienta();
  $values = $herramienta->selectAllUserHerramienta($sort,$user_id);
  if($values != null){
    $index = 0;

  echo "<div class='row alert e-alert-1'>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=codigo_barra&user_id=$user_id'>Codigo de Barra</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=nombre&user_id=$user_id'>Nombre</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=fecha_entrada&user_id=$user_id'>Fecha de Entrada</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=fecha_salida&user_id=$user_id'>Fecha de Salida</a></center></div></a>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=estado&user_id=$user_id'>Estado</a></center></div></a>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=herramienta&sort=user_id&user_id=$user_id'>Usuario</a></center></div></a>";
  echo "<div class='col-sm-2'><center>Eliminar</center></div>";
  
  echo "</div>";

  while ($row = $values->fetch_assoc()) {
  if(($index % 2) == 0){
  echo "<div class='row alert alert-light'>";

  }else{

    echo "<div class='row alert alert-secondary'>";
  }

  
  $codigo_barra = $row['codigo_barra'];
  echo "<div class='col-sm-2'>";
  echo "<center><a title='Editar Herramienta' href='/cotizacion/html/main.php?template=herramienta&mode=edit&codigo_barra=$row[codigo_barra]'>$row[codigo_barra]</a></center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['nombre']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['fecha_entrada']."</center>";
  echo "</div>";
  
  echo "<div class='col-sm-2'>";
  echo "<center>".$row['fecha_salida']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['estado']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['user_id']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center><a href='php/managers/Manager.php?template=herramienta&mode=delete&codigo_barra=$codigo_barra'>x</a></center>";
  echo "</div>";


  echo "</div>";   

  $index=$index+1; 

}


}



}


}


?>
