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

    public function show($id){
        return ProductIn::find($id);
    }
    
    public function edit($id) {
        $productIn = ProductIn::find($id);
        return view('products_in.edit', [
            'productIn' => $productIn
        ]);
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $datas = [
            'quantity' => $request->quantity,
            'in_at' => $request->in_at
        ];
        // dd($datas);
        $productIn = ProductIn::find($id);
        $productIn->update($datas);
        return redirect()->route('productsIn');
    }

    public function destroy(ProductIn $productIn){
        $productIn->delete();
        return redirect()->route('productsIn');
    }

    //for searching the products
    public function search(Request $request){
        $products = Product::all();
        // $searchResults = DB::table('products')
        // ->join("products_in","products_in.product_id","=","products.id")
        // ->select("products_in.id","name","price","quantity","in_at")
        // // ->where("name","Like", "%{$request->inputData}%")
        // // ->where("in_at","=", "{$request->searchDate}")
        // ->whereRaw("in_at = "+$request->searchDate+" OR name LIKE "+$request->inputData)
        $query = "SELECT pin.id,name,quantity,price,in_at
        FROM products AS p
        JOIN products_in AS pin ON p.id=pin.product_id
        WHERE p.name='%{$request->inputData}%' 
        OR in_at = '{$request->searchDate}';";


        $searchResults = DB::select(
            DB::raw($query)
        );

        // dd($searchResults);
        
        return view('products_in.result', [
            'results' => $searchResults
        ]);
    }

}
