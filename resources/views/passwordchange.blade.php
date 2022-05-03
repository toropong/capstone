{{-- 실험용 임시 view 생성 --}}

@extends('layouts.work')

@section('section')
<section class="container py-5">
<form method="POST">
    @csrf
    <input name="password" type="password" required autofocus />
    <input name="password_confirmation" type="password" required />
    <input type="submit" value="submit" />
</form>
@error('password') <p>{{ $message }}</p> @enderror
</section>
@endsection
