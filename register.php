


<!-- Register.php -->

<?php
include 'connect.php';

include 'register_process.php';
include 'login_process.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up meet many</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        .alert{
            color: red;
            margin: auto;
        }
        
    </style>
</head>

<body>
   
    <div class="top-content">
        <h1 style="font-size:35px;">Welcome to <b>Meet Many</b>, Share your moments with friends!</h1>
       
        <div id="logo">
        
        <img style="border-radius: 10px;border :3px solid black" width=200px src="meetmany.png" alt="Logo">
        </div>
        <hr style="width: 50%; color: white; margin-bottom:25px; margin-top:25px;">
    </div>

    <div class="wreper">
    
        <div class="signup-form">
            <div class="form-top-left">
                <h3 style="padding-top:10px;text-align:center;">SIGN UP NOW</h3>
                
            </div>
            <div class="form-bottom">


                <form action="register.php" method="POST">

                    <!-- First Name -->
                    <label>First name</label>
                    <input type="text" name="reg_fname" placeholder="First Name" value="<?php if (isset($_SESSION['reg_fname'])) {
                        echo $_SESSION['reg_fname'];
                    } ?>" required>
                    <?php if (in_array("Your first name must be between 2 and 25 characters" , $error_array)) 
                          {
                              echo "<p class='alert'>Your first name must be between 2 and 25 characters</p>";
                          }           
                    ?>

                    <!-- Last Name -->
                    <label>Last name</label>
                    <input type="text" name="reg_lname" placeholder="Last Name" value="<?php if (isset($_SESSION['reg_lname'])) {
                        echo $_SESSION['reg_lname'];
                    } ?>" required>
                    <?php if (in_array("Your last name must be between 2 and 25 characters" , $error_array)) echo "<p class='alert'>Your last name must be between 2 and 25 characters</p>";           
                    ?>

                    <!-- Username -->
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Username (Cannot be changed)" value="<?php if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } ?>" required>
                    <?php
                        if(in_array("Username already exists", $error_array)) echo "<p class='alert'>Username already exists</p>";
                        else if(in_array("Username must be between 2 and 20", $error_array)) echo "<p class='alert'>Username must be between 2 and 20</p>";
                        else if(in_array("You username can only contain english characters or numbers", $error_array)) echo "<p class='alert'>You username can only contain english characters or numbers</p>";
                    ?>

                    <!-- Email -->
                    <label>Email</label>
                    <input type="email" name="reg_email" placeholder="Email" value="<?php if (isset($_SESSION['reg_email'])) {
                        echo $_SESSION['reg_email'];
                    } ?>" required>

                    <!-- Confirm Email -->
                    <label>Confirm Email</label>
                    <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php if (isset($_SESSION['reg_email2'])) {
                        echo $_SESSION['reg_email2'];
                    } ?>" required>
                    <?php
                        if (in_array("Email already in use", $error_array)) echo "<p class='alert'>Email already in use</p>";
                        else if (in_array("Email is invalid format", $error_array)) echo "<p class='alert'>Email is invalid format</p>";
                        else if (in_array("Email doesn't match", $error_array)) echo "<p class='alert'>Email doesn't match</p>";
                    ?>

                    <!-- Password -->
                    <label>Password</label>
                    
                    <input type="password" id="register_pswd" name="reg_password" placeholder="Password"  required>
                    <?php 
                        
                    ?>
                    
                    <!-- Confirm Password -->
                    <label>Confirm password</label>
                    
                    <input type="password" id="register_conferm_pswd" name="reg_password2" placeholder="Confirm Password" required>
                    <?php 
                        if(in_array("Your passwords doesn't match", $error_array)) echo "<p class='alert'>You passwords doesn't match</p>";
                        else if(in_array("Your password can only contain english characters or numbers", $error_array)) echo "<p class='alert'>Your password can only contain english characters or numbers</p>";
                        else if(in_array("Your password must be between 5 and 30 characters or numbers", $error_array)) echo "<p class='alert'>Your password must be between 5 and 30 characters or numbers</p>";
                    ?>

                    <!-- Gender -->
                    <label>Gender</label>
                    <tr>
                        <td>
                            <input style="width:10px; height:10px;" type="radio" name="gender" value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male"){
                            ?> checked <?php
                            } ?> required> Male
                            <input style="width:10px; height:10px;" type="radio" name="gender" value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female"){
                            ?> checked <?php
                            } ?> required> Female
                        </td>
                    </tr>

                    <!-- Birthday -->
                    <br>      
                    <!-- <label>Birthday</label> -->
                    <tr>
                        <td>Birthday
                        &nbsp;&nbsp;
                        <input type="date" name="dob" value="<?php if (isset($_SESSION['dob'])) {
                            echo $_SESSION['dob'];
                        } ?>" requred>
                        </td>
                    </tr>
                    

                    <!-- Submit Button -->
                    <button type="submit"  style="margin-bottom:20px" name="reg_user" >Sign me up!</button> <br>        
                   <button> <a style="text-decoration: none;" href="login.php">login to your account</a></button>
                </form>
            </div>
        </div>
    </div>

    <hr style="color:white; margin-top:265px; width:40%;">

    <!-- Footer -->
    <footer>			
    	<div class="footer"> 
            <a style="text-decoration-line: none; color: #977AFF;" href="admin.php"><i class="fas fa-user-shield"></i> Admin? click here <i class="fas fa-arrow-right"></i></a>
    		<p>  &copy;<?php echo  date("Y"); ?> All Rights Reserved <BR> Website designed and developed by <strong><U>@impradeepx</u></strong></p>
    	</div>
    </footer>


</body>

</html>