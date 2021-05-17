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
            <form method="POST" action="{{ route('administrator.year.update', $year) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-3">
                    <label for="cgmsYear">Год ЦГМС</label>
                    <input type="text" class="form-control" id="cgmsYear" name='cgms' value="{{$year->cgms}}">
                    @error('cgms')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>

    <!--   </div> -->
    <!-- /.content -->
@endsection
