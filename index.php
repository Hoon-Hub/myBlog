<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="index__body">
<?php include "header.php"; ?>
<section class="container">
    <div class="content">
        <div class="login__div">
            <form action="loginCheck" method="post">
                <div class="information__div">
                    <input type="email" name="userId" id="userIdInput" placeholder="example@example.com"required autofocus><br>
                    <input type="password" name="userPassword" id="userPasswordInput" placeholder="비밀번호를 입력해주세요" required>
                </div>
                <div class="submit__div">
                    <button type="submit" >로그인</button>
                </div>
                <div class="identify__div">
                    <a href="identify/fotgotPassword.html">아이디 혹은 비밀번호를 잊어버리셨습니까?</a><br><br><br>
                    <span>혹은, 아직 회원이 아니십니까?</span><br><br><br>
                    <a href="./register.php">회원가입하러 가기</a>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>