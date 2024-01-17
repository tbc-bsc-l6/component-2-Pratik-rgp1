<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;

class CartController extends Controller
{
          
// adding products to cart from the home page and storing in the local storage session
public function add_to_cart_session(Request $request, $id)
{
    if (Auth::id()) {
        $user = Auth::user();
        $product = Product::find($id);

        // Check if the product is in stock
        if ($product->quantity < 1) {
            return view('errorpage.out_stock');
        }

        // Create an array representing the cart item
        $cartItem = [
            'id' => $product->id, 
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'user_id' => $user->id,
            'product_title' => $product->title,
            'quantity' => $request->input('quantity', 1),
            'price' => ($product->discounted_price != null) ? $product->discounted_price : $product->price,
            'total' => 0,
            'image' => $product->image,
            'product_id' => $product->id,
        ];

        // Retrieve existing cart items from local storage
        $cartItems = json_decode($request->session()->get('cart'), true) ?? [];

        // Check if the product already exists in the cart
        $existingCartItemIndex = array_search($product->id, array_column($cartItems, 'id'));

        if ($existingCartItemIndex !== false) {
            // Update the quantity if the product already exists
            $cartItems[$existingCartItemIndex]['quantity'] += $request->input('quantity', 1);
        } else {
            // Add the new item to the cart items array
            $cartItems[] = $cartItem;
        }
        
        // Update the cart items in local storage
        $request->session()->put('cart', json_encode($cartItems));

        return redirect()->route('show_cart')->with('success', 'Product added to cart successfully');
    } else {
        return redirect('login');
    }
}


    //navbar cart click function
    public function show_cart(Request $request)
    {
        if (Auth::id()) {
            $cartItems = json_decode($request->session()->get('cart'), true) ?? [];
    
            return view('home.show_cart', compact('cartItems'));
        } else {
            return redirect('login');
        }
    }
    
    public function remove_cart($product_id)
{
    // Retrieve cart items from session
    $cartItems = json_decode(session()->get('cart'), true);

    // Find the index of the product in the cart items array
    $existingCartItemIndex = array_search($product_id, array_column($cartItems, 'id'));

    // If the product is found in the cart, remove it
    if ($existingCartItemIndex !== false) {
        unset($cartItems[$existingCartItemIndex]);
        // Re-index the array to ensure numeric keys
        $cartItems = array_values($cartItems);

        // Update the cart items in the session
        session()->put('cart', json_encode($cartItems));

        return redirect()->route('show_cart')->with('success', 'Product removed from cart successfully');
    } else {
        return redirect()->route('show_cart')->with('error', 'Product not found in cart');
    }
}

public function cart_checkout()
{
    $user = Auth::user();
    $user_id = $user->id;

    $cartItems = json_decode(session()->get('cart'), true);

    if (!$cartItems) {
        return redirect()->route('show_cart')->with('error', 'No items in the cart');
    }

    $total = 0;

    foreach ($cartItems as $cartItem) {
        // Create a new Cart model instance
        $cart = new Cart;

        $cart->name = $cartItem['name'];
        $cart->user_id = $cartItem['user_id'];
        $cart->email = $cartItem['email'];
        $cart->phone = $cartItem['phone'];
        $cart->address = $cartItem['address'];
        $cart->product_title = $cartItem['product_title'];
        $cart->price = $cartItem['price'];
        $cart->quantity = $cartItem['quantity'];
        $cart->image = $cartItem['image'];
        $cart->product_id = $cartItem['product_id'];
        $cart->total = $cartItem['price'] * $cartItem['quantity'];

        // Save the cart item to the database
        $cart->save();

        // Update total for the order
        $total += $cart->total;

        // Update product quantity after purchase
        $product = Product::find($cart->product_id);
        if ($product) {
            $product->quantity -= $cart->quantity;
            $product->save();
        }
    }

    // Clear the cart session after storing orders in the database
    // session()->forget('cart');

    return view('home.cart_checkout', compact('total'))->with('success', 'Order placed successfully');
}

public function order_payment_checkout()
{
    $user = Auth::user();
    $user_id = $user->id;

    $cartItems = json_decode(session()->get('cart'), true);

    if (!$cartItems) {
        return redirect()->route('show_cart')->with('error', 'No items in the cart');
    }

    foreach ($cartItems as $cartItem) {
        // Create a new Order model instance
        $order = new Order;

        $order->name = $cartItem['name'];
        $order->email = $cartItem['email'];
        $order->phone = $cartItem['phone'];
        $order->address = $cartItem['address'];
        $order->user_id = $cartItem['user_id'];
        $order->product_title = $cartItem['product_title'];
        $order->product_id = $cartItem['product_id'];
        $order->quantity = $cartItem['quantity'];
        $order->price = $cartItem['price'];
        $order->image = $cartItem['image'];
        $order->payment_status = 'unpaid';
        $order->delivery_status = 'processing';

        // Save the order to the database
        $order->save();

        // Update product quantity after purchase
        $product = Product::find($order->product_id);
        if ($product) {
            $product->quantity -= $order->quantity;
            $product->save();
        }
    }

    // Clear the cart session after storing orders in the database
    // session()->forget('cart');

    return view('home.order_payment_checkout')->with('success', 'Order placed successfully');
}
        public function out_stock()
        {
            $product = Product::where('quantity', 0)->get();

            return view('errorpage.out_stock', compact('product'));
        }
}
