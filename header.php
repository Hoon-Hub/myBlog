<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>
<body>
<section class="header">
    <div id="headerMainDiv" class="header__main__div">
        <img id="imgtag"src="images/logo.png" id="logo-img" alt="메인으로 가기" width="50px" height="50px">
        <span>&nbsp;&#58; 내 안의 보석</span>
    </div>
    
</section>


<script>
    headerMainDiv = document.getElementById('headerMainDiv');
    headerMainDiv.addEventListener('click', () => {
        location.href="main.php";
    });
</script>
</body>
</html>