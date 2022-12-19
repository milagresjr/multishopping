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

        @foreach($livro as $liv)
            <form action="{{ action('LivroAdminController@update',$liv->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Titulo</label>
                        <input type="text" name="titulo" value="{{ $liv->titulo }}" class="form-control"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Autor</label>
                        <input type="text" value="{{ $liv->autor }}" name="autor" class="form-control"/>
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
                <div class="form-row">

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Descrição</label>
                         <textarea class="form-control" name="descricao">
                            {{ $liv->descricao }}
                        </textarea>
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