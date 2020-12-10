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
                        <h1 class="mt-3 text-dark font-weight-bold">Температура на объектах филиала</h1>
                    </div>
                    <div class="col-sm-6">
                         @include('app.partials.date')
                    </div>
                    <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Время</th>
                                <th scope="col">ГЭС-1</th>
                                <th scope="col">ГЭС-2</th>
                                <th scope="col">ГЭС-3</th>
                                <th scope="col">ГЭС-5</th>
                                <th scope="col">ГЭС-6</th>
                                <th scope="col">ГЭС-7</th>
                                <th scope="col">ГЭС-9</th>
                                <th scope="col">ГЭС-10</th>
                                <th scope="col">ГЭС-14</th>
                                <th scope="col">ГЭС-16</th>
                                <th scope="col">ТЭЦ-13</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($tLen2)
                                @for ($i = 0; $i < $tLen2; $i++)
                                    <tr>
                                        <th scope="row">{{$i}}:00</th>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                @endfor
                            @endif
                            @foreach($temperatures as $t)
                            <tr>
                                <th scope="row">{{$t->createTimeHour()}}</th>
                                <td>{{$t->returnData('ges1')}}</td>
                                <td>{{$t->returnData('ges2')}}</td>
                                <td>{{$t->returnData('ges3')}}</td>
                                <td>{{$t->returnData('ges5')}}</td>
                                <td>{{$t->returnData('ges6')}}</td>
                                <td>{{$t->returnData('ges7')}}</td>
                                <td>{{$t->returnData('ges9')}}</td>
                                <td>{{$t->returnData('ges10')}}</td>
                                <td>{{$t->returnData('ges14')}}</td>
                                <td>{{$t->returnData('ges16')}}</td>
                                <td>{{$t->returnData('tec13')}}</td>
                            </tr>
                                 <p class="d-none">{{$loopLen =  $loop->count}}</p>
                            @endforeach
                            @if($tLen3 )
                                <p class="d-none">{{$loopAfter = 23 - $loopLen}}</p>
                                @for ($i = 0; $i < $tLen3 ; $i++)
                                    <tr>
                                        <th scope="row">{{$tLen + $tLen2  +$i}}:00</th>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                @endfor
                            @endif
                             </tbody>
                        </table>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    </div>
    <!-- /.content-wrapper -->

@endsection
