@extends('layouts.app')

@section('sidebar')
    @include('app.partials.sidebar')
@endsection

@section('content')
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="mt-3 text-dark font-weight-bold">Генерация электростанций филиала "Карельский"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a id="createPDFbutton" href="/power-pdf" class="btn mt-3 text-white" style="background:#ff0000;" data-toggle="modal" data-target="#exampleModal"> <i class="far fa-file-pdf" ></i>   Скачать PDF</a>
                        <a href="power-excel" class="btn text-white mt-3" style="background:#1D6F42;"> <i class="far fa-file-excel"></i>   Скачать Excel</a>
                        @include('app.partials.date')
                    </div><!-- /.col -->
                    @include('app.partials.powerTable')
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <div id="app">

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
    <script>
        var token = document.head.querySelector('meta[name="csrf-token"]');
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

        $( "#createPDFbutton" ).click(function() {
            axios.get('/power-pdf', {responseType: 'blob'}).then((response)=>{
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'remaining_fee.pdf'); //or any other extension
                document.body.appendChild(link);
                link.click();
                $('.modal').modal('hide');
            }).catch((error)=>{
                console.log(error.response.data)
            });
        });
    </script>
@endsection
