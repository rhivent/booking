@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kategori</div>
                <div class="card-body">
                <a class="btn btn-success btn-md" href="{{ route('kategori.create') }}"><i class="fa fa-plus"></i> Create</a>
                <a class="btn btn-info btn-md" href="{{ route('kategori.excel') }}"><i class="fa fa-download"></i> Import xls</a>
                <br/><br/>
                @include('notifikasi')
                <table class="table table-bordered" id="users-table">
                
                        <thead>
                        
                            <tr class="text-center">
                                <th>No</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach( $kategori as $kategori)
                        
                            <tr>
                                <td width="20px" class="text-center">{{$no}}</td>
                                <td>{{$kategori->nama_kategori}}</td>
                                <td width="50px"><a class="btn btn-primary btn-sm" href="{{ route('kategori.edit', ['id' => $kategori->id]) }}"><i class="fa fa-edit"></i> EDIT</a></td>
                                {!! Form::open(['route' => ['kategori.destroy',$kategori->id], 'method' => 'DELETE']) !!}
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
