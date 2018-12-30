@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                  <div class="card-header">Add Tiket</div>
                      <div class="card-body">
                              @include('validasi')
                          {!! Form::open(['route'=>'ticket.store','method'=>'POST']) !!}

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
                                 {!! Form::select('id_kategori',\App\Kategori::pluck('nama_kategori','id'),NULL,['class'=>'form-control']) !!}
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
                                    <button type="submit" class="btn btn-success">Add Ticket</button>
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