@extends('layouts.app')

@section('sidebar')
    @include('app.partials.sidebar')
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Личный кабинет пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Отчеты</li>
                        </ol>
                    </div><!-- /.col -->
                    <div class="col-12 pt-5">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Параметр 1</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Параметр 1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Параметр 2</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Параметр 2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Параметр 3</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Параметр 3">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Параметр 4</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Параметр 4">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Параметр 5</label>
                                    <input type="text" class="form-control" id="inputCity" placeholder="Параметр 5">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Параметр 6</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Выбрать...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Параметр 7</label>
                                    <input type="text" class="form-control" id="inputZip">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Параметр 8
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    </div>
    <!-- /.content-wrapper -->

@endsection
