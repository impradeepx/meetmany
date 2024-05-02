
<!-- Index.php -->



<?php
    include 'navbar.php';
    // include 'User.php';
    // include 'Post.php';
    // include 'Message.php';

    if(isset($_POST['post'])){
        $uploadOk = 1;
        $imageName = $_FILES['fileToUpload']['name'];
        $errorMessage = "";
        
        if($imageName != ""){
            $targetDir = "assets/images/posts/";
            $imageName = $targetDir . uniqid() . basename($imageName);
            $imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);
            
            if($uploadOk){
                if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imageName)){
                    //image Upload Okey
                    $errorMessage = "uploaded";
                }
                else{
                    $uploadOk = 0;
                    $errorMessage = "fail to upload";
                }
            }
        }
        
        if($uploadOk){
            $post = new Post($con, $userLoggedIn);
            $post->submitPost($_POST['post_text'], $imageName);
        }
        else{
            echo "<div style='text-align: center;' class='alert alert-danger'> $errorMessage </div>";
        }
    }

    $user_detail_query = mysqli_query($con,"select * from users where username='$userLoggedIn'");
    $user_array = mysqli_fetch_array($user_detail_query);
    $num_friends = (substr_count($user_array['friend_array'],","))-1;

?>
<!DOCTYPE html>
< lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meetmany</title>
</head>
<bod>
    



 <div class="index-wrapper">
    
   
    <div class="post-wrap">
        <div class="post-inner">
            <div class="post-h-left">
          

            </div>
            <div class="post-body">
    <form class="post_form" action="index.php" method="POST" enctype="multipart/form-data">

          <textarea class="status" name="post_text" id="post_text" placeholder="Share your thaught!" rows="4" cols="50"></textarea>
           
         <div class="p-fo-left">
         <ul>
                   <input type="file" name="fileToUpload" id="fileToUpload"/>
                  <label for="fileToUpload"> <img src="assets/images/camera.png" alt="" height="20px"></i> </label>
                  <span class="tweet-error"></span>
                <input id="sub-btn" type="submit" name="post" value="POST">
         </ul>
     </form>
                    
        </div>       
            <div class="hash-box">
                     
                    </div>


                    </div>
                      </div>
              <div class="post-footer">


           
            </div>
        </div>
    </div>
    <div class="show_post">
        <?php 
            $post = new Post($con, $userLoggedIn) ;
            $post->indexPosts();
        ?>
    </div>
</div>
</body>
</html>