<?php

namespace App\Http\Controllers;

use App\Mail\emailMailable;
use App\Models\cart;
use App\Models\orders;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(Request $request)
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







        return view('checkout',compact('cart_count','products','cart_ids','total_price'));
    }

    public function placeOrder(Request $request)
    {

        $product_ids = cart::where('token' , '=', $request->cookie('XSRF-TOKEN'))->select('product_id')->get();

        $ids = $product_ids->pluck('product_id');



        $price_records = cart::query()->where('token' , '=', $request->cookie('XSRF-TOKEN'))
        ->with(['product' => function ($query) {
            $query->select('id', 'price','quantity');
        }])
        ->get()->pluck('product');

        $total_price = $price_records->pluck('price')->sum();

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        orders::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'token' => $request->_token,
            'city' => $request->city,
            'status' => "pending",
            'postcode' => $request->postcode,
            'phone' => $request->phone,
            'email' => $request->email,
            'products_id' => json_encode($ids),
            'total_price' => $total_price,
        ]);

        foreach($ids as $id){
         products::where('id', $id)->decrement('quantity', 1);
        }

        return redirect('/send_mail');
    }

    public function send_mail(Request $request)
    {


        $orders = orders::where('token', $request->cookie('XSRF-TOKEN'))->get();

        $product_ids = orders::where('token', $request->cookie('XSRF-TOKEN'))->get('products_id')->pluck('products_id');



        $decoded_product_ids = json_decode($product_ids[0]);



        foreach($decoded_product_ids as $decoded_product_id)
        {
            $products[] = products::where('id', $decoded_product_id)->get();
        }






        $mailData = [
            'orders' => $orders,
            'products' => $products
        ];

        Mail::to('abdelrahmanbarakat16@gmail.com')->send(new emailMailable($mailData));

        cart::where('token',$request->cookie('XSRF-TOKEN'))->delete();

        session()->flash('order', ' تم طلب المنتج بنجاح سيصل اليك في خلال 3-5 ايام');
        return redirect('/checkout');
    }
}
