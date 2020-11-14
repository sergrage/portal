@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Панель администратора</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
@include('admin.partials.userRegister')
@include('admin.partials.addRole')
	</div>
</div>
@stop



@section('css')
    <link href="{{ mix('admin/css/admin.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ mix('admin/js/admin.js') }}"></script>
    <script>

        $('.select2').select2({
            placeholder: 'Select an option',
            theme: "bootstrap",
            width: 'resolve'
        });

    </script>

@stop
