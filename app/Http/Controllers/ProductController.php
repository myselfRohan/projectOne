<?php

namespace App\Http\Controllers;
use App\Product;
use App\Unit;
use App\Productcategorycontroller;
use Illuminate\Http\Request;

class Productcontroller extends Controller
{
    public function index(){
        $products=Product::all();
        return view('products.index',[
            'products'=>$products
        ]);
    }

    public function create(Request $req){
        return view('products.add');
    }

    public function store(Request $request, Product $product){
        // $this->validate($request,[
        //     'name'=>'required',
        //     'price' =>'required'
        // ]);

        Product::create($request->only(['name','price']));
        return redirect('products');
    }

    public function edit(Product $product){
        return view('products.edit',[
            'product'=>$product
        ]);
    }

    public function update(Request $request, Product $product){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
        ]);
        $product->update($request->only(['name', 'price']));
        return redirect('products');

    }

    public function destroy(Product $product){
        $product->delete();
        return redirect('products');
    }
}
