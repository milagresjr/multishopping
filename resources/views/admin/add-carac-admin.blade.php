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

        <form action="{{ route('add_carac_store') }}" method="post" >
            @csrf
            <input type="hidden" name="product_id" value="{{ $idProduto }}"/>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Caracteristica</label>
                    <select name="caracteristica" id="caracteristica" class="form-control">
                        @foreach($listaCarac as $cara)
                            <option value="{{ $cara->id }}">{{ $cara->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Valor</label>
                    <input type="text" name="valor" class="form-control"/>
                </div>
            </div>
            <div class="container">
                <input type="submit" value="SALVAR" class="btn btn-primary"/>
            </div>
        </form>

    </div>
</div>


@include('admin.includes.footer-admin')