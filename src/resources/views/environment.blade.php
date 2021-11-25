@extends('installer.layouts.installer')

@section('title')

@section('content')

    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Installer</h1>
    </div>

    <div class="container mt-3">
        <h4>Environment Setup</h4>
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <form method="post" action="{{route('database.connect')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Database Driver</label>
                <select class="form-control" name="database_connection">
                    <option value="mysql">Mysql</option>
                    <option value="sqlite">Sqlite</option>
                    <option value="pgsql">Pgsql</option>
                    <option value="sqlsrv">Sqlsrv</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="host" class="form-label">Database Host</label>
                <input type="text" class="form-control" id="host" name="database_hostname">
            </div>

            <div class="mb-3">
                <label for="database_port" class="form-label">Database Port</label>
                <input type="text" class="form-control" id="database_port" name="database_port">
            </div>

            <div class="mb-3">
                <label for="database_name" class="form-label">Database Name</label>
                <input type="text" class="form-control" id="database_name" name="database_name">
            </div>

            <div class="mb-3">
                <label for="database_username" class="form-label">Database Username</label>
                <input type="text" class="form-control" id="database_username" name="database_username">
            </div>

            <div class="mb-3">
                <label for="database_password" class="form-label">Database Password</label>
                <input type="text" class="form-control" id="database_password" name="database_password">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Next</button>
            </div>
        </form>
    </div>
@endsection
