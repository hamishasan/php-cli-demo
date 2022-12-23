<?php
$servername='localhost';
$username="root";
$password="";

// connecting to database
try
{
	$con=new PDO("mysql:host=$servername;dbname=research",$username,$password);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo 'connected';
}
catch(PDOException $e)
{
	echo '<br>'.$e->getMessage();
}
	
?>
