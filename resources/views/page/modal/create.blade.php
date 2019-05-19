<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-create" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><span data-feather={{ $page['icon'] }}></span> Cadastrar {{ $page['modalTitle'] }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row justify-content-center">
                @if(session('success'))
                    <h3>{{ session('success')['messages'] }}</h3>
                @endif
                
                <div class="col-12">
                {!! Form::open(['route' => $page['route'].'.store', 'method' => 'post']) !!}
                    @include('page.' . $page['page'] . '.fields.create' )
            </div>
        </div>
        <div class="modal-footer" style="padding-bottom: 0em !important">
            <label>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </label>
            @include('layout.formulario.submit', ['input' => 'Cadastrar', 'attributes' => 
                ['class' => 'btn btn-success', 'onclick' => 'loading()']])
        </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
</div>