@extends('layouts.admin')

@section('title')
    Products Edit
@endsection

@section('content')
    <div class="container">


        <h3 class="mt-5 pt-4 text-center">Products Edit</h3>

        <div class="row">

            <div class="col-md-12">
                @include('include.msg')
                    @include('include.message')
                <div class="card">

                    <div class="card-header bg-light">
                        Edit Production
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="single-select">Catelogy</label>
                                            <select id="catelogies" class="form-control" name="catelogies" >
                                                @foreach($catelogies as $catelogy)
                                                    @if($catelogy->id == $product->catelogies_id)
                                                        <option value="{{$catelogy->id}}" selected>{{$catelogy->name}}</option>
                                                    @else
                                                        <option value="{{$catelogy->id}}" >{{$catelogy->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="single-select">Brand</label>
                                            <select id="brands" class="form-control" name="brands">
                                                @foreach($brands as $brand)
                                                    @if($brand->id == $product->brands_id)
                                                        <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                                    @else
                                                        <option value="{{$brand->id}}" >{{$brand->name}}</option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  class="form-control-label">Price</label>
                                            <input id="price" name="price" class="form-control"value="{{$product->price}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label  class="form-control-label">Name</label>
                                            <input id="name" name="name" class="form-control" value="{{$product->name}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label  class="form-control-label">Current Image</label>
                                            <br>
                                            <img class="w-50" src="{{url('upload'.'/'.$product->image)}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label  class="form-control-label">Image</label>
                                            <input type="file" name="image" id="image" class="form-control border-input" >
                                            <div id="thumb-output"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label  class="form-control-label">Description</label>
                                    <textarea id="description" rows="25" name="description" class="form-control">{{$product->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info float-right mr-2">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center justify-content-center ">
                <a href="{{route('adminProducts')}}" class="btn btn-info btn-lg px-5"><i class="fa fa-angle-double-left"></i></a>
            </div>
        </div>

        <!--
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    @include('include.message')
                    <div class="card-header bg-light">
                        Edit Products
                    </div>

                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="single-select">Catelogy</label>
                                                <select id="catelogies" class="form-control" name="catelogies">
                                                    @foreach($catelogies as $catelogy)
                                                        <option value="{{$catelogy->id}}">{{$catelogy->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="single-select">Brand</label>
                                                <select id="brands" class="form-control" name="brands">
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label  class="form-control-label">Name</label>
                                        <input id="name" name="name" class="form-control" value="{{$product->name}}" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label  class="form-control-label">Price</label>
                                        <input id="price" name="price" class="form-control"value="{{$product->price}}" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label  class="form-control-label">Image</label>
                                        <input type="file" name="image" id="image" class="form-control border-input" >
                                        <div id="thumb-output"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info float-right mr-2">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label  class="form-control-label">Description</label>
                    <textarea id="description" rows="19" name="description" class="form-control" placeholder="Description"></textarea>
                </div>
            </div>
        </div>

        -->
    </div>

@endsection

