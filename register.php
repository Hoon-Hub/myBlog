<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>
<body class="register__body">
<?php include "header.php"; ?>
<section class="register__container">
    <h2>간단한 회원가입으로 모든 것들을 즐기세요!</h2>
    <form id="registerForm" method="post">
        <div>
            <div class="email__identi__area">
                <input type="email" name="user_email" id="userEmail" onkeydown="emailChangeListen()" value="" placeholder="이메일을 입력해주세요." required autofocus maxlength="34">
                <button type="button" id="emailCheck">중복확인</button>
                &nbsp;
            </div>
            <div class="email__span__div">
                <span id="lengthCheckSpan"></span><br>
                <span id="EmailCheckSpan" class="email_validation_check"></span>
            </div>
        </div>
        <div>
            <input type="text" name="nick_name" id="nickName" placeholder="사용하실 별명을 입력해주세요." required maxlength="20">
            <span id="nickNameCheckSpan"></span>
        </div>
        <div>
            <input type="password" name="password" id="password" required placeholder="비밀번호를 입력해주세요.">
            <input type="password" name="password_check" id="passwordCheck" required placeholder="비밀번호를 확인해주세요."><br>
        </div>
        <div>
            <span id="passwordCheckSpan"></span>
            <span id="passwordCheckSpan2"></span>
        </div>
        <div>
            <button type="submit">회원가입</button>
            <button type="reset">초기화</button>
            <button type="button" onclick="getOut()">취소</button>
        </div>
    </form>
</section>



<script>

{   // 비밀번호
    const password1 = document.getElementById('password');
    let pwCheckingSpan = 0;

    password1.addEventListener("keyup", ()=>{
        let pw01Value = document.getElementById('password').value;
        if(pw01Value.length < 4 && pw01Value.length > 0){
            document.getElementById('passwordCheckSpan').innerHTML = '비밀번호는 4자 이상이어야합니다.'
            document.getElementById('passwordCheckSpan').setAttribute('style','color:red; font-size:12px;')
            pwCheckingSpan = 1;
        }else if(pw01Value.length >= 4 ){
            document.getElementById('passwordCheckSpan').setAttribute('style','display:none;');
            pwCheckingSpan = 0;

        }


    });
    const password2 = document.getElementById('passwordCheck');

    password2.addEventListener("keyup", ()=>{
        let pw02Value = document.getElementById('passwordCheck').value;
            
        if(pw02Value.length < 4 && pw02Value.length > 0 && pwCheckingSpan === 0){   // 4글자 미만, 0글자 초과, span 이 없을 때 
            document.getElementById('passwordCheckSpan2').innerHTML = '비밀번호는 4자 이상이어야합니다.'
            document.getElementById('passwordCheckSpan2').setAttribute('style','color:red; font-size:12px;')
            pwCheckingSpan = 1;
        }else if(pw02Value.length >= 4){
            document.getElementById('passwordCheckSpan2').setAttribute('style','display:none;')
            pwCheckingSpan = 0;

        }
    });
}


    
{// 닉네임 
    document.getElementById('nickName').addEventListener("keyup", ()=> {
        
        let nickName = document.getElementById('nickName').value;
        
        if(nickName.length < 2) {   //닉네임이 2자 미만일 때
            document.getElementById('nickNameCheckSpan').innerHTML = '닉네임은 2자 이상어이야합니다.';
            document.getElementById('nickNameCheckSpan').setAttribute('style','color:red; font-size:12px;');
            return ;
        }else if(nickName.length >= 20){    // 닉네임이 20자 이상일 때
            document.getElementById('nickNameCheckSpan').innerHTML = '닉네임은 20자 미만이어야합니다.';
            document.getElementById('nickNameCheckSpan').setAttribute('style','color:red; font-size:12px;');
            return ;
        }else{  // 그 이외
            $.ajax({
                    url: 'nickNameCheck.php',
                    data: {
                        nickName: nickName,
                    },
                    type: 'get',
                }).done(function(data){
                    console.log(nickName);
                    console.log(data);
                    if(data === ''){   //닉네임이 존재하지 않을 때 
                        document.getElementById('nickNameCheckSpan').innerHTML = '닉네임을 사용하실 수 있습니다.';
                        document.getElementById('nickNameCheckSpan').setAttribute('style','color:blue; font-size:12px;');
                    }else{     //닉네임이 존재할때
                        document.getElementById('nickNameCheckSpan').innerHTML = '닉네임을 사용하실 수 없습니다.';
                        document.getElementById('nickNameCheckSpan').setAttribute('style','color:red; font-size:12px;');
                    }
                })
        }
    });
}


{   //이메일 관련
    function emailChangeListen(){
        emailCheck = 0; // 회원가입할 때 체크 
    }


    document.getElementById('emailCheck').addEventListener("click", function (e) {
        e.preventDefault();

        let userEmail = document.getElementById('userEmail').value;
        const regExp = /[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]$/i;

        if(userEmail === '' ){
            document.getElementById('EmailCheckSpan').innerHTML = '이메일을 작성해주세요.';
            document.getElementById('EmailCheckSpan').setAttribute('style','color:red; font-size:12px;');
            return false;
        }
        else if(userEmail.match(regExp) === null){
            document.getElementById('EmailCheckSpan').innerHTML = '이메일을 사용하실 수 없습니다.';
            document.getElementById('EmailCheckSpan').setAttribute('style','color:red; font-size:12px;');
            return false;
        }else{
            $.ajax({
                url: 'emailCheck.php',
                data: {
                    userEmail: userEmail,
                },
                type: 'POST',
            }).done(function(data){
                if(data === ""){
                    console.log('email');
                    document.getElementById('EmailCheckSpan').innerHTML = '이메일을 사용하실 수 없습니다.';
                    document.getElementById('EmailCheckSpan').setAttribute('style','color:red; font-size:12px;');
                }else{
                    document.getElementById('EmailCheckSpan').innerHTML = '이메일을 사용하실 수 있습니다.';
                    document.getElementById('EmailCheckSpan').setAttribute('style','color:blue; font-size:12px;');
                    emailCheck = 1; // 회원가입할 때 체크 
                }
            });
        }
        
    });
    
}    


{
    // 34 글자 count 하여 keyup에 반환하는 코드
    function emailCheck(){
        userEmail = document.getElementById('userEmail').value;
        document.getElementById('lengthCheckSpan').innerHTML = userEmail.length + ' / 34';
        document.getElementById('lengthCheckSpan').setAttribute('style','font-size:12px;');

    }
    document.getElementById('userEmail').addEventListener("keydown", emailCheck);


    // 아이디 중복 확인 메세지 출력
    function idCheck(){
        userEmail = document.getElementById('userEmail').value;
        
    }
    document.getElementById('userEmail').addEventListener("focusout", idCheck);

    // 회원가입 취소
    function getOut(){
        location.href='index.php';
    }


}
</script>
</body>
</html>