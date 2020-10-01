@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
    <div class="container">
        <h3 class="mt-5 pt-4 text-center">Users</h3>
        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    @include('include.message')
                    <div class="card-header bg-light">
                        Add New User
                    </div>

                    <div class="card-body">
                        <form action="" method="POST" >
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="form-control-label">Name</label>
                                    <input id="name" name="name" class="form-control" placeholder="Name" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="form-control-label">Email</label>
                                    <input id="email" name="email" class="form-control" placeholder="Email" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="form-control-label">Password</label>
                                    <input id="password" name="password" class="form-control" type="password" placeholder="Password" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="form-control-label">Confirm Password</label>
                                    <input id="password-confirm" name="password_confirmation" class="form-control" type="password" placeholder="Confirm Password" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info float-right mr-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    @if(session()->has('msg'))
                        <div class="alert alert-success">
                            {{session('msg')}}
                        </div>

                    @endif
                    <div class="card-header bg-light">
                        Users List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            @if(\App\User::all()->count()>0)
                                <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Admin</th>
                                        <th>Manager</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if($user->admin == 1 && $user->manager ==1)
                                                    <b>Administrator/Manager</b>
                                                @elseif($user->admin == 1 && $user->manager == 0)
                                                    <b>Administrator</b>
                                                @elseif($user->admin == 0 && $user->manager == 1)
                                                    <b>Manager</b>
                                                @else
                                                    Customer
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->admin == 0)
                                                    <a href="{{route('adminUsersAdmin',$user->id)}}" class="btn btn-outline-success btn-sm">Admin</a>
                                                @elseif($user->admin == 1)
                                                    <a href="{{route('adminUsersUnAdmin',$user->id)}}" class="btn btn-outline-danger btn-sm">Cancel</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->manager == 0)
                                                    <a href="{{route('adminUsersManager',$user->id)}}" class="btn btn-outline-success btn-sm">Manager</a>
                                                @elseif($user->manager == 1)
                                                    <a href="{{route('adminUsersUnManager',$user->id)}}" class="btn btn-outline-danger btn-sm">Cancel</a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$user->id}}" class="btn btn-danger px-sm-3"><b>X</b></button>
                                                <form id="deletePost-{{$user->id}}" action="{{route('adminUsersDestroy',$user->id)}}" method="POST">@csrf</form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @else
                                <br>
                                <h3 class="text-center font-weight-bold">You have no Post</h3>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($users as $user)
        <div class="modal fade" id="deleteModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">You are about to delete {{$user->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, keep it</button>
                        <form id="deletePost-{{$user->id}}" action="{{route('adminUsersDestroy',$user->id)}}" method="POST">@csrf
                            <button type="submit" class="btn btn-primary">Yes, delete it</button></form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
@endsection
