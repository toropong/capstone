<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="{{ route('main') }}">중부대학교 졸업 작품</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('main') }}">홈</a></li>
                <li class="nav-item"><a class="nav-link" href="intro.php">행사 소개</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">작품 리스트</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
@foreach (App\Models\Work::getYears() as $year)
                        <li><a class="dropdown-item" href="{{ route('work', ['year'=>$year]) }}">{{ $year }} 학년도</a></li>
@endforeach
                    </ul>
                </li>
@auth
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">로그아웃</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('manage') }}" data-bs-toggle="modal" data-bs-target="#exampleModal">작품등록</a></li>
@else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">로그인</a></li>
@endif
            </ul>
        </div>
    </div>



    {{-- 작품등록 모달창 --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">작품등록</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/manage/update/{no}" method="POST"  class="qwe" name="worksform" id="worksform" accept-charset="utf-8" enctype="multipart/form-data" onsubmit="return check();" >
                    {{csrf_field()}}
                    <input type="hidden" name="no" id="no" value="">
                    <div class="a">
                        <label for="inputLastName1" class="form-label">작품이름</label>
                        <div class="input-group"> <span> </span>
                            <input type="text" name="title" value="" id="title" placeholder="작품명">
                        </div>
                        <div class="title_blank" id="title_blank"></div>
                    </div>
                    <div class="b">
                        <label for="inputLastName1" class="form-label">내용</label>
                        <div>
                        <textarea name="cont" value="" id="cont"></textarea>
                        </div>
                        <div class="content_blank" id="content_blank"></div>
                    </div>
                        <div class="preview-wrap">
                            <div class="preview-left">
                              <div class="preview">
                                <img src="" onerror="this.src='imglib/noimage.png'" id="image-session">
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
                          {{-- @endforeach --}}
                    <input type="file" onchange="checkFile(this);" id="real-input" name="picture" class="image_inputType_file" accept="image*/">
                 
                    <div class="c">
                        <select name="year">
                            @foreach(App\Models\Work::getYears() as $year)
                            <option> 
                                {{ $year }} 학년도
                                @endforeach
                              
                    </div>
                    <div class="postbutton">
                        {{-- <input type="submit" name="" value="저장" id="save" onclick="save_check()"> --}}
                        <input type="hidden" value=""  id="close"  >
                      </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="" value="저장" id="save"onclick="save_check()">저장</button>
              <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" value="창닫기"  id="close"  onclick="history.back()">창닫기</button>
            </div>
        </form>
          </div>
        </div>
      </div>
</nav>




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
    function save_check(){
        var title = $('#title');
        var content = $('#cont');
        var title_cont = title.val();
        var content_cont = content.val();

        if (title_cont == "") {
            $('#title_blank')
                .text("제목을 입력해주세요.")
                .css('color', 'red');
            title_cont.focus();
            return false;
        } 
        if (content_cont == "") {
            $('#content_blank')
                .text("내용을 입력해주세요.")
                .css('color', 'red');
            content_cont.focus();
            return false;
        
    }
  }
  </script>