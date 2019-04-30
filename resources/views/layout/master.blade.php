@include('layout/head')

@include('layout.sidebar')

<div id="view-conteudo">
<div class="justify-content-center">
        <main role="main" class="col-md-10 col-lg-10 ml-sm-auto">
        <div class="container">
        <div class="row h-100 justify-content-center">
                <div class="loading align-self-center spinner-border spinner-border-sm" role="status" aria-hidden="true"></div>
        </div>
        </div>
        @yield('conteudo-view')
        </main>
</div>
</div>

@include('layout/footer')
