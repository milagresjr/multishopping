

@extends("layouts.app")

@section("titulo")
    Multishopping
@endsection

@section("conteudo")

    @if(isset($qtdProduto))
        <h1>{{ $qtdProduto }}</h1>
    @endif

    @if(session('danger'))
        <script>alert('Acesso Negado! Email ou Senha Errado')</script>
        @endif

<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Produtos de qualidade na <span>Multishopping</span></h3>
					<!--	<p>Especial mês de maio</p> -->
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Mais de 20 categorias e 2000 produtos<span>Disponiveis</span></h3>
			      <!--	<p> Descontos de até 20%!! </p> -->
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Baixe mais de 2000 ebooks <span>Gratuitos</span></h3>
					<!-- <p>Com a mesma velocidade que eles chegam até você</p> -->
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<h3>Poupe e acumule pontos na<span>Multishopping</span></h3>
						<!-- <p>Temos diversos livros digitais para você</p> -->
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
    </div>
	<!-- //banner -->
 <!--   <div class="banner_bottom_agile_info">
	    <div class="container">
            <div class="banner_bottom_agile_info_inner_w3ls">
    	           <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="images/bottom1.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>F</span>all Ahead</h3>
								<p>New Arrivals</p>
							</figcaption>
						</figure>
					</div>
					 <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="images/bottom2.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>F</span>all Ahead</h3>
								<p>New Arrivals</p>
							</figcaption>
						</figure>
					</div>
					<div class="clearfix"></div>
		    </div>
		 </div>
    </div> -->
	<!-- schedule-bottom -->
<!--	<div class="schedule-bottom">
		<div class="col-md-6 agileinfo_schedule_bottom_left">
			<img src="images/mid.jpg" alt=" " class="img-responsive" />
		</div>
		<div class="col-md-6 agileits_schedule_bottom_right">
			<div class="w3ls_schedule_bottom_right_grid">
				<h3>Save up to <span>50%</span> in this week</h3>
				<p>Suspendisse varius turpis efficitur erat laoreet dapibus.
					Mauris sollicitudin scelerisque commodo.Nunc dapibus mauris sed metus finibus posuere.</p>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<h4>Customers</h4>
					<h5 class="counter">653</h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-calendar-o" aria-hidden="true"></i>
					<h4>Events</h4>
					<h5 class="counter">823</h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-shield" aria-hidden="true"></i>
					<h4>Awards</h4>
					<h5 class="counter">45</h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
-->
	<!-- //schedule-bottom -->



  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="">
		<h3 class="wthree_text_info">O que é <span>Tendência</span></h3>
       <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="thumbnail">
                            <img src="{{ asset('images/categorias/ele.jpg') }}" alt="..." class="image-cate">
                            <div class="caption" style="text-align:center;">
                            <h3>Eletrónicos</h3>
                   </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/categorias/bri.jpg') }}" alt="..." class="image-cate">
                    <div class="caption" style="text-align:center;">
                        <h3>Brinquedos e Jogos</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/categorias/mfe.jpg') }}" alt="..." class="image-cate">
                    <div class="caption" style="text-align:center;">
                        <h3>Moda Feminina</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/categorias/cos.jpg') }}" alt="..." class="image-cate">
                    <div class="caption" style="text-align:center;">
                        <h3>Cosméticos</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/categorias/ace.jpg') }}" alt="..." class="image-cate">
                    <div class="caption" style="text-align:center;">
                        <h3>Acessórios</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/categorias/mod-masc.jpg') }}" alt="..." class="image-cate">
                    <div class="caption" style="text-align:center;">
                        <h3>Moda Masculina</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/categorias/casele.jpg') }}" alt="..." class="image-cate">
                    <div class="caption" style="text-align:center;">
                        <h3>Eletro-domésticos</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/categorias/minf.jpg') }}" alt="..." class="image-cate">
                    <div class="caption" style="text-align:center;">
                        <h3>Moda Infantil</h3>
                    </div>
                </div>
            </div>
        </div>

       </div>
        <!--
		<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
			<a href="womens.html">
			   <div class="bb-left-agileits-w3layouts-inner grid">
					<figure class="effect-roxy">
							<img src="images/bb1.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span style="color: #fff;">MODA</span>FEMININA </h3>
                                <p style="letter-spacing: normal;"><a href="#" class="btn btn-danger">Saber Mais</a></p>
							</figcaption>
						</figure>
			    </div>
			</a>
		</div>
		<div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">
		      <a href="mens.html">
		       <div class="bb-middle-agileits-w3layouts grid">
			           <figure class="effect-roxy">
							<img src="{{ asset('images/moda masculina.jpg') }}" alt=" " class="img-responsive" style="width: 650px; height: 300px;"/>
							<figcaption>
								<h3><span style="color: #fff;">MODA</span>MASCULINA </h3>
                                <p style="letter-spacing: normal;"><a href="#" class="btn btn-danger">Saber Mais</a></p>
							</figcaption>
						</figure>
		        </div>
				</a>
				<a href="mens.html">
		      <div class="bb-middle-agileits-w3layouts forth grid">
						<figure class="effect-roxy">
							<img src="{{ asset('images/computadores.jpg') }}" alt=" " class="img-responsive" style="width: 650px; height: 300px;">
							<figcaption>
								<h3><span style="color: #fff;">Informática</span></h3>
                                <p style="letter-spacing: normal;"><a href="#" class="btn btn-danger">Saber Mais</a></p>
							</figcaption>
						</figure>
					</div>
					</a>-->
		<div class="clearfix"></div>
	</div>
	</div>
    </div>



