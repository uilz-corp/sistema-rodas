<input hidden name="id" value="" />
<div class="row justify-content-center">
    @include('layout.formulario.input', ['class' => 'col-12','input' => 'descricao', 'attributes' => 
    ['class' => 'form-control', 'placeholder' => 'Descrição']])
</div>
<hr>
<div class="row justify-content-center mb-2">
    <h6 class="ac-color">Subtemas vinculados</h6>
</div>
<div class="row col-12 justify-content-center mb-4">
    <table id="subtemasTable" class="table bg-white table-hover table-sm p-3 w-100">
        <thead class="text-light">
            <tr>
            <th>#</th>
            <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>