<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="products";


$db= new mysqli($servername,$username,$password,$dbname);

if($db->connect_error){
	
	die("Not connect".$db->connect_error);
}


$sql = 'SELECT * 
		FROM product';
		
$query = mysqli_query($db, $sql);

?>
<html>
<head>
	<title>Product List</title>
    
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1>Product List</h1>
    
	<table class="data-table">
		<br>
        <br>
		<thead>
			<tr>
				<th width="50">ID</th>
				<th width="286">name</th>
				<th width="100">price</th>
			</tr>
		</thead>
		<tbody>
		<?php

		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			$amount  = $row['price'] == 0 ? '' : number_format($row['price']);
			echo '<tr>
					<td>'.$row['ID'].'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['price'].'</td>
				</tr>';
			$total += $row['price'];
			$no++;
		}?>
		</tbody>
	
	</table>
    <br>
    <li><a href="index.php" target= "_blank">Registration</a></li>
    <br>
    
     
    
</body>
</html>
