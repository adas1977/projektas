<?php
$db = mysql_connect('localhost','root','root','products');
if(!db){
	exit('Error'.mysql_error());
	}
?>