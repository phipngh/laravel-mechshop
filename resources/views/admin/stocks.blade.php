@extends('layouts.admin')

@section('title')
    Stocks
@endsection

@section('content')
    <div class="container">
        <h3 class="mt-5 pt-4 text-center">Stocks</h3>
        <div class="row">

            <div class="col-md-3">
                <div class="card">
                    @include('include.message')
                    <div class="card-header bg-light">
                        Add Quantity
                    </div>

                    <div class="card-body">
                        <form action="" method="POST" >
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="single-select">Catelogy</label>
                                    <select id="catelogies" class="form-control" name="catelogies">
                                        @foreach($catelogies as $catelogy)
                                            <option value="{{$catelogy->id}}">{{$catelogy->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="single-select">Brand</label>
                                    <select id="brands" class="form-control" name="brands">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
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
            <div class="col-md-9">
                <div class="card">
                    @if(session()->has('msg'))
                        <div class="alert alert-success">
                            {{session('msg')}}
                        </div>

                    @endif
                    <div class="card-header bg-light">
                        Catelogies List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            @if(\App\Catelogies::all()->count()>0)
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
                                    @foreach($catelogies as $catelogy)
                                        <tr>
                                            <td>{{$catelogy->id}}</td>
                                            <td>{{$catelogy->name}}</td>
                                            <td><img id="imageSize" class="img-thumbnail" src="{{url('upload'.'/'.$catelogy->image)}}" alt="{{$catelogy->image}}"></td>
                                            <td>{{$catelogy->created_at->diffForHumans()}}</td>
                                            <td>{{$catelogy->updated_at->diffForHumans()}}</td>
                                            <td>

                                                <a href="{{route('adminCatelogiesEdit',$catelogy->id)}}" class="btn btn-info btn-sm">Edit</a>


                                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$catelogy->id}}" class="btn btn-danger btn-sm">X</button>
                                                <form id="deletePost-{{$catelogy->id}}" action="{{route('adminCatelogiesDestroy',$catelogy->id)}}" method="POST">@csrf</form>
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

    @foreach($catelogies as $catelogy)
        <div class="modal fade" id="deleteModal-{{$catelogy->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">You are about to delete {{$catelogy->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, keep it</button>
                        <form id="deletePost-{{$catelogy->id}}" action="{{route('adminCatelogiesDestroy',$catelogy->id)}}" method="POST">@csrf
                            <button type="submit" class="btn btn-primary">Yes, delete it</button></form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
@endsection

