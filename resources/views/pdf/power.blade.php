<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
        }

        .orange {
            background-color: #ffcc99;
        }
    </style>
</head>
<body>
<div class="container">
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
            <td>ПБР</td>
            <td class="orange">ОИК</td>
        </tr>
        @foreach($result as $r)
            <tr class="center">
                <th scope="row"></th>
                <td >{{$r[0]->ges1}}</td>
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
</div>


</body>
</html>
