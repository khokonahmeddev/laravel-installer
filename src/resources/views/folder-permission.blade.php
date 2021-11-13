@extends('installer.layouts.installer')

@section('title')

@section('content')
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Installer</h1>
    </div>

    <div class="container mt-3">
        <h4>Folder Permission</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions['permissions'] as $permission)
                <tr>
                    <td>{{ $permission['folder'] }}</td>
                    <td>
                        <span>{{ $permission['permission'] }} {{$permission['isSet'] ? 'yes' : 'No' }} </span>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
        @if ( ! isset($permissions['errors']))
            <div class="d-grid gap-2">
                <a class="btn btn-success" href="{{route('environment.setup')}}">Next</a>
            </div>
        @endif


    </div>
@endsection
