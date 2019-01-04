<?php
include '/var/www/html/cotizacion/html/php/classes/User.php';

class UserView{

private $user = null; 

function __construct(){
	global $user;
	$user=new User();
}

public function newForm(){

echo <<<EOT
  	<div class="form-group">
    <label for="user_id">Id</label>
    <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Id">
  	</div>
EOT;

}

}

/*$bodega = new BodegaView();
$bodega->newForm();
$bodega->editForm('0123456');*/


?>