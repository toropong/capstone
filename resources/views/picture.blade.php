{{-- 실험용 임시 view 생성 --}}

@extends('layouts.work')

@section('section')
<section class="py-5">
    <div class="container">
        @if(isset($work))
        <pre>work {{ json_encode($work, JSON_PRETTY_PRINT) }}</pre>
        @endif
        @if(isset($picture))
        {{-- post --}}
        <pre>picture {{ json_encode($picture, JSON_PRETTY_PRINT) }}</pre>
        @else
        {{-- get --}}
        {{-- file을 받기 위해서 enctype을 form-data로 설정해줘야 합니다 --}}
        <form method="POST" enctype="multipart/form-data">
            @csrf
            {{-- 여러 파일을 배열로 받습니다 --}}
            <input type="file" name="picture[]" accept="image/*" multiple />
            <input type="submit" value="Submit" />
        </form>
        @error('picture')
            <p>{{ $message }}</p>
        @enderror
        @endif
    </div>
</section>
@endsection
