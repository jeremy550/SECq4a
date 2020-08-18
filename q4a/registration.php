<?php
session_start();    
require_once "db.php";
require_once __DIR__ . '/PHPGangsta/GoogleAuthenticator.php';

        if(isset($_POST['submit'])){
        
        if(isset($_POST['email']) & isset($_POST['password'])){
        
            
            $password = $_POST['password'];
            $email = $_POST['email'];
            $_SESSION['email']=$email;

            $ga = new PHPGangsta_GoogleAuthenticator();
            $secret = $ga->createSecret();
            

           $sql="INSERT INTO users VALUES ('','".$email."','".$password."','".$secret."')";
           $user=mysqli_query($link,$sql);
           
           var_dump($user);
           if($user){
          
            header('location: confirm_code.php');

           }
        
    }
        else {
            echo "<script>
					 alert('Invalid email or password');
					</script>";

            }

        }

?>


<html>
<head>
</head>
<body>

        <h3>Create Account</h3>
    <form action="registration.php" method="post">
         <h3>Email</h3>
        <input type="email" id="email" name="email" required>
        <br>
        <h3>Password</h3>
        <input type="password" id="password" name="password" required>
        <br></br>

        <input type="submit" name="submit" value="Register">
        <br><br>
        Click here to <a href="index.php">Login</a> if you have already registered your account.
    </form>
        
</body>
</html>