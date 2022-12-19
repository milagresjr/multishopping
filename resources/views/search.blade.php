
@extends("layouts.app")

@section("titulo")
    Multishopping
@endsection

@section("conteudo")

    @if(isset($productSearch) && count($productSearch) > 0)
            <div class="clearfix"></div>
            <div class="container" style="margin-top: 40px;">
                <!--<h3 class="wthree_text_info">Produtos <span>Recente</span></h3>-->
                <p style="font-size: 16pt;">{{ count($productSearch) }} Produtos encontrados para o trecho "<b>{{ $_GET['search'] }}</b>"</p>
                <div class="single-pro">
                    <div class="row">

                        @foreach($productSearch as $prod)
                            @foreach($imagensProduct as $img)
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
                                                    echo "<span style='color:#fff;' class='hashtag'>##########################</span>";
                                                }elseif($totLetras >24){
                                                    echo "<span style='color:#fff;' class='hashtag'>#################</span>";
                                                }
                                                }
                                                ?>
                                            </a>
                                        </h4>
                                        <div class="info-product-price">
                                            <span class="item_price">{{ number_format($prod->preco,2,'.',',') }} Kz</span>
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
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    @endif


    @if(count($listaLivros) > 0)

        <div class="clearfix"></div>
        <div class="container" style="margin-top: 40px;">
            <!--<h3 class="wthree_text_info">Produtos <span>Recente</span></h3>-->
            <p style="font-size: 16pt;">{{ count($listaLivros) }} Livros encontrados para o trecho "<b>{{ $_GET['search'] }}</b>"</p>
            <div class="single-pro">
                <div class="row">

                    @foreach($listaLivros as $livro)
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
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
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    @endif


    @if(count($listaLivros) == 0 && count($productSearch) == 0)
        <div class="container" style="margin-top: 40px;">
        <p style="font-size: 16pt;">Nenhum resultado encontrado para o texto <b>{{ $_GET['search'] }}</b> :(</p>
        </div>
    @endif

@endsection