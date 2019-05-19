@extends('layout.master')

@section('conteudo-view')

@include('page.modal.create')
@include('page.modal.update')

<div class="card">
    <div class="card-header">
    <div class="row justify-content-between align-items-center">
        <h4 class="col-auto pt-1 col-sm-auto">{{  $page['tableTitle'] }}</h4>
        <div class="col-5 col-sm-3 text-end">
            <button data-toggle="modal" data-target="#modal-create" 
                class="btn button btn-sm btn-outline-primary">
                <span class="sm-feather" data-feather="users"></span> Cadastrar
            </button>
        </div>
    </div>
    </div>
<div class="card-body">
    <div class="row table-responsive">
        <table class="table bg-white table-hover table-sm">
        <thead class="text-light">
            <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Perfil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr id="{{ $d->id }}" class="clickable-row" onclick="getUser(event)">
                <td>{{ $d->iteration }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->email }}</td>
                <td>{{ $d->profile }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>

@endsection