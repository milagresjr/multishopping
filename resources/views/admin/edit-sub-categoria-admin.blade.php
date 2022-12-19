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

        @foreach($subcategoria as $subcat)
        <form action="{{ action('SubCategoryAdminController@update',$subcat->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Nome</label>
                    <input type="text" name="nome" value="{{ $subcat->nome }}" class="form-control"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control">
                        @foreach($categorias as $cat)
                            @if($categoriaEspe[0]->id == $cat->id)
                                <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                            @endif
                        @endforeach
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="container">
                <input type="submit" value="SALVAR" class="btn btn-primary"/>
            </div>
        </form>
        @endforeach
    </div>
</div>


@include('admin.includes.footer-admin')