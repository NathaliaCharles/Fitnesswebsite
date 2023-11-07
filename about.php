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
	<link rel="stylesheet" href="about.css">

</head>
<body>
	<header class="navbar">
		<img class="logo" src="gym-pic.png">
		<span>RightNow Fitness</span>
		<nav>
			<ul class="navlist">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php" class="active">About</a></li>
				<li><a href="gallery.php">Gallery</a></li>
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

	<section id="about">

		<div id="heading">
			<img src="gym-pic.png" alt="">
			
		</div>
		<span class="heading">RightNow Fitness</span>
		<div class="heading2">
			"We help you to get in the best shape of your life by putting science back in strength"
		</div>
	</section>
	<div id="services">
		<div class="box">
			<img src="imgs/about1.jpg" alt="">
			<h2 class="secondary center">Our Story</h2>
			<p class="center">RightNow Fitness was founded in 2023 as an operated business. I wanted it to be a special program so that you, clients can achieve your goals that is to have the body of your dream at home.  </p>

		</div>
		<div class="box">
			<img src="imgs/about2.jpg" alt="">
			<h2 class="secondary center">Best Training</h2>
			<p class="center">We provide The Proven Home Workout Programs To Get Shredded Physique, and Gain perfect Muscle Proportion. In the process of passing the programs, you will gain access to new workouts, so it will be fun, hard and very rewarding at the same time! Your first day begins now!Take a picture "BEFORE" and I'll see you at work!</p>

		</div>
		<div class="box">
			<img src='imgs/about3.jpg' alt="">
			<h2 class="secondary center">Build Perfect Body</h2>
			<p class="center">The world around us is changing, so it's the best time to change yourself.

Use this time to become the best version of yourself. With intensive home workout programs in just few months you will carve out a Greek sculpture from your body: elite, dried muscles, shredded abs, round shoulders and square chest. Become the Man/ Woman, you always wanted to be.</p>

		</div>
</body>
</html>
