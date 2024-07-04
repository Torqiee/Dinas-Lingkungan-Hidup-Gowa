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
                            <span class="px-2 fw-semibold">Data Perusahaan</span>
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
                <div class="container p-3 rounded-4 mb-3" style="background-color: #eee">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <div class="d-flex align-items-center">
                        <h4 class="fw-semibold pt-2">Data Profil Perusahaan</h4>
                        <div action="" class="ms-auto">
                            <a href="{{ url('categories') }}" type="button" class="btn rounded-3 px-4 ms-auto fw-semibold d-none d-md-block" style="background-color: #315A39; color: #F5F5F5;"><i class="fa-solid fa-arrow-left me-2"></i> Kembali</a>
                            <a href="{{ url('categories') }}" type="button" class="btn rounded-3 px-4 ms-auto fw-semibold d-block d-md-none" style="background-color: #315A39; color: #F5F5F5;">Kembali</a>
                        </div>
                    </div>
                    <hr class="border-3" style="border-color: #315A39">

                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Nama Perusahaan / Pemohon</label>
                                <input type="text" name="name" value="{{ $kegiatan->name }}" class="form-control border-4 bg-light" id="input1" disabled readonly />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="input2" class="form-label">Penanggung Jawab Perusahaan</label>
                                <input type="text" name="penanggung_perusahaan" value="{{ $kegiatan->penanggung_perusahaan }}" class="form-control border-4 bg-light" id="input2" disabled readonly />
                                @error('penanggung_perusahaan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="input3" class="form-label">Nomor Telepon</label>
                                <input type="text" name="no_telp" value="{{ $kegiatan->no_telp }}" class="form-control border-4 bg-light" id="input3" disabled readonly />
                                @error('no_telp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="input5" class="form-label">Alamat Perusahaan</label>
                                <input type="text" name="alamat_perusahaan" value="{{ $kegiatan->alamat_perusahaan }}" class="form-control border-4 bg-light" id="input5" disabled readonly />
                                @error('alamat_perusahaan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="input6" class="form-label">Kordinat</label>
                                <input type="text" name="kordinat" value="{{ $kegiatan->kordinat }}" class="form-control border-4 bg-light" id="input6" disabled readonly />
                                @error('kordinat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="input7" class="form-label">NIB (Nomor Induk Berusaha)</label>
                                <input type="text" name="nib" value="{{ $kegiatan->nib }}" class="form-control border-4 bg-light" id="input7" disabled readonly />
                                @error('nib')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="input8" class="form-label">NPWP (Nomor Pokok Wajib Pajak)</label>
                                <input type="text" name="npwp" value="{{ $kegiatan->npwp }}" class="form-control border-4 bg-light" id="input8" disabled readonly />
                                @error('npwp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <div class="border border-4 border-secondary rounded-4" id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Data File --}}
                <div class="container p-3 mb-3 rounded-4" style="background-color: #eee">

                    @if($errors->any())
                        <ul class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <li class="mx-2">{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="card rounded-4 border-3">
                        <div class="d-flex align-items-center pt-3">
                            {{-- <h4 class="fw-semibold ms-3 me-3 pt-2">List Data Kegiatan</h4> --}}
                            <a href="{{ route('categories.create', ['kegiatanId' => $kegiatan->id]) }}" type="button" class="col-4 btn rounded-2 px-3 fw-semibold ms-3 d-none d-lg-block" style="background-color: #315A39; color: #F5F5F5;">Tambah Data Kegiatan +</a>
                            <a href="{{ route('categories.create', ['kegiatanId' => $kegiatan->id]) }}" type="button" class="col-4 btn rounded-2 px-3 fw-semibold ms-3 d-block d-lg-none me-4" style="background-color: #315A39; color: #F5F5F5;">Data +</a>

                            <form action="" class="d-flex flex-row ms-auto me-3">
                                <input class="form-control" style="border-color: #33363F; border-width: 3px" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ $search }}" />
                                <button class="btn d-none d-md-block ms-1 border-3" type="submit" style="background-color: #315A39; color: #F5F5F5;">Search</button>
                            </form>
                        </div>

                        <hr class="border-3 mx-3" style="border-color: #315A39">

                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="border-3">
                                    <tr class="align-middle">
                                        <th class="border-3">ID</th>
                                        <th class="border-3">Nama Kegiatan</th>
                                        <th class="border-3">Rintek</th>
                                        <th class="border-3">Pertek</th>
                                        <th class="border-3">Buka File</th>
                                        @can('edit data perusahaan')
                                            <th class="border-3">Pengaturan</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($DataKegiatan as $index => $datkegiatan)
                                    <tr>
                                        <td class="border-3">{{ $index + 1 }}.</td>
                                        <td class="border-3">{{ $datkegiatan->nama_kegiatan }}</td>
                                        <td class="align-middle">
                                            @if ($datkegiatan->rintek)
                                                <h6 class="badge text-bg-light border border-3 border-dark fw-bold p-2">Dengan Rintek</h6>
                                            @else
                                                <h6 class="badge text-bg-dark fw-semibold p-2">Tanpa Rintek</h6>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if ($datkegiatan->pertek)
                                                <h6 class="badge text-bg-light border border-3 border-dark fw-bold p-2">Dengan Pertek</h6>
                                            @else
                                                <h6 class="badge text-bg-dark fw-semibold p-2">Tanpa Pertek</h6>
                                            @endif
                                        </td>
                                        @can('edit file data perusahaan')
                                            <td>
                                                <a href="{{ url('categories/'.$datkegiatan->id.'/upload-data-kegiatan') }}" class="btn fw-semibold border-3" style="border-color: #33363F;">Open</a>
                                            </td>
                                        @endcan
                                        @can('edit data perusahaan')
                                            <td class="d-flex py-3 gap-2">
                                                <a href="{{ url('categories/'.$datkegiatan->id.'/edit-kegiatan') }}" class="btn fw-semibold border border-3 border-secondary">Edit</a>
                                                <button onclick="confirmDelete('{{ url('categories/'.$datkegiatan->id.'/delete-kegiatan') }}')" class="btn fw-semibold border-3" style="border-color: #c30010;">Hapus</button>
                                            </td>
                                        @endcan
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
#map {
    height: 400px;
    width: 100%;
}
</style>
<script>
    function confirmDelete(deleteUrl) {
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
                window.location = deleteUrl;
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

    // Google Map
    function initMap() {
        var coordinates = document.getElementById('input6').value.split(',').map(function(coord) {
            return parseFloat(coord.trim());
        });

        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: coordinates[0], lng: coordinates[1] },
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: { lat: coordinates[0], lng: coordinates[1] },
            map: map,
            title: 'User Location'
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAunT3unH-ojnl6Ad2IN8_PX-opj1jZh5U&callback=initMap"></script>
</html>
