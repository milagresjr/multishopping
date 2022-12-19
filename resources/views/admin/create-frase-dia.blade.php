@include('admin.includes.header-admin')

<!-- main content start-->
<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">
    <div class="main-page">
        <div class="row">
            <div class="col-md-12 offset-md-3">
                @if(session('danger'))
                    <div class="alert alert-danger">
                        <strong>{{ session('danger') }}</strong>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <form action="{{ action('PubsLivroAdminController@store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Frase do dia</label>
                    <input type="text" name="frase" class="form-control"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Autor</label>
                    <input type="text" name="autor" class="form-control"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Tema do dia</label>
                    <input type="text" name="tema" class="form-control"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Conteúdo</label>
                    <textarea name="conteudo" class="form-control"></textarea>
                </div>
            </div>
            <div class="container">
                <input type="submit" value="SALVAR" class="btn btn-primary"/>
            </div>
        </form>

    </div>
</div>


@include('admin.includes.footer-admin')