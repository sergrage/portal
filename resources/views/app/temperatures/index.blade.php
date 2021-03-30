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
                            <h1 class="mt-3 text-dark font-weight-bold">Температура на объектах филиала</h1>
                        </div>
                        <div class="col-sm-12">
                            <datepicker-component></datepicker-component>
                            @include('app.partials.date')
                        </div>
                        <temperature-component></temperature-component>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

        </div>
    </div>

    <!-- /.content-wrapper -->

@endsection
