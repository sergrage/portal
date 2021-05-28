@extends('layouts.app')

@section('sidebar')
    @include('app.partials.sidebar')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div id="app" class="w-100">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="mt-3 text-dark font-weight-bold">Генерация электростанций филиала "Карельский"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-12">
                        <safepdf-component></safepdf-component>
                        <safeexcel-component class="mt-3"></safeexcel-component>
                        <datepicker-component></datepicker-component>
                        @include('app.partials.date')
                    </div><!-- /.col -->

                        <power-component></power-component>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

    </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="app/img/Spinner-1s-200px.svg" alt="">
                    <h4>Подождите несколько секунд, файл генерируется</h4>
                    <p>Скачивание начнется автоматически</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script src="{{ mix('/vue/js/params.js') }}"></script>
@endsection
