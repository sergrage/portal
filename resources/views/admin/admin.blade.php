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
   <!--  <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<script>
	 $('.select2').select2({
  theme: "bootstrap",
  width: 'resolve' 
	});
</script>
@stop