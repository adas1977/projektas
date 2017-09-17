<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="products";


$db= new mysqli($servername,$username,$password,$dbname);

if($db->connect_error){
	
	die("".$db->connect_error);
}

$sql= "SELECT*FROM product";
//
$result= $db->query($sql);
if($resust->num_rows>0){
	while($row = $result->fetch_assoc()){
		echo " ID : ".$row["ID"]." name : ".$row["name"]." price : ".$row["price"]."<br>";
	}
}else{
	echo("none");
}
$db->close();
?>