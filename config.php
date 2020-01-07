<?php
$server="localhost";
$dbname="ngo_system";
$dbuser="root";
$dbpass="";
$con=mysqli_connect($server,$dbuser,$dbpass,$dbname);
if($con)
{
	echo ' ';
}
else
{
	echo 'not connected';
}
?>