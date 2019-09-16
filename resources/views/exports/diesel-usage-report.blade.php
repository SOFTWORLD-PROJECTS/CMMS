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
            <td colspan="3">General</td>
            <td colspan="3">Summary</td>
            <td colspan="2">Before</td>
            <td colspan="2">After</td>
            <td colspan="1"></td>
            <td colspan="3">WEIGHTBRIDGE</td>
        </tr>
    <tr>
        <td width="15">DATE</td>
        <td width="15">COMPANY</td>
        <td width="15">SUPPLIER</td>
        <td width="15">PURCHASE</td>
        <td width="15">ACTUAL</td>
        <td width="15">VARIANCE</td>
        <td width="15">DIESEL</td>
        <td width="15">ACTUAL</td>
        <td width="15">DIESEL</td>
        <td width="15">ACTUAL</td>
        <td width="20">VARIANCE OF</td>
        <td width="20">WEIGHTBRIDGE</td>
        <td width="20">CALCULATED</td>
        <td width="20">VARIANCE OF</td>
        <td width="20">FROM MIRI HQ</td>
    </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            <tr>
                @for($i = 0; $i < count($item) ; $i++)
                    <td>{{$item[$i]}}</td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>