{{-- Small screen size section --}}

{{-- About for Small Screen --}}
<section id="about" class="d-md-none d-block bg-success" style="height: 70vh">
    <div class="position-absolute top-50 start-0 translate-middle-y px-3 mt-sm-5">
        <h5 class="fw-semibold" style="color: #eee">Selamat Datang</h5>
        <h1 class="fw-semibold text-white">Dinas Lingkungan Hidup Kabupaten Gowa</h1>
        <p class="mt-4 ps-3 border-start border-4 border-white" style="font-size: 15px; color: #eee;">Jaga kebersihan lingkungan untuk masa depan yang lebih hijau dan sehat. Bersama-sama kita bisa menjaga kelestarian alam dan memberikan lingkungan yang bersih dan nyaman bagi generasi mendatang.</p>
        <a href="#layanan" class="btn rounded-3 py-1 px-4 text-white" style="background-color: #315A39;">Mulai</a>
    </div>
</section>

{{-- Layanan for Small Screen --}}
<section id="layanan" class="d-md-none d-block py-5" style="background-color: #eee">
    <div class="px-3 mb-5 text-center">
        <h5 class="fw-semibold" style="color: #315A39">Pelayanan</h5>
        <h3 class="fw-semibold">Layanan yang Kami Jalankan di Dinas Lingkungan Hidup</h3>
    </div>
    <div class="px-3 mb-3">
        <div class="row align-items-center">
            <div class="col-4 col-md-2 text-center">
                <img src="{{ url('picture/truk.png') }}" style="100px; height: 85px;" alt="">
            </div>
            <div class="col-8 col-md-10 px-4">
                <h5 class="fw-semibold">Truk Sampah</h5>
                <p>Dinas Lingkungan Hidup memiliki 20 armada truk sampah yang siap melayani pengangkutan dan pengolahan sampah anda.</p>
            </div>
        </div>
    </div>
    <div class="px-3 mb-3">
        <div class="row align-items-center">
            <div class="col-4 col-md-2 text-center">
                <img src="{{ url('picture/cycle.png') }}" style="100px; height: 85px;" alt="">
            </div>
            <div class="col-8 col-md-10 px-4">
                <h5 class="fw-semibold">Pembuangan</h5>
                <p>Kami memastikan dalam pengolahan sampah secara teratur dan efisien dalam menjaga kebersihan lingkungan.</p>
            </div>
        </div>
    </div>
    <div class="px-3 mb-3">
        <div class="row align-items-center">
            <div class="col-4 col-md-2 text-center">
                <img src="{{ url('picture/leaf.png') }}" style="100px; height: 85px;" alt="">
            </div>
            <div class="col-8 col-md-10 px-4">
                <h5 class="fw-semibold">Menjaga</h5>
                <p>Kami siap dan siaga dalam menjaga kebersihan lingkungan dengan berbagai program dan layanan yang kami sediakan.</p>
            </div>
        </div>
    </div>
</section>

{{-- Penanggung for small screen --}}
<section id="nanggung" class="d-md-none d-block py-5">
    <div class="px-3 mb-5 text-center">
        <h5 class="fw-semibold" style="color: #315A39">Penanggung Jawab</h5>
        <h3 class="fw-semibold">Penanggung Jawab Utama Dinas yang Bertugas saat ini</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($penanggung as $key => $tanggung)
                            <div class="carousel-item border border-3 border-success rounded-4 p-3 {{ $key == 0 ? 'active' : '' }}" data-bs-interval="5000" style="background-color: #eee">
                                <img src="{{ url('images/'.$tanggung->image_penanggung) }}" class="d-block w-100 border border-5 rounded-3" alt="...">
                                {{-- <label class="badge text-bg-light border border-3 fw-bold p-2 mt-2">{{ $tanggung->role }}</label> --}}
                                <h3 class="text-start fw-semibold mt-2">{{ $tanggung->name }}</h3>
                                <h3 class="text-start" style="font-size: 13px;">{{ $tanggung->description }}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Proker for small screen --}}
<section id="proker" class="d-md-none d-block py-5" style="background-color: #eee">
    <div class="px-3 mb-5 text-center">
        <h5 class="fw-semibold" style="color: #315A39">Program Kerja</h5>
        <h3 class="fw-semibold">Program Kerja Kami Untuk Masyarakat</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($proker as $key => $proker)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="3000">
                                <img src="{{ url('images/'.$proker->image_prog) }}" class="d-block w-100 border border-5 border-success rounded-3" alt="...">
                                <h3 class="text-center fw-semibold pt-3">{{ $proker->judul_prog }}</h3>
                                <p class="text-center" style="font-size: 13px;">{{ $proker->description_prog }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Dokumentasi for small screen --}}
<section id="dokumentasi" class="d-md-none d-block py-5">
    <div class="px-3 mb-5 text-center">
        <h5 class="fw-semibold" style="color: #315A39">Dokumentasi</h5>
        <h3 class="fw-semibold">Dokumentasi dari beberapa Kegiatan Kami</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($dokumentasi as $key => $doc)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="3500
                                <div class="aspect-ratio-16x9">
                                    <img src="{{ url('images/'.$doc->image_doc) }}" class="d-block w-100 border border-4 border-success rounded-3" alt="...">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Pihak for small screen --}}
<section id="pihak" class="d-md-none d-block py-5" style="background-color: #eee">
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

<!-- Footer for small screen -->
<section id="footer" class="py-5 d-md-none d-block" style="overflow: hidden; background-color: #00784A;">
    <img class="img-fluid ps-4 pb-2 ms-2 d-md-none d-block" src="{{ url('picture/logo-dlh-crop.png') }}" style="width: 10rem;">
    <div class="row text-white px-5">
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

<style>
@keyframes slide {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-100%);
  }
}

.aspect-ratio-16x9 {
    position: relative;
    width: 100%;
    padding-top: 56.25%; /* 16:9 aspect ratio */
    overflow: hidden; /* Ensures no overflow outside the container */
}

.aspect-ratio-16x9 img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the container without distortion */
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
  height: 60px;
  margin: 0 25px;
}
</style>
