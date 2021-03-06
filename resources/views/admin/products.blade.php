@extends('layouts.admin')

@section('title')
    Products
@endsection

@section('content')
    <div class="container">
        <h3 class="mt-5 pt-4 text-center">Products</h3>
        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    @include('include.message')
                    <div class="card-header bg-light">
                        Add New Products
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
                                    <input id="name" name="name" class="form-control" placeholder="Name" >
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label  class="form-control-label">Price</label>
                                        <input id="price" name="price" class="form-control" placeholder="Price" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label  class="form-control-label">Description</label>
                                        <textarea id="description" rows="10" name="description" class="form-control" placeholder="Description"></textarea>
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

                            @if(\App\Products::all()->count()>0)
                                <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Catelogy</th>
                                        <th>Brand</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->catelogies->name}}</td>
                                            <td>{{$product->brands->name}}</td>
                                            <td title="{{$product->name}}">{{\Illuminate\Support\Str::limit($product->name,10)}}</td>
                                            <td>{{\Illuminate\Support\Str::limit($product->description,10)}}</td>
                                            <td>{{$product->price}}</td>
                                            <td><img id="imageSize" class="img-thumbnail" src="{{url('upload'.'/'.$product->image)}}" alt="{{$product->image}}"></td>
                                            <td>

                                                <a href="{{route('adminProductsEdit',$product->id)}}" class="btn btn-info btn-sm">Edit</a>


                                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$product->id}}" class="btn btn-danger btn-sm">X</button>
                                                <form id="deletePost-{{$product->id}}" action="{{route('adminProductsDestroy',$product->id)}}" method="POST">@csrf</form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>


                            @else
                                <br>
                                <h3 class="text-center font-weight-bold">You have no Product</h3>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="float-right">{{ $products->links('paginator/paginator') }}</div>
            </div>
        </div>
    </div>


    @foreach($products as $product)
        <div class="modal fade" id="deleteModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">You are about to delete {{$product->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, keep it</button>
                        <form id="deletePost-{{$product->id}}" action="{{route('adminProductsDestroy',$product->id)}}" method="POST">@csrf
                            <button type="submit" class="btn btn-primary">Yes, delete it</button></form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach


@endsection
