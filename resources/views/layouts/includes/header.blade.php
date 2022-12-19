<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


@if(\Auth::guard('web')->user())
    <?php

    $pedidos = \App\Models\Pedido::where([
            'status' => 'RE',
            'client_id' => Auth::guard('web')->user()->id
    ])->get();

    $contaCart = 0;
    ?>
@endif
<?php
session_start();

$data = [];

$categoriaLivros2 = \App\Models\CategoryLivros::all();

$listaCategorias = \App\Models\Category::limit(1)->get();

$listaSubCategoriasHeader = \App\Models\SubCategory::all();

$data['listaSubCategoria'] = $listaSubCategoriasHeader;

$todasCategorias = \App\Models\Category::all();
$categoriaHeader = \App\Models\Category::limit(1)->get();


$primeirasCategorias = \App\Models\Category::limit(6)->get();

if(count($primeirasCategorias) > 5){

    $SegundasCategorias = \App\Models\Category::where('id','>',$primeirasCategorias[5]->id)->limit(7)->get();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--//tags -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />
    <link href="{{ asset('css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('images/logo-multisocial.png') }}" rel="icon">
    <!-- //for bootstrap working -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>

    <!-- <script src="//code.jivosite.com/widget/Q5XNdDDEN3" async></script> -->
    <script src="//code.jivosite.com/widget/d6GEHerdy7" async></script>
    <!--Start of Tawk.to Script-->
    <!-- <script type="text/javascript">
         var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
         (function(){
             var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
             s1.async=true;
             s1.src='https://embed.tawk.to/62695b427b967b11798ccd11/1g1lop0ai';
             s1.charset='UTF-8';
             s1.setAttribute('crossorigin','*');
             s0.parentNode.insertBefore(s1,s0);
         })();
     </script> -->
    <!--End of Tawk.to Script-->
    @yield('style')
    <link href="{{asset('css/custom.css')}}" rel='stylesheet' type='text/css'/>
</head>
<body>


<!-- header -->
<div class="header" id="home">
    <div class="container">
        <ul>
            @if(\Auth::guard('web')->user())
                <li>
                    <a href="#"><i style="color: #fff;" class="fa fa-user" aria-hidden="true"></i> Seja bem-vindo, <span>{{ \Auth::guard('web')->user()->nome }}</span></a>
                </li>
                <li><a href="{{ route("logout") }}"><i style="color: #fff;" class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
            @else
                <li style="border-right: 1px solid #464444;"> <a href="#" data-toggle="modal" data-target="#myModal"><i style="color: #fff;" class="fa fa-unlock-alt" aria-hidden="true"></i> Entrar </a></li>
                <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i style="color: #fff;" class="fa fa-pencil-square-o" aria-hidden="true"></i> Registar </a></li>
            @endif
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <!-- header-bot -->
        <div class="col-md-5 logo_agile">
            <h1>
                <img src="{{ asset('images/logo-multisocial.png') }}" style="width: 50px; height: 50px; padding: 5px; margin-right: -3px;" alt=""/><a href="{{ route('home') }}"><span>Multi</span>Shopping</a></h1>
        </div>
        <!-- header-bot -->

        <div class="col-md-2 agileits-social top_content">


        </div>
        <div class="col-md-5 header-middle">
            <form action="{{ route('search_product') }}" method="get">
                <input type="search" name="search" placeholder="O que você procura hoje?" required="">
                <input style="background-color: #0f0b35;" type="submit" value=" ">
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->

<!-- banner -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item menu__item--current"><a class="menu__link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a></li>

                            @if(isset($categoriaHeader) && count($categoriaHeader) > 0)
                                @foreach($categoriaHeader as $cat)
                                    <li class="menu__item">
                                        <a class="menu__link" href="{{ route('product-category',$cat->id) }}">{{ $cat->nome }} </a>
                                    </li>
                                @endforeach
                            @endif
                            <li class="dropdown menu__item">
                                <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nossas Categorias<span class="caret"></span></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                      <!--  <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                            <a href="#"><img src="" alt=""/></a>
                                        </div>-->
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="{{ route('product-category',0) }}">Todas</a></li>
                                                @if(isset($primeirasCategorias) && count($primeirasCategorias) > 0)
                                                    @foreach($primeirasCategorias as $cat)
                                                        <li><a href="{{ route('product-category',$cat->id) }}">{{ $cat->nome }}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                @if(isset($SegundasCategorias) && count($SegundasCategorias) > 0)
                                                    @foreach($SegundasCategorias as $cat)
                                                        <li><a href="{{ route('product-category',$cat->id) }}">{{ $cat->nome }}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            @if(isset($categoriaLivros2) && count($categoriaLivros2) > 0)
                                <li class="menu__item ">
                                    <a class="menu__link" href="{{ route('books_cat',0) }}">Livraria Digital</a>
                                </li>
                            @endif
                            <li>
                                <a class="menu__link" href="#">Lojas & Parceiros</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="top_nav_right">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1">

                @if(\Auth::guard('web')->user())

                    <a href="{{ route('view_cart') }}"><button class="w3view-cart"><i class="fa fa-cart-arrow-down"></i></button>
                    </a>
                @else
                    <button onclick="alert('Faça login ou regista-se para ver o carrinho! :(')" class="w3view-cart"><i class="fa fa-cart-arrow-down"></i></button>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->


<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <?php
                if(isset($_SESSION['acesso_neg'])):
                ?>
                    <div class="alert alert-danger">
                        <?php
                            echo $_SESSION['acesso_neg'];
                        ?>
                    </div>
                <?php
                endif
                ?>
                <div class="col-md-12 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Entrar <span>Agora</span></h3>
                    <form action="{{ route("login-admin") }}" method="post">
                        @csrf
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="email">
                            <label>Email ou Número de telefone</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="password" name="senha" required="">
                            <label>Password</label>
                            <span></span>
                        </div>
                        <input type="submit" value="Entrar">
                    </form>
                    <p><a href="{{ route('recuperar_senha') }}">Esqueci minha senha</a></p>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
                        <li><a href="#" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="twitter">
                                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="pinterest">
                                <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <p><a href="#" data-toggle="modal" data-target="#myModal2" style="color: #c02720;"> Criar uma conta agora!</a></p>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->

<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <?php
                if(isset($_SESSION['cad_error'])):
                ?>
                    <div class="alert alert-danger">
                        <?php
                            echo $_SESSION['cad_error'];
                        ?>
                    </div>
                <?php
                endif
                ?>
                <div class="col-md-12 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Registrar-se <span>Agora</span></h3>
                    <form id="form-cad" method="post" action="{{ route('cadastrar_cliente') }}">
                        @csrf
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="name" required="" id="nome">
                            <label>Nome</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="text" name="email_tel" required="" id="email_tel">
                            <label>Email ou número de telefone</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="password" id="senha" name="password" required="">
                            <label>Senha</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="password" id="conf-senha" name="confirm_password" required="">
                            <label>Confirme a Senha</label>
                            <span></span>
                        </div>
                        <input type="submit" value="Registar">
                        <!-- <a href="#" onclick="verificaSenhas()" class="botao" style="margin: 10px;">Registar</a> -->
                    </form>
                    <div class="clearfix"></div>
                    <p><a href="#">Clicando em registrar, estás aceitar com os nossos termos.</a></p>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal2 -->

@if(\Auth::guard('web')->user())
    <a href="{{ route('view_cart') }}" style="position: fixed;width: 60px; height: 60px; bottom: 250px; left: 40px;
background-color: #fff; color: #000; border-radius: 50px; text-align: center; font-size: 20px;
box-shadow: 1px 1px 2px #888; z-index: 1000;"><img src="{{ asset('images/Shopping Bag_32px.png') }}" style="margin-top: 16px;" alt=""/></a>


    <a href="#" style="position: fixed;width: 20px; height: 20px; bottom: 290px; left: 80px;
background-color: #c02027; color: #fff; border-radius: 30px; text-align: center; font-size: 15px;
box-shadow: 1px 1px 2px #888; z-index: 1000;">
        @foreach($pedidos as $pedido)
            @foreach($pedido->pedido_produtos as $pedido_produto)
                <?php $contaCart = $contaCart + 1 ?>
            @endforeach
        @endforeach
        {{ $contaCart }}
    </a>
@endif
<a href="https://wa.me/244951772431" target="_blank" style="position: fixed;width: 60px; height: 60px; bottom: 40px; left: 40px;
background-color: #25d366; color: #fff; border-radius: 50px; text-align: center; font-size: 30px;
box-shadow: 1px 1px 2px #888; z-index: 1000;"><i style="margin-top: 16px;" class="fa fa-whatsapp"></i></a>



<script>
    /*function verificaSenhas()
    {
        var senha = $('#senha').val();
        var confisenha = $('#conf-senha').val();
        if(senha == confisenha){
            var nome = $('#nome').val();
            var email_tel = $('#email_tel').val();

            $('#form-cad').submit();
        }else{
            alert('As senhas não devem ser diferentes!');
        }
    }*/


</script>
