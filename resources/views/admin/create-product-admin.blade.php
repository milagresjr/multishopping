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

<form action="{{ action('ProductAdminController@store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Nome</label>
            <input type="text" name="nome" class="form-control"/>
        </div>
        <div class="form-group col-md-6">
            <label for="">Preço</label>
            <input type="text" name="preco" class="form-control"/>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Quantidade</label>
            <input type="number" name="quantidade" class="form-control"/>
        </div>
        <div class="form-group col-md-4">
            <label for="">Categoria</label>
            <select name="categoria" id="categoria" class="form-control">
                @foreach($categorias as $cat)
            <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="">Sub Categoria</label>
            <select name="subcategoria" id="sub_categoria" class="form-control">
                @foreach($subcategorias as $subcat)
                    <option value="{{ $subcat->id }}">{{ $subcat->nome }}</option>
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
        <div class="form-group col-md-12">
            <label for="">Foto(s)</label>
            <input type="file" id="dropzone" name="imagem[]" class="form-control" multiple>
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

<script>
    $('#categoria').change(function(){
        
        //var acao = "preencher_select_subCate";
        var cate = $(this).val();
        /*
        $.ajax({
            url: '{{ route('categoria_change',19) }}',
            type: "GET",
            datatype: 'json',
            success: function(data){
                alert(data[0]);
               // $('#sub_categoria').empty();
                //$('#sub_categoria').html(data.nome);
            }
        });
        */
        $.get('/categoria-change/'+cate, function(subcategorias){
            $('#sub_categoria').empty();
            $.each(subcategorias, function(key, value){
                $('#sub_categoria').append('<option value='+value.id+'>'+value.nome+'</option>');
            });
        });

    });
</script>

@include('admin.includes.footer-admin')