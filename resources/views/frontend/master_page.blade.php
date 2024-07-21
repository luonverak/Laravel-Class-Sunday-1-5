<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Paage</title>
    <link rel="stylesheet" href="{{ asset('/asset/bootstrap-5.3.3-dist/css/bootstrap.css') }}">
    <script src="{{ asset('/asset/bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/asset/css/app.css') }}">
</head>

<body>
    <div class="container-fluid header-page d-flex align-items-center bg-dark">
        <div class="page-logo p-2 col-3 h-100">
            <a href="/" class="w-100 h-100 d-flex align-items-center justify-content-center">
                <img src="/asset/images/logo.jpg" alt="">
                <h1 class="m-0 p-0 text-white mx-1 fs-3 ">L.Verak</h1>
            </a>
        </div>
        <div class="col-9 page-menu d-flex align-items-center">
            <ul class="m-0 p-0">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/category">Category</a>
                </li>
            </ul>
        </div>
    </div>
    @yield('contents')
    <footer class="container-fluid footer-page bg-dark d-flex align-items-center ">
        <div class="page-logo p-2 col-3 h-100">
            <a href="/" class="w-100 h-100 d-flex align-items-center justify-content-center">
                <img src="/asset/images/logo.jpg" alt="">
                <h1 class="m-0 p-0 text-white mx-1 fs-3 ">L.Verak</h1>
            </a>
        </div>
        <div class="col-9 page-menu d-flex align-items-center justify-content-center ">
            <ul class="m-0 p-0">
                <li>
                    <a href="#">Facebook</a>
                </li>
                <li>
                    <a href="#">Telegram</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>
