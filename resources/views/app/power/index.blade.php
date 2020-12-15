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
                    <div class="col-sm-12">
                        <h1 class="mt-3 text-dark font-weight-bold">Генерация электростанций филиала "Карельский"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-12">
                        <a id="createPDFbutton" href="/power-pdf" class="btn mt-3 text-white" style="background:#ff0000;" data-toggle="modal" data-target="#exampleModal"> <i class="far fa-file-pdf" ></i>   Скачать PDF</a>
                        <a href="power-excel" class="btn text-white mt-3" style="background:#1D6F42;"> <i class="far fa-file-excel"></i>   Скачать Excel</a>
                        <form class="form-inline d-inline-block" style="padding-left: 1rem;margin-top: 0rem;line-height: 11px;vertical-align: bottom;">
                            <div class="form-group d-inline-block" style="margin-right: -3px;">
                                <input data-toggle="datepicker" class="form-control">
                            </div>
                            <div class="input-group-append d-inline-block">
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="fas fa-calendar-alt"></i>
                                </button>
                            </div>
                        </form>
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
            axios.get('{{route('createPowerPdf')}}', {responseType: 'blob'}).then((response)=>{
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'генерация.pdf'); //or any other extension
                document.body.appendChild(link);
                link.click();
                $('.modal').modal('hide');
            }).catch((error)=>{
                console.log(error.response.data)
            });
        });

        $.fn.datepicker.languages['ru-RU'] = {
            days: ['понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресеньк'],
            daysShort: [ 'Вс', 'Пн' ,'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            daysMin: [  'Вс', 'Пн' ,'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            monthsShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
            weekStart: 1,
            startView: 0,
            yearFirst: true,
            yearSuffix: 'г'
        };

        let datePicker = $('[data-toggle="datepicker"]');

        datePicker.datepicker({
            autoPick: true,
            autoHide: true,
            language: 'ru-RU',
            format: 'yyyy-mm-dd'
        });

        datePicker.on('pick.datepicker', function (e) {
            console.log(datePicker.datepicker('getDate', true))
        });

    </script>
@endsection
