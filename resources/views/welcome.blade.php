<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    {{-- <link rel="website icon" type="png" href="{{ url('picture/logo-dlh-nobg.png') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Dinas Lingkungan Hidup</title>
</head>

<body>

<!-- Navbar -->
<nav class="navbar border-3 border-bottom border-success sticky-top" id="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler ms-md-5 focus-ring focus-ring-light text-decoration-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" aria-label="Toggle navigation">
            <img clas src="{{ url('picture/logo-dlh-nobg.png') }}" width="90" height="50" alt="">
        </button>

        <div class="d-none d-lg-block">
            <ul class="nav me-5">
                <li class="nav-item">
                    <a class="nav-link h1 fw-semibold" href="#layanan" style="color: #315A39;">Layanan Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h1 fw-semibold" href="#proker" style="color: #315A39;">Program</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link h1 fw-semibold" href="#penanggung" style="color: #315A39;">Penanggung Jawab</a>
                    </li>
                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('dashboard') }}" class="nav-link btn focus-ring focus-ring-success" style="background-color: #315A39; color: #FFFFFF;">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link btn focus-ring focus-ring-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #315A39; color: #FFFFFF;">Masuk</a>
                        @endauth
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close text-start p-3" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="text-center mt-0">
                    <img src="{{ url('picture/logo-dlh-nobg.png') }}" width="190" height="100" alt="">
                    <h1 class="modal-title fs-3 fw-semibold" id="exampleModalLabel">Dinas Lingkungan Hidup Administrator</h1>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="my-3 px-3">
                        <label for="basic-url" class="form-label text-start">Username :</label>
                        <input type="text" id="email" type="email" name="email" class="form-control d-inline-flex focus-ring focus-ring-warning text-decoration-none" aria-describedby="basic-addon3 basic-addon4" required autofocus autocomplete="username" style="background-color: #D9D9D9;">
                    </div>
                    <div class="mb-3 px-3">
                        <label for="basic-url" class="form-label text-start">Password :</label>
                        <input type="password" id="password" type="password" name="password" class="form-control d-inline-flex focus-ring focus-ring-warning text-decoration-none" aria-describedby="basic-addon3 basic-addon4" required autocomplete="current-password" style="background-color: #D9D9D9;">
                    </div>
                    <div class="text-center">
                        <button name="submit" type="submit" class="btn px-5 my-3 text-white" style="background-color: #00784A;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title" id="offcanvasNavbarLabel">Dinas Lingkungan Hidup</h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a href="#layanan" class="nav-link active" aria-current="page">Layanan Dinas</a>
            </li>
            <li class="nav-item">
                <a href="#proker" class="nav-link active" aria-current="page">Program Kerja Dinas</a>
            </li>
            <li class="nav-item">
                <a href="#penanggung" class="nav-link active" aria-current="page">Penaggung Kerja Dinas</a>
            </li>
            <div class="mt-3">
                @if (Route::has('login'))
                    @auth
                    <a href="{{ url('roles') }}" class="nav-link btn focus-ring focus-ring-success" style="background-color: #315A39; color: #FFFFFF;">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link btn focus-ring focus-ring-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #315A39; color: #FFFFFF;">Masuk</a>
                    @endauth
                @endif
            </div>
        </ul>
    </div>
</div>

