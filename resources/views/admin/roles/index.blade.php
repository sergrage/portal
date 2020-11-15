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
                    @if($role->roleName == 'admin')
                        Действия невозможны
                    @else
                    <a href="{{route('administrator.roles.edit', $role)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Изменить</a>
                    <form class="d-inline-block pl-3" method="POST" action="{{ route('administrator.roles.destroy', $role) }}">
                       @csrf
                       @method('DELETE')
                       <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Удалить</button>
                   </form>
                    @endif

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
