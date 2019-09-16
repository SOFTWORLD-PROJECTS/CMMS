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
        wrap-text: true;
    }
</style>

<table>
    <thead>
    <tr>
        <td width="20" height="90">COMPANY</td>
        <td width="25">MACHINES</td>
        <td width="15">{!! nl2br('DOWN<br/>SINCE<br/>(DATE)') !!}</td>
        <td width="15">{!! nl2br('VARIANCE<br/>DAYS FROM<br/>DOWN TILL<br/>NOW<br/>(DAYS)') !!}</td>
        <td width="25">{!! nl2br('ESTIMATE BACK TO<br/>NORMAL ON<br/>DATE') !!}</td>
        <td width="30">WORK DESCRIPTION</td>
        <td width="25">SUPPLIER</td>
        <td width="25">WORK STATUS</td>
        <td width="20">AMOUNT (RM)</td>
        <td width="15">REMARK</td>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td><b>{{$item[0]}}</b></td>
            <td>{{$item[1]}}</td>
            <td>{{$item[2]}}</td>
            <td>{{$item[3]}}</td>
            <td>{{$item[4]}}</td>
            <td>{{$item[5]}}</td>
            <td><b>{{$item[6]}}</b></td>
            <td>{{$item[7]}}</td>
            <td>{{$item[8]}}</td>
            <td>{{$item[9]}}</td>
        </tr>
    @endforeach
    </tbody>
</table>