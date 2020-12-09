<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductCalculateController extends Controller
{
    public function total(){
        $datas = Product::all();
        return view('productcalculation', ['datas' => $datas]);
    }
}
