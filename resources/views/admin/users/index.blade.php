@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.layout.sidebar')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Пользователи сайта</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Отчеты</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
      <div class="content">
      <table class="table table-striped table-bordered" style="width:100%" id="myTable">
      <thead>
      <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>E-mail</th>
        <th>Роль</th>
        <th>Последне посещение</th>
      </tr>
      </thead>
      <tbody>
         @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
              @foreach($user->roles as $role)
                  <span class="badge badge-success"> {{$role->roleName}}</span>
              @endforeach
          </td>
           <td>{{$user->lastLogin_at}} </td>
        </tr>
      @endforeach
      </tbody>
    </table>
</div>
</div>
@endsection
