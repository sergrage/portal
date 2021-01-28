<table class="table table-striped table-sm table-bordered">
    <thead>
    <tr align="center">
        <th scope="col">Время</th>
        <th scope="col" colspan="3">ГЭС-1</th>
        <th scope="col" colspan="3">ГЭС-2</th>
        <th scope="col" colspan="3">ГЭС-3</th>
        <th scope="col" colspan="3">ГЭС-5</th>
        <th scope="col" colspan="3">ГЭС-6</th>
        <th scope="col" colspan="3">ГЭС-7</th>
        <th scope="col" colspan="3">ГЭС-9</th>
        <th scope="col" colspan="3">ГЭС-10</th>
        <th scope="col" colspan="3">ГЭС-14</th>
        <th scope="col" colspan="3">ГЭС-16</th>
        <th scope="col" colspan="3">ТЭЦ-13</th>
        <th scope="col" >МГЭС</th>
    </tr>
    </thead>
    <tbody class="text-center">
    <tr>
        <td></td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange" >ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td class="blue">ПБР</td>
        <td class="orange">ОИК</td>
        <td>КУ</td>
        <td>КУ</td>
    </tr>
    @foreach($result as $r)
        <tr class="center">
            <th scope="row">{{$loop->index}}:00</th>
            <td class="blue">{{$r[0]->ges1}}</td>
            <td class="orange">{{$r[1]->returnData('ges1')}}</td>
            <td>{{$r[2]->returnData('ges1')}}</td>
            <td class="blue">{{$r[0]->ges2}}</td>
            <td class="orange">{{$r[1]->returnData('ges2')}}</td>
            <td>{{$r[2]->returnData('ges2')}}</td>
            <td class="blue">{{$r[0]->ges3}}</td>
            <td class="orange">{{$r[1]->returnData('ges3')}}</td>
            <td>{{$r[2]->returnData('ges3')}}</td>
            <td class="blue">{{$r[0]->ges5}}</td>
            <td class="orange">{{$r[1]->returnData('ges5')}}</td>
            <td>{{$r[2]->returnData('ges5')}}</td>
            <td class="blue">{{$r[0]->ges6}}</td>
            <td class="orange">{{$r[1]->returnData('ges6')}}</td>
            <td>{{$r[2]->returnData('ges6')}}</td>
            <td class="blue">{{$r[0]->ges7}}</td>
            <td class="orange">{{$r[1]->returnData('ges7')}}</td>
            <td>{{$r[2]->returnData('ges7')}}</td>
            <td class="blue">{{$r[0]->ges9}}</td>
            <td class="orange">{{$r[1]->returnData('ges9')}}</td>
            <td>{{$r[2]->returnData('ges9')}}</td>
            <td class="blue">{{$r[0]->ges10}}</td>
            <td class="orange">{{$r[1]->returnData('ges10')}}</td>
            <td>{{$r[2]->returnData('ges10')}}</td>
            <td class="blue">{{$r[0]->ges14}}</td>
            <td class="orange">{{$r[1]->returnData('ges14')}}</td>
            <td>{{$r[2]->returnData('ges14')}}</td>
            <td class="blue">{{$r[0]->ges16}}</td>
            <td class="orange">{{$r[1]->returnData('ges16')}}</td>
            <td>{{$r[2]->returnData('ges16')}}</td>
            <td class="blue">{{$r[0]->tec13}}</td>
            <td class="orange">{{$r[1]->returnData('tec13')}}</td>
            <td>{{$r[2]->returnData('tec13')}}</td>
            <td>{{$r[2]->returnData('mges')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
