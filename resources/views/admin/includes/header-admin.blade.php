<?php

    $noti = \App\Models\Notifications::where('statu','N/vista')->get();

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Multishooping - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/style.css') }}" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS -->
    <link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons CSS-->

    <!-- side nav css file -->
    <link href='{{ asset('admin/css/SidebarNav.min.css') }}' media='all' rel='stylesheet' type='text/css'/>
    <!-- //side nav css file -->

    <link rel="stylesheet" href="{{ asset('admin/css/jquery.dataTables.min.css') }}"/>

    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>

    <!-- js-->
    <script src="{{ asset('admin/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/modernizr.custom.js') }}"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->

    <!-- chart -->
    <script src="{{ asset('admin/js/Chart.js') }}"></script>
    <!-- //chart -->

    <link href="{{ asset('images/logo-multisocial.png') }}" rel="icon">

    <!-- Metis Menu -->
    <script src="{{ asset('admin/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <!--//Metis Menu -->
    <style>
        #chartdiv {
            width: 100%;
            height: 295px;
        }
    </style>
    <!--pie-chart --><!-- index page sales reviews visitors pie chart -->
    <script src="{{ asset('admin/js/pie-chart.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });

    </script>
    <!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

    <!-- requried-jsfiles-for owl -->
    <link href="{{ asset('admin/css/owl.carousel.css') }}" rel="stylesheet">
    <script src="{{ asset('admin/js/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                items : 3,
                lazyLoad : true,
                autoPlay : true,
                pagination : true,
                nav:true,
            });
        });
    </script>
    <!-- //requried-jsfiles-for owl -->
    <style>
        .noti{background-color: red; color:#fff; padding: 3px; position: absolute;
            font-size: 13px; border-radius: 50px; margin: -10px 0px 0px -15px;}
    </style>
</head>
<body class="cbp-spmenu-push">
<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
        <!--left-fixed -navigation-->
        <aside class="sidebar-left">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="{{ route('index-admin') }}"> Multishopping<span class="dashboard_text" style="text-align:center;">Admin---</span></a></h1>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="sidebar-menu">
                        <li class="header">MENU PRINCIPAL</li>
                        <li class="treeview">
                            <a href="{{ route('index-admin') }}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Produtos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ action('ProductAdminController@index') }}"><i class="fa fa-angle-right"></i> Produtos</a></li>
                             </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Categorias</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ action('CategoryAdminController@index') }}"><i class="fa fa-angle-right"></i> Categorias de Produtos</a></li>
                                <li><a href="{{ action('CategoryLivroAdminController@index') }}"><i class="fa fa-angle-right"></i> Categorias de Livro</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Sub categorias</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ action('SubCategoryAdminController@index') }}"><i class="fa fa-angle-right"></i> Sub Categorias de Produtos</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Caracteristicas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ action('CaracteristicAdminController@index') }}"><i class="fa fa-angle-right"></i> Caracteristicas de Produtos</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="{{ action('PedidoAdminController@index') }}">
                                <i class="fa fa-laptop"></i>
                                <span>Pedidos</span>
                                <!-- <span class="label label-primary pull-right">new</span> -->
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Livros</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ action('LivroAdminController@index') }}"><i class="fa fa-angle-right"></i> Livros Digitais</a></li>
                                <li><a href="{{ action('PubsLivroAdminController@create') }}"><i class="fa fa-angle-right"></i> Cadastrar Frase do dia</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="{{ action('DownloadAdminController@index') }}">
                                <i class="fa fa-download"></i>
                                <span>Downloads de Livros</span>
                                <!-- <span class="label label-primary pull-right">new</span> -->
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="{{ action('PontosAdminController@index') }}">
                                <i class="fa fa-money"></i>
                                <span>Gestão dos pontos</span>
                                <!-- <span class="label label-primary pull-right">new</span> -->
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="{{ action('ClientAdminController@index') }}">
                                <i class="fa fa-users"></i>
                                <span>Clientes</span>
                                <!-- <span class="label label-primary pull-right">new</span> -->
                            </a>
                        </li>

                        <!--
                        <li>
                            <a href="#route('email_marketing') }}">
                                <i class="fa fa-th"></i> <span>Email Marketing</span>
                               <!-- <small class="label pull-right label-info">08</small> -->
                        <!--</a>
                        </li>

                        -->

                      <!--  <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Usuários</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li> -->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </aside>
    </div>
    <!--left-fixed -navigation-->

    <!-- header-starts -->
    <div class="sticky-header header-section ">
        <div class="header-left">
            <!--toggle button start-->
            <button id="showLeftPush"><i class="fa fa-bars"></i></button>
            <!--toggle button end-->
            <div class="profile_details_left"><!--notifications of menu start -->
                <ul class="nofitications-dropdown">
                    <li class="dropdown head-dpdn">
                        <a href="{{ route('notification') }}" class="dropdown-toggle"><i class="fa fa-envelope"></i></a>
                        @if(count($noti) > 0)
                        <span class="noti">{{ count($noti) }}</span>
                        @endif
                    </li>
                </ul>
                <div class="clearfix"> </div>
            </div>
            <!--notification menu end -->
            <div class="clearfix"> </div>
        </div>
        <div class="header-right">




            <div class="profile_details">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile_img">
                                <span class="prfil-img"><img style="width: 50px; height: 50px;" src="{{ asset('images/logo-multisocial.png') }}" alt=""> </span>
                                <div class="user-name">
                                    <p>{{ \Auth::user()->name }}</p>
                                    <span>Administrator</span>
                                </div>
                                <i class="fa fa-angle-down lnr"></i>
                                <i class="fa fa-angle-up lnr"></i>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                            <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
                            <li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li>
                            <li> <a href="{{ route('logout_admin') }}"><i class="fa fa-sign-out"></i> Logout</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //header-ends -->