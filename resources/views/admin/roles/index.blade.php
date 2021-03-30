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
           <table class="table table-bordered table-striped" id="myTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Описание</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->roleName}}</td>
                <td>{{$role->description}}</td>
                <td>
                    <a href="{{route('administrator.roles.edit', $role)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Изменить</a>
                </td>
            </tr>
            @endforeach
            </tboby>
    </table>
        </div>
    </div>

    <!--   </div> -->
    <!-- /.content -->
@endsection
