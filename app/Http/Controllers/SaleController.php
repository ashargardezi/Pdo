<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function salelist_show(){
        
        return view('sale.sale_list');
    }
    public function addSale_show(){
        
        return view('sale.add_sale');
    }
    public function pos_show(){
        
        return view('sale.pos');
    }
}
