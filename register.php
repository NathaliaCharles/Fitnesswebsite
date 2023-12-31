<?php
require_once "config.php";

$name = $username = $email = $phone = $password = $confirm_password = "";
$name_err = $username_err = $email_err = $phone_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    //check for name is empty
    if(empty(trim($_POST['name']))){
        $name_err = "Name cannot be blank";
    }
    else{
        $name = trim($_POST['name']);
    }

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}
// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}

//check for email
if(empty(trim($_POST['email']))){
    $email_err = "Email cannot be blank";
}
else{
    $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set the value of param email
            $param_email = trim($_POST['email']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $email_err = "This email is already taken"; 
                }
                else{
                    $email = trim($_POST['email']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);
}

//check for phone
if(empty(trim($_POST['phone']))){
    $phone_err = "Phone no cannot be blank";
}
else{
    $phone = trim($_POST['phone']);
}




// If there were no errors, go ahead and insert into the database
if(empty($name_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($phone_err))
{
    $sql = "INSERT INTO users (name, username, password, email, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_username, $param_password, $param_email, $param_phone);

        // Set these parameters
        $param_name = $name;
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_email = $email;
        $param_phone = $phone;
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Register </title>
        <link rel="stylesheet" href="register.css">
        
    </head>
    <body>
        <body>
            <div class="container">
                <h1 id="heading">Registration Form</h1>
                <div id="main">
                    <form action="" method="post" class="reg-form">
                        <div id="name">
                            <h2 class="name">Name</h2>
                            <input type="text" name="name" class="name" required> <br>
                            
                        </div>
                        
                        <div id="username">
                            <h2 class="name">Username</h2>
                            <input type="text" name="username" class="username" required> <br>
                            
                        </div>

                        <div id="email">
                            <h2 class="name">Email</h2>
                            <input type="email" class="email" name="email" placeholder="eg.abc@gmail.com">                        
                        </div>

                        <div id="phone-no" >
                            <h2 class="name">Phone-No</h2>
                            <input type="number" class="phone-no" placeholder="+230"> 
                            <input type="number" name="phone" class="phone-no2"> 
                        
                        </div>
                   
                        <div id="password">
                            <h2 class="name">Password</h2>
                            <input type="password" name="password" class="password" required >                        
                        </div>

                        <div id="password">
                            <h2 class="name">Confirm Password</h2>
                        
                            <input type="password" name="confirm_password" class="password" >
                        </div>

                        <button class="btn">Register</button>
            </div>

        </form>
        </div>
</body>
</html>
