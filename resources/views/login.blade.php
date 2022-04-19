<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link href="css/login.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
    <div class="login-box">
    <form class="login-form">
        <h1>LogIn</h1>
        <input class="login_inform" id="login_id" type="text" placeholder="id" autocomplete="username" onkeypress="enterkey()" autofocus />
        <div id="login_blank"></div>
        <input class="login_inform" id="login_pw" type="password" placeholder="password" autocomplete="current-password" onkeypress="enterkey()" />
        <div id="login_blank1"></div>
        <input class="login_bt" type="button" value="로그인" onclick="login_message()" />
    </form>
    </div>
</body>
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    function enterkey() {
        if (window.event.keyCode == 13) {
            login_message();
        }
    }

    function login_message() {
        var login_id = $('#login_id');
        var login_pw = $('#login_pw');
        var logindata_id = login_id.val();
        var logindata_pw = login_pw.val();

        if (logindata_id == "") {
            $('#login_blank')
                .text("ID를 입력해주세요.")
                .css('color', 'red');
            login_id.focus();
            return false;
        } else if ((!(logindata_pw == "")) && (logindata_id == "")) {
            $('#login_blank1').text('');
            console.log(1);
        }
        if (logindata_pw == "") {
            $('#login_blank1')
                .text("Password를 입력해주세요.")
                .css('color', 'red');
            login_pw.focus();
            return false;
        }

        $.ajax({
            type: 'post',
            url: '/login',
            dataType: 'json',
            data: {
                "user_id": logindata_id, //input_id는 key값 컨트롤러에서 사용되는 값, login_id는 value값 var login_id로 선언된 값
                "password": logindata_pw,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                if (!data.success) {
                    $('#login_blank')
                        .text("가입하지 않은 아이디이거나, 잘못된 비밀번호입니다.")
                        .css('color', 'red');
                    $('#login_blank1').text('');
                    login_id.focus();
                } else {
                    alert("환영합니다 " + data.user_name + "님");
                    location.href = "{{ route('main') }}";
                }
            },
            error: function() {
                $('#login_blank')
                    .text("오류가 발생하였습니다.")
                    .css('color', 'red');
            }
        });

        return false;
    }
</script>
</html>