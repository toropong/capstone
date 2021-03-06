{{-- 실험용 임시 view 생성 --}}

@extends('layouts.work')

@section('section')
<section class="py-5">
    <div class="container">
        @isset($work)
            @section('title', $work->title)
            <pre>work {{ json_encode($work, JSON_PRETTY_PRINT) }}</pre>
            <pre>pictures {{ json_encode($work->getPictures(), JSON_PRETTY_PRINT) }}</pre>
        @elseif (isset($works))
            @section('title', $year . ' 학년도 작품목록')
            @foreach ($works as $index => $work)
                <p>
                <a href="{{ route('product', ['work' => $work->getID()]) }}">
                    <span>{{ $work->title }}</span>
                </a>
                <span>{{ $work->cont }}</span>
            </p>
            @endforeach
        @endisset
    </div>
</section>
@endsection
