<?php
$name= $_GET["name"];
$price= $_GET["price"];

//$rezultatas= $_GET["rezultatas"];
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASS','root');
define('DB_NAME','products');

$db= mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASS,DB_NAME);

$sql="INSERT INTO product(name,price)
VALUE('".$name."','".$price."')";


if($db->query($sql )=== true){
	echo "gerai";
}else{
	echo"klaida".$sql."<br>".$db->error;
}


?>