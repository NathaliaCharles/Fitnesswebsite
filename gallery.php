<?php

session_start();

//if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
//{
//    header("location: login.php");
//}

?>
<!DOCTYPE html>
<html>
<head>
	<title>RightNow Fitness</title>
	<link rel="stylesheet" href="gallery.css">

</head>
<body>
	<header class="navbar">
		<img class="logo" src="gym-pic.png">
		<span>RightNow Fitness</span>
		<nav>
			<ul class="navlist">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="gallery.php" class="active">Gallery</a></li>
				<li><a href="contact.php">Contact Us</a></li>
                <?php
                    if(isset($_SESSION['username'])){
                    echo '<li><a href="login.php">'.$_SESSION['username'].'</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                    }
                    else{
                    echo "<li><a href='login.php'><button>Login</button></a></li>";        
                    }
                ?>
			</ul>
		</nav>
    </header>
    
    <div id="container">

        <div class="image">
            <img src="imgs/img1.jpg" alt="">
        </div>
        <div class="image">
            <img src="imgs/img2.jpg" alt="">
        </div>
        <div class="image">
            <img src="imgs/img3.jpg" alt="">
        </div>
        <div class="image">
            <img src="imgs/img4.jpg" alt="">
        </div>
        <div class="image">
            <img src="imgs/img5.jpg" alt="">
        </div>
        <div class="image">
            <img src="imgs/img6.jpg" alt="">
        </div>
        <div class="image">
            <img src="imgs/img7.jpg" alt="">
        </div>
        <div class="image">
            <img src="imgs/img8.jpg" alt="">
        </div>
        <div class="image">
            <img src="imgs/img9.jpg" alt="">
        </div>
        <div class="image">
            <img src="imgs/img10.jpg" alt="">
        </div>

    </div>
        
</body>
</html>
