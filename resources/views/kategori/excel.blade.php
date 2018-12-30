@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                  <div class="card-header">Import Excel</div>
                      <div class="card-body">
                      @include('validasi')
                        {!! Form::open(['route' => 'kategori.upload.excel', 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
                            <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right">Upload File Kategori</label>
                                    
                                    <div class="col-md-6">
                                       {!! Form::file('file_upload_xls',old('file_upload_xls'),['class' => "form-control"],'required') !!}
                                       @if($errors->has('file_upload_xls'))
                                        <p class="text-danger">  {{ $errors->first('file_upload_xls')}}</p>	
                                       @endif
                                    </div>
                            </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-2">
                                    <a href="{{ route('kategori.index') }}" class="btn btn-warning">&laquo; Back</a>
                                        <button type="submit" class="btn btn-success">Upload Data</button>
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