<style>
    table thead tr td {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
        font-size: 12;
        wrap-text: true;
    }

    table thead tr td.vertical-align-bottom {
        vertical-align: bottom;
    }

    table tbody tr td {
        text-align: center;
        vertical-align: middle;
        font-size: 10;
        wrap-text: true;
    }

    .bold {
        font-weight: bold;
        font-size: 12;
    }
</style>

<table>
    <thead>
    <tr>
        <td width="25" height="70" class="vertical-align-bottom"
            rowspan="2">{!! nl2br('Diesel Masuk<br/>(Litre)') !!}</td>
        <td width="20" class="vertical-align-bottom" rowspan="2">Tarikh</td>
        @foreach($headers as $header)
            <td width="20" class="vertical-align-bottom" rowspan="2">{!! nl2br($header) !!}</td>
        @endforeach
        <td class="vertical-align-bottom" colspan="2">Jumlah Harian</td>
        <td class="vertical-align-bottom" colspan="2">Balance</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        @foreach($headers as $header)
            <td></td>
        @endforeach
        <td colspan="2">Litre</td>
        <td colspan="2">Litre</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="bold">WAJIB</td>
        <td class="bold">1</td>
        <td colspan="{{ 2 + count($headers) }}" class="bold">BRING FORWARD</td>
        <td width="10">{{$totalBalance}}</td>
        <td width="10">Litre</td>
    </tr>
    @foreach($data as  $item)
        <tr>
            <td width="10">{{$item[0]}}</td>
            <td width="10">{{$item[1]}}</td>
            @for($i = 2 ; $i < count($headers ) + 2; $i++)
                <td>{{$item[$i]}}</td>
            @endfor
            <td width="10">{{$item[$i++]}}</td>
            <td width="10">{{$item[$i++]}}</td>
            <td width="10">{{$item[$i++]}}</td>
            <td width="10">{{$item[$i++]}}</td>
        </tr>
    @endforeach
    <tr>
        <td class="bold" colspan="2">Jumlah</td>
        @for($i = 0 ; $i < count($headers ) ; $i++)
            <td>{{$footers[$i]}}</td>
        @endfor
        <td width="10">{{$footers[$i++]}}</td>
        <td width="10">{{$footers[$i++]}}</td>
        <td width="10">{{$footers[$i++]}}</td>
        <td width="10">{{$footers[$i++]}}</td>
    </tr>
    </tbody>
</table>