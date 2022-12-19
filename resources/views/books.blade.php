@extends("layouts.app")
@section("titulo")
        Livros Digitais
@endsection

@section("conteudo")

    <!-- /banner_bottom_agile_info -->
    <div style="background: url({{ asset('uploads/categorias/banner-livros.jpg') }})  center;" class="page-head_agile_info_w3l">
        <div class="container">
            @if(isset($CategoriasEspe))
            @foreach($CategoriasEspe as $catT)
                <h3 style="color:#000;"><span>{{ $catT->nome }}</span></h3>

                <!--/w3_short-->
                <div class="services-breadcrumb">
                    <div class="agile_inner_breadcrumb">

                        <ul class="w3_short">
                            <li><a href="{{ route("home") }}">Home</a><i>|</i></li>
                            <li>{{ $catT->nome }}</li>
                        </ul>
                    </div>
                </div>
                <!--//w3_short-->
            @endforeach

                @else
                <h3 style="color:#000; font-size: 24pt; text-transform: none; background: url('')">
                    <span>Não há livro tão mau que não tenha algo de bom.</span><br/>
                    <span style="font-size: 13pt;">--Miguel de Cervantes--</span>
                </h3>
                <!--//w3_short-->
            @endif
        </div>
    </div>

    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="">
            <!-- mens -->
            <div class="col-md-3 col-sm-12 products-left">
                <!-- <div class="filter-price">
                    <h3>Filter By <span>Price</span></h3>
                    <ul class="dropdown-menu6">
                        <li>
                            <div id="slider-range"></div>
                            <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                        </li>
                    </ul>
                </div> -->
                <div class="panel-group cat-mobile" id="acordian">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <input type="radio" class="rdo" name="cat" id="entreg" data-target="#collapseone" data-toggle="collapse" data-parent="#acordian">
                                <label for="entreg" style="font-weight: 800; font-size: 15px;">Categorias <span>&#9776;</span></label>
                            </h4>
                        </div>
                        <div id="collapseone" class="panel-collapse collapse in">
                            <div class="panel-body" style="margin: 0px;">
                                <ul class="list-group">
                                    @if(isset($Categorias) && count($Categorias) > 0)

                                        <a href="{{ route('books_cat',0) }}" @if(!isset($CategoriasEspe)) style="font-weight: 600; font-size: 17px; color:#c02720;" @endif class="list-group-item">
                                            Todas
                                        </a>
                                        @foreach($Categorias as $cat)
                                            @if(isset($CategoriasEspe))
                                                @foreach($CategoriasEspe as $catEspe)
                                            <a href="{{ route('books_cat',$cat->id) }}"  @if($cat->nome == $catEspe->nome) style="font-weight: 600; font-size: 17px; color:#c02720;" @endif class="list-group-item">
                                                {{ $cat->nome }}
                                            </a>
                                                @endforeach
                                            @else
                                                <a href="{{ route('books_cat',$cat->id) }}" class="list-group-item">
                                                    {{ $cat->nome }}
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="css-treeview cat-desktop">
                    <h4>Categorias</h4>
                    <ul class="tree-list-pad">
                        @php
                        $cc = 0;
                        @endphp
                        @if(isset($Categorias) && count($Categorias) > 0)
                                    <li>
                                        <label for="" onclick="window.location='{{ route('books',0) }}'"  @if(!isset($CategoriasEspe)) style="font-weight: 600; font-size: 17px;" @endif>Todas</label>
                                    </li>
                            @foreach($Categorias as $cat)
                                <li>
                                    @if(isset($CategoriasEspe))
                                            @foreach($CategoriasEspe as $catEspe)
                                                <label for="" onclick="window.location='{{ route('books_cat',$cat->id) }}'" @if($cat->nome == $catEspe->nome) style="font-weight: 600; font-size: 17px;" @endif>
                                                    {{ $cat->nome }}
                                                </label>
                                            @endforeach
                                        @else
                                        <label for="" onclick="window.location='{{ route('books_cat',$cat->id) }}'">
                                            {{ $cat->nome }}
                                        </label>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 products-right">


                @if(isset($listaLivros) && count($listaLivros) > 0)
                    @foreach($listaLivros as $livro)
                            <div class="col-md-3 product-men">
                                    <div class="men-pro-item simpleCart_shelfItem capa-livro">
                                        <div class="men-thumb-item">
                                            <img src="{{ asset('uploads/capas_de_livros/'.$livro->imagem_capa) }}" alt="" class="pro-image-front">
                                            <img src="{{ asset('uploads/capas_de_livros/'.$livro->imagem_capa) }}" alt="" class="pro-image-back">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{ route('book_details',$livro->id) }}" class="link-product-add-cart">Ver Detalhes</a>
                                                </div>
                                            </div>
                                            <?php
                                            $dataFinal = strtotime(date('d-m-Y',(strtotime('+1 week', strtotime($livro->created_at)))));
                                            $dataAtual = date('d-m-Y');
                                            ?>
                                            @if(strtotime($dataAtual) > $dataFinal)
                                            @else
                                                <span class="product-new-top">Novo</span>
                                            @endif

                                        </div>
                                        <div class="item-info-product ">
                                            <h4><a href="{{ route('product-details',$livro->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $livro->titulo }}
                                                    <?php
                                                    $totLetras = strlen($livro->titulo);
                                                    if($totLetras <= 24){
                                                    ?>
                                                    <?php
                                                    if($totLetras >= 20 && $totLetras < 25){
                                                        echo "<span style='color:#fff;' class='hashtag'>#####</span>";
                                                    }elseif($totLetras > 15 && $totLetras < 20){
                                                        echo "<span style='color:#fff;' class='hashtag'>##########</span>";
                                                    }elseif($totLetras > 10 && $totLetras < 15){
                                                        echo "<span style='color:#fff;' class='hashtag'>###############</span>";
                                                    }else{
                                                        echo "<span style='color:#fff;' class='hashtag'>####################</span>";
                                                    }
                                                    }
                                                    ?>
                                                </a>
                                            </h4>
                                            <div class="info-product-price">
                                                <span class="item_price">{{ $livro->autor }}</span>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                <form action="{{ route('book_details',$livro->id) }}" method="get">
                                                    <input type="submit" name="btnAdd" value="Baixar" class="button">

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                @endif

                <div class="clearfix"></div>
            </div>
            @if(isset($listaLivros))
                <div style="float: right;">{!! $listaLivros->links() !!}</div>
            @endif
            <div class="clearfix"></div>

            <div class="single-pro">
                <!--
                <div class="col-md-3 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="images/m1.jpg" alt="" class="pro-image-front">
                            <img src="images/m1.jpg" alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="single.html" class="link-product-add-cart">Quick View</a>
                                </div>
                            </div>
                            <span class="product-new-top">New</span>

                        </div>
                        <div class="item-info-product ">
                            <h4><a href="single.html">Formal Blue Shirt</a></h4>
                            <div class="info-product-price">
                                <span class="item_price">$45.99</span>
                                <del>$69.71</del>
                            </div>
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                <form action="#" method="post">
                                    <fieldset>
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="business" value=" " />
                                        <input type="hidden" name="item_name" value="Formal Blue Shirt" />
                                        <input type="hidden" name="amount" value="30.99" />
                                        <input type="hidden" name="discount_amount" value="1.00" />
                                        <input type="hidden" name="currency_code" value="USD" />
                                        <input type="hidden" name="return" value=" " />
                                        <input type="hidden" name="cancel_return" value=" " />
                                        <input type="submit" name="submit" value="Add to cart" class="button" />
                                    </fieldset>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                -->
                <div class="clearfix"></div>
            </div>
            <div class="container">
            @if(isset($pubs))
                @foreach($pubs as $pub)
            <div style="text-align: center;">
                <h1 style="font-size: 40pt; font-weight: 700">{{ $pub->tema }}</h1>
                <h3 style="margin-top: 15px;"><span>"</span>{{ $pub->pensamento_dia }}<span>"</span> -- <em>{{ $pub->autor }}</em></h3>
                <p style="margin-top: 15px;">{{ $pub->conteudo }}/p>
            </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
    <!-- //mens -->




    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <script src="js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });
    </script>
    <script src="js/modernizr.custom.js"></script>
    <!-- Custom-JavaScript-File-Links -->
    <!-- cart-js -->
    <script src="js/minicart.min.js"></script>
    <script>
        // Mini Cart
        paypal.minicart.render({
            action: '#'
        });

        if (~window.location.search.indexOf('reset=true')) {
            paypal.minicart.reset();
        }
    </script>

    <!-- //cart-js -->
    <!---->
    <script type='text/javascript'>//<![CDATA[
        $(window).load(function(){
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 9000,
                values: [ 1000, 7000 ],
                slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

        });//]]>

    </script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <!---->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- here stars scrolling icon -->
    <!-- Small modal -->



    <script type="text/javascript">
            //$('#mdl').modal('show');
          //  alert('Esse teu esquece ...');

        $(document).ready(function() {

            /*
             var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear'
             };
             */

            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <!-- //here ends scrolling icon -->

    <!-- Fim do JS -->

@endsection
