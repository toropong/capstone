<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
</head>
<body>
    <input type="text" placeholder="id" onkeypress="enterkey()" id="login_id">
    <div id="login_blank"></div>
    <input type="password" placeholder="password" onkeypress="enterkey()" id=login_pw>
    <div id="login_blank1"></div>
    <input class="login_bt" type="button" onclick="login_message()" value="로그인">
</body>
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">


function enterkey(){
    if(window.event.keycode == 13){
        login_message();
    }
}
function login_message(){


    var login_id = document.getElementById("login_id");
    var login_pw = document.getElementById("login_pw");

    if((login_id.value)==""){
        $('#login_blank').text("Id를 입력해주새요.");
        $('#login_blank').css('color','red');
        $("#login_id").focus();
        return false;
    }
    else if((!((login_pw.value)==""))&&((login_id.value)=="")){
        document.getElementById('login_blank1').style.display="none";
        console.log(1);
    }
    if((login_pw.value)==""){
        $('#login_blank1').text("Password를 입력해주새요.");
        $('#login_blank1').css('color','red');
        $("#login_pw").focus();
        return false;
    }
   
    var logindata_id= $('#login_id').val();
    var logindata_pw= $('#login_pw').val();
   
    $.ajax({

type: 'post',
url: '',
dataType: 'json',
data:{
  "" : logindata_id,  //input_id는 key값 컨트롤러에서 사용되는 값, login_id는 value값 var login_id로 선언된 값
  "" : logindata_pw
},


success : function(data) {
      if(data==0){
        $('#login_blank').text("가입하지 않은 아이디이거나, 잘못된 비밀번호입니다.");
        $('#login_blank').css('color', 'red');
        $("#login_id").focus();
        document.getElementById('login_check1').style.display="none";
      }
      else if(data==1){
        alert("환영합니다 ~님");
        location.href="/";
      }},
      error : function(){
          console.log(2)
      }
      })
}
</script>

</html>

