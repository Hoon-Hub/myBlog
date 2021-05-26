<?php
     $nickName = htmlspecialchars($_GET['nickName']);
     include "db.php";
     $sql = "select nick_name from blog_user where nick_name='$nickName'";
     $result = mysqli_query($conn, $sql);
     if(mysqli_num_rows($result) > 0){
         $row = mysqli_fetch_assoc($result);
         echo $row['nick_name'];
     }else{
         echo '' ;
     }



?>