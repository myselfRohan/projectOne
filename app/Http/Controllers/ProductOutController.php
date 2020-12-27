<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductOutController extends Controller
{
    public function index() {
        $products = Product::all();
        $productsOutList = DB::table('products')
        ->join("products_out","products_out.product_id","=","products.id")
        ->select("products_out.id","name","price","quantity","out_at")
        ->get();
        // dd($productsInList);
        return view('products_out.index',[
            'productsOutList'=>$productsOutList
        ]);
    }

    public function create(){
        $products = Product::all();
        return view('products_out.add', [
            'products' => $products
        ]);
    }

    public function store(Request $request, ProductOut $productOut){
        $datas = $request->productout;
        // dd($request->productout);
        // dd($datas);
        if (count($datas)>0) {
            foreach ($datas as $key => $value) {
                $productsOut = [
                    'product_id'=> $request->productout[$key],
                    'quantity'=>$request->quantity[$key],
                    'out_at' => $request->outDate
                ];
                //dd($productsIn);
                $productOut->create($productsOut);
            }
        }
        return redirect()->route('productsOut');
    }

    public function getData($id){   //for getting the data through ajax
        return Product::find($id);
    }
}
