<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>RA QURROTA A'YUN</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('bootpro/assets/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('bootpro/css/styles.css')}}" rel="stylesheet" />
        <!-- Slick CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    </head>
    <!-- Our CSS -->
    <style>
        .slider .slick-slide {
        border: solid 1px #000;
      }
      .slider .slick-slide img {
        width: 100%;
      }
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{asset('bootpro/assets/img/logo-ra.png')}}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">FASILITAS</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">KEGIATAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">PROFIL</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">GURU</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">PPDB</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        {{-- <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">RA QURROTA A'YUN</div><br>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Berikutnya</a>
                
            </div>
        </header> --}}
        <header>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('{{asset('bootpro/assets/img/header1.png')}}')">
                  <div class="carousel-caption">
                    <p>RA QURROTA A'YUN</p>
                  </div>
                </div>
                <div class="carousel-item" style="background-image: url('{{asset('bootpro/assets/img/header2.png')}}')">
                </div>
                <div class="carousel-item" style="background-image: url('{{asset('bootpro/assets/img/header3.png')}}')">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </header>
        <!-- Services-->
        <section class="page-section bg-custome1" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">SARANA DAN PRASARANA</h2><br><br>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <h3 class="my-3">RUANG KELAS</h3>
                        <p class="text-muted"><img src="{{asset('bootpro/assets/img/ekskul/kelas.jpg')}}" alt="Image" height="250" width="250"></p>
                    </div>
                    <div class="col-md-4">
                        <h3 class="my-3">PERMAINAN OUTDOR</h3>
                        <p class="text-muted"><img src="{{asset('bootpro/assets/img/ekskul/outdor.jpg')}}" alt="Image" height="250" width="250"></p>
                    </div>
                    <div class="col-md-4">
                        <h3 class="my-3">PERMAINAN INDOR</h3>
                        <p class="text-muted"><img src="{{asset('bootpro/assets/img/ekskul/indor.jpg')}}" alt="Image" height="250" width="250"></p>
                    </div>
                </div><br><br>
                <div class="text-center">
                        <h3 class="section-heading text-uppercase">Video Pengenalan Ruang Kelas</h3><br>
                        <video width="700" controls>   
                            <source src="{{asset('bootpro/assets/img/ekskul/kelas.mp4')}}" type="video/mp4" />
                        </video>
                </div><br><br><br>
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">EKSTRAKURIKULER</h2><br><br>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-1 fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">KARATE</h4>
                        <p class="text-muted"><img src="{{asset('bootpro/assets/img/ekskul/karate.jpg')}}" alt="Image" height="250" width="250"></p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-2 fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">BANJARI</h4>
                        <p class="text-muted"><img src="{{asset('bootpro/assets/img/ekskul/banjari.jpg')}}" alt="Image" height="250" width="250"></p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-3 fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">SEPAK BOLA</h4>
                        <p class="text-muted"><img src="{{asset('bootpro/assets/img/ekskul/futsal.jpg')}}" alt="Image" height="250" width="250"></p>
                    </div>
                </div><br><br>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-4 fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">TARI</h4>
                            <p class="text-muted"><img src="{{asset('bootpro/assets/img/ekskul/tari.jpg')}}" alt="Image" height="250" width="250"></p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-5 fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">MEWARNA</h4>
                            <p class="text-muted"><img src="{{asset('bootpro/assets/img/ekskul/mewarna.jpg')}}" alt="Image" height="250" width="250"></p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-6 fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">TAHFIDS</h4>
                            <p class="text-muted"><img src="{{asset('bootpro/assets/img/ekskul/mengaji.jpg')}}" alt="Image" height="250" width="250"></p>
                        </div>
                    </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-custome2" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">KEGIATAN</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/senam.jpg')}}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">FISIK MOTORIK</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/sholat.png')}}" alt="..."/>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">KEGIATAN KEAGAMAAN</div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- Portfolio item 4-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/outclas1.jpg')}}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">OUTING CLASS</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Portfolio item 6-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/hBesar1.jpg')}}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">PERINGATAN HARI BESAR / HARI ISLAM</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Portfolio item 8-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/scDaring.jpg')}}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">PEMBELAJARAN DARING</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Portfolio item 9-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/luring.png')}}" alt="..."/>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">PEMBELAJARAN LURING</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section bg-custome3" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">PROFIL</h2><br><br><br>
                    {{-- <h3 class="section-subheading text-muted">Visi</h3> --}}
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('bootpro/assets/img/about/visi.jpg')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>VISI</h4>
                                {{-- <h4 class="subheading">Our Humble Beginnings</h4> --}}
                            </div>
                            <div class="timeline-body"><p>Terbentuknya generasi yang berakhlakul karimah, beriman dan bertakwa.</p></div>
                        </div>
                    </li><br><br><br>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('bootpro/assets/img/about/misi.jpg')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>MISI</h4>
                                {{-- <h4 class="subheading">An Agency is Born</h4> --}}
                            </div>
                            <div class="timeline-body"><p>1. Membimbing, membina dan mengarahkan putra putri untuk kepribadian islam dan berprestasi.</p></div>
                            <div class="timeline-body"><p>2. Membiasakan perilaku yang baik dalam kegiatan sehari-hari.</p></div>
                            <div class="timeline-body"><p>3. Mengembangkan kreativitas anak untuk mempersiapkan diri dalam memasuki jenjang yang lebih tinggi.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('bootpro/assets/img/about/location.png')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>LOKASI</h4>
                                {{-- <h4 class="subheading">Transition to Full Service</h4> --}}
                            </div>
                            <div class="timeline-body"><p>JL. Krapyak, Desa Panggungrejo, Kecamatan Kepanjen, Kabupaten Malang</p></div>
                        </div>
                    </li><br><br>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('bootpro/assets/img/about/sosmed.jpg')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>SOSIAL MEDIA</h4>
                                {{-- <h4 class="subheading">Phase Two Expansion</h4> --}}
                            </div>
                            <div class="timeline-body"><p><img src="{{asset('bootpro/assets/img/about/wa.png')}}" alt="Image" height="30" width="30">&nbsp;&nbsp;&nbsp;085102120143, 087704616524</p></div>
                            <div class="timeline-body"><p><img src="{{asset('bootpro/assets/img/about/ig.png')}}" alt="Image" height="30" width="30">&nbsp;&nbsp;&nbsp;@ra.qurrotaayun</p></div>
                            <div class="timeline-body"><p><img src="{{asset('bootpro/assets/img/about/fb.png')}}" alt="Image" height="30" width="30">&nbsp;&nbsp;&nbsp;RA Qurrota A'yun</p></div>
                            <div class="timeline-body"><p><img src="{{asset('bootpro/assets/img/about/tiktok.png')}}" alt="Image" height="30" width="30">&nbsp;&nbsp;&nbsp;@raqurrotaayun</p></div>
                            <div class="timeline-body"><p><img src="{{asset('bootpro/assets/img/about/yt.png')}}" alt="Image" height="30" width="30">&nbsp;&nbsp;&nbsp;RA Qurrota A'yun Kepanjen</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('bootpro/assets/img/about/child.png')}}" alt="..." /></div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">DEWAN GURU</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto" src="{{asset('bootpro/assets/img/guru/guru1.jpg')}}" alt="..." />
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto" src="{{asset('bootpro/assets/img/guru/guru2.jpg')}}" alt="..." />
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto" src="{{asset('bootpro/assets/img/guru/guru3.jpg')}}" alt="..." />
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto" src="{{asset('bootpro/assets/img/guru/guru4.jpg')}}" alt="..." />
                            
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="section-heading text-uppercase">VIDEO PENGENALAN IBU DEWAN GURU </h3><br>
                        <video width="700" controls>   
                            <source src="{{asset('bootpro/assets/img/guru/video.mp4')}}" type="video/mp4" />
                        </video>
                    </div>
                </div>
            </div>
        </section>
        <!-- PPDB-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">YUK GABUNG BERSAMA RA QURROTA A'YUN </h2><br><br>
                    <video width="600" controls>   
                        <source src="{{asset('bootpro/assets/img/PPDB/video.mp4')}}" type="video/mp4" />
                    </video><br><br>
                </div>
                <img class="img-fluid" src="{{asset('bootpro/assets/img/PPDB/pamflet.jpg')}}" alt="image" height="500" width="500"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/">
                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                    <i class="fas fa-share-square-o me-1"></i>
                    DAFTAR SEKARANG
                </button>
                </a>
                
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; RA Qurrota A'yun Kepanjen</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('bootpro/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">FISIK MOTORIK</h2><br><br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- Senam 1-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/senam.jpg')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- Senam 2-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/senam2.jpg')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- Senam 3-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/senam3.jpg')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- Senam 4-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/senam4.png')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('bootpro/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">KEGIATAN KEAGAMAAN</h2><br><br>
                                    <div class="col-lg-6 col-sm-8 mb-6">
                                        <!-- Senam 4-->
                                        <div class="portfolio-item">
                                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                                <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/sholat.png')}}" alt="..." />
                                            </a>
                                            <h5>Praktek Sholat</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('bootpro/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">OUTING CLASS</h2>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- outclas 1-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/outclas1.jpg')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- outclas 2-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/outclas2.jpg')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- outclas 3-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/outclas3.png')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- outclas 4-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/outclas4.png')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('bootpro/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">PERINGATAN HARI BESAR / HARI ISLAM</h2><br><br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- outclas 1-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/hBesar1.jpg')}}" alt="..." />
                                                    </a>
                                                   <h5>Peringatan Hari Santri</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- outclas 2-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/hariGuru.jpg')}}" alt="..." />
                                                    </a>
                                                    <h5>Peringatan Hari Guru</h5><br><br>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- outclas 3-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/maulid2.jpg')}}" alt="..." />
                                                    </a>
                                                    <h5>Peringatan Maulid Nabi SAW</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- outclas 4-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/maulid1.png')}}" alt="..." />
                                                    </a>
                                                    <h5>Peringatan Maulid Nabi SAW</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('bootpro/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">PEMBELAJARAN DARING</h2><br><br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- outclas 1-->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal8">
                                                        <video width="600"controls>
                                                            <source src="{{asset('bootpro/assets/img/kegiatan/daring1.mp4')}}" type="video/mp4" />
                                                          </video>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('bootpro/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">PEMBELAJARAN LURING</h2><br><br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- luring -->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/luring.png')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- luring -->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/luring3.jpg')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- luring -->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/luring1.jpg')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 mb-6">
                                                <!-- luring -->
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                                        <img class="img-fluid" src="{{asset('bootpro/assets/img/kegiatan/luring2.jpg')}}" alt="..." />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
