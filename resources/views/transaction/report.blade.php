<table class="table table-bordered">
    <tr class="success"><th colspan="6">Sales Ticket Report</th></tr>
    <tr>
        <th>No</th>
        <th>Ticket Name</th>
        <th>Qty</th>
        <th>Price</th> 
        <th>Subtotal</th>
    </tr>
    <?php $no=1; $total=0; ?>
        @foreach ($transaksi as $item)
    <tr>
            <td width="30px">{{ $no }}</td>
            <td>{{ $item->ticket->name_ticket }}</td>
            <td>{{ $item->qty }}</td>
            @php $harga = str_replace('.','',$item->ticket->price_ticket); @endphp
            <td>{{ "Rp. " . number_format($harga) . ",-" }}</td>
            <td>{{ "Rp. " . number_format($harga*$item->qty) . ",-" }}</td>
    </tr>
            <?php $no++ ?>
            <?php $total=$total+($harga*$item->qty) ?>
    @endforeach
            <tr>
                <td colspan="4"><p align="right">Total</p></td>
                <td>{{ "Rp. " . number_format($total) . ",-"}}</td>
            </tr>
</table>