<!-- About -->
<section id="about" class="d-md-block d-none" style="position: relative;">
    <div class="position-relative" id="hero">
        <div class="gradient" id="gradi" style="width: 100%"></div>
            <img src="{{ url('picture/FB_IMG_15595153573131931.jpg') }}" alt="..." style="width: 100%;">
            <x-input-error :messages="$errors->get('email')" />

            <div class="position-absolute top-50 start-0 translate-middle-y ps-5">
                <h1 id="desc-utama" class="fw-semibold fs-1 d-md-block d-none" style="color: #FFFFFF;">Dinas Lingkungan Hidup<br class="d-block d-md-none"> Kabupaten Gowa</h1>
                <h1 id="desc-utama" class="fw-semibold fs-4 d-block d-md-none" style="color: #FFFFFF;">Dinas Lingkungan Hidup<br class="d-block d-md-none"> Kabupaten Gowa</h1>
                <p  class="mt-4 ps-3 border-start border-4 border-white d-none d-lg-block d-md-none" style="font-size: 1vwl; color: #FFFFFF;">Jaga kebersihan lingkungan untuk masa depan yang lebih hijau dan sehat. <br>Bersama-sama kita bisa menjaga kelestarian alam dan memberikan<br>lingkungan yang bersih dan nyaman bagi generasi mendatang.</p>
                <div class="d-none d-md-block">
                    <a href="#proker" type="button" class="btn btn-lg text-white px-4 mt-3" style="background-color: #315A39; border-radius: 12px;">Lets Go<i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>

            <div class="position-absolute top-100 start-50 translate-middle my-5 d-none d-lg-block d-md-none" style="height: 50vh">
                <div class="d-md-flex justify-content-center gap-4">
                    <div class="col-md-6">
                        <div class="card text-center mb-3 rounded-4 border-2 h-100" id="carD" style="max-width: 20rem;">
                            <div class="card-body rounded-4 shadow">
                                <img src="{{ url('picture/truk.png') }}" alt="truck" style="max-width: 10rem;">
                                <h5 class="card-title fw-semibold">Truk Sampah</h5>
                                <p class="card-text">Dinas Lingkungan Hidup memiliki 20 armada truk sampah yang siap melayani pengangkutan dan pengolahan sampah anda</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-center mb-3 rounded-4 border-2 h-100" id="carD" style="max-width: 20rem;">
                            <div class="card-body rounded-4 shadow">
                                <img src="{{ url('picture/cycle.png') }}" alt="cycle" style="max-width: 10rem;">
                                <h5 class="card-title fw-semibold">Pembuangan</h5>
                                <p class="card-text">Kami memastikan dalam pengolahan sampah secara teratur dan efisien dalam menjaga kebersihan lingkungan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-center mb-3 rounded-4 border-2 h-100" id="carD" style="max-width: 20rem;">
                            <div class="card-body rounded-4 shadow">
                                <img src="{{ url('picture/leaf.png') }}" alt="leaf" style="max-width: 10rem;">
                                <h5 class="card-title fw-semibold">Menjaga</h5>
                                <p class="card-text">Kami siap dan siaga dalam menjaga kebersihan lingkungan dengan berbagai program dan layanan yang kami sediakan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Program Kerja-->
