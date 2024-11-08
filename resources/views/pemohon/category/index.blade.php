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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <span class="px-2 fw-semibold">Laporan Perusahaan</span>
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
                    <div class="d-flex align-items-center">
                        @can('create data perusahaan')
                            <a href="{{ url('categories/create') }}" type="button" class="col-4 btn rounded-3 px-2 fw-semibold d-none d-lg-block" style="background-color: #315A39; color: #F5F5F5;">Tambah Data Perusahaan +</a>
                            <a href="{{ url('categories/create') }}" type="button" class="col-4 btn rounded-3 px-2 fw-semibold d-block d-lg-none" style="background-color: #315A39; color: #F5F5F5;">Data +</a>
                            <a href="{{ route('categories.download') }}" class="col-4 btn rounded-3 px-2 fw-semibold d-block d-lg-none ms-2 me-2" style="background-color: #315A39; color: #F5F5F5;">
                                Export as PDF
                            </a>
                            <a href="{{ route('categories.download') }}" class="col-4 btn rounded-3 px-2 fw-semibold d-none d-lg-block ms-2 me-2" style="background-color: #315A39; color: #F5F5F5;">
                                Download All Data as PDF
                            </a>
                        @endcan
                        <form action="" class="d-flex ms-auto">
                            <input class="form-control" style="border-color: #33363F; border-width: 3px" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ $search }}" />
                            <button class="btn d-none d-md-block ms-2" type="submit" style="background-color: #315A39; color: #F5F5F5;">Search</button>
                        </form>
                    </div>

                    <hr class="border-3 border-success" style="border-color: #315A39">

                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="border-3">
                                    <tr class="align-middle">
                                        <th class="border-3">ID</th>
                                        <th class="border-3">Nama</th>
                                        @can('edit file data perusahaan')
                                            <th class="border-3">Data</th>
                                        @endcan
                                        {{-- <th class="border-3">Status</th> --}}
                                        <th class="border-3">Nama Penanggung</th>

                                        @can('edit data perusahaan')
                                            <th class="border-3">Pengaturan</th>
                                        @endcan
                                        <th>Share</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $index => $item)
                                    <tr>
                                        <td class="border-3">{{ $index + 1 }}.</td>
                                        <td>{{ $item->name }}</td>
                                        @can('edit file data perusahaan')
                                            <td>
                                                <a href="{{ url('categories/'.$item->id.'/kegiatan') }}" class="btn fw-semibold border-3" style="border-color: #33363F;">Open</a>
                                            </td>
                                        @endcan
                                        <td>{{ $item->penanggung_perusahaan }}</td>
                                        @can('edit data perusahaan')
                                            <td class="d-flex py-3 gap-2">
                                                <a href="{{ url('categories/'.$item->id.'/edit') }}" class="btn fw-semibold border border-3 border-secondary">Edit</a>
                                                <a href="#" class="btn fw-semibold border-3" style="border-color: #c30010;" onclick="confirmDelete('{{ $item->id }}')">Hapus</a>
                                            </td>
                                        @endcan
                                        <!-- Export button for single category -->
                                        <td>
                                            <a href="{{ route('categories.exportSingle', $item->id) }}" class="btn btn-success">Export</a>
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
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Semua data didalamnya akan terhapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#315A39',
            cancelButtonColor: '#33363F',
            confirmButtonText: 'Ya, hapus saja!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with deletion by redirecting to the delete URL
                window.location = "{{ url('categories') }}/" + id + "/delete";
            }
        });
    }

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
