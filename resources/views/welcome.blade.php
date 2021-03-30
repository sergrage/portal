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
                        <h1 class="mt-3 text-dark font-weight-bold">Технологический сайт филиала "Карельский"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        @include('app.partials.date')
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->
     <div class="container">
         <div class="row">
             <div class="col-6">
                 <img src="app/img/map.svg" alt="" class="" style="height: 100%;  width: 100% \9">
             </div>
             <div class="col-6">
                 <h2 class="pb-5">Основные параметры филиала</h2>
                 <div class="info-box">
                     <span class="info-box-icon bg-info"><i class="fas fa-charging-station"></i></span>
                     <div class="info-box-content">
                         <span class="info-box-text">Установленная электрическая мощность</span>
                         <span class="info-box-number">833,7 МВт</span>
                     </div>
                     <!-- /.info-box-content -->
                 </div>
                 <div class="info-box">
                     <span class="info-box-icon bg-warning"><i class="fas fa-fire-alt text-white"></i></span>
                     <div class="info-box-content">
                         <span class="info-box-text">Установленная тепловая мощность</span>
                         <span class="info-box-number">733 Гкал/ч</span>
                     </div>
                     <!-- /.info-box-content -->
                 </div>
                 <div class="info-box">
                     <span class="info-box-icon bg-primary"><i class="fas fa-bolt"></i></span>
                     <div class="info-box-content">
                         <span class="info-box-text">Выработка электрической энергии</span>
                         <span class="info-box-number">3 697,8 млн КВт•ч</span>
                     </div>
                     <!-- /.info-box-content -->
                 </div>
                 <div class="info-box">
                     <span class="info-box-icon bg-danger"><i class="fas fa-temperature-high"></i></span>
                     <div class="info-box-content">
                         <span class="info-box-text">Отпуск тепловой энергии</span>
                         <span class="info-box-number">1 691,4 тыс. Гкал</span>
                     </div>
                     <!-- /.info-box-content -->
                 </div>
                 <table class="table table-sm">
                     <thead>
                     <tr>
                         <th scope="col">Станция</th>
                         <th scope="col">Электрическая мощность</th>
                         <th scope="col">Выработка ЭЭ</th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <td>Петрозаводская ТЭЦ</td>
                         <td>280 МВт</td>
                         <td>1 251,372 млн кВтч</td>
                     </tr>
                     <tr>
                         <td>Каскад Выгских ГЭС</td>
                         <td>160 МВт</td>
                         <td>917,259 млн кВтч</td>
                     </tr>
                     <tr>
                         <td>Каскад Кемских ГЭС</td>
                         <td>330 МВт</td>
                         <td>1267,172 млн кВтч</td>
                     </tr>
                     <tr>
                         <td>Каскад Сунских ГЭС</td>
                         <td>63,7 МВт</td>
                         <td>262,045 млн кВтч</td>

                     </tr>
                     </tbody>
                     <thead>
                     <tr>
                         <th scope="col"></th>
                         <th scope="col">Тепловая мощность</th>
                         <th scope="col">Выработка ТЭ</th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <td>Петрозаводская ТЭЦ</td>
                         <td>689 Гкал/ч</td>
                         <td>1 653,767 тыс. Гкал</td>
                     </tr>
                     </tbody>
                 </table>
             </div>
         </div>

     </div>
        <!-- Main content -->
     <div id="app">

     </div>

        <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

@endsection
