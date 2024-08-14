@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between px-2">
        <h1>@lang('messages.employees')</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">@lang('messages.add_new_employee')</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('messages.employees')</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="employeesTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>@lang('messages.id')</th>
                            <th>@lang('messages.name')</th>
                            <th>@lang('messages.email')</th>
                            <th>@lang('messages.phone')</th>
                            <th>@lang('messages.company')</th>
                            <th>@lang('messages.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->name}}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->company->name ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">@lang('messages.edit')</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
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
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employeesTable').DataTable();
        });
    </script>
@stop
