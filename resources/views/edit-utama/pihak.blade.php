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

            <div class="dashboard-content px-3 pt-3">
                <div class="container p-3 rounded-4 mb-3" style="background-color: #eee">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <div class="d-flex align-items-center">
                        <h4 class="fw-semibold me-3 pt-2">Edit Pihak Terkait Dinas</h4>
                        <div class="d-flex flex-row ms-auto">
                            <a href="/dashboard-website" type="button" class="btn rounded-3 pe-4 px-4 fw-semibold d-none d-md-block" style="background-color: #315A39; color: #F5F5F5;"><i class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                            <a href="/dashboard-website" type="button" class="btn rounded-3 pe-4 px-4 fw-semibold d-block d-md-none" style="background-color: #315A39; color: #F5F5F5;">Kembali</a>
                        </div>
                    </div>

                    <hr class="border-3" style="border-color: #315A39">
                    <div class="card-body">
                        <form class="row" action="{{ url('edit-pihak/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="inputan11">Upload Image Pihak Terkait</label>
                                <input type="file" name="image_pihak" class="form-control border-3 border-success focus-ring focus-ring-success" id="input11">
                            </div>
                            <div class="d-grid my-3">
                                <button type="submit" class="btn rounded-3 fw-semibold px-4 py-2" style="background-color: #315A39; color: #F5F5F5;">Upload File</button>
                            </div>
                        </form>
                        <hr class="border-3" style="border-color: #315A39">

                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="border-3">
                                    <tr class="align-middle">
                                        <th class="border-3">Image</th>
                                        <th class="border-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pihak as $pemihak)
                                    <tr>
                                        <td class="border-3">{{ $pemihak->image_pihak }}</td>
                                        <td class="border-3">
                                            <a href="{{ url('edit-pihak/'.$pemihak->id.'/delete') }}" class="btn btn-danger rounded-3 fw-semibold px-4 py-2">Hapus Data</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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