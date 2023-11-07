<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'fitness');


$conn=mysqli_connect('localhost','root','','fitness');


if($conn==false){
	dir('Error: cannot connect');
}
?>
