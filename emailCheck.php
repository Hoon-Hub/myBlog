<?php
    // header("Content-Type: application/json");

    $emailId = htmlspecialchars($_POST['userEmail']);
    // $emailId = $_POST['userEmail'];
    include "db.php";
    $sql = "select user_email from myblog where user_email='$emailId'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        return $row['user_email'];
    }else{
        return;
    }

?>