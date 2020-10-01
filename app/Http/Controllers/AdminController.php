<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Catelogies;
use App\Http\Requests\CatelogiesCreate;
use App\Http\Requests\UserUpdate;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:admin');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    /*-----*/
    public function catelogies(){
        $catelogies = Catelogies::all();
        return view('admin.catelogies',compact('catelogies'));
    }

    public function catelogiesCreate(CatelogiesCreate $request){
        $catelogy = new Catelogies();

        if($request->hasFile('image')){
            $image = $request->image;
            $image->move('upload',$image->getClientOriginalName());
        }
        $catelogy->name = $request['name'];
        $catelogy->image =$request->image->getClientOriginalName();
        $catelogy->save();

        return redirect()->back()->with('msg','New Catelogy has been added');
    }

    public function catelogiesEdit($id){
        $catelogy = Catelogies::find($id);
        return view('admin.catelogiesEdit',compact('catelogy'));
    }

    public function catelogiesUpdate(Request $request,$id){
        $catelogy = Catelogies::find($id);

        $request->validate([
           'name'=>'required|string',

        ]);

        if($request->hasFile('image')){
            if(file_exists(public_path('upload/').$catelogy->image)){
                unlink(public_path('upload/').$catelogy->image);
            }
            $image =$request->image;
            $image->move('upload',$image->getClientOriginalName());
            $catelogy->image = $request->image->getClientOriginalName();
        }
            $catelogy->name = $request['name'];
            $catelogy->save();

            return redirect()->back()->with('msg','Your Catelogy has been updated');
    }

    public function catelogiesDestroy($id){
        $catelogy = Catelogies::find($id);
        $catelogy->delete();

        return redirect()->back()->with('msg','Catelogy has been deleted.');
    }

    /*-----*/
    public function brands(){
        $brands = Brands::all();
        return view('admin.brands',compact('brands'));
    }

    public function brandssCreate(Request $request){
        $brand = new Brands();
        $request->validate([
            'name'=>'required|string',
            'image'=>'required|file',
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $fullname = uniqid().$image->getClientOriginalname();
            $image->move('upload',$fullname);
        }
        $brand->name = $request['name'];
        $brand->image = $fullname;
        $brand->save();

        return redirect()->back()->with('msg','New Brand has been added.');
    }

    public function brandsEdit($id){
        $brand = Brands::find($id);
        return view('admin.brandsEdit',compact('brand'));
    }

    public function brandsUpdate($id,Request $request){
        $brand = Brands::find($id);

        $request->validate([
           'name'=>'required|string',
        ]);

        if($request->hasFile('image')){
            if(file_exists(public_path('upload/').$brand->image)){
                unlink(public_path('upload/').$brand->image);
            }

            $image =$request->image;
            $fullname = uniqid().$image->getClientOriginalname();
            $image->move('upload',$fullname);
            $brand->image = $fullname;
        }
        $brand->name = $request['name'];
        $brand->save();

        return redirect()->back()->with('msg','Your Brand has been updated');
    }

    public function brandsDestroy($id){
        $brand = Brands::find($id);
        $brand->delete();

        return redirect()->back()->with('msg','Brand has been deleted.');
    }
    /*-----*/

    public function products(){
        $products = Products::paginate(8);
        $catelogies = Catelogies::all();
        $brands = Brands::all();
        return view('admin.products',compact('products','catelogies','brands'));
    }

    public function productsCreate(Request $request){
        $product = new Products();
        $request->validate([
           'name'=>'required|string',
           'price'=>'required|numeric',
           'description'=>'required',
           'image'=>'required|file',
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $fullname = uniqid().$image->getClientOriginalname();
            $image->move('upload',$fullname);
        }

        $product->catelogies_id = $request['catelogies'];
        $product->brands_id = $request['brands'];
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->image = $fullname;

        $product->save();

        return redirect()->back()->with('msg','New product has been added.');

    }

    public function productsEdit($id){
        $product = Products::find($id);

        $catelogies = Catelogies::all();
        $brands = Brands::all();

        return view('admin.productsEdit',compact('product','catelogies','brands'));
    }

    public function productsUpdate($id,Request $request){
        $product = Products::find($id);
        $request->validate([
           'price' => 'required|numeric',
            'name' => 'required|string',
            'description'=>'required',
        ]);

        if($request->hasFile('image')){
            if(file_exists(public_path('upload/').$product->image)){
                unlink(public_path('upload/').$product->image);
            }

            $image =$request->image;
            $fullname = uniqid().$image->getClientOriginalname();
            $image->move('upload',$fullname);
            $product->image = $fullname;
        }

        $product->catelogies_id = $request['catelogies'];
        $product->brands_id = $request['brands'];
        $product->price = $request['price'];
        $product->name = $request['name'];
        $product->description = $request['description'];

        $product->save();

        return redirect()->back()->with('msg','Product has been updated.');
    }

    public function productsDestroy($id){
        $product = Products::find($id);
        $product->delete();

        return redirect(route('adminProducts'))->with('msg','Product has been deleted.');
    }


    /*-----*/
    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function usersAdmin($id){
        $user = User::find($id);
        $user->admin = true;
        $user->save();

        return redirect()->back()->with('msg','User has been gained Admin.');
    }

    public function usersUnAdmin($id){
        $user = User::find($id);
        $user->admin = false;
        $user->save();

        return redirect()->back()->with('msg','User has been canceled Admin.');
    }

    public function usersManager($id){
        $user = User::find($id);
        $user->manager = true;
        $user->save();

        return redirect()->back()->with('msg','User has been gained Manager.');
    }

    public function usersUnManager($id){
        $user = User::find($id);
        $user->manager = false;
        $user->save();

        return redirect()->back()->with('msg','User has been canceled Manager.');
    }



    public function usersCreate(Request $request){
        $user = new User();
        $request->validate([
           'name'=>'required|string',
            'email' => 'required|email|unique:users,email,'.$user->id,
           'password'=>'required|string|confirmed',
        ]);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->admin = 0;
        $user->manager = 0;

        $user->save();

        return redirect()->back()->with('msg','New user has been added.');
    }

    public function usersDestroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('msg','User has been deleted.');
    }


    /*-----*/

    public function stocks(){
        $catelogies = Catelogies::all();
        $brands = Brands::all();

        return view('admin.stocks',compact('catelogies','brands'));
    }

    /*-----*/
    public function profile(){
        return view('admin.profile');
    }

    public function profileUpdate(UserUpdate $request){
        $user = Auth::user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return redirect()->back()->with('msg','Your Profile has been updated.');
    }
}
