

<?php
include 'connect.php';
include 'login_process.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Welcome to meet many</title>
    
</head>
<body>
    

    
<div class="top-content">
        <h1 style="font-size:20px;">Welcome to Meet many, Share your moments with friends!</h1>

       <div id="logo">
        
       <img width=200px src="meetmany.png" alt="Logo">
       </div>
       
        
        <hr style="width: 50%; color: white; margin-bottom:25px; margin-top:25px;">
    </div>

<div class="signin-form">
            <div class="form-top-left">
                <h3 style="padding-top:10px;">Login and Enjoy</h3>
                <p style="margin-top:-20px; padding-bottom:10px;"></p>
            </div>




            <div class="form-bottom">

                <form action="login.php" method="POST" class="login-form">



                    <!-- Email Addresss -->
                        <label for="form-email">Email</label>
                        <input type="email" name="log_email" placeholder="Email Address" value="<?php if(isset($SESSION['log_email'])) {
                            echo $_SESSION['log_email'];
                        } ?>" required> <br>
                                            
                    <!-- Password -->
                        <label for="form-password">Password</label>
                        
                        <input type="password" id="login_pswd" name="log_password" placeholder="Password" required> <Br>
                        
                    <!-- remember me -->
                    

                    <?php if(in_array("Email or Password was incorrect", $error_array_login)) echo "<p class='alert'>Email or Password was incorrect</p>"; ?>
                    <button type="submit" style="margin-bottom:20px" name="login_button">Sign in</button><br>
                   
                </form> 
                <button><a style="text-decoration: none;" href="register.php">Don't have account Register Now</a></button>    
            </div>
        </div>
      
        <!-- Footer -->
    <footer>			
    	<div class="footer"> 
       
            <a style="text-decoration-line: none; color: #977AFF;" href="admin.php"><i class="fas fa-user-shield"></i> Admin? click here <i class="fas fa-arrow-right"></i></a>
    		<p> &copy;<?php echo  date("Y"); ?> All Rights Reserved <BR> Website designed and developed by <strong><U><a href="www.instagram.com/impradeepx">@impradeepx</a></u></strong></p>
    	</div>
    </footer>
</body>
</html>