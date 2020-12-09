<?php

namespace App\Http\Controllers;
use App\Product;
use App\Unit;
use App\Productcategorycontroller;
use Illuminate\Http\Request;

class Productcontroller extends Controller
{
    public function viewproduct(){
        return view('product');
    }

    public function addproduct(Request $req){
        $this->validate($req,[
            'name'=>'required',
            'code'=>'required',
        ]);

        $product=new Product();
        $product->name=$req->name;
        $product->code=$req->code;
        $product->save();
        session()->put('success' ,'Successfully added');
        return view('product');
    }

    public function listproduct(){

        $products=Product::all();
        return view('listproduct',['products'=>$products]);
    }

    public function editproduct($id){
        $product=Product::find($id);
        return view('editproduct',['product'=>$product]);
    }

    public function updateproduct($id,Request $req){
        $product=Product::find($id);
        $product->name=$req->name;
        $product->code=$req->code;
        $product->save();
        session()->put('editproduct','Successfully Edited');
        return redirect('productlist');

    }

    public function deleteproduct($id){
        $product=Product::find($id);
        $product->delete();
        session()->put('deleteproduct','Successfully deleted');
        return redirect('productlist');
    }

    public function total(){
        $datas = Product::all();
        return view('productcalculation', ['datas' => $datas]);
    }
}
