@include('admin.includes.header-admin')

<!-- main content start-->
<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">
    <div class="main-page">
        <div class="row">
            <div class="col-md-12 offset-md-3">
                @if($message = Session::get('danger'))
                    <div class="alert alert-danger">
                        <strong>Erro, Categoria não registado! :(</strong>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                Categoria {{ $categoria[0]->nome }}
            </div>
            <div class="col-md-6 text-right">
            </div>
        </div>

        <form action="{{ route('add_image_cat_store',$categoria[0]->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Selecione a imagem</label>
                    <input type="file" name="imagem" required="" class="form-control"/>
                </div>
            </div>
            <div class="container">
                <input type="submit" value="SALVAR" class="btn btn-primary"/>
            </div>
        </form>
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12" >
                @if(isset($imagemCategoria))
                <img src="{{ asset('uploads/categorias/'.$imagemCategoria[0]->imagem) }}" style="height: 10%; width: 100%;" alt=""/>
                @endif
            </div>
        </div>
    </div>
</div>


@include('admin.includes.footer-admin')