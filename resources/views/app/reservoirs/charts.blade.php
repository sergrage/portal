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
                        <div class="col-sm-6">
                            <h1 class="mt-3 text-dark font-weight-bold">Графики уровней водохранилищ</h1>
                        </div>
                        <div class="col-sm-12">
                            @include('app.partials.date')
                        </div>
                        <div class="col-12 pb-5">
                            <girvaslinecont-chart></girvaslinecont-chart>
                        </div>
                        <div class="col-12 pb-5">
                            <sandallinecont-chart></sandallinecont-chart>
                        </div>
                        <div class="col-12 pb-5">
                            <segozerolinecont-chart></segozerolinecont-chart>
                        </div>
                        <div class="col-12 pb-5">
                            <vigozerolinecont-chart></vigozerolinecont-chart>
                        </div>
                        <div class="col-12 pb-5">
                            <ushkozerolinecont-chart></ushkozerolinecont-chart>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

        </div>
    </div>

    <!-- /.content-wrapper -->

@endsection
@section('javascript')
<script src="{{ mix('/vue/js/params.js') }}"></script>
@endsection
