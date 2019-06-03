<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><span data-feather="trash-2"></span> Desativar {{ $page['modalTitle'] }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row justify-content-center">
                Tem certeza que deseja desativar este usuário?
            </div>
        </div>
        <div class="modal-footer" style="padding-bottom: 0em !important">
            <label>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </label>
            {!! Form::open(['route' => $page['route'] . '.destroy', 'method' => 'delete', 'id' => 'form-delete']) !!}
                <input hidden name="id" value="" />
                @include('layout.formulario.submit', ['input' => 'Desativar', 'attributes' => 
                    ['class' => 'btn btn-danger', 'onclick' => 'loading()']])
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>