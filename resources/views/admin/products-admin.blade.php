
@include('admin.includes.header-admin')
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">

        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                Produtos
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ action('ProductAdminController@create') }}" class="btn btn-primary float-right w-25">Novo</a>
            </div>
        </div>
    <table id="tabela" class="table table-bordered">
        <theader>
            <tr>
                <th width="70">Image</th>
                <th width="250">Product</th>
                <th>Price</th>
                <th>Descrição</th>
                <th>Caracteristicas</th>
                <th>Em promoção</th>
                <th width="400">Ops</th>
            </tr>
        </theader>
        <tbody>
        @foreach($produtos as $prod)
            <?php
            $verificaPromo = false
            ?>
            @foreach($listaImagens as $img)
                @if($prod->id == $img->product_id)
            <tr>
                <td style="vertical-align: middle;"><img src="{{ asset("uploads/".$img->imagem) }}" alt="" style="width: 50px; height: 50px;"/></td>
                <td style="vertical-align: middle;">{{ $prod->nome }}</td>
                <td style="vertical-align: middle;">{{ number_format($prod->preco,2,',','.') }} Kz</td>
                <td style="vertical-align: middle;">{{ $prod->descricao }}</td>
                <td>
                  @foreach($listaCarac as $cara)
                      @foreach($listaProdutoCarac as $prodCara)
                    @if($prodCara->product_id == $prod->id && $prodCara->caracteristic_id == $cara->id)
                    <b>{{ $cara->nome }}:</b> {{ $prodCara->valor }}<br/>
                    @endif
                      @endforeach
                  @endforeach
                </td>
                <td style="vertical-align: middle;">
                    @foreach($listaProdEmPromo as $prodPromo)
                        @if($prod->id == $prodPromo->product_id)
                         <i class="fa fa-check" style="background-color: green; color:#fff;font-weight: 700; padding:5px; border-radius: 20px;"></i>  <span>Sim</span>
                        @endif
                    @endforeach
                </td>
                <td style="vertical-align: middle; text-align: left;">
                    <form action="{{ action('ProductAdminController@destroy',$prod->id) }}" method="post">
                        <a href="{{ action('ProductAdminController@edit',$prod->id) }}" class="btn btn-success">Alterar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluír</button>
                        <a href="{{ route('add_carac',$prod->id) }}" class="btn btn-default">Add Carac</a>
                        @foreach($listaProdEmPromo as $prodPromo)
                            @if($prod->id == $prodPromo->product_id)
                            <?php $verificaPromo = true; ?>
                            @endif
                        @endforeach
                        <?php
                        if($verificaPromo == false){
                        ?>
                            <a href="{{ route('add_promo',$prod->id) }}" class="btn btn-dark" style="margin-top:5px;">Add Promoção</a>
                        <?php
                        }
                        ?>
                        <a href="{{ route('add_image',$prod->id) }}" class="btn btn-primary">Add Imagem</a>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
         @endforeach
        </tbody>
    </table>

      </div>
</div>

<script>
    $(document).ready( function () {
        $('#tabela').dataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponivel",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
    } );
</script>
@include('admin.includes.footer-admin')