<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container h-100">
<div class="row justify-content-center">
    @if (session('success'))
    @if (session('success')['success'])
    <div class="position-fixed to-front alert alert-success" role="alert">
        {{ session('success')['messages'] }}
    </div>
    @elseif (!session('success')['success'])
    <div class="position-fixed to-front alert alert-danger" role="alert">
        @foreach(session('success')['messages'] as $item)
            @foreach($item as $message)
            {{ $message }}<br>
            @endforeach
        @endforeach
    </div>
    @endif
    @endif
</div>
<div style="" class="loading row justify-content-center align-items-center">
    <div style="width:80px; height:80px;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></div>
</div>
</div>
    