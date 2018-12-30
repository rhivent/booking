@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                  <div class="card-header">Update Ticket</div>
                      <div class="card-body">
                              @include('validasi')
                        {!! Form::model($ticket,['route' => ['ticket.update',$ticket->id], 'method' => 'PUT']) !!}

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Ticket Name</label>
                                 <div class="col-md-6">
                                 {!! Form::text('name_ticket',null,['class'=>'form-control']) !!}
                                 </div>
                           </div>

                          <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Ticket Type</label>
                                 <div class="col-md-6">
                                 {!! Form::text('type_ticket',null,['class'=>'form-control']) !!}
                                 </div>
                           </div>

                          <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Category Name</label>
                                 <div class="col-md-6">
                                 <select class="form-control">
                                @foreach($kategori as $kategori)
                                    <option value="{{$kategori->id}}" @if($kategori->id === $ticket->id_kategori) selected @endif>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                                </select>
                                </div>
                           </div>

                          <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Total</label>
                                 <div class="col-md-6">
                                        {!! Form::number('total_ticket',null,['class'=>'form-control']) !!}
                                 </div>
                           </div>

                          <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Price</label>
                                 <div class="col-md-6">
                                        {!! Form::text('price_ticket',null,['class'=>'form-control uang']) !!}
                                 </div>
                           </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
                                <a href="{{ route('ticket.index') }}" class="btn btn-warning">&laquo; Back</a>
                                    <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-upload"></i> Update</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.uang').mask('000.000.000',{reverse:true});
    });
</script>
@endsection