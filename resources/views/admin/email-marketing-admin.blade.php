@include('admin.includes.header-admin')
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">

        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if(session('danger'))
                    <div class="alert alert-danger">
                        <strong>{{ session('danger') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                Email Marketing
            </div>

            <div>

                <form action="#">

                </form>

            </div>

        </div>

    </div>
</div>

<script>
    $(document).ready( function () {
        $('#tabela').dataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponivel",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
    } );
</script>
@include('admin.includes.footer-admin')