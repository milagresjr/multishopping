@include('admin.includes.header-admin')

<!-- main content start-->
<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">
    <div class="main-page">

        <div class="row">
            <div class="col-md-12 offset-md-3">
                @if(session('danger'))
                    <div class="alert alert-danger">
                        <strong>{{ session('danger') }} :(</strong>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        @foreach($produto as $prod)
        <form action="{{ action('ProductAdminController@update',$prod->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Nome</label>
                    <input type="text" name="nome" value="{{ $prod->nome }}" class="form-control"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Preço</label>
                    <input type="number" value="{{ $prod->preco }}" name="preco" class="form-control"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Quantidade</label>
                    <input type="number" name="quantidade" value="{{ $prod->quantidade }}" class="form-control"/>
                </div>
                <div class="form-group col-md-4">
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
                <div class="form-group col-md-4">
                    <label for="">Sub Categoria</label>
                    <select name="subcategoria" id="sub_categoria" class="form-control">
                        @foreach($subcategorias as $subcat)
                            @if($subcategoriaEspe[0]->id == $subcat->id)
                                <option value="{{ $subcat->id }}">{{ $subcat->nome }}</option>
                            @endif
                        @endforeach
                            @foreach($subcategorias as $subcat)
                                <option value="{{ $subcat->id }}">{{ $subcat->nome }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Descrição</label>
                    <textarea name="descricao" class="form-control" value="{{ $prod->descricao }}">{{ $prod->descricao }}</textarea>
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