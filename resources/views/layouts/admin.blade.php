<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link href="{{ asset('css//bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kaiadmin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">

    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">

    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <title>Terra Nostra</title>
    </style>
</head>

<body>
    <!-- modelo do sistema -->
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <!-- Logo Header -->
            <div class="sidebar-logo">
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <!-- Verifique se o usuário está autenticado e exiba a imagem de perfil -->
                        @if (Auth::check())
                            <div class="logo_img">
                                <img src="{{ auth()->user()->empresa->logo ? asset('storage/' . auth()->user()->empresa->logo) : asset('images/default-logo.png') }}"
                                    alt="Logo" width="70" height="70">
                            </div>
                        @endif
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->
            <!-- End Menu Header -->

            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">

                    <ul class="nav nav-secondary">
                        <!--
                        <li class="nav-item active">
                            <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <span class="caret"></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#submenu">
                                <i class="fas fa-bars"></i>
                                <p>Menu Levels</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="submenu">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a data-bs-toggle="collapse" href="#subnav1">
                                            <span class="sub-item">Level 1</span>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav1">
                                            <ul class="nav nav-collapse subnav">
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Pedidos</p>
                                <span class="badge badge-success">4</span>
                            </a>
                        </li>
                        -->

                        <li class="nav-item">
                            <a href="{{ route('menu.index') }}">
                                <i class="fa-solid fa-book"></i>
                                <p> Cardápio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categoria.index') }}">
                                <i class="fa-solid fa-layer-group"></i>
                                <p> Categorias</p>
                            </a>
                        </li>
                        @can('index-empresa')
                            <li class="nav-item">
                                <a href="{{ route('empresa.index') }}">
                                    <i class="fa-solid fa-store"></i>
                                    <p>Empresas</p>
                                </a>
                            </li>
                        @endcan
                        @can('index-usuario')
                            <li class="nav-item">
                                <a href={{ route('usuario.index') }}>
                                    <i class="fa-solid fa-users"></i>
                                    <p> Colaboradores</p>
                                </a>
                            </li>
                        @endcan
                        <!--
                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Finanças</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Estatísticas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Histórico</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Configurações</p>
                            </a>
                        </li>
                        -->
                    </ul>
                </div>
            </div>

            <!-- End Menu Header -->
        </div>
        <!-- End Sidebar -->

        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!--Topo -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Buscar ..." class="form-control" />
                            </div>
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <ul class="dropdown-menu messages-notif-box animated fadeIn"
                                    aria-labelledby="messageDropdown">
                                    <li>
                                        <div class="dropdown-title d-flex justify-content-between align-items-center">
                                            Mensagens
                                            <a href="#" class="small">Mark all as read</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/jm_denis.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jimmy Denis</span>
                                                        <span class="block"> How are you ? </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">Todas as Mensagens<i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification">4</span>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">
                                            Notificação
                                        </div>
                                    </li>
                                    <li>
                                        <div class="notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-icon notif-primary">
                                                        <i class="fa fa-user-plus"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> New user registered </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">Todas as Notificações<i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fas fa-layer-group"></i>
                                </a>
                                <div class="dropdown-menu quick-actions animated fadeIn">
                                    <div class="quick-actions-header">
                                        <span class="title mb-1">Quick Actions</span>
                                        <span class="subtitle op-7">Shortcuts</span>
                                    </div>
                                    <div class="quick-actions-scroll scrollbar-outer">
                                        <div class="quick-actions-items">
                                            <div class="row m-0">
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-danger rounded-circle">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </div>
                                                        <span class="text">Calendar</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <!-- Verifique se o usuário está autenticado e exiba a imagem de perfil -->
                                        @if (Auth::check())
                                            <div class="user-profile">
                                                <img src="{{ Auth::user()->foto_perfil ? asset('storage/' . Auth::user()->foto_perfil) : asset('images/default-avatar.png') }}"
                                                    alt="Foto de perfil" width="50" height="50"
                                                    class="avatar-img rounded-circle">
                                            </div>
                                        @endif
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Olá,</span>
                                        <span class="fw-bold">
                                            @if (auth()->check())
                                                {{ auth()->user()->name }}
                                            @endif
                                        </span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                @if (Auth::check())
                                                    <div class="avatar-lg">
                                                        <img src="{{ Auth::user()->foto_perfil ? asset('storage/' . Auth::user()->foto_perfil) : asset('images/default-avatar.png') }}"
                                                            alt="Foto de perfil" class="avatar-img rounded">
                                                    </div>
                                                @endif

                                                <div class="u-text">
                                                    <h4>
                                                        @if (auth()->check())
                                                            {{ auth()->user()->name }}
                                                        @endif
                                                    </h4>
                                                    <p class="text-muted">
                                                        @if (auth()->check())
                                                            {{ auth()->user()->email }}
                                                        @endif
                                                    </p>
                                                    <a href="{{ route('profile.show') }}"
                                                        class="btn btn-xs btn-secondary btn-sm">Ver
                                                        Perfil</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('empresa_profile.show') }}"><i
                                                    class="fa-solid fa-store"></i> Perfil Empresa</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('login.destroy') }}"><i
                                                    class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--Topo -->
            </div>
            <!-- End Navbar -->

            <!-- Conteudo -->
            <div class="container">
                <div class="page-inner">

                    @yield('content')

                </div>
            </div>
            <!-- Conteudo -->

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Suporte </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Termo de Uso </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        Copyright &copy; {{ date('y') }} - Desenvolvido com <i
                            class="fa fa-heart heart text-danger"></i> pela
                        <a href="https://dinerb.com.br/">DINERB Tecnologia</a>
                    </div>
                    <div>
                        Todos os direitos reservados a
                        <a target="_blank" href="https://dinerb.com.br/">DINERB Tecnologia</a>.
                    </div>
                </div>
            </footer>

        </div>
        <!-- modelo do sistema -->

        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/jquery-3.7.1.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/plugin/chart.js/chart.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/plugin/jsvectormap/world.js') }}"></script>
        </script>
        <script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/kaiadmin.min.js') }}"></script>
        </script>
        <script src="{{ asset('js/setting-demo.js') }}"></script>
        </script>
        <script src="{{ asset('js/demo.js') }}"></script>
        </script>

        <script src="{{ asset('js/all.min.js') }}"></script>
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Incluir jQuery e jQuery Mask Plugin -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <!-- Aplicar a máscara globalmente -->
        <script>
            $(document).ready(function() {
                $('#cnpj').mask('00.000.000/0000-00');

                // Máscara para o Telefone (com DDD)
                $('#telefone').mask('(00) 00000-0000');
            });
        </script>

</body>

</html>
