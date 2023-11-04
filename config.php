<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'fitness');


$conn=mysqli_connect('localhost','root','root','fitness');


if($conn==false){
	dir('Error: cannot connect');
}
?>