@extends('layout.master')

@section('conteudo-view')

@include('user.modal.create')
@include('user.modal.update')

<div class="row justify-content-between align-items-center">
    <h2 class="col-auto col-sm-auto">Usuários</h2>
    <div class="col-5 col-sm-3 text-end">
        <button data-toggle="modal" data-target="#createUser" 
            class="btn button btn-sm btn-outline-primary">
            <span class="sm-feather" data-feather="users"></span> Cadastrar
        </button>
    </div>
</div>
</h2>
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
        @foreach($users as $user)
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->profile }}</td>
        </tr>
        @endforeach
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
        <tr class="clickable-row" onclick="$('#updateUser').modal()">
            <td>#</td>
            <td>Nome e Sobrenome</td>
            <td>email@email.com</td>
            <td>Administrador</td>
        </tr>
    </tbody>
    </table>
</div>

@endsection