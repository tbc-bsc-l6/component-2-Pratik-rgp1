<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_category(){

        $data =category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $data = new category;
        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message','Category added successfully!!');    
    }

    public function view_product()
    {
    $category = category::all();
       return view('admin.product', compact('category'));
    }

    public function add_product(Request $request){

       $product = new product;
       $product->title=$request->title; 
       $product->category=$request->category;
       $product->description=$request->description; 
       $product->price=$request->price; 
       $product->discounted_price=$request->dis_price; 
       $product->quantity=$request->quantity; 

        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image=$imagename;

       $product->save();

       return redirect()->back()->with('message', 'Product Added Successfully!');
    }

    public function delete_category($id){
        $data=category::find($id);
        $data->delete();

        return redirect()->back()->with('message','Category deleted successfully!!');
    }

    public function show_product(){

        $product=product::all();
        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id){
        $product=product::find($id);
        $product->delete();

        return redirect()->back()->with('message','Product deleted successfully!!');
    }

    public function update_product($id){
        $product = product::find($id);
        $categories = Category::all(); 
    
        return view('admin.update_product', compact('product', 'categories')); 
    }
    

    public function update_product_confirm(Request $request, $id){
        $product=product::find($id);

        $product->title=$request->title;
        $product->category=$request->category;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discounted_price=$request->dis_price;
        $product->quantity=$request->quantity;

        $image=$request->image;

        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image=$imagename;
        }

       $product->save();

       return redirect()->back()->with('message', 'Product Updated Successfully!');
    }

    public function order()
    {
        $order=order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id)
    {
        $order=order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="paid";

        $order->save();

        return redirect()->back();
    }

}
