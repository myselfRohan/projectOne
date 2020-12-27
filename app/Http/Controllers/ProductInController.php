<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductInController extends Controller
{

    public function index(){
        $products = Product::all();
        $productsInList = DB::table('products')
        ->join("products_in","products_in.product_id","=","products.id")
        ->select("products_in.id","name","price","quantity","in_at")
        ->get();
        // dd($productsInList);
        return view('products_in.index',[
            'productsInList'=>$productsInList
        ]);
    }

    public function create() {
        $products = Product::all();
        return view('products_in.add', [
            'products' => $products
        ]);
    }

    public function store(Request $request, ProductIn $productIn){
        $datas = $request->productin;
        //dd($request->all());
        // dd($datas);
        if (count($datas)>0) {
            foreach ($datas as $key => $value) {
                $productsIn = [
                    'product_id'=> $request->productin[$key],
                    'quantity'=>$request->quantity[$key],
                    'in_at' => $request->inDate
                ];
                //dd($productsIn);
                $productIn->create($productsIn);
            }
        }

        return redirect()->route('productsIn');
    }

    public function getData($id){   //for getting the data through ajax
        return Product::find($id);
    }

}
