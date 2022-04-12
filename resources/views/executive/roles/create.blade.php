@extends('layouts.deshboard')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Create role
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('executive.roles') }}">Roles</a>
                    </span>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'executive.roles.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        <strong>User:</strong>
                        <select style="width:25%;margin-top: 10px;" name="role_id" class="form-control">
                            @foreach ($users as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong class="mt-3"
                            style="text-align: center;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             display: flex;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         font-size: 22px;">Permission:</strong>
                        <br />
                        <div class="col-md-3">
                            <!-- Tabs nav -->
                            <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link mb-3 p-3 shadow active" id="v-pills-user-tab" data-toggle="pill"
                                    href="#v-pills-user" role="tab" aria-controls="v-pills-user" aria-selected="true">
                                    <i class="fa fa-check mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">User</span></a>
                                <a class="nav-link mb-3 p-3 shadow" id="v-pills-role-tab" data-toggle="pill"
                                    href="#v-pills-role" role="tab" aria-controls="v-pills-role" aria-selected="false">
                                    <i class="fa fa-check mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">User Role</span></a>

                                <a class="nav-link mb-3 p-3 shadow" id="v-pills-permission-tab" data-toggle="pill"
                                    href="#v-pills-permission" role="tab" aria-controls="v-pills-permission"
                                    aria-selected="false">
                                    <i class="fa fa-check mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Permission</span></a>

                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Tabs content -->
                            <div class="tab-content" id="v-pills-tabContent">
                                {{-- user --}}
                                <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-user"
                                    role="tabpanel" aria-labelledby="v-pills-user-tab">
                                    @foreach ($permission as $value)
                                        @php
                                            $name = $value->name;
                                            $user = stristr($name, 'user');
                                        @endphp
                                        @if ($value->name == $user)
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                {{ $value->name }}</label>
                                        @endif
                                    @endforeach
                                </div>


                                {{-- role --}}
                                <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-role" role="tabpanel"
                                    aria-labelledby="v-pills-role-tab">
                                    @foreach ($permission as $value)
                                        @php
                                            $name = $value->name;
                                            $role = stristr($name, 'role');
                                        @endphp
                                        @if ($value->name == $role)
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                {{ $value->name }}</label>
                                        @endif
                                    @endforeach
                                </div>
                                {{-- <button type="submit" class="btn btn-success col-md-6 float-right mr-3 mt-3">Submit</button>
                                @php
                                    die();
                                @endphp --}}
                                {{-- permission --}}
                                <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-permission"
                                    role="tabpanel" aria-labelledby="v-pills-permission-tab">
                                    @foreach ($permission as $value)
                                        @php
                                            $name = $value->name;
                                            $permission = stristr($name, 'permission');
                                        @endphp
                                        @if ($value->name == $permission)
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                {{ $value->name }}</label>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success col-md-6 float-right mr-3 mt-3">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
