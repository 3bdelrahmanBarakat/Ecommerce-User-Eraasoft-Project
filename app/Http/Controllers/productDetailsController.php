<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\products;
use Illuminate\Http\Request;

class productDetailsController extends Controller
{
    public function show_product(Request $request, $id)
    {
        $product= products::where('id',$id)->first();
        $cart_count= cart::where('token' , '=', $request->cookie('XSRF-TOKEN'))->get()->count();
        return view('show_product', compact('product','cart_count'));
    }

}
