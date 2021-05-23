<?php
     $nickName = htmlspecialchars($_POST['nickName']);
     include "db.php";
     $sql = "select nick_name from myblog where nick_name='$nickName'";
     $result = mysqli_query($conn, $sql);
     if($result){
         $row = mysqli_fetch_assoc($result);
         return $row['nick_name'];
     }else{
         return;
     }



?>