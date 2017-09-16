<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="products";
//prisijungimas prie db

$db= new mysqli($servername,$username,$password,$dbname);
//ar teisngai prisijunge
if($db->connect_error){
	//veiksmu nutraukimas
	die("nepavyko".$db->connect_error);
}
//gauti visus rezutatus

$sql = 'SELECT * 
		FROM product';
		
$query = mysqli_query($db,$sql);
for ($i=0;$i < mysql_num_rows($query);$i++){
			$goods[] = mysql_fetch_array($query);
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css">				
</head>

<body>
<div id="header">
<h2>Parduotuve</h2>
</div>
    <div id="main">
        <ul id="tovar">
        <? foreach ($goods as $item) :?>
        <li>
        <p id="name"><? $item['name'];?></p>
        </li>
        <? endforeach;?>
        </ul>
    </div>
</body>
</html>