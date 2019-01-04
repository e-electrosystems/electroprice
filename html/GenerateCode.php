<?php
class GenerateCode{

function generateCode(){
$characters = '123456789';
$code = '';

for($i=0;$i<8;$i++){
$code .= $characters[rand(0,8)];  
}

return $code;

}

function saveImage($barcode,$code){
/*$in = fopen($barcode,"rb");
$out = fopen("barcodes/".$code.".jpg","wb");

while($chunk = fread($in,8192)){
fwrite($out,$chunk,8192);
}

fclose($in);
fclose($out);
*/
$content = file_get_contents($barcode);
file_put_contents('barcodes/'.$code.'.jpg',$content);
}



function generateBarCode(){
$code = $this->generateCode();
echo "<img src='php/barcode/barcode.php?size=40&text=".$code."&print=true'/>";
$this->saveImage("http://localhost/cotizacion/html/php/barcode/barcode.php?size=40&text=".$code."&print=true",$code); 
}

function getBarTags($total){
for($i=0;$i<$total;$i++){
$this->generateBarCode();
}
}

}

$code = new GenerateCode();
$code->getBarTags(100);

?>
