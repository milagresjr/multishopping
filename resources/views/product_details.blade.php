@extends("layouts.app")

@section("conteudo")
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div style="background: url({{ asset('uploads/categorias/eletronicos.jpg') }})  center;" class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Single <span>Page </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                    <li>Single Page</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success" style="text-align: center;">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        @if(isset($productEspe))
            @foreach($productEspe as $prod)
        <div class="col-md-4 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">

                    <ul class="slides">
                        @foreach($imgProduct as $img)
                        <li data-thumb="{{ asset('uploads/'.$img->imagem) }}">
                            <div class="thumb-image"> <img src="{{ asset('uploads/'.$img->imagem) }}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="col-md-8 single-right-left simpleCart_shelfItem">
            <h3>{{ $prod->nome }}</h3>
            <p><span class="item_price">{{ number_format($prod->preco,2,',','.') }} Kz</span></p>
            <div class="rating1">
						<span class="starRating">
							<input id="ratin1" type="radio" name="ratin" value="5" checked="">
							<input id="ratin2" type="radio" name="ratin" value="4" checked="">
							<input id="ratin3" type="radio" name="ratin" value="3" checked="">
                            <input id="ratin4" type="radio" name="ratin" value="3" checked="">
                            <input id="ratin5" type="radio" name="ratin" value="3">
							<label for="ratin1">1</label>
                            <label for="ratin2">1</label>
                            <label for="ratin3">1</label>
                            <label for="ratin4">1</label>
                            <label for="ratin5">1</label>
						</span>
            </div>
            <div class="description">
                <h5>{{ substr($prod->descricao,1,100) }}...</h5>
            </div>
            <div class="occasion-cart">
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                    @if(\Auth::guard('web')->user())
                        <form action="{{ route('add_cart',$prod->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $prod->id }}"/>
                            <input type="submit" name="btnAdd" value="Add Carrinho" class="button">
                        </form>
                    @else
                        <form action="#">
                            <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Add Carrinho" class="button">
                        </form>

                    @endif
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top: -55px; left: 180px;">
                    @if(\Auth::guard('web')->user())
                        <form action="{{ route('comprar_dir') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $prod->id }}"/>
                            <input type="submit" name="btnAdd" value="Comprar Agora" class="button">

                        </form>
                    @else
                        <form action="#">
                            <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar Agora" class="button">
                        </form>

                    @endif
                </div>

            </div>


        </div>
        <div class="clearfix"> </div>
            @endforeach
        @endif
        <!-- /new_arrivals -->
        <div class="responsive_tabs_agileits">
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li>Descrição</li>
                    <li>Reviews</li>
                    <li>Caracteristicas</li>
                </ul>
                <div class="resp-tabs-container">
                    <!--/tab_one-->
                    <div class="tab1">

                        <div class="single_page_agile_its_w3ls">
                            <p>{{ $prod->descricao }}.</p>
                        </div>
                    </div>
                    <!--//tab_one-->
                    <div class="tab2">

                        <div class="single_page_agile_its_w3ls">
                            <div class="bootstrap-tab-text-grids">
                                <div class="bootstrap-tab-text-grid" style="margin-bottom: 10px;">
                                    @if(isset($listaAvaliacao))
                                        @foreach($listaAvaliacao as $ava)
                                            @foreach($clientes as $cli)
                                                @if($ava->client_id == $cli->id)
                                    <div class="bootstrap-tab-text-grid-left">

                                        <img src="{{ asset('images/t1.jpg') }}" alt=" " class="img-responsive" style="width: 120px; height: 120px;border-radius: 50%">
                                    </div>
                                    <div class="bootstrap-tab-text-grid-right">
                                        <ul>
                                            <li><a href="#">{{ $cli->nome }}</a></li>
                                            <!-- <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li> -->
                                        </ul>
                                        <p>{{ $ava->texto }}.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                        @endif
                                        @endforeach
                                       @endforeach
                                    @endif
                                </div>
                                <div class="add-review">
                                    <h4>Add uma Avaliação</h4>
                                    <h3>Pontuação</h3>
                                    @if(\Auth::guard('web')->user())
                                    <form action="{{ route('avaliar') }}" method="post">

                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $prod->id }}"/>
                                        <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="estrelas" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="estrelas" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="estrelas" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="estrelas" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="estrelas" value="1">
							<label for="rating1">1</label>
						</span>
                                        </div>
                                        <textarea name="message" placeholder="Escreva uma avaliação" required=""></textarea>

                                        <input type="submit" value="ENVIAR">

                                    </form>
                                    @else
                                        <form action="#" method="post">

                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $prod->id }}"/>
                                            <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="estrelas" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="estrelas" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="estrelas" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="estrelas" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="estrelas" value="1">
							<label for="rating1">1</label>
						</span>
                                            </div>
                                            <textarea name="message" placeholder="Escreva uma avaliação" required=""></textarea>
                                <a onclick="alert('Faça login ou regista-se para fazer avaliação em um produto!')" class="botao bt-env">ENVIAR</a>
                                        </form>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab3">

                        <div class="single_page_agile_its_w3ls">
                            <p>
                                @foreach($listaCarac as $cara)
                                    @foreach($listaProdutoCarac as $prodCara)
                                        @if($prodCara->product_id == $prod->id && $prodCara->caracteristic_id == $cara->id)
                                            <b>{{ $cara->nome }}:</b> {{ $prodCara->valor }}<br/>
                                        @endif
                                    @endforeach
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //new_arrivals -->
        <!--/slider_owl-->

        <div class="w3_agile_latest_arrivals">
            <h3 class="wthree_text_info">Produtos <span>Relacionados</span></h3>
            @if(isset($productRelacionados))
                @foreach($productRelacionados as $prodRela)
                    @foreach($imgProductRela as $img)
                        @if($prodRela->id == $img->product_id)
            <div class="col-md-3 product-men single">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item" onclick="window.location='{{ route('product-details',$prodRela->id) }}'">
                        <img src="{{ asset('uploads/'.$img->imagem) }}" alt="" class="img-pro pro-image-front">
                        <img src="{{ asset('uploads/'.$img->imagem) }}" alt="" class="img-pro pro-image-back">

                        <?php
                        $dataFinal = strtotime(date('d-m-Y',(strtotime('+1 week', strtotime($prodRela->created_at)))));
                        $dataAtual = date('d-m-Y');
                        ?>
                        @if(strtotime($dataAtual) > $dataFinal)
                        @else
                            <span class="product-new-top">Novo</span>
                        @endif

                    </div>
                    <div class="item-info-product ">
                        <h4><a href="{{ route('product-details',$prodRela->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $prodRela->nome }}
                                <?php
                                $totLetras = strlen($prodRela->nome);
                                if($totLetras <= 30){
                                ?>
                                <?php
                                if($totLetras >= 20 && $totLetras < 25){
                                    echo "<span style='color:#fff;' class='hashtag'>##########</span>";
                                }elseif($totLetras > 15 && $totLetras < 20){
                                    echo "<span style='color:#fff;' class='hashtag'>###############</span>";
                                }elseif($totLetras > 10 && $totLetras <= 15){
                                    echo "<span style='color:#fff;' class='hashtag'>##################</span>";
                                }elseif($totLetras <= 10){
                                    echo "<span style='color:#fff;' class='hashtag'>####################</span>";
                                }elseif($totLetras >24){
                                    echo "<span style='color:#fff;' class='hashtag'>########</span>";
                                }
                                }
                                ?>
                            </a>
                        </h4>
                        <div class="info-product-price">
                            <span class="item_price">{{ number_format($prodRela->preco,2,',','.') }} Kz</span>

                        </div>
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                            @if(\Auth::guard('web')->user())
                                <form action="{{ route('add_cart',$prodRela->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $prodRela->id }}"/>
                                    <input type="submit" name="btnAdd" value="Add Carrinho" class="button">

                                </form>
                            @else
                                <form action="#">
                                    <input onclick="alert('Faça login ou regista-se para fazer uma compra!')" type="submit" name="btnAdd" value="Add Carrinho" class="button">
                                </form>

                            @endif
                        </div>
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2"  style="top: -20px">

                            @if(\Auth::guard('web')->user())
                                <form action="{{ route('comprar_dir') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                    <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                </form>
                                @else
                                <form action="#">
                                    <input onclick="alert('Faça login ou regista-se para fazer uma compra!')" type="submit" name="btnAdd" style="background-color: #fc636b;" value="Comprar Agora" class="button">
                                </form>

                            @endif
                        </div>

                    </div>
                </div>
            </div>
                        @endif
                    @endforeach
                @endforeach
            @endif
            <div class="clearfix"> </div>
            <!--//slider_owl-->
        </div>
    </div>
</div>
<!--//single_page-->

@endsection
