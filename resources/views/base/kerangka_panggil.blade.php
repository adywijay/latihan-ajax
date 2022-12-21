<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('load_extern/js/plugins/jquery-1.11.2.min.js') }}"></script>
    @extends('base.layout.load_css')
    <title>{{ $judul }}</title>
</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav class=" red darken-3">
                <div class="nav-wrapper">
                    <div class="row">
                        <div class="col s12">
                            <a id="burger-icon-1" href="#" data-target="sidebar-1"
                                class="left sidenav-trigger show-on-medium"><i class="material-icons">menu</i></a>

                            <!-- If using booton on nav -->
                            <ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li class="button-atas">
                                    <a href="{{ route('Dashboard') }}"
                                        class="btn-floating btn-small waves-effect waves-light red"><i
                                            class="material-icons nopadding">home</i></a>
                                </li>
                            </ul>
                            <!-- end booton on nav -->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- SIDEBAR 1 - HAS .SIDENAV-FIXED -->
    @extends('base.konten.side_nav.list_side_nav')
    @section('list_menu')
    @endsection

    <main>
        @yield('list_content')
    </main>
    @extends('base.layout.load_js')
</body>

</html>
