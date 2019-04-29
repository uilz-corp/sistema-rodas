@include('layout/head')

@include('layout.sidebar')

<div id="view-conteudo">
<div class="justify-content-center">
        <main role="main" class="col-md-10 col-lg-10 ml-sm-auto">
        <div class="loading spinner-border spinner-border-sm" role="status" aria-hidden="true"></div>
        @yield('conteudo-view')
        </main>
</div>
</div>

@include('layout/footer')
