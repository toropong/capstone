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

<form action=""  class="qwe" name="worksform" id="worksform" >
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
    <div class="c">
        <label for="inputLastName1" class="form-label">년도</label>
        <div>
        <textarea name="year" value="" id="year"></textarea>
        </div>
    </div>
    <div class="d">
        <button type="button" id="btn_work">등록</button>
    </div>
</form>

@section('javascript')

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

@endsection