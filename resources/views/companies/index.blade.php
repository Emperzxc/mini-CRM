@php
    use Illuminate\Support\Facades\Storage;
@endphp
@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between px-2">
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary">@lang('messages.add_new_company')</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('messages.list_of_companies')</h3>
            <!-- Search Form -->
            <form action="{{ route('companies.index') }}" method="GET" class="form-inline ml-3 float-right">
                <div class="input-group input-group-sm ">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn  btn-outline-secondary btn-secondary text-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($companies->count())
                <!-- Display total number of companies -->
                <p class="text-muted">@lang('messages.total_of') {{ $companies->total() }} @lang('messages.companies')</p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('messages.id')</th>
                                <th>@lang('messages.name')</th>
                                <th>@lang('messages.email')</th>
                                <th>@lang('messages.logo')</th>
                                <th>@lang('messages.website')</th>
                                <th>@lang('messages.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td style="width:120px;">
                                        @if($company->logo)
                                            <img src="{{Storage::url('logos/' . basename($company->logo)) }}" alt="Company Logo" class="img-thumbnail" style="max-width: 150px;">
                                        @else
                                            No logo
                                        @endif
                                    </td>
                                    <td>{{ $company->website }}</td>
                                    <td style="width:170px;">
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">@lang('messages.edit')</a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">@lang('messages.delete')</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <p class="text-muted">Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} of {{ $companies->total() }} companies</p>
                    </div>
                    <div>
                        {{ $companies->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            @else
                <p>No companies available.</p>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('css')
    <!-- Add extra stylesheets here if needed -->
@stop

@section('js')
    <!-- Add extra JavaScript here if needed -->
@stop
