<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="modal-update" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Editar {{ $page['modalTitle'] }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row justify-content-center">
            {{--  @if(session('success'))
                <h3>{{ session('success')['messages'] }}</h3>
            @endif  --}}

            {!! Form::open(['route' => $page['form'] . 's.update', 'method' => 'put', 'id' => 'form-update']) !!}
            @include('page.modal.' . $page['form'] . '.update')
        </div>
    </div>
    <div class="modal-footer">
        <label>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </label>
        @include('layout.formulario.submit', ['input' => 'Editar', 'attributes' => 
            ['class' => 'btn btn-primary', 'onclick' => 'loading()']])
    </div>
    {!! Form::close() !!}
    </div>
</div>
</div>