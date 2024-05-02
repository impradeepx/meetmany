
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <!-- link allfiles -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script> <style src="assets/js/jquery-3.5.1.min.js"> </style> </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <title>Home</title>
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  



  
</head>
<body>

<div class="sidenav" id="sidenav">
  <button class="close-btn" onclick="toggleNav()">&times;</button>

  <div class="profile">
     
        <img src="<?php echo $user['profile_pic']; ?>"  
     
  
     <h2><a href="<?php echo $userLoggedIn; ?>"><?php echo $user ['first_name']."".$user['last_name']; ?></a></h2>

     <p><a href="<?php echo $userLoggedIn; ?>"><?php echo "@".$user['username']?></a></p>

  </div>

  <a href="details.php"><i class="fa-solid fa-address-book"></i>  Details</a>
  <a href="settings.php"><i class="fa-solid fa-gear"></i>  Setting</a>
  <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
  <a href="www.instagram.com/impradeepx"><i class="fas fa-address-card"></i> Contact</a>
  <a href="about.php"><i class="fas fa-info-circle"></i> About</a>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

    
  
</head>
<body>

<div class="navbar">
    <button class="toggle-btn" onclick="toggleNav()">&#9776;</button>
    <button><a href="index.php"><span class="material-symbols-outlined">home_app_logo</span></button>
    <button><a href="messages.php"> <span class="material-symbols-outlined">chat</span></a></button>

    
    <?php    
                $message_obj = new Message($con, $userLoggedIn);
                $num_msg = $message_obj->getUnreadNumber();
                if ($num_msg > 0){
                    echo "
                        <div class='notification_count' style='background: red; height: 20px; width: 20px; border-radius: 50%; color: white; display: grid; position: relative; margin: -30px 0px 0px 60px;'>
                            <span style='font-size: 10px; text-align: center; margin: 2px 0 0 0;'>"
                                . $num_msg .
                            "</span>        
                        </div>
                    ";
                }         
            ?>
</div>

</body>
</html>

















<script >
function toggleNav() {
  var sidenav = document.getElementById("sidenav");
  if (sidenav.style.left === "0px") {
    sidenav.style.left = "-250px";
  } else {
    sidenav.style.left = "0px";
  }
}

</script>


</body>
</html>

