<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PPDB RA QURROTA A'YUN</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('front/assets/favicon.ico')}}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand" href="#"><img src="{{asset('bootpro/assets/img/logo-ra.png')}}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if (Route::has('login'))
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><b>LOGIN</a></li>

                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('form.create') }}">DAFTAR</a></li>
                        @endif
                    @endauth
            @endif
                        {{-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Services</a></li> --}}
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">PPDB ONLINE <br> RA QURROTA A'YUN</h1>
                            <!-- <p class="lead text-white-50 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world???s most popular front-end open source toolkit!</p> -->
                            <br><br><br><br><br><br>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('form.create') }}">DAFTAR</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#about">INFO</a>
                            </div>
                            <br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        
        <!-- Pricing section-->
        <section class="bg-light py-5 border-bottom" id="about">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Alur Pendaftaran</h2>
                    <p class="lead mb-0">Berikut adalah alur pendaftaran peserta didik baru RA Qurrota A'yun tahun ajaran 2021/2022</p>
                </div>
                    <div class="row gx-5 justify-content-center">
                        @foreach ($informasis as $info)
                        <!-- Pricing card pro-->
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="mb-3">
                                        <center><img src="{{asset('images/info/'.$info->gambar)}}" width="60px" height="60px"></center>
                                    </div>
                                    <div class="small text-uppercase fw-bold text-muted"> <center><h1>{{$info->no}}</h1></center></div>
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2 text-muted">
                                            <center>{{$info->keterangan}}</center>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                @endforeach
                    </div>
            </div>
        </section>
        <!-- Testimonials section-->
        
        <!-- Contact section-->
        
        <!-- Footer-->
        <footer class="py-4 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; RA QURROTA A'YUN KEPANJEN 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('front/js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
