@extends('layouts.admin')

@section('title')
    Catelogies Edit
@endsection

@section('content')
    <div class="container">
        <h3 class="mt-5 pt-4 text-center">Catelogies</h3>

        <div class="row">


            <div class="col-md-6">
                @if(session()->has('msg'))
                    <div class="alert alert-success">
                        {{session('msg')}}
                    </div>

                @endif
                <div class="card">
                    @include('include.message')
                    <div class="card-header bg-light">
                        Edit Catelogy
                    </div>

                    <div class="card-body">
                        <form action="{{route('adminCatelogiesUpdate',$catelogy->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input id="name" name="name" class="form-control" value="{{$catelogy->name}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control border-input">
                                    <div id="thumb-output"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info float-right mr-2">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-light">
                        Image
                    </div>

                    <div class="card-body text-center">
                        <img id="" class="img-thumbnail w-75" src="{{url('upload'.'/'.$catelogy->image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col text-center ">
                <a href="{{route('adminCatelogies')}}" class="btn btn-info btn-lg px-5"><i class="fa fa-angle-double-left"></i></a>
            </div>
        </div>
    </div>

@endsection
