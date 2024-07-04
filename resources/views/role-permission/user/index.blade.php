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
                            <span class="px-2 fw-semibold">Data Pengguna Admin</span>
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

                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <div class="d-flex align-items-center">
                        <a href="{{ url('users/create') }}" type="button" class="btn rounded-3 px-3 py-2 fw-semibold d-none d-md-block" style="background-color: #315A39; color: #F5F5F5;">Tambah Data +</a>
                        <a href="{{ url('users/create') }}" type="button" class="btn rounded-3 px-3 py-2 fw-semibold d-block d-md-none" style="background-color: #315A39; color: #F5F5F5;">Data +</a>
                        @include('role-permission.nav-link')
                    </div>
                    <hr class="border-3 border-success" style="border-color: #315A39">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="border-3">
                                    <tr>
                                        <th class="border-3">ID</th>
                                        <th class="border-3">Nama</th>
                                        <th class="border-3">Email</th>
                                        <th class="border-3">Roles</th>
                                        <th class="border-3">Pengaturan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                    <tr>
                                        <td class="border-3">{{ $index + 1 }}.</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <label class="badge text-bg-light border border-3 border-success fw-bold p-2">{{ $rolename }}</label>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('update user')
                                                <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn fw-semibold border border-3 border-secondary">Edit</a>
                                            @endcan
                                            @can('delete user')
                                                <button onclick="confirmDelete('{{ url('users/'.$user->id.'/delete') }}')" class="btn fw-semibold border-3" style="border-color: #c30010;">Hapus</button>
                                                {{-- <a href="{{ url('users/'.$user->id.'/delete') }}" class="btn fw-semibold border-3" style="border-color: #c30010;">Hapus</a> --}}
                                            @endcan
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
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data Pengguna ini akan terhapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#315A39',
            cancelButtonColor: '#33363F',
            confirmButtonText: 'Ya, hapus saja',
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
</script>
</html>
