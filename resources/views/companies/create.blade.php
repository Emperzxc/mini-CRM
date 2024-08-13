
@extends('adminlte::page')

@section('title', 'Create Company')

@section('content_header')
    <h1>@lang('messages.create_company')</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('messages.add_new_company')</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">@lang('messages.company_name')</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">@lang('messages.email')</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="logo">@lang('messages.logo')</label>
                    <input type="file" id="logo" name="logo" class="form-control-file @error('logo') is-invalid @enderror" required>
                    @error('logo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="website">@lang('messages.website')</label>
                    <input type="url" id="website" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}">
                    @error('website')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">@lang('messages.submit')</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@stop

