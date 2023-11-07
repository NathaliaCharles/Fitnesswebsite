<?php
require_once "config.php";

$name = $con_email = $msg = "";
$con_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST['name'])) || empty(trim($_POST['con_email'])) || empty(trim($_POST['msg'])))
    {
        $err = "Please enter name , email and your message ";
    }
    else{
        $name = trim($_POST['name']);
        $con_email = trim($_POST['con_email']);
        $msg = trim($_POST['msg']);
        
    }
if(empty($err))
{
  $sql = "INSERT INTO contact (name, con_email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_con_email, $param_msg);

        // Set these parameters
        $param_name = $name;
        $param_con_email = $con_email;
        $param_msg = $msg;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            echo "We will contact you soon! Thank you for contacting us.";
            header("location: index.php");
        }
        else{
            echo "Something went wrong...";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>
<?php

session_start();

//if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
//{
 //   header("location: login.php");
//}

?>
<!DOCTYPE html>
<html>
<head>
    <title>RightNow Fitness</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="contact.css">
    

</head>
<body>
	<header class="navbar">
		<img class="logo" src="gym-pic.png">
		<span>RightNow Fitness</span>
		<nav>
			<ul class="navlist">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php" >About</a></li>
				<li><a href="gallery.php">Gallery</a></li>
				<li><a href="contact.php" class="active">Contact Us</a></li>
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

    <!--alert messages start
    <div class="alert-success">
      <span>Message Sent! Thank you for contacting us.</span>
    </div>
    <div class="alert-error">
      <span>Something went wrong! Please try again.</span>
    </div>
    alert messages end-->

    <!--contact section start-->
    <div class="contact-section">
        <div class="contact-info">
          <div><i class="fas fa-map-marker-alt"></i>14 St Jean Street, Grand Bay, Mauritius</div>
          <div><i class="fas fa-envelope"></i>rightnowfitness@email.com</div>
          <div><i class="fas fa-phone"></i>+230 5 123 45 67</div>
          <div><i class="fas fa-clock"></i><br> Mon - Fri 06:00 to 21:00 </br><br> Sat - Sun 07:00 to 14:00 </br></div>
        </div>
        <div class="contact-form">
          <h2>Contact Us</h2>
          <form class="contact" action="" method="post">
            <input type="text" name="name" class="text-box" placeholder="Your Name" required>
            <input type="email" name="con_email" class="text-box" placeholder="Your Email" required>
            <textarea name="msg" rows="5" placeholder="Your Message" required></textarea>
            <input type="submit" name="submit" class="send-btn" value="Send">
          </form>
        </div>
      </div>
      <!--contact section end-->
