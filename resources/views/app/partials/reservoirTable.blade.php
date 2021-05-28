<table class="table table-striped table-sm table-bordered">
    <thead>
    <tr align="center">
        <th scope="col">Дата</th>
        <th scope="col">Январь</th>
        <th scope="col">Февраль</th>
        <th scope="col">Март</th>
        <th scope="col">Апрель</th>
        <th scope="col">Май</th>
        <th scope="col">Июнь</th>
        <th scope="col">Июль</th>
        <th scope="col">Август</th>
        <th scope="col">Сентябрь</th>
        <th scope="col">Октябрь</th>
        <th scope="col">Ноябрь</th>
        <th scope="col">Декабрь</th>
    </tr>
    </thead>
    <tbody class="text-center">
    @foreach($res as $r)
    <tr>
        <td>{{$loop->index +1  }}</td>
        @foreach($r as $t)
            @if($t == -100)
            <td></td>
            @else
            <td>{{ $t  }}</td>
            @endif
        @endforeach
    @endforeach
    </tr>
    </tbody>
</table>
