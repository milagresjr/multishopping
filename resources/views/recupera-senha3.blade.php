@extends("layouts.app")

@section("conteudo")
    <div class="container" style="margin-top: 20px;">

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
@endsection