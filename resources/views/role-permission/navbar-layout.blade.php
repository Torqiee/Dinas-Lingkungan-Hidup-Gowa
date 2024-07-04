<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
            @guest
              <li class="nav-item">
                <a class="nav-link fw-bold" href="{{ url('/login') }}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="{{ url('/register') }}">Register</a>
              </li>
            @else
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a
                              class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              this.closest('form').submit();"
                            >
                              Logout
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
            @endguest
        </div>
    </nav>
</body>
</html>
