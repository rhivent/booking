@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                  <div class="card-header">Update Kategori</div>
                      <div class="card-body">
                      @include('validasi')
                        {!! Form::model($kategori,['route' => ['kategori.update',$kategori->id], 'method' => 'PUT']) !!}
                            <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right">Nama kategori</label>
                                    
                                    <div class="col-md-6">
                                       {!! Form::text('nama_kategori',$kategori->nama_kategori,['class' => "form-control"]) !!}
                                       @if($errors->has('nama_kategori'))
                                        <p class="text-danger">  {{ $errors->first('nama_kategori')}}</p>	
                                       @endif
                                    </div>
                            </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-2">
                                    <a href="{{ route('kategori.index') }}" class="btn btn-warning">&laquo; Back</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                        {!! Form::close() !!}
                          </div>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection