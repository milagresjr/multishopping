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

        <form action="{{ action('LivroAdminController@store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Titulo</label>
                    <input type="text" name="titulo" class="form-control"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Autor</label>
                    <input type="text" name="autor" class="form-control"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control">
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Descrição</label>
                    <textarea name="descricao" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Imagem de capa</label>
                    <input type="file" id="dropzone" name="imagem_capa" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Livro em PDF</label>
                    <input type="file" id="dropzone" name="livro_pdf" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Livro em Epub</label>
                    <input type="file" id="dropzone2" name="livro_epub" class="form-control">
                </div>
            </div>
            <!-- <div class="row">

                <label for="dropzone">
                    <div class="col-md-12" style="background-color: #fff; border: dashed 2px #000; height: 150px; cursor: pointer;">
                    <p style="text-align: center; vertical-align: middle; margin-top: 40px;">
                    <i class="fa fa-upload" style="font-size: 28pt; margin: auto; text-align: center;"></i>
                        <br/>
                    Clica aqui para importar imagem(s) do produto
                    </p>
                </div>
                </label>

            </div> -->
            <div class="container">
                <input type="submit" value="SALVAR" class="btn btn-primary"/>
            </div>
        </form>

    </div>
</div>

@include('admin.includes.footer-admin')