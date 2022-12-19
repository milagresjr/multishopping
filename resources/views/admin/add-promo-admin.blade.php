@include('admin.includes.header-admin')

<!-- main content start-->
<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">
    <div class="main-page">
        <div class="row">
            <div class="col-md-12 offset-md-3">
                @if($message = Session::get('danger'))
                    <div class="alert alert-danger">
                        <strong>Erro, produto não registado! :(</strong>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <form action="{{ route('add_promo_store') }}" method="post" >
            @csrf
            <input type="hidden" name="product_id" value="{{ $idProduto }}"/>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Produto</label>
                    @foreach($listaProduto as $prod)
                            <input type="text" name="porcent" value="{{ $prod->nome }}" class="form-control" readonly/>
                    @endforeach
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Porcentagem(%) em promoção</label>
                    <input type="number" name="porcent" class="form-control"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Vai ate</label>
                    <input type="date" name="data" class="form-control"/>
                </div>
            </div>
            <div class="container">
                <input type="submit" value="ADD PROMOÇÃO" class="btn btn-primary"/>
            </div>
        </form>

    </div>
</div>


@include('admin.includes.footer-admin')