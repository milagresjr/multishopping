@extends("layouts.app")

@section("titulo")
Detalhes do Livro
@endsection

@section("conteudo")

    <?php
    $plano = 0;
    if(\Auth::guard('web')->user()):
        $idCli = Auth::guard('web')->user()->id;
        $qtdDownloads = \App\Models\Download::where('client_id',$idCli)->get();

        $verificaPlano = \Illuminate\Support\Facades\DB::select(\DB::raw("SELECT * FROM plano_client WHERE client_id = $idCli AND statu = 'Ativo'"));
        if(count($verificaPlano) > 0){
            $plano = $verificaPlano[0]->plano;
        }
        //dd($plano);
    endif
    ?>

    <!--/single_page-->
    <!-- /banner_bottom_agile_info -->
    <div style="background: url({{ asset('uploads/categorias/livros.jpg') }})  center;" class="page-head_agile_info_w3l">
        <div class="container">
            <h3>Detalhes do <span>Livro </span></h3>
            <!--/w3_short-->
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">

                    <ul class="w3_short">
                        <li><a href="index.html">Home</a><i>|</i></li>
                        <li>Detalhes do livro</li>
                    </ul>
                </div>
            </div>
            <!--//w3_short-->
        </div>
    </div>

    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            @if(isset($listaLivros))
                @foreach($listaLivros as $livro)
                    <div class="col-md-4 single-right-left ">
                        <div class="grid images_3_of_2">
                            <div class="flexslider">

                                <ul class="slides">
                                        <li data-thumb="{{ asset('uploads/capas_de_livros/'.$livro->imagem_capa) }}">
                                            <div class="thumb-image">
                                            <img src="{{ asset('uploads/capas_de_livros/'.$livro->imagem_capa) }}" data-imagezoom="true" class="img-responsive">
                                            </div>
                                        </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 single-right-left simpleCart_shelfItem">
                        <h3>{{ $livro->titulo }}</h3>
                        <p><span class="item_price">{{ $livro->autor }}</span></p>
                        <div class="description">
                            
                        </div>
                        <div class="occasion-cart">
                            <div class="">
                            </div>

                            @if(\Auth::guard('web')->user())
                                <form action="{{ route('download',['idLivro'=>$livro->id,'plano'=>$plano]) }}" id="form_download" method="get">
                                   @if(count($qtdDownloads) > 1)

                                        @if(count($verificaPlano) > 0)
                                            <!-- CLIENTE TEM PLANO E PODE BAIXAR O LIVRO -->
                                            @if($livro->file_pdf == NULL)
                                                <a class="botao" style="background-color: #c02720;" href="{{ asset('uploads/livros_em_epub/'.$livro->file_epub) }}" download="{{ $livro->file_epub }}" onclick="ativarForm()">
                                                    Baixar Epub
                                                </a>
                                            @endif
                                            @if($livro->file_epub == NULL)
                                                <a class="botao" style="background-color: #c02720;" href="{{ asset('uploads/livros_em_pdf/'.$livro->file_pdf) }}" download="{{ $livro->file_pdf }}" onclick="ativarForm()">
                                                    Baixar PDF
                                                </a>
                                            @endif
                                            @if($livro->file_epub != NULL && $livro->file_pdf != NULL)
                                                <a class="botao" style="background-color: #c02720; margin-bottom: 7px;" href="{{ asset('uploads/livros_em_pdf/'.$livro->file_pdf) }}" download="{{ $livro->file_pdf }}" onclick="ativarForm()">
                                                    Baixar PDF
                                                </a>
                                                <br/>
                                                <span style="margin-top: 8px; margin-bottom: 8px; color:transparent; font-weight: 500;">Ou</span>
                                                <br>
                                                <a class="botao" style="background-color: #c02720;" href="{{ asset('uploads/livros_em_epub/'.$livro->file_epub) }}" download="{{ $livro->file_epub }}" onclick="ativarForm()">
                                                    Baixar Epub
                                                </a>
                                                @endif
                                        @else
                                            <a class="botao" style="background-color: #c02720;" href="{{ route('our_community') }}">
                                                Baixar PDF
                                            </a>
                                        @endif

                                   @else
                                </form>
                                        <form action="{{ route('download_gratis',$livro->id) }}" id="form_download_gratis" method="get">
                                        <!-- CLIENTE AINDA PODE BAIXAR LIVROS GRATIS -->
                                        @if($livro->file_pdf == NULL)
                                            <a class="botao" style="background-color: #c02720;" href="{{ asset('uploads/livros_em_epub/'.$livro->file_epub) }}" download="{{ $livro->file_epub }}" onclick="ativarFormGratis()">
                                                Baixar Epub
                                            </a>
                                        @endif
                                        @if($livro->file_epub == NULL)
                                            <a class="botao" style="background-color: #c02720;" href="{{ asset('uploads/livros_em_pdf/'.$livro->file_pdf) }}" download="{{ $livro->file_pdf }}" onclick="ativarFormGratis()">
                                                Baixar PDF
                                            </a>
                                        @endif
                                        @if($livro->file_epub != NULL && $livro->file_pdf != NULL)
                                            <a class="botao" style="background-color: #c02720; margin-bottom: 7px;" href="{{ asset('uploads/livros_em_pdf/'.$livro->file_pdf) }}" download="{{ $livro->file_pdf }}" onclick="ativarFormGratis()">
                                                Baixar PDF
                                            </a>
                                            <br/>
                                            <span style="margin-top: 8px; margin-bottom: 8px; color:transparent; font-weight: 500;">Ou</span>
                                            <br>
                                            <a class="botao" style="background-color: #c02720;" href="{{ asset('uploads/livros_em_epub/'.$livro->file_epub) }}" download="{{ $livro->file_epub }}" onclick="ativarFormGratis()">
                                                Baixar Epub
                                            </a>
                                        @endif

                                   @endif
                                </form>
                            @else

                                @if($livro->file_pdf == NULL)
                                    <a href="#" class="botao" style="background-color: #c02720;" data-toggle="modal" data-target="#myModal">
                                        Baixar Epub</a>
                                @endif
                                @if($livro->file_epub == NULL)
                                        <a href="#" class="botao" style="background-color: #c02720;" data-toggle="modal" data-target="#myModal">
                                            Baixar PDF</a>
                                @endif
                                @if($livro->file_epub != NULL && $livro->file_pdf != NULL)
                                        <a href="#" class="botao" style="background-color: #c02720;" data-toggle="modal" data-target="#myModal">
                                            Baixar PDF</a>
                                    <br/>
                                    <span style="margin-top: 8px; margin-bottom: 8px; color:transparent; font-weight: 500;">Ou</span>
                                    <br>
                                        <a href="#" class="botao" style="background-color: #c02720;" data-toggle="modal" data-target="#myModal">
                                            Baixar Epub</a>
                                @endif

                            @endif

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
                            </ul>
                            <div class="resp-tabs-container">
                                <!--/tab_one-->
                                <div class="tab1">

                                    <div class="single_page_agile_its_w3ls">
                                        <h6>{{ $livro->titulo }}</h6>
                                        <p>{{ $livro->descricao }}.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //new_arrivals -->
                    <!--/slider_owl-->

                    <div class="w3_agile_latest_arrivals">
                        <h3 class="wthree_text_info">Livros <span>Relacionados</span></h3>
                        @if(isset($livrosRelacionados))
                            @foreach($livrosRelacionados as $livro)
                                 <div class="col-md-3 product-men single">
                                            <div class="men-pro-item simpleCart_shelfItem">
                                                <div class="men-thumb-item">
                                                    <img src="{{ asset('uploads/capas_de_livros/'.$livro->imagem_capa) }}" alt="" class="pro-image-front">
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
                                                                echo "<span style='color:#fff;' class='hashtag'>##############</span>";
                                                            }elseif($totLetras > 15 && $totLetras < 20){
                                                                echo "<span style='color:#fff;' class='hashtag'>###################</span>";
                                                            }elseif($totLetras > 10 && $totLetras < 15){
                                                                echo "<span style='color:#fff;' class='hashtag'>########################</span>";
                                                            }else{
                                                                echo "<span style='color:#fff;' class='hashtag'>#############################</span>";
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
                        <div class="clearfix"> </div>
                        <!--//slider_owl-->
                    </div>
        </div>
    </div>
    <!--//single_page-->

    <script>
        function ativarForm()
        {
            $('#form_download').submit();
        }
        function ativarFormGratis()
        {
            $('#form_download_gratis').submit();
        }
    </script>

@endsection