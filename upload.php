<?php
//http://stackoverflow.com/questions/486757/how-to-generate-xml-file-dynamically-using-php
header('Access-Control-Allow-Origin: *');
$postText = file_get_contents('php://input'); 
$datetime=date('ymdHis'); 
$xmlfile = "myfile" . $datetime . ".txt"; 
$FileHandle = fopen($xmlfile, 'w') or die("can't open file"); 
fwrite($FileHandle, $postText); 
fclose($FileHandle);
echo("grazie e arrivederci");
?>