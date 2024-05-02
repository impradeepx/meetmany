<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{display: flex;
        justify-content: center;
         align-items: center;
         height: 100vh;
        background-color: black;
        color: blueviolet;}
        h1{color: blue;}

        a{text-decoration: none;
        background-color: green;
    padding: 9px;color:white;
border-radius: 9px;}
    </style>
</head>
<body>
    

<?php 


    include 'connect.php';
    include 'User.php';
    include 'Post.php';
    include 'Message.php';

    if(isset($_SESSION['username'])){
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    }
    elseif ($userLoggedIn == 'admin') {
        header("Location: admin_home.php");
    }
    else{
        header("Location: login.php");
    }

?>

    <div>
        

<h2>WELCOME 

      <h1>
   <?php     echo    $user['first_name'] ." ". $user['last_name']; ?></h1>
  
    
    <h2>THANK YOU FOR JOINING US</h2>
</h2>
    <a href="index.php">Let's Get Started</a>
    </div>

</body>
</html>