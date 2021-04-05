@extends('layouts.app')

@section('sidebar')
@include('app.partials.sidebar')
@endsection

@section('content')
<div id="main">
    

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
            <div class="col-12 pb-5">
                <main-component></main-component>
            </div>
            <div class="col-12 pb-5">
                <h4>Водноэнергетические ресурсы</h3>
                <water-component></water-component>
            </div>
            <div class="col-12 pb-5">
                <h4>Топливо ПТЭЦ-13</h3>
                <fuel-component></fuel-component>
            </div>
            <div class="col-6">
                <img src="app/img/map.svg" alt="" class="" style="width: 90%">
            </div>
            <div class="col-6">
                <h4>Генерация электростанций Филиала "Карельский"</h3>
                <generation-component></generation-component>
            </div>
         </div>
     </div>
        <!-- Main content -->

     <div id="app2">

     </div>

        <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
</div>
@endsection

@section('javascript')
<script src="{{ mix('/vue/js/main.js') }}"></script>
@endsection