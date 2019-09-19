<style>
    table thead tr td {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
        font-size: 12;
        wrap-text: true;
    }

    table tbody tr td {
        text-align: center;
        vertical-align: middle;
        font-size: 10;
        font-weight: bold;
        wrap-text: true;
    }
</style>

<table>
    <thead>
        <tr>
            <td colspan="2">General</td>
            <td colspan="3">Expiry Date</td>
            <td colspan="3">Variance Date</td>
        </tr>
    <tr>
        <td width="25" height="30">COMPANY</td>
        <td width="15">REG NO.</td>
        <td width="20">ROAD TAX</td>
        <td width="20">INSURANCE</td>
        <td width="20">PUSPAKOM</td>
        <td width="20">ROAD TAX</td>
        <td width="20">INSURANCE</td>
        <td width="20">PUSPAKOM</td>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td height="30">{{$item[0]}}</td>
            <td height="30">{{$item[1]}}</td>
            <td height="30">{{$item[2]}}</td>
            <td height="30">{{$item[3]}}</td>
            <td height="30">{{$item[4]}}</td>
            <td height="30">{{$item[5]}}</td>
            <td height="30">{{$item[6]}}</td>
            <td height="30">{{$item[7]}}</td>
        </tr>
    @endforeach
    </tbody>
</table>