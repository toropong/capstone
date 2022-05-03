{{-- 실험용 임시 view 생성 --}}

@extends('layouts.work')

@section('section')
<section class="py-5">
    <div class="container">
        @if(session()->has('message'))
        <p>{{ session()->get('message') }}</p>
        @endif
        @isset($work)
        <div style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center;">
            <img src="{{ $work->thumbnail() }}" style="max-height: 100%; max-width: 100%;" />
        </div>
        <pre>work {{ json_encode($work, JSON_PRETTY_PRINT) }}</pre>
        <pre>pictures {{ json_encode($work->getPictures(), JSON_PRETTY_PRINT) }}</pre>
        @endisset
        @if(session()->has('picture'))
        <pre>added {{ json_encode(session()->get('picture'), JSON_PRETTY_PRINT) }}</pre>
        @endif
        @auth
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
        @endauth
    </div>
</section>
@endsection
