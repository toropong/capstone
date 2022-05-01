{{-- 실험용 임시 view 생성 --}}

@extends('layouts.work')

@section('section')
<section class="py-5">
    <div class="container">
        @if (isset($work))
        @section('title', $work->title)
        {{ json_encode($work) }}
        @elseif (isset($works))
        @section('title', $year . ' 학년도 작품목록')
        @foreach ($works as $index => $work)
        <p>
            <a href="{{ route('product', ['work' => $work->getID() ]) }}">
                <span>{{ $work->title }}</span>
            </a>
            <span>{{ $work->cont }}</span>
        </p>
        @endforeach
        @endif
    </div>
</section>
@endsection
