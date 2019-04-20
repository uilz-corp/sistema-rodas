@include('layout/head')

@include('layout.sidebar')

<div id="view-conteudo">
<div class="justify-content-center">
        <main role="main" class="col-md-10 col-lg-10 ml-sm-auto">
        @yield('conteudo-view')
        </main>
</div>
</div>

@include('layout/footer')
