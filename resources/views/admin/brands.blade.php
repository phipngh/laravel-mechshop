@extends('layouts.admin')

@section('title')
    Brands
@endsection

@section('content')
    <div class="container">
        <h3 class="mt-5 pt-4 text-center">Brands</h3>
        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    @include('include.message')
                    <div class="card-header bg-light">
                        Add New Brand
                    </div>

                    <div class="card-body">
                        <form action="{{route('adminBrandsCreate')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="form-control-label">Name</label>
                                    <input id="name" name="name" class="form-control" placeholder="Name" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="form-control-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control border-input" >
                                    <div id="thumb-output"></div>
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
                        Brands List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            @if(\App\Brands::all()->count()>0)
                                <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <td>{{$brand->id}}</td>
                                            <td>{{$brand->name}}</td>
                                            <td><img id="imageSize" class="img-thumbnail" src="{{url('upload'.'/'.$brand->image)}}" alt="{{$brand->image}}"></td>
                                            <td>{{$brand->created_at->diffForHumans()}}</td>
                                            <td>{{$brand->updated_at->diffForHumans()}}</td>
                                            <td>

                                                <a href="{{route('adminBrandsEdit',$brand->id)}}" class="btn btn-info btn-sm">Edit</a>


                                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$brand->id}}" class="btn btn-danger btn-sm">X</button>
                                                <form id="deletePost-{{$brand->id}}" action="{{route('adminBrandsDestroy',$brand->id)}}" method="POST">@csrf</form>
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

    @foreach($brands as $brand)
        <div class="modal fade" id="deleteModal-{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">You are about to delete {{$brand->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, keep it</button>
                        <form id="deletePost-{{$brand->id}}" action="{{route('adminBrandsDestroy',$brand->id)}}" method="POST">@csrf
                            <button type="submit" class="btn btn-primary">Yes, delete it</button></form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
@endsection
