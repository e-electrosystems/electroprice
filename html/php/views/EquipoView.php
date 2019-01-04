<?php
include '/var/www/html/cotizacion/html/php/classes/Equipo.php';

class EquipoView{

private $equipo = null; 

function __construct(){
	global $equipo;
	$equipo=new Equipo();
}

public function newForm(){

echo <<<EOT
    
    <div class="form-group">
    <label for="numero_serie">NUmero de Serie</label>
    <input type="text" class="form-control" id="numero_serie" name="numero_serie" placeholder="Numero de Serie" required>
    </div>
  	<div class="form-group">
    <label for="modelo">Modelo</label>
    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" required>
  	</div>
  	<div class="form-group">
    <label for="marca">Marca</label>
    <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" required>
  	</div>
  	<div class="form-group">
    <label for="tipo">Tipo</label>
    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" required>
  	</div>
  	<div class="form-group">
    <label for="costo_lista">Costo de Lista</label>
    <input type="text" class="form-control" id="costo_lista" name="costo_lista" placeholder="Costo de Lista" required>
  	</div>
  	<div class="form-group">
    <label for="costo_real">Costo Real</label>
    <input type="text" class="form-control" id="marca" name="costo_real" placeholder="Costo Real" required>
  	</div>

    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="dll" name="dll">
    <label class="form-check-label" for="dll">DLL</label>
    </div>

    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="mx" name="mx">
    <label class="form-check-label" for="mx">MX</label>
    </div>

    <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea rows="4" cols="50" class="form-control" id="descripcion" name="descripcion">
    Descripcion
    </textarea>
    </div>

  	<div class="form-check">
    <input type="checkbox" class="form-check-input" id="factura" name="factura">
    <label class="form-check-label" for="factura">Factura</label>
  	</div>
EOT;

}


public function printRecordsFactura($sort)
{
  
   global $equipo;
   $equipo=new equipo();
   $values = $equipo->selectAllEquipoFactura($sort);
  if($values != null){
    $index = 0;

  echo "<div class='row alert e-alert-1'>";
  echo "<div class='col-sm-1'></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=numero_serie'>Numero Serie</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=modelo'>Modelo</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=marca'>Marca</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=tipo'>Tipo</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=costo_real'>Costo de Lista</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=costo_lista'>Costo Lista</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=descripcion'>Descripcion</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=descripcion'>Cliente</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='#'>Accion</center></a></div>";
  echo "</div>";

  while ($row = $values->fetch_assoc()) {
  if(($index % 2) == 0){
  echo "<div class='row alert alert-light'>";

  }else{

    echo "<div class='row alert alert-secondary'>";
  }

    $url = str_replace("/var/www/html","",$row['url']);


   echo "<div class='col-sm-1'>";
  echo "<center><img src='$url' style='width:100px; height:100px;'/></center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center><a title='Editar Equipo' href='/cotizacion/html/equipo/edit.php?numero_serie=$row[numero_serie]'>$row[numero_serie]</a></center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['modelo']."</center>";
  echo "</div>";
  
  echo "<div class='col-sm-1'>";
  echo "<center>".$row['marca']."</center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['tipo']."</center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['costo_real']."</center>";
  echo "</div>";
  
  echo "<div class='col-sm-1'>";
  echo "<center>".$row['costo_lista']."</center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['descripcion']."</center>";
  echo "</div>";
   
  echo "<div class='col-sm-1'>";
  echo "<center>".$row['cliente']."</center>";
  echo "</div>"; 

  echo "<div class='col-sm-1'>";
  echo "<center><input type='checkbox' class='form-check-input' id='factura' name='numeros_serie[]' value='$row[numero_serie]'></center>";
  echo "</div>"; 


  echo "</div>";   

  $index=$index+1; 

}


}





}









public function printRecords($sort){

   global $equipo;
   $equipo=new equipo();
   $values = $equipo->selectAllEquipo($sort);
  if($values != null){
    $index = 0;

  echo "<div class='row alert e-alert-1'>";
  echo "<div class='col-sm-1'></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=numero_serie'>Numero Serie</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=modelo'>Modelo</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=marca'>Marca</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=tipo'>Tipo</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=costo_real'>Costo de Lista</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=costo_lista'>Costo Lista</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=descripcion'>Descripcion</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='/cotizacion/html/equipo/records.php?sort=descripcion'>Cliente</a></center></div>";
  echo "<div class='col-sm-1'><center><a href='#'>Accion</center></a></div>";
  echo "</div>";

  while ($row = $values->fetch_assoc()) {
  if(($index % 2) == 0){
  echo "<div class='row alert alert-light'>";

  }else{

    echo "<div class='row alert alert-secondary'>";
  }

    $url = str_replace("/var/www/html","",$row['url']);


   echo "<div class='col-sm-1'>";
  echo "<center><img src='$url' style='width:100px; height:100px;'/></center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center><a title='Editar Equipo' href='/cotizacion/html/equipo/edit.php?numero_serie=$row[numero_serie]'>$row[numero_serie]</a></center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['modelo']."</center>";
  echo "</div>";
  
  echo "<div class='col-sm-1'>";
  echo "<center>".$row['marca']."</center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['tipo']."</center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['costo_real']."</center>";
  echo "</div>";
  
  echo "<div class='col-sm-1'>";
  echo "<center>".$row['costo_lista']."</center>";
  echo "</div>";

  echo "<div class='col-sm-1'>";
  echo "<center>".$row['descripcion']."</center>";
  echo "</div>";
   
  echo "<div class='col-sm-1'>";
  echo "<center>".$row['cliente']."</center>";
  echo "</div>"; 

  echo "<div class='col-sm-1'>";
  echo "<center><a href='/cotizacion/html/php/managers/EquipoManagerView.php?mode=delete&numero_serie=$row[numero_serie]'><h4><strong>X</strong></h4></a></center>";
  echo "</div>"; 


  echo "</div>";   

  $index=$index+1; 

}


}



}

public function editForm($numero_serie){
	global $equipo;
  $equipo=new Equipo();

  $values = $equipo->selectEquipo($numero_serie);


if($values != null){
while ($row = $values->fetch_assoc()) {
 

    $url = str_replace("/var/www/html","",$row['url']);

    $image =  "<div class='col-sm-2'>
              <center><img src='$url' style='width:250px; height:250px;'/></center>
              </div>";

    $numero_serie = "<div class='form-group'>
    <label for='numero_serie'>NUmero de Serie</label>
    <input type='text' class='form-control' id='numero_serie' name='numero_serie' value=$row[numero_serie] placeholder='Numero de Serie'>
    </div>";

    $modelo = "<div class='form-group'>
    <label for='modelo'>Modelo</label>
    <input type='text' class='form-control' id='modelo' name='modelo' value=$row[modelo] placeholder='Modelo'>
    </div>";

    $marca = "<div class='form-group'>
    <label for='marca'>Marca</label>
    <input type='text' class='form-control' id='marca' name='marca' value=$row[marca] placeholder='Marca'>
    </div>";

    $tipo = "<div class='form-group'>
    <label for='tipo'>Tipo</label>
    <input type='text' class='form-control' id='tipo' name='tipo' value=$row[tipo] placeholder='Tipo'>
    </div>";

    $costo_lista = "<div class='form-group'>
    <label for='costo_lista'>Costo de Lista</label>
    <input type='text' class='form-control' id='costo_lista' name='costo_lista' value=$row[costo_lista] placeholder='Costo de Lista'>
    </div>";

    $costo_real = "<div class='form-group'>
    <label for='costo_real'>Costo Real</label>
    <input type='text' class='form-control' id='marca' name='costo_real' value=$row[costo_real] placeholder='Costo Real'>
    </div>"; 

    $descripcion = "<div class='form-group'>
    <label for='descripcion'>Descripcion</label>
    <textarea rows='4' cols='50' class='form-control' id='descripcion' name='descripcion'>
    $row[descripcion]
    </textarea>
    </div>";

    $cliente = "<div class='form-group'>
    <label for='cliente'>Cliente</label>
    <input type='text' class='form-control' id='cliente' name='cliente' value=$row[cliente] placeholder='Cliente' disabled>
    </div>";

 
  if($row['modelo'] == null){
    $modelo = "<div class='form-group'>
    <label for='modelo'>Modelo</label>
    <input type='text' class='form-control' id='modelo' name='modelo' placeholder='Modelo'>
    </div>";

  }

  if($row['marca'] == null){
    $marca = "<div class='form-group'>
    <label for='marca'>Marca</label>
    <input type='text' class='form-control' id='marca' name='marca' placeholder='Marca'>
    </div>";

  }

  if($row['cliente'] == null){
    $cliente = "<div class='form-group'>
    <label for='cliente'>Cliente</label>
    <input type='text' class='form-control' id='cliente' name='cliente' placeholder='Cliente' disabled>
    </div>";

  }

  if($row['numero_serie'] == null){
    $numero_serie = "<div class='form-group'>
    <label for='numero_serie'>NUmero de Serie</label>
    <input type='text' class='form-control' id='numero_serie' name='numero_serie' placeholder='Numero de Serie'>
    </div>";

  }

 if($row['tipo'] == null){
    $tipo =  "<div class='form-group'>
    <label for='tipo'>Tipo</label>
    <input type='text' class='form-control' id='tipo' name='tipo' placeholder='Tipo'>
    </div>";

  } 

  if($row['costo_lista'] == null){
    $costo_lista = "<div class='form-group'>
    <label for='costo_lista'>Costo de Lista</label>
    <input type='text' class='form-control' id='costo_lista' name='costo_lista' value=0 placeholder='Costo de Lista'>
    </div>";

  } 


if($row['costo_real'] == null){
    $costo_real = "<div class='form-group'>
    <label for='costo_real'>Costo Real</label>
    <input type='text' class='form-control' id='marca' name='costo_real' value=0 placeholder='Costo Real'>
    </div>"; 

  } 


if($row['descripcion'] == null){
    $descripcion = "<div class='form-group'>
    <label for='descripcion'>Descripcion</label>
    <textarea rows='4' cols='50' class='form-control' id='descripcion' name='descripcion'>
    Descripcion
    </textarea>
    </div>";

  }


if($row['factura'] == 0){
   $factura = "<div class='form-check'>
    <input type='checkbox' class='form-check-input' id='factura' name='factura'>
    <label class='form-check-label' for='factura'>Factura</label>
    </div>";
   
  }else{
     $factura = "<div class='form-check'>
    <input type='checkbox' class='form-check-input' id='factura' name='factura' checked>
    <label class='form-check-label' for='factura'>Factura</label>
    </div>";
    
  } 

  if($row['dll'] == 0){
   $dll = "<div class='form-check'>
    <input type='checkbox' class='form-check-input' id='dll' name='dll'>
    <label class='form-check-label' for='factura'>DLL</label>
    </div>";
   
  }else{
     $dll = "<div class='form-check'>
    <input type='checkbox' class='form-check-input' id='dll' name='dll' checked>
    <label class='form-check-label' for='dll'>DLL</label>
    </div>";
    
  } 

  if($row['mx'] == 0){
   $mx = "<div class='form-check'>
    <input type='checkbox' class='form-check-input' id='mx' name='mx'>
    <label class='form-check-label' for='mx'>MX</label>
    </div>";
   
  }else{
     $mx = "<div class='form-check'>
    <input type='checkbox' class='form-check-input' id='mx' name='mx' checked>
    <label class='form-check-label' for='mx'>MX</label>
    </div>";
    
  } 

	echo $image.$numero_serie.$modelo.$marca.$tipo.$costo_lista.$costo_real.$dll.$mx.$cliente.$descripcion.$factura;

}
}
}
}

/*$equipo = new EquipoView();
$equipo->editForm('123456');*/

?>
