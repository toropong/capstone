<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>등록</title>
    <link href="css/image.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
<form action="/update" method="POST"  class="qwe" name="worksform" id="worksform" >
    {{csrf_field()}}
    <input type="hidden" name="no" id="no" value="">
    <div class="a">
        <label for="inputLastName1" class="form-label">작품이름</label>
        <div class="input-group"> <span> </span>
            <input type="text" name="title" value="" id="title" placeholder="작품명">
        </div>
    </div>
    <div class="b">
        <label for="inputLastName1" class="form-label">내용</label>
        <div>
        <textarea name="cont" value="" id="cont"></textarea>
        </div>
    </div>
        <div class="preview-wrap">
            <div class="preview-left">
              <div class="preview">
                <img src="" onerror="this.src=''" id="image-session">
                <div class="preview-image">
                  <!-- 이미지 미리보기 -->
                </div>
              </div>
            
            <div class="preview-right">
              <div class="image-upload">
                {{-- <label for="real-input">사진 업로드</label> --}}
              </div>
            </div>
        </div>
          </div>
    <input type="file" onchange="checkFile(this);" id="real-input" name="picture" class="image_inputType_file" accept="image*/">
    <div class="postbutton">
        <input type="submit" name="" value="저장" id="save" >
        <input type="button" value="창닫기"  id="close" onclick="window.close()">
      </div>
    <div class="c">
        <select name="year">
            @foreach(App\Models\Work::getYears() as $year)
            <option> 
                {{ $year }} 학년도
                @endforeach
    </div>
    <div class="btn-group">
    <input type="submit" value="작성" class="px-4 py-1 bg-green-500 hover:bg-green-700 text-lg text-white">
    <input type="button" value="취소" onclick="history.back()" class="px-4 py-1 ml-6 bg-red-500 hover:bg-red-700 text-lg text-white">
    </div>
</form>
</body>
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    //이미지 등록관련코드
    function checkFile(el){
      $('#image-session').attr('src', '#');
      var file = el.files;
      if(file[0].size > 1024 * 1024 * 2){
        alert('2MB 이하 파일만 등록할 수 있습니다.\n\n' +
        '현재파일 용량 : ' + (Math.round(file[0].size / 1024 / 1024 * 100) / 100) + 'MB');
        el.outerHTML = el.outerHTML;
      }
      else chk_file_type(el);
  
    }
    function chk_file_type(el) {
      var file_kind = el.value.lastIndexOf('.');
      var file_name = el.value.substring(file_kind+1,el.length);
      var file_type = file_name.toLowerCase();
      var check_file_type=new Array();
      check_file_type=['jpg','gif','png','jpeg','bmp','tif'];
      if(check_file_type.indexOf(file_type)==-1) {
        alert('이미지 파일만 업로드 가능합니다.');
        var parent_Obj=el.parentNode;
        console.log(parent_Obj);
        var node=parent_Obj.replaceChild(el.cloneNode(true),el);
        document.getElementById("real-input").value = "";    //초기화를 위한 추가 코드
        document.getElementById("real-input").select();        //초기화를 위한 추가 코드                                               //일부 브라우저 미지원
      }
      else{readURL(el);
        $("#real-input").change(function(){
          readURL(this);
        });
      }
    }
    // 사진을 올릴때마다 파일을 새로 변경시켜주는 함수입니다.
    function readURL(el) {
      if (el.files && el.files[0]) {
        var reader = new FileReader();
        // 이미지 미리보기해주는 jquery
        reader.onload = function (e) {
          $('#image-session').attr('src', e.target.result);
        }
  
        reader.readAsDataURL(el.files[0]);
      }
    }
    function check(){
      if($('#real-input').val()==""){
        $('#real-input').focus();
        alert('사진을 업로드 해주세요');
        return false;
      }
    }
  </script>

{{-- @section('javascript')

<script>

	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

        $(document).on("click", "#btn_work", function () {
			work_update();
		});

    });

    function work_update() {
		var req = $("#worksform").serialize();
		$.ajax({
			url: '/manage/update',
			type: 'POST',
			async: true,
			beforeSend: function (xhr) {
				$("#eventDetail_msg").html("");
			},
			data: req,
			success: function (res, textStatus, xhr) {
				if (res.result == true) {
					document.location.reload();
				} else {
					$("#eventDetail_msg").html(xhr.message);
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				$("#eventDetail_msg").html(xhr.responseJSON.message);
			}
		});
	}
</script>

@endsection --}}