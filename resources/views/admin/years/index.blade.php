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
                        <a href="{{route('administrator.year.create')}}" class="btn btn-success mb-3 mt-3"><i class="fas fa-edit"></i> Добавить</a>
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
            <th>ЦГМС</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($years as $year)
            <tr>
                <td>{{$year->id}}</td>
                <td>{{$year->cgms}}</td>
                <td>
                    <a href="{{route('administrator.year.edit', $year)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Изменить</a>
                    <form class="form-inline" method="POST" action="{{ route('administrator.year.destroy', $year) }}" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Удалить</button>
                    </form>
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
