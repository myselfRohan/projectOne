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

    public function edit($id){
        $productOut = ProductOut::find($id);
        return view('products_out.edit',[
            'productOut' => $productOut
        ]);
    }

    public function update(Request $request, $id){
        $datas = [
            'quantity' => $request->quantity,
            'out_at' => $request->out_at
        ];
        $productOut = ProductOut::find($id);
        $productOut->update($datas);
        return redirect()->route('productsOut');
    }

    public function destroy(ProductOut $productOut){
        $productOut->delete();
        return redirect()->route('productsOut');
    }

    public function show($id) {
        $query = "SELECT p.name,sum(a.intotal) AS instotal  FROM products AS p
                  JOIN 
                    (
                     SELECT  pin.product_id,IFNULL(SUM(pin.quantity),0) AS intotal 
                     FROM products_in AS pin
                     GROUP BY pin.product_id
                     UNION all
                     SELECT  pout.product_id,IFNULL(-pout.quantity,0) AS intotal 
                     FROM products_out AS pout
        
                     ) AS a
                    ON p.id=a.product_id
                WHERE p.id = {$id};";
        
        $data = DB::select(
            DB::raw($query)
        );

        return $data ;
    }
}
