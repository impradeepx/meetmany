<!-- Admin.php -->

<?php

    include 'connect.php';

    $error_array = array();

    if(isset($_POST['login_btn'])){
        $Username = filter_var($_POST['log_user'], FILTER_SANITIZE_EMAIL);
    
        $_SESSION['log_user'] = $Username;
        $password = $_POST['log_password'];
    
        $check_database_query = mysqli_query($con, "SELECT * FROM admin WHERE adminname='$Username' AND password='$password'")or die(mysqli_error($con));
        $check_login_query = mysqli_num_rows($check_database_query);
    
        if($check_login_query == 1){
            $row = mysqli_fetch_array($check_database_query) or die(mysqli_error($con));
            $username = $row['adminname'];
    
            $user_closed_query = mysqli_query($con,"select * from admin where adminname='$Username' and user_closed='yes'");    
            $_SESSION['username'] = $username;
            header("Location: admin_home.php");
            exit();
        }
        else{
            array_push($error_array, "Username or Password was incorrect");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="assets/fontawesome-free-5.15.1-web/css/all.css">
    <link rel="shortcut icon" href="images/favigon.jpg" type="image/x-icon">
    <title>Welcome Admin</title>

    <style>

        
           body{
            font-weight: bolder;
            color: white;
           }
        
    
    .alert{
        color: red;
        margin: auto;
    }
    .from_wreper{
        display: flex;
            justify-content: center;
            align-items: center;
            

        
    
    }
    .upper_body{
        color: white;
        font-size: 30px;
        text-align: center;
        margin-top: 70px;
        margin-bottom: 10px;
        
    }
    
    </style>

</head>
<body>
        <div class="upper_body">
           ADMIN DASHBOARD
        </div>

   
        <hr style="width: 50%; color: white; margin-bottom:25px; margin-top:25px;">
    

    <div class="from_wreper">
        <div class="signin-form">
            <div class="form-top-left">
                <h3 style="padding-top:10px;">Login<i class="fas fa-user-shield" style="float: right;"></i></h3>
                
            </div>
           
            <div class="form-bottom">
                <form action="admin.php" method="POST" class="login-form">
                    <!-- User Name -->
                        <label for="form-Username">Username</label>
                        <input type="text" name="log_user" placeholder="User Name " value="<?php if(isset($SESSION['log_user'])) {
                            echo $_SESSION['log_user'];
                        } ?>" required> <br>
                                            
                    <!-- Password -->
                        <label for="form-password">Password</label>
                        <input type="password" name="log_password" placeholder="Password" required> <Br>
                        
                    <!-- remember me -->
                    

                    <?php if(in_array("Username or Password was incorrect", $error_array)) echo "<p class='alert'>Username or Password was incorrect</p>"; ?>
                    <button type="submit" style="margin-bottom:20px" name="login_btn">Sign in</button>
                    <button><a style='text-decoration:none';  href="login.php">Login as a user</a></button>
                </form>     
            </div>
        </div>
    </div>
</body>
</html>
        