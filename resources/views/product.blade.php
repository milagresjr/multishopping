@extends("layouts.app")

@section("conteudo")

    <style>
        @media(min-width: 768px){
            .capa-livros{height:400px;}
            .btn-m{margin-bottom: -30px;}
        }
    </style>

<!-- /banner_bottom_agile_info -->
@if(isset($imagensCategoria))
@foreach($imagensCategoria as $catImg)
<div style="background: url({{ asset('uploads/categorias/'.$catImg->imagem) }})  center;" class="page-head_agile_info_w3l">
@endforeach
    @else
        <div style="background: url({{ asset('uploads/categorias/imagem_inicial.jpg') }})  center;" class="page-head_agile_info_w3l">

@endif

    <div class="container">
        @foreach($cateTitle as $catT)
        <h3><span>{{ $catT->nome }}</span></h3>

            <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a style="color:#c02720" href="{{ route("home") }}">Home</a><i>|</i></li>
                    <li>{{ $catT->nome }}</li>
                    @if(isset($SubCategoriasEspe))
                        @foreach($SubCategoriasEspe as $subCatEsp)
                         <li><i>|</i>{{ $subCatEsp->nome }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <!--//w3_short-->
        @endforeach

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="">
        <!-- mens -->
        <div class="col-md-3 products-left">
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
                            @if(isset($subCategoriaEspe))
                                <label for="entreg" style="font-weight: normal;">Sub-Categorias <span>&#9776;</span></label>
                                @else
                                <label for="entreg" style="font-weight: normal;">Categorias <span>&#9776;</span></label>
                            @endif
                        </h4>
                    </div>
                    <div id="collapseone" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-group">
                                @if(isset($subCategoriaEspe))
                                    @foreach($subCategoriaEspe as $subcat)


                                        <a href="{{ route('product-subcategory',['id'=>$subcat->categoria_id,'idSub'=>$subcat->id]) }}" class="list-group-item" style="font-weight: bold;">
                                            {{ $subcat->nome }}
                                        </a>

                                    @endforeach

                                @else

                                        @if(isset($listaCategoria) && count($listaCategoria) > 0)

                                            <a href="{{ route('product-category',0) }}" class="list-group-item">
                                                Todas
                                            </a>
                                            @foreach($listaCategoria as $cat)


                                                         <a href="{{ route('product-category',$cat->id) }}" class="list-group-item" style="font-weight: bold;">
                                                            {{ $cat->nome }}
                                                         </a>

                                            @endforeach
                                        @endif

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
                    @if(isset($listaCategoria) && count($listaCategoria) > 0)
                        <?php $cc = 0 ?>

                            <li>
                                <label for="item-todas" @if(!isset($CategoriasEspe)) style="font-weight: 600; font-size: 17px;" @endif onclick="window.location='{{ route('product-category',0) }}'">
                                    Todas <img src="{{ asset('images/arrow-down.png') }}" style="width: 15px; height: 15px;">
                                </label>

                        @foreach($listaCategoria as $cat)
                        <?php $cc= $cc + 1 ?>

                        @if(isset($CategoriasEspe))
                        @foreach($CategoriasEspe as $catEspe)
                        <input type="checkbox" @if($cat->nome == $catEspe->nome) checked="checked" @endif id="item-{{ $cc }}" />
                        <label for="item-{{ $cc }}" @if($cat->nome == $catEspe->nome) style="font-weight: 600; font-size: 17px;" @endif>
                            {{ $cat->nome }} <img src="{{ asset('images/arrow-down.png') }}" style="width: 15px; height: 15px;">
                        </label>

                        <ul>
                         <li><a href="{{ route('product-category',$cat->id) }}" style="" >Todas</a></li>
                         @endforeach
                            @else
                                <input type="checkbox" id="item-{{ $cc }}" />
                                <label for="item-{{ $cc }}">
                                    {{ $cat->nome }} <img src="{{ asset('images/arrow-down.png') }}" style="width: 15px; height: 15px;">
                                </label>

                                <ul>
                                    <li><a href="{{ route('product-category',$cat->id) }}" style="" >Todas</a></li>
                        @endif

                            @if(isset($listaSubCategoria))

                            @foreach($listaSubCategoria as $SubCat)
                                @if($cat->id == $SubCat->categoria_id)



                                            <li><a href="{{ route('product-subcategory',['id'=>$cat->id,'idSub'=>$SubCat->id]) }}" style="
                                                @if(isset($SubCategoriasEspe))
                                                     @foreach($SubCategoriasEspe as $subCateEspe)
                                                        @if($SubCat->nome == $subCateEspe->nome)
                                            color:#000; font-weight: bold;
                                                        @endif
                                                      @endforeach
                                                @endif
                                            " >{{ $SubCat->nome }}</a></li>


                                @endif
                            @endforeach
                            @endif
                        </ul>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <!-- <div class="community-poll">
                <h4>Community Poll</h4>
                <div class="swit form">
                    <form>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>More convenient for shipping and delivery</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Lower Price</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Track your item</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bigger Choice</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>More colors to choose</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Secured Payment</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Money back guaranteed</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Others</label> </div></div>
                        <input type="submit" value="SEND">
                    </form>
                </div>
            </div> -->
            <!--
            <div class="community-poll p-5">
                <h4>Filtrar por preço</h4>
                <div style="margin: 15px;">
                Min. <input type="range" id="min" min="0" max="1000000" step="10" style="width: 250px;" name="">
                Max. <input type="range" id="max" min="0" max="1000000" step="10" style="width: 250px;" name="">
                <input type="text" id="P-final" style="border: 0; color: #ffffff; font-weight: normal;" readonly disabled/>
                <input type="submit" value="Enviar" class="btn btn-sm btn-dark">
                </div>
            </div>
            -->
            <div class="clearfix"></div>
        </div>
        <div class="col-md-9 products-right">

            @if(isset($listaProduto) && count($listaProduto) > 0)
                @foreach($listaProduto as $prod)
                    @foreach($listaImagem as $img)
                        @if($prod->id == $img->product_id)
            <div class="col-md-3 product-men">
                <div class="men-pro-item simpleCart_shelfItem capa-livros" style="">
                    <div class="men-thumb-item" onclick="window.location = '{{ route('product-details',$prod->id) }}'">
                        <img src="{{ asset('uploads/'.$img->imagem) }}" alt="" class="img-pro pro-image-front">
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
                        <h4><a href="{{ route('product-details',$prod->id) }}" style="font-weight: normal; font-family: monospace, serif;">
                                {{ $prod->nome }}
                            </a>
                        </h4>

                        <div class="info-product-price">
                            <span class="item_price" style="font-weight: 600;">{{ number_format($prod->preco,2,',','.') }} Kz</span>
                        </div>
                        <div class="btn-m snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">

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
                        <div class="btn-m  snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top:12px;">

                            @if(\Auth::guard('web')->user())
                                <form action="{{ route('comprar_dir') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                    <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                                </form>
                                @else
                                <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

                        @endif
                        </div>

                    </div>
                </div>
            </div>
                        @endif
                @endforeach
                @endforeach
            @endif


                    @if(isset($listaSubCategoriaProd))
                        @foreach($listaSubCategoriaProd as $subCatProd)
                                @foreach($listaImagem as $img)
                                    @if($subCatProd->id == $img->product_id)
                                   <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item" onclick="window.location = '{{ route('product-details',$subCatProd) }}'">
                                                    <img src="{{ asset('uploads/'.$img->imagem) }}" alt="" class="img-pro pro-image-front" style="">
                                                    <img src="{{ asset('uploads/'.$img->imagem) }}" alt="" class="img-pro pro-image-back" style="">
                                                <?php
                                                $dataFinal = strtotime(date('d-m-Y',(strtotime('+1 week', strtotime($subCatProd->created_at)))));
                                                $dataAtual = date('d-m-Y');
                                                ?>
                                                @if(strtotime($dataAtual) > $dataFinal)
                                                @else
                                                    <span class="product-new-top">Novo</span>
                                                @endif
                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="{{ route('product-details',$subCatProd->id) }}" style="font-weight: normal; font-family: monospace, serif;">{{ $subCatProd->nome }}
                                                        <?php
                                                        $totLetras = strlen($subCatProd->nome);

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
                                                    <span class="item_price">{{ number_format($subCatProd->preco,2,',','.') }} Kz</span>

                                                </div>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    @if(\Auth::guard('web')->user())
                                                        <form action="{{ route('add_cart',$subCatProd->id) }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{ $subCatProd->id }}"/>
                                                            <input type="submit" name="btnAdd" value="Add Carrinho" class="button">

                                                        </form>
                                                    @else
                                                        <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Add carrinho" class="button">

                                                    @endif
                                                </div>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top:-18px;">

                                                    @if(\Auth::guard('web')->user())
                                                        <form action="{{ route('comprar_dir') }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{ $subCatProd->id }}"/>
                                                            <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">
                        
                                                        </form>
                                                        @else
                                                        <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">

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
        @if(isset($listaProduto))
        <div style="float: right;">{!! $listaProduto->links() !!}</div>
        @endif
        @if(isset($listaSubCategoriaProd))
            <div style="float: right;">{!! $listaSubCategoriaProd->links() !!}</div>
        @endif


        <div class="clearfix"></div>
        <div class="container" style="margin-top: 80px;">
            <h3 class="wthree_text_info">Últimos <span>Lançamentos</span></h3>
            <div class="single-pro">
                <div class="row">
                    @if(isset($ultimosLancamentos))
                        @foreach($ultimosLancamentos as $prod)
                            @foreach($listaImagem as $img)
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
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top:-18px;">

                                                    @if(\Auth::guard('web')->user())
                                                        <form action="{{ route('comprar_dir') }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                            <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">
                        
                                                        </form>
                                                        @else
                                                        <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar agora" class="button" style="background-color: #fc636b;">

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

        @if(isset($maisProcurados))
        <div class="clearfix"></div>
        <div class="container" style="margin-top: 80px;">
            <h3 class="wthree_text_info">Os <span>mais procurados</span></h3>
            <div class="single-pro">
                <div class="row">

                        @foreach($maisProcurados as $prod)
                            @foreach($listaImagem as $img)
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
                                                        <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Add carrinhho" class="button">

                                                    @endif
                                                </div>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="top:-18px;">

                                                    @if(\Auth::guard('web')->user())
                                                        <form action="{{ route('comprar_dir') }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{ $prod->id }}"/>
                                                            <input type="submit" name="btnAdd" value="Comprar Agora" class="button" style="background-color: #fc636b;">
                        
                                                        </form>
                                                        @else
                                                        <input  data-toggle="modal" data-target="#myModal" type="submit" name="btnAdd" value="Comprar agora" class="button" style="background-color: #fc636b;">

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
<!-- //mens -->

<!-- JS -->

<!-- js -->
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
<script type="text/javascript">
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
