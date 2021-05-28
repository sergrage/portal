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
                        <h1 class="m-0 text-dark">Парсинг данных уровней воджохранилищ</h1>
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
            <form action="{{ route('administrator.parse.reservoir') }}" method="POST">
             @csrf
               <div class="form-group">
                  <label for="inputState">Водохранилища</label>
                  <select id="inputState" class="form-control" name="reservoir">
                    <option selected disabled>Выбирите водохранилище</option>
                    <option value="ReservoirGirvas">Гирвас</option>
                    <option value="ReservoirSandal">Сандал</option>
                    <option value="ReservoirSegozero">Сегозеро</option>
                    <option value="ReservoirVigozero">Выгозерско-Ондское</option>
                    <option value="ReservoirUshkozero">Юшкозерское</option>
                  </select>
                </div>
              <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" name="date" class="form-control" id="date" placeholder="Введите дату в формате 01-12-2020">
                @if ($errors->has('date'))
                    <span class="text-danger form-text"><strong>{{ $errors->first('date') }}</strong></span>
                @endif
              </div>
              <div class="form-group">
                <label for="data">Введите данные</label>
                <textarea class="form-control" name="data" id="data" rows="20"></textarea>
                @if ($errors->has('data'))
                    <span class="text-danger form-text"><strong>{{ $errors->first('data') }}</strong></span>
                @endif
              </div>
              <button class="btn btn-success" type="submit">Отправить данные</button>
            </form>
        </div>
    </div>
    <!--   </div> -->
    <!-- /.content -->
@endsection
