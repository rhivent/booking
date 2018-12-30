@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
        <div class="card-header bg-info">TRANSACTION TICKET</div>
                    <div class="card-body">
                    <h3>Form Transaction</h3>
                    @include('validasi')
                    @include('notifikasi')
                {!! Form::open(['route'=>'transaction.store','method'=>'POST']) !!}
                    <table class="table table-bordered">
                          <tr><td>
                                <div class="col-md-12">
                                {!! Form::select('id_ticket',\App\Ticket::pluck('name_ticket','id'),NULL,['class'=>'form-control']) !!}
                                </div>
                           </td></tr>
                        <tr><td>
                                <div class="col-md-12">
                                {!! Form::number('qty',null,['class' => 'form-control']) !!}
                                </div>
                         </td></tr>
                          <tr>
                            <td>
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-upload"></i> Save</button>
                                 <a href="{{ route('transaction.update') }}" class="btn btn-danger"><i class="fa fa-check"></i> Done</a>
                            </td>
                            </tr>
                    </table>
                    {!! Form::close() !!}
                    <table class="table table-bordered">
                        <tr class="success"><th colspan="6">Details Transaction</th></tr>
                        <tr>
                         <th>No</th>
                         <th>Ticket Name</th>
                         <th>Qty</th>
                         <th>Price</th> 
                         <th>Subtotal</th>
                         <th>Cancel</th></tr>
                        <?php $no=1; $total=0; ?>
                         @foreach ($transaksi as $item)
                        <tr>
                                <td width="30px">{{ $no }}</td>
                                <td>{{ $item->ticket->name_ticket }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->ticket->price_ticket }}</td>
                                @php $harga=str_replace('.','',$item->ticket->price_ticket) @endphp
                                <td>{{ "Rp. " . number_format($harga*$item->qty) . ",-" }}</td>
                                <td>
                                {!! Form::open(['route'=>['transaction.destroy',$item->id],'method'=>'DELETE']) !!}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</button>
                                {!! Form::close() !!}
                                </td>
                        </tr>
                               <?php $no++ ?>
                                <?php $total=$total+($harga*$item->qty) ?>
                       @endforeach
                                <tr>
                                    <td colspan="5"><p align="right">Total</p></td>
                                    <td>{{ "Rp. " . number_format($total) . ",-" }}</td>
                                </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection