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
                        <a href="/power-pdf" class="btn btn-primary mt-3">Скачать в формате PDF</a>
                        @include('app.partials.date')
                    </div><!-- /.col -->
                    <table class="table table-striped table-sm table-bordered">
                        <thead>
                        <tr align="center">
                            <th scope="col">Время</th>
                            <th scope="col" colspan="2">ГЭС-1</th>
                            <th scope="col" colspan="2">ГЭС-2</th>
                            <th scope="col" colspan="2">ГЭС-3</th>
                            <th scope="col" colspan="2">ГЭС-5</th>
                            <th scope="col" colspan="2">ГЭС-6</th>
                            <th scope="col" colspan="2">ГЭС-7</th>
                            <th scope="col" colspan="2">ГЭС-9</th>
                            <th scope="col" colspan="2">ГЭС-10</th>
                            <th scope="col" colspan="2">ГЭС-14</th>
                            <th scope="col" colspan="2">ГЭС-16</th>
                            <th scope="col" colspan="2">ТЭЦ-13</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr>
                            <td></td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                            <td>ПБР</td>
                            <td class="orange" >ОИК</td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                            <td>ПБР</td>
                            <td class="orange">ОИК</td>
                        </tr>
                        @foreach($result as $r)
                            <tr class="center">
                                <th scope="row"></th>
                                <td>{{$r[0]->ges1}}</td>
                                <td class="orange">{{$r[1]->ges1}}</td>
                                <td>{{$r[0]->ges2}}</td>
                                <td class="orange">{{$r[1]->ges2}}</td>
                                <td>{{$r[0]->ges3}}</td>
                                <td class="orange">{{$r[1]->ges3}}</td>
                                <td>{{$r[0]->ges5}}</td>
                                <td class="orange">{{$r[1]->ges5}}</td>
                                <td>{{$r[0]->ges6}}</td>
                                <td class="orange">{{$r[1]->ges6}}</td>
                                <td>{{$r[0]->ges7}}</td>
                                <td class="orange">{{$r[1]->ges7}}</td>
                                <td>{{$r[0]->ges9}}</td>
                                <td class="orange">{{$r[1]->ges9}}</td>
                                <td>{{$r[0]->ges10}}</td>
                                <td class="orange">{{$r[1]->ges10}}</td>
                                <td>{{$r[0]->ges14}}</td>
                                <td class="orange">{{$r[1]->ges14}}</td>
                                <td>{{$r[0]->ges16}}</td>
                                <td class="orange">{{$r[1]->ges16}}</td>
                                <td>{{$r[1]->tec13}}</td>
                                <td class="orange">{{$r[1]->tec13}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <div id="app">

        </div>

    </div>
    <!-- /.content-wrapper -->


@endsection
