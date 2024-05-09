<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title',$global_settings->title)</title>
    {{-- <meta content="" name="description">
    <meta content="" name="keywords"> --}}

    <!-- Favicons -->
    <link href="{{ asset('assets/backend/img/favicon.png') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/img/apple-touch-icon.png') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body>

    @include('layouts.admin.includes.navbar')
    @include('layouts.admin.includes.sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Form Elements</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Elements</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @yield('content')

    </main>


    @include('layouts.admin.includes.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/backend/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/backend/js/main.js') }}"></script>

    @yield('js')
</body>

</html>
