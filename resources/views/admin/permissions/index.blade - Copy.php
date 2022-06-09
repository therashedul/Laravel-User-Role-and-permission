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
                <div class="card-header">Permissions
                    @php
                        $role_id = Auth::user()->role_id;
                        $rhps = DB::table('role_has_permissions')
                            ->where('role_id', $role_id)
                            ->get();
                        $permissions = DB::table('permissions')->get();
                        foreach ($rhps as $rhpsvalue) {
                            $permissionId = $rhpsvalue->permission_id;
                            foreach ($permissions as $pvalue) {
                                $pid = $pvalue->id;
                                if ($permissionId == $pid) {
                                    // print_r($pvalue->name);
                                    if ($pvalue->name == 'permission-create') {
                                        echo ' <span class="float-right">';
                                        echo '<a class="btn btn-primary btn-sm" href="permissions.create"><i class="fas fa-plus"></i> New Permission</a>';
                                        echo '</span>';
                                    }
                                }
                            }
                        }
                    @endphp

                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th width="200px">Action</th>
                            </tr>
                        </thead>
                        @php
                            $rhps = DB::table('role_has_permissions')->get();
                            // $permissions = DB::table('permissions')->get();
                            $roles = DB::table('roles')->get();
                        @endphp
                        <tbody>
                            @foreach ($data as $key => $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        @foreach ($roles as $role)
                                            @foreach ($rhps as $rhp)
                                                @if ($role->id == Auth::user()->role_id && $role->id == $rhp->role_id)
                                                    @if ($rhp->permission_id == $permission->id)
                                                        @php
                                                            $name = $permission->name;
                                                            // print_r($name);
                                                        @endphp
                                                        @php
                                                            $value = substr(strstr($name, '-'), 1);
                                                        @endphp
                                                        <a class="btn btn-success btn-sm"
                                                            href="{{ route('admin.permissions.show', $permission->id) }}"><i
                                                                class="fas fa-eye"></i></a>
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('admin.permissions.edit', $permission->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        @if (Auth::user()->name == 'admin')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.permissions.destroy', $permission->id], 'style' => 'display:inline']) !!}
                                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn btn-danger btn-sm']) }}
                                                            {!! Form::close() !!}
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
