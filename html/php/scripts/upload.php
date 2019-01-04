<?php


$con = new mysqli("localhost","root","ldgceaegn","cotizacion");

if($con->connect_error){
die($con->connect_error);
}else{
		
$numero_serie = $_GET['numero_serie'];
$target_dir = "/var/www/html/cotizacion/html/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$r = is_writable($target_dir);
echo $r;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".\n";
        $uploadOk = 1;
    } else {
        echo "File is not an image.\n";
        $uploadOk = 0;
    }
}


if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.\n";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.\n";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    	$sql = "update equipo set url=? where numero_serie=?;";
	
		echo "connected";
		$stmt = $con->prepare($sql);
		$stmt->bind_param("ss",$target_file,$numero_serie);
		$stmt->execute();
		$stmt->close();
		$con->close();

        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n";
       header('Location: /cotizacion/html/equipo/edit.php?numero_serie='.$numero_serie);
    } else {
        echo "Sorry, there was an error uploading your file.\n";
    }
}




}

?>
