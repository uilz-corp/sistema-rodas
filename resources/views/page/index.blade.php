@extends('layout.master')

@section('conteudo-view')

@include('page.modal.create')
@include('page.modal.update')

<div class="card">
    <div class="card-header">
    <div class="row justify-content-between align-items-center">
        <h4 class="col-auto pt-1 col-sm-auto"><span style="vertical-align: text-top" data-feather={{ $page['icon'] }}></span> {{  $page['tableTitle'] }}</h4>
        <div class="col-5 col-sm-3 text-end">
            <button data-toggle="modal" data-target="#modal-create" 
                class="btn button btn-sm btn-outline-primary">
                <span class="sm-feather" data-feather={{ $page['icon'] }}></span> Cadastrar
            </button>
        </div>
    </div>
    </div>
<div class="card-body">
    <div data-data={{ $page['route'] }} class="row ml-0 table-responsive">
        <table id="indexTable" class="table bg-white table-hover table-sm p-3">
            @include('page.' . $page['page'] . '.table')
        </table>
    </div>
</div>

    @section('javascript')
        <script>
        $.validate({
            modules : 'toggleDisabled',
            disabledFormFilter : '#modal-create form, #modal-update form',
            showErrorDialogs : false
        });
        </script>
    @endsection

@endsection