<section id="proker" class="d-md-block d-none py-5" style="background-color: #eee">
    <div class="px-3 mb-5 text-center">
        <h4 class="fw-semibold" style="color: #315A39">Program Kerja</h4>
        <h2 class="fw-semibold">Program Kerja Kami Untuk Masyarakat</h2>
    </div>
    <div class="wrapper ms-5 ps-5">
        <ul class="carousel">
            @foreach ($proker as $prog)
                <li class="card h-100 border border-4 px-2">
                    <div class="row justify-content-center pt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <div style="width: 18rem; max-width: 100%;">
                                <div style="padding-top: 56.25%; position: relative;">
                                    <img class="rounded-3 img-fluid position-absolute top-0 start-0 w-100 h-100" src="{{ url('images').'/'.$prog->image_prog }}" alt="img" draggable="false" style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 px-3 pt-3">
                        <h2 class="text-start">{{ $prog->judul_prog }}</h2>
                        <span class="text-start">{{ $prog->description_prog }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<section id="proker" class="d-md-block d-none py-5">
    <div class="px-3 mb-5 text-center">
        <h4 class="fw-semibold" style="color: #315A39">Dokumentasi</h4>
        <h2 class="fw-semibold">Dokumentasi dari beberapa Kegiatan Kami</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-7">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($dokumentasi as $index => $doc)
                        <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($dokumentasi as $index => $doc)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ url('images').'/'.$doc->image_doc }}" class="d-block w-100 border border-4 border-success rounded-3" style="max-width: 50rem; height: auto;" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white">{{ $doc->judul_doc }}</h5>
                                <p class="text-white">{{ $doc->description_doc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    {{-- <div class="wrapper ms-5 ps-5">
        <ul class="carousel">
            @foreach ($dokumentasi as $doc)
                <li class="card h-100 border border-4 border-success px-2">
                    <div class="row justify-content-center pt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <div style="width: 18rem; max-width: 100%;">
                                <div style="padding-top: 56.25%; position: relative;">
                                    <img class="rounded-3 img-fluid border border-4 position-absolute top-0 start-0 w-100 h-100" src="{{ url('images').'/'.$doc->image_doc }}" alt="img" draggable="false" style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 px-3 pt-3">
                        <h2 class="text-start">{{ $doc->judul_doc }}</h2>
                        <span class="text-start">{{ $doc->description_doc }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div> --}}
</section>


<!-- Penanggung Jawab -->
<section id="penanggung" class="d-md-block d-none py-5" style="background-color: #eee">
    <div class="px-3 mb-5 text-center">
        <h4 class="fw-semibold" style="color: #315A39">Penanggung Jawab</h4>
        <h2 class="fw-semibold">Penanggung Jawab Dinas yang Bertugas saat ini</h2>
    </div>
    <div class="wrapper ms-5 ps-5">
        <ul class="carousel">
            @foreach ($penanggung as $nanggung)
                <li class="card h-100 border border-4 border-success px-2">
                    <div class="row justify-content-center pt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <div style="width: 18rem; max-width: 100%;">
                                <div style="padding-top: 56.25%; position: relative;">
                                    <img class="rounded-3 img-fluid border border-4 position-absolute top-0 start-0 w-100 h-100" src="{{ url('images').'/'.$nanggung->image_penanggung }}" alt="img" draggable="false" style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 px-3 pt-3">
                        <h2 class="text-start">{{ $nanggung->name }}</h2>
                        <span class="text-start">{{ $nanggung->description }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>


<!-- Pihak -->
<section id="pihak" class="d-md-block d-none py-5">
    <div class="px-4 mb-5 text-center">
        <h5 class="fw-semibold">Kami telah bekerjasama dengan beberapa industri yang terbaik</h5>
    </div>
    <div class="logos">
        <div class="logos-slide">
            @foreach ($pihak as $terkait)
                <img src="{{ url('images/'.$terkait->image_pihak) }}" />
            @endforeach
        </div>
    </div>
    <script>
        var copy = document.querySelector(".logos-slide").cloneNode(true);
        document.querySelector(".logos").appendChild(copy);
    </script>
</section>

<!-- Footer -->
<section id="footer" class="d-md-block d-none" style="overflow: hidden;">
        <div class="row text-white px-5 py-5" style="background-color: #00784A;">
            <div class="col-md-7">
                <h2 class="fw-semibold fs-3">Dinas Lingkungan Hidup<br>Kabupaten Gowa</h2>
                <p>Jl. Tumanurung Raya No.5, Kalegowa, Kec. Somba Opu, Kabupaten Gowa,<br> Sulawesi Selatan 92114</p>
                <p>081234567890 (Pask Subari)</p>
                <hr style="border: 3px solid black">
                <p class="" style="color: #90B18F; font-size: 13px;">Web By: KLP 20, SMK Telkom Makassar, 2023-2024</p>
            </div>
            <div class="col-5 d-none d-md-block">
                <img class="img-fluid" src="{{ url('picture/logo-dlh-crop.png') }}">
            </div>
        </div>
</section>

{{-- Small screen section --}}
@include('welcome-small-component')

</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
/* Hero animation */
body {
    font-family: "Poppins", sans-serif;
    background-color: #FBFBFB;
}
.gradient {
    position: absolute;
    height: 100%;
    width: 100%;
    opacity: 0.6;
    background: black;
    background: linear-gradient(55deg, rgba(0,0,0,1) 0%, rgba(242,242,242,1) 100%);
}

/* Navbar Effect */
#navbar {
  background-color: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(20px) saturate(160%) contrast(45%) brightness(140%);
  -webkit-backdrop-filter: blur(20px) saturate(160%) contrast(45%) brightness(140%);
}

@supports (-webkit-backdrop-filter: blur(30px) saturate(160%) contrast(45%) brightness(140%)) or
  (backdrop-filter: blur(30px) saturate(160%) contrast(45%) brightness(140%)) {
  .navbar-b.navbar-reduce {
    transition: all 0.5s ease-in-out;
    padding-top: 15px;
    padding-bottom: 15px;
    background-color: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px) saturate(160%) contrast(45%) brightness(140%);
    -webkit-backdrop-filter: blur(20px) saturate(160%) contrast(45%) brightness(140%);
  }
}

@keyframes slide {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-100%);
  }
}

.logos {
  overflow: hidden;
  /* padding: 30px 0; */
  white-space: nowrap;
  position: relative;
}

.logos:before,
.logos:after {
  position: absolute;
  top: 0;
  width: 250px;
  height: 100%;
  content: "";
  z-index: 2;
}

/* .logos:before {
  left: 0;
  background: linear-gradient(to left, rgba(255, 255, 255, 0), white);
}

.logos:after {
  right: 0;
  background: linear-gradient(to right, rgba(255, 255, 255, 0), white);
} */

.logos:hover .logos-slide {
  animation-play-state: paused;
}

.logos-slide {
  display: inline-block;
  animation: 35s slide infinite linear;
}

.logos-slide img {
  height: 100px;
  margin: 0 25px;
}

 /* Fade in website */
#about {
    margin-bottom: 15rem;
}
@media only screen and (min-width: 1200px) {
    #about {
        margin-bottom: 20rem !important;
    }
}
@media only screen and (min-width: 1700px) {
    #about {
        margin-bottom: 25rem !important;
    }
}

@keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
@keyframes floating {
  from {
    translate: 0 0px;
  }
  65% {
    translate: 0 -45px;
  }
  to {
    translate: 0 -0px;
  }
}

/* Card Hover */
.card {
    transition: all 0.3s;
}
.card:hover {
    transform: scale(1.08);
}

@media only screen and (max-width: 380px) {
    #card-penanggung {
        width: 17rem !important;
    }
    #card-penanggung-image {
        width: 15rem !important;
    }
}

/* Desc Utama */
#desc-utama {
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    animation:
        typing 2s,
        cursor .4s step-end infinite alternate;
}

@keyframes cursor {
    50% { border-color: transparent }
}
@keyframes typing {
    from { width: 0 }
}
/* Slider */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.slidercard {
  display: flex;
  padding: 10px 35px;
  align-items: center;
  justify-content: center;
  height: 100vh;

}
.wrapper {
  max-width: 1100px;
  width: 100%;
  position: relative;
}
.wrapper i {
  top: 50%;
  height: 50px;
  width: 50px;
  cursor: pointer;
  font-size: 0.5rem;
  position: absolute;
  line-height: 50px;
  background: #fff;
  border-radius: 50%;
  box-shadow: 0 3px 6px rgba(0,0,0,0.23);
  transform: translateY(-50%);
  transition: transform 0.1s linear;
}
.wrapper i:active{
  transform: translateY(-50%) scale(0.85);
}
.wrapper i:first-child{
  left: -22px;
}
.wrapper i:last-child{
  right: -22px;
}
.wrapper .carousel{
  display: grid;
  grid-auto-flow: column;
  grid-auto-columns: calc((100% / 3) - 12px);
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  gap: 16px;
  padding: 25px 0 25px 0;
  border-radius: 8px;
  scroll-behavior: smooth;
  scrollbar-width: none;
}
.carousel::-webkit-scrollbar {
  display: none;
}
.carousel.no-transition {
  scroll-behavior: auto;
}
.carousel.dragging {
  scroll-snap-type: none;
  scroll-behavior: auto;
}
.carousel.dragging .card {
  cursor: grab;
  user-select: none;
}
.carousel :where(.card, .img) {
  display: flex;
  justify-content: center;
  /* align-items: center; */
}

.carousel .card {
  scroll-snap-align: start;
  /* height: 352px; */
  list-style: none;
  background: #fff;
  cursor: pointer;
  padding-bottom: 15px;
  flex-direction: column;
  border-radius: 12px;
}
.card .img img {
  /* height: 140px; */
  width: 18rem;
  height: 10rem;
}
.carousel .card h2 {
  font-weight: 600;
  font-size: 1.20rem;
}
.carousel .card span {
  color: #6A6D78;
  font-size: 1rem;
}

@media screen and (max-width: 900px) {
  .wrapper .carousel {
    grid-auto-columns: calc((100% / 2) - 9px);
  }
}

@media screen and (max-width: 600px) {
  .wrapper .carousel {
    grid-auto-columns: 100%;
  }
  .card .img img {
    width: 15rem;
    height: 10rem;
  }
}
</style>
<script>
    const wrapper = document.querySelector(".wrapper");
    const carousel = document.querySelector(".carousel");
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = document.querySelectorAll(".wrapper i");
    const carouselChildrens = [...carousel.children];
    let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;
    // Get the number of cards that can fit in the carousel at once
    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);
    // Insert copies of the last few cards to beginning of carousel for infinite scrolling
    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });
    // Insert copies of the first few cards to end of carousel for infinite scrolling
    carouselChildrens.slice(0, cardPerView).forEach(card => {
        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });
    // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");
    // Add event listeners for the arrow buttons to scroll the carousel left and right
    arrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
        });
    });
    const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");
        // Records the initial cursor and scroll position of the carousel
        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
    }
    const dragging = (e) => {
        if(!isDragging) return; // if isDragging is false return from here
        // Updates the scroll position of the carousel based on the cursor movement
        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    }
    const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    }
    const infiniteScroll = () => {
        // If the carousel is at the beginning, scroll to the end
        if(carousel.scrollLeft === 0) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
            carousel.classList.remove("no-transition");
        }
        // If the carousel is at the end, scroll to the beginning
        else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.offsetWidth;
            carousel.classList.remove("no-transition");
        }
        // Clear existing timeout & start autoplay if mouse is not hovering over carousel
        clearTimeout(timeoutId);
        if(!wrapper.matches(":hover")) autoPlay();
    }
    const autoPlay = () => {
        if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
        // Autoplay the carousel after every 2500 ms
        timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
    }
    autoPlay();
    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
    wrapper.addEventListener("mouseleave", autoPlay);
</script>
