@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ticket List</div>
                <div class="card-body">
                <a class="btn btn-success btn-md col-1" href="{{ route('ticket.create') }}"><i class="fa fa-plus"></i> Create</a><br/><br/>
                @include('notifikasi')
                <table class="table table-bordered" id="users-table">
                
                        <thead>
                        
                            <tr class="text-center">
                                <th>No</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Total</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach( $tickets as $ticket)
                        
                            <tr>
                                <td width="20px" class="text-center">{{$no}}</td>
                                <td>{{$ticket->name_ticket}}</td>
                                <td>{{$ticket->type_ticket}}</td>
                                <td>{{$ticket->kategori->nama_kategori}}</td>
                                <td>{{$ticket->total_ticket}}</td>
                                <td>{{$ticket->price_ticket}}</td>
                                <td width="50px"><a class="btn btn-primary btn-sm" href="{{ route('ticket.edit', ['id' => $ticket->id]) }}"><i class="fa fa-edit"></i> EDIT</a></td>
                                {!! Form::open(['route' => ['ticket.destroy',$ticket->id], 'method' => 'DELETE']) !!}
                                <td width="50px"><button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button></td>
                                {!! Form::close() !!}
                            </tr>
                        @php
                            $no++;
                        @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
    $(function() {
        $('#users-table').DataTable();
    });
    </script>
@endpush
