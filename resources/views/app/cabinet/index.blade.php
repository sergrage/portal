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
                <div class="col-12">
                    @if(Auth::user()->isAdmin() or Auth::user()->isCgms())
                    <cgms-component user-name="{{ Auth::user()->name }}"></cgms-component>
                    <hr>
                    @endif

                    @if(Auth::user()->isAdmin() or Auth::user()->isFuel())
                    <fuel-component></fuel-component>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <!-- /.content-wrapper -->
</div>
@endsection

@section('javascript')
<script src="{{ mix('/vue/js/cabinet.js') }}"></script>
@endsection