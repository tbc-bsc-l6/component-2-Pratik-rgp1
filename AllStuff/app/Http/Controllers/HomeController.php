<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
        public function index()
        {
            $product = Product::paginate(10);
            return view('home.userpage', compact('product'));
        }

        public function products_page()
        {
            // $product = Product::paginate(10);
     
            
            return view('home.products_page');
        }

        public function redirect()
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                return view('admin.home');
            }
            else{
                $product = Product::paginate(10);
                return view('home.userpage', compact('product'));
            
            }
        }

        public function product_details($id)
        {
            $product=product::find($id);
            return view('home.product_details', compact('product'));
        }
//adding products from the home page
        public function add_to_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);

            $existingCart = Cart::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->first();

            if (!$existingCart) {
                
                $cart = new Cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;
                $cart->quantity = 1; 

                if ($product->discounted_price != null) {
                    $cart->price = $product->discounted_price * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }
                
                $cart->total = $cart->price* $cart->quantity;
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->save();
                
            }

            return redirect()->route('show_cart');
        } else {
            return redirect('login]');
        }
    }

    //navbar cart click function
        public function show_cart()
        {
            if(Auth::id())
            {
            $id = Auth::user()->id;

            $cart=cart::where('user_id','=',$id)->get();
            
            return view('home.show_cart', compact('cart'));
            }
            else{
                return redirect('login');
            }
        }

        public function remove_cart($id)
        {
            $cart=cart::find($id);
            $cart->delete();

            return redirect()->back();
        }

        public function payment_checkout($total)
        {
            $user=Auth::user();

            $userid=$user->id;
            
            $user_data=cart::where('user_id','=',$userid)->get();
       
            foreach($user_data as $data)
            {
               
                $order = new order;

                $order->name=$data->name;
                $order->email=$data->email;
                $order->phone=$data->phone;
                $order->address=$data->address;

                $order->user_id=$data->user_id;
                $order->product_title=$data->product_title;
                $order->price=$data->price;
                $order->quantity=$data->quantity;
                $order->image=$data->image;
                $order->product_id=$data->product_id;
                

                $order->payment_status='unpaid';
                $order->delivery_status='processing';

                $order->save();

                // deleteing data from the cart 
                $cart_id=$data->id;
                $cart=cart::find($cart_id);
                $cart->delete();
            }
            return view('home.payment_checkout', compact('total'));
        }
}