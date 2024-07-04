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
                            <span class="px-2 fw-semibold">Buat Data Pengguna Admin</span>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex">
                            <li class="nav-item">
                                <form class="d-flex" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="btn rounded-5 px-4"  style="background-color: #33363F; color: #F5F5F5;">
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

            {{-- Content --}}
            <div class="dashboard-content px-3 pt-3">
                <div class="container p-3 rounded-4" style="background-color: #eee">
                    <div class="d-flex">
                        <a href="{{ url('users') }}" type="button" class="btn rounded-3 pe-4 ps-4 pb-2 fw-semibold" style="background-color: #315A39; color: #F5F5F5;"><i class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                    </div>
                    <hr class="border-3" style="border-color: #315A39">
                    <div class="card-body">
                        <form action="{{ url('roles') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Nama Role</label>
                                <input type="text" name="name" class="form-control border-3 border-success focus-ring focus-ring-success" id="input1">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn rounded-3 btn-success fw-semibold px-4 py-2">Simpan data</button>
                            </div>
                        </form>
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
.content{
    min-height: 100vh;
    width: 100%;
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
