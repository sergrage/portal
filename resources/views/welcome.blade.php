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
{{--                         <th scope="col">Ввод в эксплуатацию</th>--}}
                         <th scope="col">Электрическая мощность</th>
{{--                         <th scope="col">Тепловая мощность</th>--}}
                         <th scope="col">Выработка ЭЭ</th>
{{--                         <th scope="col">Выработка тепловой энергии</th>--}}
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <td>Петрозаводская ТЭЦ</td>
{{--                         <td>1976</td>--}}
                         <td>280 МВт</td>
{{--                         <td>689 Гкал/ч</td>--}}
                         <td>1 251,372 млн кВтч</td>
{{--                         <td>1 653,767 тыс. Гкал</td>--}}
                     </tr>
                     <tr>
                         <td>Каскад Выгских ГЭС</td>
{{--                         <td>1956</td>--}}
                         <td>160 МВт</td>
{{--                         <td>-</td>--}}
                         <td>917,259 млн кВтч</td>
{{--                         <td>-</td>--}}
                     </tr>
                     <tr>
                         <td>Каскад Кемских ГЭС</td>
{{--                         <td>1967</td>--}}
                         <td>330 МВт</td>
{{--                         <td>-</td>--}}
                         <td>1267,172 млн кВтч</td>
{{--                         <td>-</td>--}}
                     </tr>
                     <tr>
                         <td>Каскад Сунских ГЭС</td>
{{--                         <td>1964</td>--}}
                         <td>63,7 МВт</td>
{{--                         <td>-</td>--}}
                         <td>262,045 млн кВтч</td>
{{--                         <td>-</td>--}}
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
{{--         <example-component></example-component>--}}

     </div>

