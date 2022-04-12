@extends('layouts.deshboard')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Users
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('users.create') }}">New User</a>
                        {{-- <a class="btn btn-primary" href="{{ route('users.roles') }}">User Role</a> --}}
                    </span>
                </div>
                <div class="card-body">


                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th width="250px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        <a class="btn btn-success" href="{{ route('users.show', $user->id) }}"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>

                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i
                                                class="fa fa-pencil" aria-hidden="true"></i></a>

                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                        {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger','type' => 'submit']) }}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
