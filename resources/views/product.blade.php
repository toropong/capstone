<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Small Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('layouts.navigation')
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{ $work->thumbnail() }}" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">{{ $work->title }}</h1>
                    <p>팀원, 팀명</p>
                    <a class="btn btn-primary" href="#!">소스코드 보기</a>
                </div>
            </div>
            <!-- Call to Action-->
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0">{{ $work->cont }}</p></div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">다른작품1</h2>
                            <img class="img-fluid rounded mb-4 mb-lg-0" src="https://cdn.gametoc.co.kr/news/photo/202110/62970_203440_5824.png" alt="..." />
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">보러가기</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">다른작품2</h2>
                            <img class="img-fluid rounded mb-4 mb-lg-0" src="http://media1.or.kr/wp-content/uploads/2019/08/url-696x444.jpg" alt="..." />
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">보러가기</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">다른작품3</h2>
                            <img class="img-fluid rounded mb-4 mb-lg-0" src="https://www.joongbu.ac.kr/upload/editor/images/000107/20220221110438606_HB1KJ2XH.jpg" alt="..." />
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">보러가기</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
    </body>
</html>