{{--        <div class="content">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <div class="d-flex justify-content-between">--}}
{{--                                    <h3 class="card-title">Online Store Visitors</h3>--}}
{{--                                    <a href="javascript:void(0);">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <p class="d-flex flex-column"><span class="text-bold text-lg">820</span><span>Visitors Over Time</span></p>--}}
{{--                                    <p class="ml-auto d-flex flex-column text-right">--}}
{{--                                        <span class="text-success"><i class="fas fa-arrow-up"></i> 12.5%</span>--}}
{{--                                        <span class="text-muted">Since last week</span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <!-- /.d-flex -->--}}
{{--                                <div class="position-relative mb-4">--}}
{{--                                    <canvas id="visitors-chart" height="200"></canvas>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex flex-row justify-content-end">--}}
{{--                                    <span class="mr-2"><i class="fas fa-square text-primary"></i> This Week</span>--}}
{{--                                    <span><i class="fas fa-square text-gray"></i> Last Week</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card -->--}}

{{--                        <div class="card">--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <h3 class="card-title">Products</h3>--}}
{{--                                <div class="card-tools">--}}
{{--                                    <a href="#" class="btn btn-tool btn-sm"><i class="fas fa-download"></i></a>--}}
{{--                                    <a href="#" class="btn btn-tool btn-sm"><i class="fas fa-bars"></i>/a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body table-responsive p-0">--}}
{{--                                <table class="table table-striped table-valign-middle">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Product</th>--}}
{{--                                        <th>Price</th>--}}
{{--                                        <th>Sales</th>--}}
{{--                                        <th>More</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">--}}
{{--                                            Some Product--}}
{{--                                        </td>--}}
{{--                                        <td>$13 USD</td>--}}
{{--                                        <td>--}}
{{--                                            <small class="text-success mr-1">--}}
{{--                                                <i class="fas fa-arrow-up"></i>--}}
{{--                                                12%--}}
{{--                                            </small>--}}
{{--                                            12,000 Sold--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="#" class="text-muted">--}}
{{--                                                <i class="fas fa-search"></i>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">--}}
{{--                                            Another Product--}}
{{--                                        </td>--}}
{{--                                        <td>$29 USD</td>--}}
{{--                                        <td>--}}
{{--                                            <small class="text-warning mr-1">--}}
{{--                                                <i class="fas fa-arrow-down"></i>--}}
{{--                                                0.5%--}}
{{--                                            </small>--}}
{{--                                            123,234 Sold--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="#" class="text-muted">--}}
{{--                                                <i class="fas fa-search"></i>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">--}}
{{--                                            Amazing Product--}}
{{--                                        </td>--}}
{{--                                        <td>$1,230 USD</td>--}}
{{--                                        <td>--}}
{{--                                            <small class="text-danger mr-1">--}}
{{--                                                <i class="fas fa-arrow-down"></i>--}}
{{--                                                3%--}}
{{--                                            </small>--}}
{{--                                            198 Sold--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="#" class="text-muted">--}}
{{--                                                <i class="fas fa-search"></i>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">--}}
{{--                                            Perfect Item--}}
{{--                                            <span class="badge bg-danger">NEW</span>--}}
{{--                                        </td>--}}
{{--                                        <td>$199 USD</td>--}}
{{--                                        <td>--}}
{{--                                            <small class="text-success mr-1">--}}
{{--                                                <i class="fas fa-arrow-up"></i>--}}
{{--                                                63%--}}
{{--                                            </small>--}}
{{--                                            87 Sold--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="#" class="text-muted">--}}
{{--                                                <i class="fas fa-search"></i>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card -->--}}
{{--                    </div>--}}
{{--                    <!-- /.col-md-6 -->--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <div class="d-flex justify-content-between">--}}
{{--                                    <h3 class="card-title">Sales</h3>--}}
{{--                                    <a href="javascript:void(0);">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <p class="d-flex flex-column">--}}
{{--                                        <span class="text-bold text-lg">$18,230.00</span>--}}
{{--                                        <span>Sales Over Time</span>--}}
{{--                                    </p>--}}
{{--                                    <p class="ml-auto d-flex flex-column text-right">--}}
{{--                                        <span class="text-success"><i class="fas fa-arrow-up"></i> 33.1%</span>--}}
{{--                                        <span class="text-muted">Since last month</span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <!-- /.d-flex -->--}}

{{--                                <div class="position-relative mb-4">--}}
{{--                                    <canvas id="sales-chart" height="200"></canvas>--}}
{{--                                </div>--}}

{{--                                <div class="d-flex flex-row justify-content-end">--}}
{{--                  <span class="mr-2">--}}
{{--                    <i class="fas fa-square text-primary"></i> This year--}}
{{--                  </span>--}}

{{--                                    <span>--}}
{{--                    <i class="fas fa-square text-gray"></i> Last year--}}
{{--                  </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card -->--}}

{{--                        <div class="card">--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <h3 class="card-title">Online Store Overview</h3>--}}
{{--                                <div class="card-tools">--}}
{{--                                    <a href="#" class="btn btn-sm btn-tool">--}}
{{--                                        <i class="fas fa-download"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="btn btn-sm btn-tool">--}}
{{--                                        <i class="fas fa-bars"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">--}}
{{--                                    <p class="text-success text-xl">--}}
{{--                                        <i class="ion ion-ios-refresh-empty"></i>--}}
{{--                                    </p>--}}
{{--                                    <p class="d-flex flex-column text-right">--}}
{{--                    <span class="font-weight-bold">--}}
{{--                      <i class="ion ion-android-arrow-up text-success"></i> 12%--}}
{{--                    </span>--}}
{{--                                        <span class="text-muted">CONVERSION RATE</span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <!-- /.d-flex -->--}}
{{--                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">--}}
{{--                                    <p class="text-warning text-xl">--}}
{{--                                        <i class="ion ion-ios-cart-outline"></i>--}}
{{--                                    </p>--}}
{{--                                    <p class="d-flex flex-column text-right">--}}
{{--                    <span class="font-weight-bold">--}}
{{--                      <i class="ion ion-android-arrow-up text-warning"></i> 0.8%--}}
{{--                    </span>--}}
{{--                                        <span class="text-muted">SALES RATE</span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <!-- /.d-flex -->--}}
{{--                                <div class="d-flex justify-content-between align-items-center mb-0">--}}
{{--                                    <p class="text-danger text-xl">--}}
{{--                                        <i class="ion ion-ios-people-outline"></i>--}}
{{--                                    </p>--}}
{{--                                    <p class="d-flex flex-column text-right">--}}
{{--                    <span class="font-weight-bold">--}}
{{--                      <i class="ion ion-android-arrow-down text-danger"></i> 1%--}}
{{--                    </span>--}}
{{--                                        <span class="text-muted">REGISTRATION RATE</span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <!-- /.d-flex -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.col-md-6 -->--}}
{{--                </div>--}}
{{--                <!-- /.row -->--}}
{{--            </div>--}}
{{--            <!-- /.container-fluid -->--}}
{{--        </div>--}}
        <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

@endsection
