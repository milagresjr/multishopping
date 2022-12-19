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


            <form action="{{ action('ProductAdminController@addImageProductStore') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $idProduto }}" name="product_id"/>
               <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Selecione Foto(s)</label>
                        <input type="file" name="imagem[]" class="form-control" multiple>
                    </div>
                </div>
                <div class="container">
                    <input type="submit" value="Add Imagem" class="btn btn-primary"/>
                </div>
            </form>

        <div class="container" style="margin-top: 20px;">
        <div class="row">

        @foreach($listaImagens as $img)
                <form action="{{ action('ProductAdminController@deleteImageProduct',['idImg'=>$img->id,'idProduto'=>$idProduto]) }}" method="post">
                    @csrf
                    @method('DELETE')
            <div class="col-md-4">

                <img src="{{ asset('uploads/'.$img->imagem) }}" alt="" style="display: block; width: 50%; height: 50%;"/>
                <button type="submit" class="btn btn-danger" style="clear: both; margin: 8px auto;">Eliminar</button>
            </div>
                 </form>
        @endforeach
        </div>
        </div>

    </div>
</div>

@include('admin.includes.footer-admin')