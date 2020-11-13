@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Список пользователей</h1>
@stop
@section('plugins.Datatables', true)
@section('content')
 <!-- Page Heading -->
<!--   <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Список пользователей</h1>
 
  </div> -->
  <!-- Main content -->
<!--   <div class="row"> -->
    <table class="table table-bordered table-striped" id="myTable">
      <thead>
      <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>E-mail</th>
        <th>Аватар</th>
        <th>Управление</th>
      </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td></td>
          <td>
           
          </td>
        </tr>
      @endforeach
      </tboby>
    </table>
<!--   </div> -->
  <!-- /.content -->
@stop

@section('css')
   <!--  <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script>
    $(document).ready( function () {
    	$('#myTable').DataTable();
	});
	</script>
@stop