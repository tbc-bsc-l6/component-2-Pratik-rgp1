<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;


use Session;

class HomeController extends Controller
{
        public function index()
        {
            $product = Product::paginate(6);
            return view('home.userpage', compact('product'));
        }

        
        public function redirect()
        {
            $usertype=Auth::user()->usertype;
            
            if($usertype=='1')
            {
                return view('admin.home');
            }
            // elseif($usertype=='2')
            // {
            //     return view('admin.home');
            // }
            else{
                $product = Product::paginate(6);
                return view('home.userpage', compact('product'));
                
            }
        }

        public function products_page()
        {
            $product = Product::paginate(6);
     
            
            return view('home.products_page', compact('product'));
        }

        public function about()
        {
            return view('home.about');
        }

        public function contact()
        {
            return view('home.contact');
        }
        

        public function product_details($id)
        {
            $product=product::find($id);
            return view('home.product_details', compact('product'));
        }
//product seaarch from database
        public function product_search(Request $request)
        {
            $search_txt = $request->input('search');

            if ($search_txt) {
                $product = Product::where('title', 'LIKE', "%$search_txt%")->orWhere('category', 'LIKE', "%$search_txt%")->paginate(10);
            }
            return view('home.searchResults', compact('product'));
        }
 
       
}