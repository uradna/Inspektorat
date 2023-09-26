<!DOCTYPE html>
<html data-theme="light" @mobile data-layout-mode="fluid" @endmobile @desktop data-layout-mode="fluid" @enddesktop()
    data-topbar-color="light" data-sidenav-size="default" data-sidenav-color="dark" data-layout-position="fixed"
    class="menuitem-active" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- datatables CSS -->
    <link href="{{ asset('datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('datatables/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/user-config.js') }}"></script>
    <link href="{{ asset('css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet" type="text/css">

    {{ $style ?? '' }}
</head>

<body class="show">
    <div class="wrapper">

        @include('components.superadmin.top-bar')

        <div class="leftside-menu menuitem-active">
            {{-- <x-user.logo-fluid></x-user.logo-fluid> --}}
            @include('components.user.logo-fluid')
            @include('components.superadmin.side-menu')
        </div>

        <div class="content-page">
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        {{ $breadcrumb }}
                                    </ol>
                                </div>
                                <h4 class="page-title">{{ $header }}</h4>
                            </div>
                        </div>
                    </div>

                    {{ $content }}

                </div>

            </div>

        </div>
    </div>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <!-- datatables JS -->
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('datatables/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('datatables/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('datatables/button.jszip.min.js') }}"></script>
    <script src="{{ asset('datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('datatables/buttons.print.min.js') }}"></script>

    {{ $script ?? '' }}

    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                title: 'Berhasil..!',
                text: '{!! session('success') !!}',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0acf97'
            })

        </script>
    @endif

    @if (Session::has('fail'))
        <script type="text/javascript">
            Swal.fire({
                title: 'Ops...',
                text: '{!! session('fail') !!}',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#fa5c7c'
            })

        </script>
    @endif
</body>

</html>
