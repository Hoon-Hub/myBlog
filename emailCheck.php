<?php
    // header("Content-Type: application/json");

    $emailId = htmlspecialchars($_POST['userEmail']);
    include "db.php";
    $sql = "select user_email from blog_user where user_email='$emailId'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo $row['user_email'];
    }else{
        echo '';
    }

?>