<!-- /new_arrivals -->
	<div class="new_arrivals_agile_w3ls_info">
		<div class="container">
		    <h3 class="wthree_text_info">Produtos <span>Destaques</span></h3>
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
                            @if(isset($quatroCate) && count($quatroCate) > 0)
                                @foreach($quatroCate as $cat)
							<li> {{ $cat->nome }}</li>
                                @endforeach
                            @endif
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
						<div class="tab1">
                            @if(isset($listaProdutoEle) && count($listaProdutoEle) > 0)
                                @foreach($listaProdutoEle as $prod)
                                    @foreach($listaProdutoEleImg as $Img)
                                        @if($prod->id == $Img->product_id)
							        <div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item" onclick="window.location='{{ route('product-details',$prod->id) }}'">
										<img src="uploads/{{ $Img->imagem }}" alt="" class="img-pro pro-image-front">
										<img src="uploads/{{ $Img->imagem }}" alt="" class="img-pro pro-image-back">

                                        <?php
                                        $dataFinal = strtotime(date('d-m-Y',(strtotime('+1 week', strtotime($prod->created_at)))));
                                        $dataAtual = date('d-m-Y');
                                        ?>
                                        @if(strtotime($dataAtual) > $dataFinal)
                                        @else
                                            <span class="product-new-top">Nov</span>
                                        @endif

									</div>
									<div class="item-info-product ">
                                        <h4><a href="{{ route('product-details',$prod->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $prod->nome }}
                                                <?php
                                                $totLetras = strlen($prod->nome);
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
											<span class="item_price">{{ number_format($prod->preco,2,',','.') }} Kz</span>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            @if(\Auth::guard('web')->user())
                                                <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                    <input type="submit" name="btnAdd" value="Add Carrinho" class="button">

                                                </form>
                                            @else
                                                    <input data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Add Carrinho" class="button">

                                            @endif
										</div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top: -20px;">
                                            @if(\Auth::guard('web')->user())
                                                <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                    <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                                </form>
                                            @else
                                                    <input data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                            @endif
                                        </div>

									</div>
								</div>
							</div>
                                        @endif
                                     @endforeach
                                @endforeach
                            @endif

                            <div class="clearfix"></div>
						</div>
						<!--//tab_one-->
						<!--/tab_two-->
						<div class="tab2">
                            @if(isset($listaProdutoMob) && count($listaProdutoMob) > 0)
                                @foreach($listaProdutoMob as $prod)
                                    @foreach($listaProdutoMobImg as $Img)
                                        @if($prod->id == $Img->product_id)
                                            <div class="col-md-3 product-men">
                                                <div class="men-pro-item simpleCart_shelfItem">
                                                    <div class="men-thumb-item" onclick="window.location='{{ route('product-details',$prod->id) }}'">
                                                        <img src="uploads/{{ $Img->imagem }}" alt="" class="img-pro pro-image-front">
                                                        <img src="uploads/{{ $Img->imagem }}" alt="" class="img-pro pro-image-back">
                                                        <?php
                                                        $dataFinal = strtotime(date('d-m-Y',(strtotime('+1 week', strtotime($prod->created_at)))));
                                                        $dataAtual = date('d-m-Y');
                                                        ?>
                                                        @if(strtotime($dataAtual) > $dataFinal)
                                                        @else
                                                            <span class="product-new-top">Nov</span>
                                                        @endif

                                                    </div>
                                                    <div class="item-info-product ">
                                                        <h4><a href="{{ route('product-details',$prod->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $prod->nome }}
                                                                <?php
                                                                $totLetras = strlen($prod->nome);
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
                                                            <span class="item_price">{{ number_format($prod->preco,2,',','.') }} Kz</span>
                                                        </div>
                                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                            @if(\Auth::guard('web')->user())
                                                                <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                                    <input type="submit" name="btnAdd" value="Comprar" class="button">

                                                                </form>
                                                            @else
                                                                    <input data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar" class="button">

                                                            @endif
                                                        </div>
                                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top: -20px;">
                                                            @if(\Auth::guard('web')->user())
                                                                <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                                    <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                                                </form>
                                                            @else
                                                                    <input data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
							<div class="clearfix"></div>
						</div>
					 <!--//tab_two-->
						<div class="tab3">

                            @if(isset($listaProdutoAce) && count($listaProdutoAce) > 0)
                                @foreach($listaProdutoAce as $prod)
                                    @foreach($listaProdutoAceImg as $Img)
                                        @if($prod->id == $Img->product_id)
                                            <div class="col-md-3 product-men">
                                                <div class="men-pro-item simpleCart_shelfItem">
                                                    <div class="men-thumb-item" onclick="window.location='{{ route('product-details',$prod->id) }}'">
                                                        <img src="uploads/{{ $Img->imagem }}" alt="" class="img-pro pro-image-front">
                                                        <img src="uploads/{{ $Img->imagem }}" alt="" class="img-pro pro-image-back">
                                                        <?php
                                                        $dataFinal = strtotime(date('d-m-Y',(strtotime('+1 week', strtotime($prod->created_at)))));
                                                        $dataAtual = date('d-m-Y');
                                                        ?>
                                                        @if(strtotime($dataAtual) > $dataFinal)
                                                        @else
                                                            <span class="product-new-top">Novo</span>
                                                        @endif

                                                    </div>
                                                    <div class="item-info-product ">
                                                        <h4><a href="{{ route('product-details',$prod->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $prod->nome }}
                                                                <?php
                                                                $totLetras = strlen($prod->nome);
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
                                                            <span class="item_price">{{ number_format($prod->preco,2,',','.') }} Kz</span>
                                                        </div>
                                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                            @if(\Auth::guard('web')->user())
                                                                <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                                    <input type="submit" name="btnAdd" value="Add Carrinho" class="button">

                                                                </form>
                                                            @else
                                                                    <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Add Carrinho" class="button">

                                                            @endif
                                                        </div>
                                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top: -20px;">
                                                            @if(\Auth::guard('web')->user())
                                                                <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                                    <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                                                </form>
                                                            @else
                                                                    <input data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif

						<div class="clearfix"></div>
						</div>

						<div class="tab4">
                            @if(isset($listaProdutoCas) && count($listaProdutoCas) > 0)
                                @foreach($listaProdutoCas as $prod)
                                    @foreach($listaProdutoCasImg as $Img)
                                        @if($prod->id == $Img->product_id)
                                            <div class="col-md-3 product-men">
                                                <div class="men-pro-item simpleCart_shelfItem">
                                                    <div class="men-thumb-item" onclick="window.location='{{ route('product-details',$prod->id) }}'">
                                                        <img src="uploads/{{ $Img->imagem }}" alt="" class="img-pro pro-image-front">
                                                        <img src="uploads/{{ $Img->imagem }}" alt="" class="img-pro pro-image-back">
                                                        <?php
                                                        $dataFinal = strtotime(date('d-m-Y',(strtotime('+1 week', strtotime($prod->created_at)))));
                                                        $dataAtual = date('d-m-Y');
                                                        ?>
                                                        @if(strtotime($dataAtual) > $dataFinal)
                                                        @else
                                                            <span class="product-new-top">Novo</span>
                                                        @endif

                                                    </div>
                                                    <div class="item-info-product ">
                                                        <h4><a href="{{ route('product-details',$prod->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $prod->nome }}
                                                                <?php
                                                                $totLetras = strlen($prod->nome);
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
                                                            <span class="item_price">{{ number_format($prod->preco,2,',','.') }} Kz</span>
                                                        </div>
                                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                            @if(\Auth::guard('web')->user())
                                                                <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                                    <input type="submit" name="btnAdd" value="Comprar" class="button">

                                                                </form>
                                                            @else
                                                                    <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar" class="button">

                                                            @endif
                                                        </div>
                                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top: -20px;">
                                                            @if(\Auth::guard('web')->user())
                                                                <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                                    <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                                                </form>
                                                            @else
                                                                    <input data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<!-- //new_arrivals -->

        <div class="clearfix"></div>
        <div class="container">
            <h3 class="wthree_text_info">Produtos <span>Recente</span></h3>
            <div class="single-pro">
                <div class="row">
                        @if(isset($produtosRecentes))
                    @foreach($produtosRecentes as $prod)
                            @foreach($listaImagens as $img)
                                @if($prod->id == $img->product_id)
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item" onclick="window.location='{{ route('product-details',$prod->id) }}'">
                                    <img src="{{ asset('uploads/'.$img->imagem)}}" alt="" class="img-pro pro-image-front">
                                    <img src="{{ asset('uploads/'.$img->imagem) }}" alt="" class="img-pro pro-image-back">

                                    <?php
                                    $dataFinal = strtotime(date('d-m-Y',(strtotime('+1 week', strtotime($prod->created_at)))));
                                    $dataAtual = date('d-m-Y');
                                    ?>
                                    @if(strtotime($dataAtual) > $dataFinal)
                                    @else
                                        <span class="product-new-top">Novo</span>
                                    @endif

                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="{{ route('product-details',$prod->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $prod->nome }}
                                            <?php
                                            $totLetras = strlen($prod->nome);
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
                                        <span class="item_price">{{ number_format($prod->preco,2,',','.') }} Kz</span>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        @if(\Auth::guard('web')->user())
                                            <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                <input type="submit" name="btnAdd" value="Add Carrinho" class="button">

                                            </form>
                                        @else
                                                <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Add Carrinho" class="button">

                                        @endif
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top: -20px;">
                                        @if(\Auth::guard('web')->user())
                                            <form action="{{ route('comprar_dir') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                            </form>
                                        @else
                                                <input data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                       @endforeach
                    @endforeach
                    @endif
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

	<!-- /we-offer -->
		<div class="sale-w3ls" style="margin-top: 50px; margin-bottom: 50px; ">
			<div class="container">
				<h6>Temos descontos de até <span>20%</span></h6>

				<a class="hvr-outline-out button2" href="{{ route('product-category',0) }}">Comprar Agora </a>
			</div>
		</div>
	<!-- //we-offer -->

        <div class="clearfix"></div>
        <div class="container">
            <h3 class="wthree_text_info">Produtos <span>Diversos</span></h3>
            <div class="single-pro">
                <div class="row">
                @if(isset($produtosDiversos))
                    @foreach($produtosDiversos as $prod)
                            @foreach($listaImagens as $img)
                                @if($prod->id == $img->product_id)
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item" onclick="window.location='{{ route('product-details',$prod->id) }}'">
                                    <img src="{{ asset('uploads/'.$img->imagem)}}" alt="" class="img-pro pro-image-front">
                                    <img src="{{ asset('uploads/'.$img->imagem) }}" alt="" class="img-pro pro-image-back">

                                    <?php
                                    $dataFinal = strtotime(date('d-m-Y',(strtotime('+1 week', strtotime($prod->created_at)))));
                                    $dataAtual = date('d-m-Y');
                                    ?>
                                    @if(strtotime($dataAtual) > $dataFinal)
                                    @else
                                        <span class="product-new-top">Novo</span>
                                    @endif

                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="{{ route('product-details',$prod->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $prod->nome }}
                                            <?php
                                            $totLetras = strlen($prod->nome);
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
                                        <span class="item_price">{{ number_format($prod->preco,2,',','.') }} Kz</span>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        @if(\Auth::guard('web')->user())
                                            <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                <input type="submit" name="btnAdd" value="Add carrinho" class="button">

                                            </form>
                                        @else
                                                <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Add Carrinho" class="button">

                                        @endif
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top: -20px;">
                                        @if(\Auth::guard('web')->user())
                                            <form action="{{ route('comprar_dir') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                            </form>
                                        @else
                                                <input data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                                @endif
                            @endforeach
                    @endforeach
                    @endif
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <!-- /we-offer -->
        <div class="sale-w3ls2" style="margin-top: 50px; margin-bottom: 50px; ">
            <div class="container">
                <h6>Temos livros digitais para <span>si</span></h6>

                <a class="hvr-outline-out button2" href="{{ route('books') }}">Baixar Agora </a>
            </div>
        </div>
        <!-- //we-offer -->

        <div class="clearfix"></div>
        <div class="container">
            <h3 class="wthree_text_info">Livros <span>Recentes</span></h3>
            <div class="single-pro">
                <div class="row">
                    @if(isset($listaLivros))
                    @foreach($listaLivros as $livro)
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item" onclick="window.location='{{ route('book_details',$livro->id) }}'">
                                    <img src="{{ asset('uploads/capas_de_livros/'.$livro->imagem_capa)}}" alt="" class="pro-image-front">
                                    <img src="{{ asset('uploads/capas_de_livros/'.$livro->imagem_capa) }}" alt="" class="pro-image-back">

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
                                    <h4><a href="{{ route('book_details',$livro->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $livro->titulo }}
                                            <?php
                                            $totLetras = strlen($livro->titulo);
                                            if($totLetras <= 30){
                                            ?>
                                            <?php
                                            if($totLetras >= 20 && $totLetras < 30){
                                                echo "<span style='color:#fff;' class='hashtag'>##########</span>";
                                            }elseif($totLetras > 15 && $totLetras < 20){
                                                echo "<span style='color:#fff;' class='hashtag'>####################</span>";
                                            }elseif($totLetras > 10 && $totLetras <= 15){
                                                echo "<span style='color:#fff;' class='hashtag'>#############################</span>";
                                            }elseif($totLetras <= 10){
                                                echo "<span style='color:#fff;' class='hashtag'>#####################################</span>";
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
            </div>
                    <div style="text-align: center;"><a href="{{ route('books',0) }}" style="" class="btn btn-default">Ver Mais</a></div>
        </div>


        <div class="clearfix"></div>
        <div class="container">
            <h3 class="wthree_text_info"  style="margin: 20px;">Ofertas e <span>Promoções</span></h3>
            <div class="single-pro">
                <div class="row">
                    @if(isset($listaProdutos))
                        @foreach($listaProdutos as $prod)
                            @foreach($listaProdutosPromo as $prodPromo)
                                @if($prod->id == $prodPromo->product_id)
                                    @foreach($listaImagens as $img)
                                    @if($prod->id == $img->product_id)
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item" onclick="window.location='{{ route('product-details',$prod->id) }}'">
                                                <img src="{{ asset('uploads/'.$img->imagem)}}" alt="" class="img-pro pro-image-front">
                                                <img src="{{ asset('uploads/'.$img->imagem) }}" alt="" class="img-pro pro-image-back">


                                               <span class="product-new-top">{{ $prodPromo->porcentagem }}%</span>


                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="{{ route('product-details',$prod->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $prod->nome }}
                                                        <?php
                                                        $totLetras = strlen($prod->nome);
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
                                                    <?php
                                                        $novoPreco = ($prod->preco*$prodPromo->porcentagem)/100;
                                                        $novoPreco = $prod->preco - $novoPreco;
                                                    ?>
                                                    <span class="item_price">{{ number_format($novoPreco,2,',','.') }} Kz</span>
                                                    <del>{{ number_format($prod->preco,2,',','.') }} kz</del>
                                                </div>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    @if(\Auth::guard('web')->user())
                                                        <form action="{{ route('add_cart',$prod->id) }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                            <input type="submit" name="btnAdd" value="Comprar" class="button">
                                                        </form>
                                                    @else
                                                        <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar" class="button">
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    @endif
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <!--/grids-->
        <div class="agile_last_double_sectionw3ls mb-5" style="margin-top: 30px; margin-bottom: 20px;">
            <div class="col-md-6 multi-gd-img multi-gd-text ">
                <a href="#"><img class="img-pub" src="{{asset('images/moca1.jpg')}}" alt=" ">
                </a>


            </div>
            <div class="col-md-6 multi-gd-img multi-gd-text ">
                <a href="#"><img class="img-pub" src="{{asset('images/moca2.jpg')}}" alt=" "></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--/grids-->


@endsection
