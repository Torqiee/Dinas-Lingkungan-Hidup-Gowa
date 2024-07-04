<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <title>Dinas Admin Page</title>
</head>
<body>
    <div class="main-container d-flex">
        {{-- Sidebar --}}
        <div class="ms-md-3 mt-md-3 ms-md-0 mt-md-0">
            <div class="sidebar pb-3 rounded-4" id="side_nav">
                @include('sidebar-item')
            </div>
        </div>

        {{-- Navbar --}}
        <div class="content">
            <nav class="navbar navbar-expand-md mx-3 mt-3 rounded-4" style="background-color: #F5F5F5">
                <div class="container-fluid py-1">
                    <div class="d-flex justify-content-between">
                     <button class="btn px-1 open-btn me-2"><i class="fa-solid fa-bars-staggered"></i></button>
                        <a class="navbar-brand fs-4" href="#">
                            <span class="px-2 text-black fw-semibold">Dashboard Admin</span>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex">
                            <li class="nav-item">
                                <form class="d-flex" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="btn rounded-5 px-4" style="background-color: #33363F; color: #F5F5F5;">
                                        Logout
                                    </a>
                                    <button type="button" class="btn rounded-5 ms-3 px-4" href="#" style="background-color: #315A39; color: #F5F5F5;">
                                        {{ Auth::user()->name }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- Dasbord Content --}}
            <div class="dashboard-content px-3 pt-3">
                <div class="container py-3 rounded-4" style="background-color: #eee">
                    <div class="row gy-3">
                        <div class="col-sm-6">
                            <div class="card h-100 rounded-3">
                                <img src="{{ url('picture/gradi-5.avif') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title fs-4 fw-semibold text-success">Daftar Perusahaan / Pemohon</h5>
                                <p class="card-text fw-semibold">Bagian ini merupakan tempat penyimpanan Dokumen Lingkungan Dinas dan Perusahaan.</p>
                                <a href="categories" class="btn btn-success rounded-3 px-4 fw-semibold">Masuk</a>
                                </div>
                            </div>
                        </div>
                        @can('edit data privasi')
                            <div class="col-sm-6">
                                <div class="card h-100 rounded-3">
                                    <img src="{{ url('picture/gradi-5.avif') }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title fs-4 fw-semibold text-success">Deskripsi Website</h5>
                                    <p class="card-text fw-semibold">Bagian ini merupakan tempat mengganti isi komponen dalam website utama.</p>
                                    <a href="/dashboard-website" class="btn btn-success rounded-3 px-4 fw-semibold">Masuk</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card h-100 rounded-3">
                                    <img src="{{ url('picture/gradi-5.avif') }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title fs-4 fw-semibold text-success">Hak Akses Admin</h5>
                                    <p class="card-text fw-semibold">Mengubah hak akses yang dapat diakses oleh admin Dinas dan Perusahaan.</p>
                                    <a href="users" class="btn btn-success rounded-3 px-4 fw-semibold">Masuk</a>
                                    </div>
                                </div>
                            </div>
                        @endcan
                        <div class="col-sm-6">
                            <div class="card h-100 rounded-3">
                                <img src="{{ url('picture/gradi-5.avif') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title fs-4 fw-semibold text-success">Kendala</h5>
                                <p class="card-text fw-semibold">Masukkan keluhan anda disini jika mengalami masalah dalam website ini.</p>
                                <a href="https://forms.gle/TGt1uB1kCUL7Hhnk9" class="btn btn-success rounded-3 px-4 fw-semibold">Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
body{
    background: #BED8BE;
    font-family: "Poppins", sans-serif;
}

#side_nav{
    background: #eee;
    min-width: 250px;
    max-width: 250px;
    transition: all 0.3s;
}
.content{
   min-height: 100vh;
   width: 100%;
}
hr.h-color{
  background: #eee;
}
.sidebar li.active{
   background: #F5F5F5;
   border-radius: 8px;
}

.sidebar li.active a, .sidebar li.active a:hover {
 color: #f5f5f5;
}
.sidebar li a{
 color: #fff;
}

@media(max-width: 767px){
 #side_nav{
   margin-left: -250px;
   position: absolute;
   min-height: 100vh;
   z-index: 1;

 }
 #side_nav.active{
   margin-left: 0;
  }
}
</style>
<script>
    $(".sidebar ul li").on('click', function () {
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
    });

    $('.open-btn').on('click', function () {
        $('.sidebar').addClass('active');

    });


    $('.close-btn').on('click', function () {
        $('.sidebar').removeClass('active');

    })
</script>
</html>
