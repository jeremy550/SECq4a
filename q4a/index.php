<?php
session_start();    
require_once "db.php";

    if(isset($_POST['submit'])){

        $email = $_POST["email"];
        $password = $_POST["password"];
        $_SESSION["password"] = $password;
        $_SESSION["email"] =  $email;   

        $sql = "SELECT * FROM users where email = '".$email."' and password = '".$password."'";
            if ($result = mysqli_query($link, $sql)) {
	        $count = mysqli_num_rows($result);
	        if($count >=1){
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
            
              header('location: receive_code.php');
         }
         else {

            echo "<script>
				 alert(' Invalid email or password ');
				</script>";

         }



        }
    }



?>


<!DOCTYPE html>
<html>
<head>
 
</head>
<body>

<form action="index.php" method="post">

<h3>Email</h3><input type="text" id="email" name="email" size="80" required>
<h3>Password</h3>
<input type="password" id="password" name="password" size="80" height="100" required><br><br> 

<input type="checkbox" id="remember" name="remember">
<label for ="remember">Remember my email</input>
<br><br>
<input type="submit" name="submit"  value="Login">
<br></br>
<a href="registration.php">Create Account</a>
</form>
<script>
        var  cb = document.getElementById('remember');
     
         function checkbox() {
          
             if(cb.checked==true){
        
        var email = document.getElementById("email").value;     
        localStorage.setItem("email",email);
         }
         }
     
         window.onload = function(){
               document.getElementById( "email" ).value = localStorage.getItem( "email" );
     
         }
         
     </script>

</body>
</html>


