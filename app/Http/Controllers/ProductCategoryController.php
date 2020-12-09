<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productcategory;
class Productcategorycontroller extends Controller
{
    public function viewproductcategory(){
        return view('productcategory');
    }

    public function addproductcategory(Request $req){
        $this->validate($req,[
            'name'=>'required',
            'code'=>'required',
            'date'=>'required',
            'unitprice'=>'required',
            'quantity'=>'required'
        ]);

        $productcategory=new Productcategory();
        $productcategory->name=$req->name;
        $productcategory->code=$req->code;
        $productcategory->date=$req->date;
        $productcategory->unitprice=$req->unitprice;
        $productcategory->quantity=$req->quantity;
        $productcategory->save();
        session()->put('categorysuccess','Added Successfully');
        return redirect('productcategory');

    }

    public function listproductcategory(){

        $datas=Productcategory::all();

        return view('listproductcategory')->with('datas',$datas);
    }

    public function editproductcategory($id){
        $data=Productcategory::find($id);
        return view('editproductcategory')->with('data',$data);
    }

    public function updateproductcategory($id,Request $req){
        $productcategory= Productcategory::find($id);
        $productcategory->name=$req->name;
        $productcategory->code=$req->code;
        $productcategory->date=$req->date;
        $productcategory->unitprice=$req->unitprice;
        $productcategory->quantity=$req->quantity;
        $productcategory->save();
        session()->put('updateproductcategory','Successfully Updated');
        return redirect('productcategorylist');
    }

    public function deleteproductcategory($id){
        $data=Productcategory::find($id);
        $data->delete();
        session()->put('deleteproductcategory','Successfully Deleted');
        return redirect('productcategorylist');
    }
}
