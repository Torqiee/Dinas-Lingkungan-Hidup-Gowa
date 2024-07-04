    <div class="header-box ps-2 pt-3 pb-4 d-flex justify-content-between">
        <img class="img-fluid" src="{{ url('picture/logo-dlh-foot.png') }}" width="150" height="80">
        <button class="btn d-md-none d-block close-btn px-1">
            <i class="fa-solid fa-xmark me-3"></i>
        </button>
    </div>

    <div class="row mb-2 mx-4 py-2 fw-semibold rounded-3" style="background-color: #006600">
        <div class="col-3">
            <img class="rounded-5 border border-3 border-dark mt-1" style="height: 35px; width: 35px;" src="{{ url('assets/blank-prof.jpg') }}" alt="">
        </div>
        <div class="col-9">
            <span style="font-size: 16px; color: #F5F5F5;">Hello, {{ Auth::user()->name }}</span>
            <span id="demo-1" style="font-size: 12px; color: #C1C2C7;">{{ Auth::user()->email }}</span>
        </div>
    </div>

    <hr class="border-3 mx-4" style="border-color: #315A39">

    <ul class="list-unstyled px-4 pb-2" id="side-text">
        <li class="active">
            <a href="/dashboard" class="border-start border-end border-4 rounded-1 border-dark text-decoration-none text-dark fw-semibold px-3 py-3 d-block" style="font-size: 16px">
                <i class="fa-solid fa-house pe-2"></i>Dashboard
            </a>
        </li>
        <li class="active mt-3">
            <a href="/categories" class="border-start border-end border-4 rounded-1 border-dark text-decoration-none text-dark fw-semibold px-3 py-3 d-block" style="font-size: 16px">
                <i class="fa-solid fa-folder pe-2"></i>Laporan Data
            </a>
        </li>
        @can('edit data privasi')
            <li class="active mt-3">
                <a href="/users" class="border-start border-end border-4 rounded-1 border-dark text-decoration-none text-dark fw-semibold px-3 py-3 d-block" style="font-size: 16px">
                    <i class="fa-solid fa-user pe-2"></i>Hak Akses
                </a>
            </li>
            <li class="active mt-3">
                <a href="/dashboard-website" class="border-start border-end border-4 rounded-1 border-dark text-decoration-none text-dark fw-semibold px-3 py-3 d-block" style="font-size: 16px">
                    <i class="fa-solid fa-pen pe-2"></i>Deskripsi Web
                </a>
            </li>
        @endcan
        <li class="active mt-3">
            <a href="https://forms.gle/TGt1uB1kCUL7Hhnk9" class="border-start border-end border-4 rounded-1 border-dark text-decoration-none text-dark fw-semibold px-3 py-3 d-block" style="font-size: 16px">
                <i class="fa-solid fa-pen-to-square pe-2"></i>Kendala
            </a>
        </li>
        <li class="mt-4">
            <form method="POST" class="d-grid" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                class="btn rounded-3 px-4"  style="background-color: #33363F; color: #F5F5F5;">
                    Logout
                </a>
            </form>
        </li>
    </ul>

<style>
#side_nav{
    background: #eee;
    min-width: 250px;
    max-width: 250px;
    transition: all 0.3s;
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
#demo-1 {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}

</style>
