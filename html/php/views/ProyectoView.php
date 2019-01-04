<?php

include '/var/www/html/cotizacion/html/php/classes/Proyecto.php';

class ProyectoView{

private $proyecto = null; 

function __construct(){
	global $proyecto;
	$proyecto=new Proyecto();
}

public function newForm(){
	global $proyecto;
	$proyecto=new Proyecto();

	/*$values = $proyecto->selectLastRecord();

	echo $values;

	if ($values != null){
		$row = $values->fetch_assoc();
		$val = $row['numero_proyecto']+1;
		echo "<div class='form-group'>
    		<label for='numero_proyecto'>Numero de Proyecto</label>
    		<input type='text' class='form-control' id='numero_proyecto' name='numero_proyecto' placeholder='Numero de Proyecto' value=$val disabled>
			</div>";

	}else{
		echo "<div class='form-group'>
    		<label for='numero_proyecto'>Numero de Proyecto</label>
    		<input type='text' class='form-control' id='numero_proyecto' name='numero_proyecto' placeholder='Numero de Proyecto' value=100 disabled>
			</div>";
	}*/


echo <<<EOT
  	
  	<div class="form-group">
    <label for="tiempo_entrega">Tiempo de Entrega</label>
    <input type="text" class="form-control" id="tiempo_entrega" name="tiempo_entrega" placeholder="Tiempo de Entrega">
  	</div>

  	<div class="form-group">
    <label for="fecha_instalacion">Fecha de Instalacion</label>
    <input type="date" class="form-control" id="fecha_instalacion" name="fecha_instalacion" placeholder="Fecha de Instalacion">
  	</div>

  	<div class="form-group">
    <label for="tipo_viaje">Tipo de Viaje</label>
    <select class="form-control" id="tipo_viaje" name="tipo_viaje" >
  	<option value="local">Local</option>
  	<option value="foraneo">Foraneo</option>
	</select>
  	</div>

  	<div class="form-group">
    <label for="personal">Personal</label>
    <input type="text" class="form-control" id="personal" name="personal" placeholder="Numero de Personal">
  	</div>

  	<div class="form-group">
    <label for="tipo_instalacion">Tipo de Instalacion</label>
    <select class="form-control" id="tipo_instalacion" name="tipo_instalacion" >
  	<option value="recurrente">Recurrente</option>
  	<option value="mensual">Mensual</option>
	</select>
  	</div>

  	<div class="form-group">
    <label for="tipo_paquete">Tipo de Paquete</label>
    <select class="form-control" id="tipo_paquete" name="tipo_paquete" >
  	<option value="internet">Internet</option>
  	<option value="telefonia">Telefonia</option>
  	<option value="internet/telefonia">Internet/Telefonia</option>
	</select>
  	</div>

  	<div class="form-group">
    <label for="subtotal">Subtotal</label>
    <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal">
  	</div>

  	<div class="form-group">
    <label for="cargo_unico">Cargo Unico</label>
    <input type="text" class="form-control" id="cargo_unico" name="cargo_unico" placeholder="Subtotal">
  	</div>

  	<div class="form-group">
    <label for="unidades">Unidades</label>
    <input type="text" class="form-control" id="unidades" name="Unidades" placeholder="Unidades">
  	</div>
  	
  	<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea rows="4" cols="50" class="form-control" id="descripcion" name="descripcion">
    Descripcion
    </textarea>
  	</div>

EOT;

}

public function printRecords($sort){

   global $proyecto;
   $proyecto=new Proyecto();
 

  $values = $proyecto->selectAllProyecto($sort);
 


  if($values != null){
    $index = 0;



  echo "<div class='row alert e-alert-1'>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=proyecto&sort=numero_proyecto'>Numero de Proyecto</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=proyecto&sort=fecha_entrega'>Fecha Instalacion</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=proyecto&sort=tipo_viaje'>Tipo de Viaje</a></center></div>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=proyecto&sort=tipo_instalacion'>Tipo de Instalacion</a></center></div></a>";
  echo "<div class='col-sm-2'><center><a href='/cotizacion/html/index.php?template=records&type=proyecto&sort=default'>Subtotal</a></center></div></a>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/index.php?template=records&type=proyecto&sort=default'>Cargo Unico</a></center></div></a>";
   echo "<div class='col-sm-1'><center>Eliminar</center></div>";
  echo "</div>";

  while ($row = $values->fetch_assoc()) {
  if(($index % 2) == 0){
  echo "<div class='row alert alert-light'>";

  }else{

    echo "<div class='row alert alert-secondary'>";
  }

  
  echo "<div class='col-sm-2'>";
  echo "<center><a title='Editar Proyecto' href='/cotizacion/html/main.php?template=proyecto&mode=edit&numero_proyecto=$row[numero_proyecto]'>$row[numero_proyecto]</a></center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['fecha_instalacion']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['tipo_viaje']."</center>";
  echo "</div>";
  
  echo "<div class='col-sm-2'>";
  echo "<center>".$row['tipo_instalacion']."</center>";
  echo "</div>";

  echo "<div class='col-sm-2'>";
  echo "<center>".$row['subtotal']."</center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['cargo_unico']."</center>";
  echo "</div>";

   echo "<div class='col-sm-1'>";
  echo "<center><a href='php/managers/Manager.php?template=proyecto&mode=delete&numero_proyecto=$row[numero_proyecto]'>X</a></center>";
  echo "</div>";

  echo "</div>";   

  $index=$index+1; 
}
}
}


public function editForm($numero_proyecto){
	global $proyecto;
  $proyecto=new Proyecto();

  $values = $proyecto->selectProyecto($numero_proyecto);


if($values != null){
while ($row = $values->fetch_assoc()) {
    $numero_proyecto = "<div class='form-group'>
    <label for='numero_proyecto'>Numero de Proyecto</label>
    <input type='text' class='form-control' id='numero_proyecto' name='numero_proyecto' value=$row[numero_proyecto] placeholder='Numero de Proyecto' disabled>
    </div>";

    $descripcion = "<div class='form-group'>
    <label for='descripcion'>Descripcion</label>
    <textarea rows='4' cols='50' class='form-control' id='descripcion' name='descripcion'>
    $row[descripcion]
    </textarea>
  	</div>";

    $tiempo_entrega = "<div class='form-group'>
    <label for='tiempo_entrega'>Tiempo de Entrega</label>
    <input type='text' class='form-control' id='tiempo_entrega' name='tiempo_entrega' value=$row[tiempo_entrega] placeholder='Tiempo de Entrega'>
    </div>";

    $fecha_instalacion = "<div class='form-group'>
    <label for='fecha_instalacion'>Fecha de Instalacion</label>
    <input type='date' class='form-control' id='fecha_instalacion' name='fecha_instalacion' value=$row[fecha_instalacion] placeholder='Fecha de Instalacion'>
    </div>";

    if($row['tipo_viaje'] == "local"){
    	 $tipo_viaje = "<div class='form-group'>
    	<label for='tipo_viaje'>Tipo de Viaje</label>
    	<select class='form-control' id='tipo_viaje' name='tipo_viaje' >
  		<option value=$row[tipo_viaje]>Local</option>
  		<option value='foraneo'>Foraneo</option>
		</select>
  		</div>";
    }else if($row['tipo_viaje'] == "foraneo"){
    	 $tipo_viaje = "<div class='form-group'>
    	<label for='tipo_viaje'>Tipo de Viaje</label>
    	<select class='form-control' id='tipo_viaje' name='tipo_viaje' >
  		<option value=$row[tipo_viaje]>Foraneo</option>
  		<option value='local'>Local</option>
		</select>
  		</div>";
    }


   

    $personal = "<div class='form-group'>
    <label for='personal'>Numero de Personal</label>
    <input type='text' class='form-control' id='personal' name='personal' value=$row[personal] placeholder='Numero de Personal'>
    </div>";


    if($row['tipo_instalacion'] == "recurrente"){
    	 $tipo_instalacion = "<div class='form-group'>
    <label for='tipo_instalacion'>Tipo de Instalacion</label>
    <select class='form-control' id='tipo_instalacion' name='tipo_instalacion'>
  	<option value=$row[tipo_instalacion]>Recurrente</option>
  	<option value='mensual'>Mensual</option>
	</select>
  	</div>";

    }else if($row['tipo_instalacion'] == "mensual"){
    	 $tipo_instalacion = "<div class='form-group'>
    <label for='tipo_instalacion'>Tipo de Instalacion</label>
    <select class='form-control' id='tipo_instalacion' name='tipo_instalacion'>
  	<option value=$row[tipo_instalacion]>Mensual</option>
  	<option value='recurrente'>Recurrente</option>
	</select>
  	</div>";

    }



    if($row['tipo_paquete'] == "internet"){
    	  $tipo_paquete = "<div class='form-group'>
    <label for='tipo_paquete'>Tipo de Paquete</label>
    <select class='form-control' id='tipo_paquete' name='tipo_paquete'>
    <option value=$row[tipo_paquete]>Internet</option>
  	<option value='telefonia'>Telefonia</option>
  	<option value='internet/telefonia'>Internet/Telefonia</option>
	</select>
  	</div>";
    }else if($row['tipo_paquete'] == "telefonia"){
    	 $tipo_paquete = "<div class='form-group'>
    <label for='tipo_paquete'>Tipo de Paquete</label>
    <select class='form-control' id='tipo_paquete' name='tipo_paquete'>
    <option value=$row[tipo_paquete]>Telefonia</option>
  	<option value='internet'>Internet</option>
  	<option value='internet/telefonia'>Internet/Telefonia</option>
	</select>
  	</div>";

    }else if($row['tipo_paquete'] == "internet/telefonia"){
    	  $tipo_paquete = "<div class='form-group'>
    <label for='tipo_paquete'>Tipo de Paquete</label>
    <select class='form-control' id='tipo_paquete' name='tipo_paquete'>
    <option value=$row[tipo_paquete]>Internet/Telefonia</option>
  	<option value='internet'>Internet</option>
  	<option value='telefonia'>Telefonia</option>
	</select>
  	</div>";

    }


	$subtotal = "<div class='form-group'>
    <label for='subtotal'>Subtotal</label>
    <input type='text' class='form-control' id='subtotal' name='subtotal' placeholder='Subtotal' value=$row[subtotal]>
  	</div>";

  	$cargo_unico = "<div class='form-group'>
    <label for='cargo_unico'>Cargo Unico</label>
    <input type='text' class='form-control' id='cargo_unico' name='cargo_unico' placeholder='Subtotal' value=$row[cargo_unico]>
  	</div>";

  	$unidades = "<div class='form-group'>
    <label for='unidades'>Unidades</label>
    <input type='text' class='form-control' id='unidades' name='Unidades' placeholder='Unidades' value=$row[unidades]>
  	</div>";




  if($row['descripcion'] == null){
    $descripcion = "<div class='form-group'>
    <label for='descripcion'>Descripcion</label>
    <textarea rows='4' cols='50' class='form-control' id='descripcion' name='descripcion'>
    Descripcion
    </textarea>
  	</div>";

  }

   if($row['tiempo_entrega'] == null){
   	$tiempo_entrega = "<div class='form-group'>
    <label for='tiempo_entrega'>Tiempo de Entrega</label>
    <input type='text' class='form-control' id='tiempo_entrega' name='tiempo_entrega' placeholder='Tiempo de Entrega'>
    </div>";

   }

	echo $numero_proyecto.$descripcion.$tiempo_entrega.$fecha_instalacion.$tipo_viaje.$personal.$tipo_instalacion.$tipo_paquete.$subtotal.$cargo_unico.$unidades;

}
}
}
}


//$proyecto = new ProyectoView();
///$proyecto->printRecords('default');
//$proyecto->editForm('0123456');



?>
