<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\products;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_cart(Request $request)
    {
        cart::create([
            'product_id' => $request->id,
            'token' => $request->_token,
        ]);
        return redirect()->back();
    }

    public function show_cart(Request $request)
    {
        $product_ids = cart::where('token' , '=', $request->cookie('XSRF-TOKEN'))->select('product_id')->get();
        $cartItem_ids = cart::where('token' , '=', $request->cookie('XSRF-TOKEN'))->get('id');
        $cart_count= cart::where('token' , '=', $request->cookie('XSRF-TOKEN'))->count();
        $ids = $product_ids->pluck('product_id');
        $cart_ids = $cartItem_ids->pluck('id');


        $price_records = cart::query()->where('token' , '=', $request->cookie('XSRF-TOKEN'))
        ->with(['product' => function ($query) {
            $query->select('id', 'price');
        }])
        ->get()->pluck('product');

        $total_price = $price_records->pluck('price')->sum();


        $product = new products();
        $products = [];
        $prrr = $ids->map(function ($id) use ($product) {
            return $product->where('id',$id)->get()->toArray();
        })->all();




        foreach($prrr as $pr)
        {
            $products[] = $pr[0];
        }





        return view('shopping_cart' , compact('cart_count','products','cart_ids','total_price'));
    }

    public function delete_from_cart(Request $request)
    {


        cart::where('id', $request->id)->delete();
        $price_records = cart::query()->where('token' , '=', $request->cookie('XSRF-TOKEN'))
        ->with(['product' => function ($query) {
            $query->select('id', 'price');
        }])
        ->get()->pluck('product');



        $total_price = $price_records->pluck('price')->sum();
        $cart_count= cart::where('token' , '=', $request->cookie('XSRF-TOKEN'))->count();
        return response()->json([
            'status' => 'true',
            'msg' => 'Cart deleted successfully',
            'id' => $request->id,
            'total' => $total_price,
            'count' => $cart_count,

        ]);

        // return redirect()->back();

    }
    public function get_count(Request $request)
    {
        $cart_count= cart::where('token' , '=', $request->cookie('XSRF-TOKEN'))->count();

        return response()->json([
            'status' => 'true',
            'msg' => 'Cart deleted successfully',

            'count' => $cart_count,

        ]);
    }
}
