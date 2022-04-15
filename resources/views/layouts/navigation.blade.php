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
@foreach (App\Models\Work::select('year')->distinct()->orderby('year', 'desc')->get() as $work)
                        <li><a class="dropdown-item" href="/work/{{ $work->year }}">{{ $work->year }} 학년도</a></li>
@endforeach
                    </ul>
@auth
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">로그아웃</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('manage') }}">관리자 페이지</a></li>
@else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">로그인</a></li>
@endif
            </ul>
        </div>
    </div>
</nav>
