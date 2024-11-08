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
                            <span class="px-2 fw-semibold">Data File Perusahaan</span>
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
                        <h4 class="fw-semibold pt-2">Data Kegiatan Perusahaan</h4>
                        <div action="" class="ms-auto">
                            <a href="{{ url('categories') }}" type="button" class="btn rounded-3 px-4 ms-auto fw-semibold d-none d-md-block" style="background-color: #315A39; color: #F5F5F5;"><i class="fa-solid fa-arrow-left me-2"></i> Kembali</a>
                            <a href="{{ url('categories') }}" type="button" class="btn rounded-3 px-4 ms-auto fw-semibold d-block d-md-none" style="background-color: #315A39; color: #F5F5F5;">Kembali</a>
                        </div>
                    </div>
                    <hr class="border-3" style="border-color: #315A39">

                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}" class="form-control border-4 bg-light" id="input1" disabled readonly />
                                @error('nama_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="input2" class="form-label">Jenis Kegiatan</label>
                                <input type="text" name="jenis_kegiatan" value="{{ $kegiatan->jenis_kegiatan }}" class="form-control border-4 bg-light" id="input2" disabled readonly />
                                @error('jenis_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="input3" class="form-label">Alamat Kegiatan</label>
                                <input type="text" name="alamat_kegiatan" value="{{ $kegiatan->alamat_kegiatan }}" class="form-control border-4 bg-light" id="input3" disabled readonly />
                                @error('alamat_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="input4" class="form-label">Kordinat Kegiatan</label>
                                <input type="text" name="kordinat_kegiatan" value="{{ $kegiatan->kordinat_kegiatan }}" class="form-control border-4 bg-light" id="input4" disabled readonly />
                                @error('kordinat_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="input5" class="form-label">Besaran Kegiatan</label>
                                <textarea type="text" name="besaran_kegiatan" class="form-control border-4 bg-light" id="input5" disabled readonly>{{ $kegiatan->besaran_kegiatan }}</textarea>
                                @error('besaran_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 d-flex">
                                <label class="me-2 fw-semibold">Rincian Teknik Limbah B3</label>
                                <input type="checkbox" name="rintek" {{ $kegiatan->rintek == true ? 'checked':'' }} disabled readonly />
                                @error('rintek')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 d-flex">
                                <label class="me-2 fw-semibold">Persetujuan Teknis</label>
                                <input type="checkbox" name="pertek" {{ $kegiatan->pertek == true ? 'checked':'' }} disabled readonly />
                                @error('pertek')
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

                    <div class="d-flex align-items-center">
                        <h4 class="fw-semibold pt-2">Data {{ $kegiatan->nama_kegiatan }}</h4>
                        <div class="ms-auto">
                            <a href="{{ url('categories') }}" type="button" class="btn rounded-3 px-4 ms-auto fw-semibold d-none d-md-block" style="background-color: #315A39; color: #F5F5F5;"><i class="fa-solid fa-arrow-left me-2"></i> Kembali</a>
                            <a href="{{ url('categories') }}" type="button" class="btn rounded-3 px-4 ms-auto fw-semibold d-block d-md-none" style="background-color: #315A39; color: #F5F5F5;">Kembali</a>
                        </div>
                    </div>

                    <hr class="border-3" style="border-color: #315A39">

                    <div class="card border-4">
                        @can('update permission')
                        <div class="p-3">
                            <form action="{{ url('categories/'.$kegiatan->id.'/upload-data-kegiatan') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="input1" class="form-label">Upload File Dibawah Ini</label>
                                    <input type="file" name="files[]" multiple class="form-control border-4 py-3 px-4" id="input1">
                                </div>
                                <div class="d-grid mb-1">
                                    <button type="submit" class="btn rounded-3 fw-semibold px-4 py-2" style="background-color: #315A39; color: #F5F5F5;">Upload File</button>
                                </div>
                            </form>

                            {{-- <hr class="border-3" style="border-color: #315A39"> --}}
                        </div>

                        <hr class="border-3 mx-3" style="border-color: #315A39">
                        @endcan

                        <div class="d-flex align-items-center mt-3">
                            <h4 class="fw-semibold ms-3 me-3 pt-2">List Data Perusahaan</h4>
                            <form action="" class="d-flex flex-row ms-auto me-3">
                                <input class="form-control" style="border-color: #33363F; border-width: 3px" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ $search }}" />
                                <button class="btn d-none d-md-block ms-1" type="submit" style="background-color: #315A39; color: #F5F5F5;">Search</button>
                            </form>
                        </div>


                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="border-3">
                                    <tr>
                                        <th class="border-3">Files</th>
                                        <th class="border-3">Comments</th>
                                        <th class="border-3">Pengaturan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($DataFile as $datfiles)
                                    <tr>
                                        <td class="border-3">
                                            <i class="fa-regular fa-file pe-2 text-success"></i>
                                            {{-- <i class="fa-solid fa-file me-2"></i> --}}
                                            <a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-semibold" href="{{ asset('assets/' . $datfiles->file) }}">{{ $datfiles->file }}</a>
                                        </td>
                                        <td class="border-3">
                                            <!-- Form for adding/editing comment -->
                                            <form action="{{ url('data-file/'.$datfiles->id.'/add-comment') }}" method="POST">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" name="comment" class="form-control border-3" placeholder="Add comment..." value="{{ $datfiles->comment }}" />
                                                </div>
                                            </form>
                                        </td>
                                        <td class="d-flex py-3 gap-2">
                                            <a href="{{ asset('assets/' . $datfiles->file) }}" class="btn fw-semibold border border-3 border-secondary" download>Download</a>
                                            <button onclick="confirmDelete('{{ url('data-file/'.$datfiles->id.'/delete') }}')" class="btn fw-semibold border-3" style="border-color: #c30010;">Hapus</button>
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
    #map {
        height: 400px;
        width: 100%;
    }
</style>
<script>
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan terhapus secara permanen!",
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
        var coordinates = document.getElementById('input4').value.split(',').map(function(coord) {
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
