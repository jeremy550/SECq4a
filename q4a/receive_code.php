<?php    
session_start();
require_once "db.php";
require_once __DIR__ . '/PHPGangsta/GoogleAuthenticator.php';

$pga = new PHPGangsta_GoogleAuthenticator();

  $sql="SELECT  * from users where email = '".$_SESSION['email']."'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $email =$row['email'];
    $google_code =$row['google_code'];

  $qrcode = $pga->getQRCodeGoogleUrl($email,$google_code,'SEC');


  if(isset($_POST['submit'])){

    $code=$_POST['code'];

    if ($code == "") {

      echo "<script>
      alert('Get your code from google authenticator app ');
     </script>";

    }
    else {

      $result=$pga->verifyCode($google_code,$code);
      if($result){
        header("Location: profile.php");

      }
      else{
        echo "<script>
      alert('Invalid code');
     </script>";
      }

    }


  }
  

?>

<html>
<head>
</head> 
<body>
<h3> Google 2FA Authenticator </h3>
<p>Get your authentication code form Google authenticate app </p>
<form method = "post" action=confirm_code.php>
<p>Enter your authentication code</p>
<input type="text" name="code" placeholder="6 Digit Code">
<input type ="submit" name="submit" value="Validate">
<br>


</form>




</body>


</html>