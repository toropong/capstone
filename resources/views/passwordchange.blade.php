{{-- 실험용 임시 view 생성 --}}
<form method="POST">
    @csrf
    <input name="password" type="password" required autofocus />
    <input name="password_confirmation" type="password" required />
    <input type="submit" value="submit" />
</form>
@error('password') <p>password error</p> @enderror