@extends('installer.layouts.installer')

@section('title')

@section('content')
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Server requirements</h1>
    </div>

    <div class="container mt-3">
        <h4>PHP Version</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Minimum Required</th>
                <th scope="col">Current Version</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($requirements as $requirement)
                    <td>{{ $checkPhpVersion['minimum_version'] }}</td>
                    <td>{{ $checkPhpVersion['current_version'] }}</td>
                    <td><span>{{$checkPhpVersion['status'] ? 'Yes' : 'No'}}</span></td>
                @endforeach
            </tr>
            </tbody>
        </table>
    </div>

    <div class="container mt-3">
        <h4>Requirements</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requirements['requirements'] as $type => $requirement)
                @foreach($requirements['requirements'][$type] as $extention => $enabled)
                    <tr>
                        <td>{{$extention}}</td>
                        <td>{{$enabled ? 'Yes' : 'No'}}</td>
                    </tr>
                @endforeach
            @endforeach

            </tbody>
        </table>
        @if ( ! isset($requirements['errors']) && $checkPhpVersion['status'] )

            <div class="d-grid gap-2">
                <a class="btn btn-success" href="{{route('folder.permission')}}">Next</a>
            </div>
        @endif
    </div>

@endsection
