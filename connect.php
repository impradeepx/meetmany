
<!-- connect.php------------- -->

<?php


ob_start();
session_start();

$timezone = date_default_timezone_set("Asia/Kolkata");

$con = mysqli_connect("localhost","root","","oocean");

if(mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_errno();
}
// else{
//     echo'Connected';
// }

?>