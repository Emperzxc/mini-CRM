@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
    <h1>@lang('messages.edit_company')</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('messages.edit_company_details')</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">@lang('messages.name')</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $company->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">@lang('messages.email')</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $company->email) }}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="logo">@lang('messages.logo')</label>
                    <div class="mb-2">
                        @if($company->logo)
                            <img src="{{Storage::url('logos/' . basename($company->logo)) }}" alt="Company Logo" class="img-thumbnail" style="max-width: 150px;">
                        @else
                            <p>No logo available</p>
                        @endif
                    </div>
                    <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror">
                    @error('logo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="website">@lang('messages.website')</label>
                    <input type="text" id="website" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', $company->website) }}">
                    @error('website')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">@lang('messages.update')</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@stop
