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

    table tbody tr td.type-label {
        vertical-align: middle;
        font-size: 15;
        font-weight: bold;
        wrap-text: true;
        text-align: left;
    }

</style>

<table>
    <thead>
        <tr>
            <td colspan="3">General</td>
            <td colspan="9">Utilization</td>
            <td colspan="6">Fuel Consumption</td>
            <td colspan="2">Schedule Maintanence</td>
        </tr>
    <tr>
        <td height="80">No</td>
        <td colspan="2">Type of Machineries</td>
        <td colspan="2">{!! nl2br('Possible<br/>Working<br/>Units') !!}</td>
        <td colspan="2">{!! nl2br('Starting Working<br/>Units') !!}</td>
        <td colspan="2">{!! nl2br('Ending Working<br/>Units') !!}</td>
        <td colspan="2">{!! nl2br('SMU (Hrs/Km)<br/>(a)') !!}</td>
        <td>{!! nl2br('Utilization<br/>(%)') !!}</td>
        <td>{!! nl2br('Total Diesel<br/>Usage (Litre)<br/>(a)') !!}</td>
        <td colspan="2">{!! nl2br('Ideal Fuel<br/>Consumption') !!}</td>
        <td colspan="2">{!! nl2br('Actual Fuel<br/>Consumption<br/>(b) / (a)') !!}</td>
        <td>{!! nl2br('Variance<br/>betweeen<br/>Actual &<br/>Ideal(%)') !!}</td>
        <td>In Time / Late</td>
        <td>{!! nl2br('Remaining SMU<br/>Hrs') !!}</td>
        <td>Comment</td>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $key => $item)
        <tr>
            <td colspan="21" class="type-label">{{$key}}</td>
        </tr>
        @foreach($item as $subItem)
            <tr>
                <td width="7" height="20">{{$subItem[0]}}</td>
                <td width="25">{{$subItem[1]}}</td>
                <td width="15">{{$subItem[2]}}</td>
                <td width="10">{{$subItem[3]}}</td>
                <td width="10">{{$subItem[4]}}</td>
                <td width="15">{{$subItem[5]}}</td>
                <td width="10">{{$subItem[6]}}</td>
                <td width="15">{{$subItem[7]}}</td>
                <td width="10">{{$subItem[8]}}</td>
                <td width="15">{{$subItem[9]}}</td>
                <td width="10">{{$subItem[10]}}</td>
                <td width="17">{{$subItem[11]}}</td>
                <td width="20">{{$subItem[12]}}</td>
                <td width="10">{{$subItem[13]}}</td>
                <td width="10">{{$subItem[14]}}</td>
                <td width="10">{{$subItem[15]}}</td>
                <td width="10">{{$subItem[16]}}</td>
                <td width="15">{{$subItem[17]}}</td>
                <td width="20">{{$subItem[18]}}</td>
                <td width="20">{{$subItem[19]}}</td>
                <td width="30">{{$subItem[20]}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>