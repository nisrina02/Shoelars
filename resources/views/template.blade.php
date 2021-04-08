<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>SHOELARS</title>
  </head>
  <body>
        <div class="container">
            <div class="row">
                <ul class="nav nav-tabs" style="margin-top:30px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/barang') }}">Items</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/seller') }}">Seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/merchant') }}">Merchant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Account</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/log out') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>    
        </div>

        @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>



<!-- <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <title>SHOELARS</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <ul class="nav nav-tabs" style="margin-top:30px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/barang') }}">Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/seller') }}">Seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/merchant') }}">Merchant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/log out') }}">Logout</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Account</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="">My Account</a></li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>    
        </div>

        

    </body>
</html>  -->