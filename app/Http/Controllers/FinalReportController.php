<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinalReportController extends Controller
{
    public function index(){
        $sql = "SELECT p.name,sum(a.intotal) AS total  FROM products AS p
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
        GROUP BY p.id;";

        $datas = DB::select(
            DB::raw($sql)
        );
        // dd($datas);
        return view('final_report.index',[
            'datas' => $datas
        ]);
    }
}
