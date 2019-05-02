@include('layout/head')

@include('layout.sidebar')


<div id="view-conteudo">
        <div class="justify-content-center">
        {{--  <div id="welcome" class="alert alert-success alert-dismissible fade show text-center to-front" role="alert">
                Bem vindo, fulano.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>  --}}
        <main role="main" class="col-md-10 col-lg-10 ml-sm-auto">
        @yield('conteudo-view')
        </main>
        </div>
</div>

@include('layout/footer')
