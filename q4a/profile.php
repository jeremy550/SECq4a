<?php
require_once "db.php";
session_start();


    $sql="SELECT * from users where email= '".$_SESSION['email']."'";

    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>


<htmkl>
<head>
</head>
<body>
<h2>User Profile</h2>
            <h4>Welcome <?php echo $row['email'] ?></h4>
            <br>
            Click here to <a href="logout.php">Logout</a>
</body>
</html>