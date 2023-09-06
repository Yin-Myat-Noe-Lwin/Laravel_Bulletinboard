<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bulletinboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body style="background-color: #c8e4e4;">
    <nav class="navbar fixed-top">
        <a href="{{ route('home') }}" class="logo px-3">
            <p class="navbar-logo">Bulletinboard</p>
        </a>
        <ul class="nav-items">
            <li class="nav-item">
                @auth
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <li class="nav-item nav-item1">
                        <a href="{{ route('users.index') }}" class="nav-link">User List</a>
                    </li>
                @endif
                <div class="dropdown px-4 dropdown-btn">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('users.show', auth()->user()->id)}}">Profile</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <li class="nav-item nav-item2">
                    <a href="{{ route('auth.register') }}" class="nav-link">Register</a>
                </li>
                <li class="nav-item nav-item2 px-3">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                @endauth
            </li>
        </ul>
    </nav>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function () {
            $('#users-table').DataTable({
                "language": {
                    "paginate": {
                        "previous": '<i class="fa-solid fa-less-than prev-icon"></i>',
                        "next": '<i class="fa-solid fa-greater-than next-icon"></i>'
                    }
            }});
        });
    </script>

  </body>
</html>

