<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductSortController extends Controller
{
    public function sort(Request $request)
    {
        $product = Product::paginate(6);
    
        // Get the selected sorting option from the request
        $sortBy = $request->input('short-by');

        // Define default sorting column and order
        $sortColumn = 'title';
        $sortOrder = 'asc';


        // Adjust sorting based on the selected option
        switch ($sortBy) {
            case 'discount':
                $sortColumn = 'discounted_price'; // Replace with your actual discount column
                $product = Product::whereNotNull('discounted_price')->paginate(6);
                break;
            case 'title':
                $sortColumn = 'title';
                $sortOrder = 'asc';
                break;
            case 'highToLow':
                $sortColumn = 'price';
                $sortOrder = 'desc';
                break;
            case 'lowToHigh':
                $sortColumn = 'price';
                $sortOrder = 'asc';
                break;
            default:
            $sortColumn = 'default_column'; // Replace with a default column name
            $sortOrder = 'asc'; 
             break;
        }

        // Query the database for products based on the sorting criteria
        $product = Product::orderBy($sortColumn,$sortOrder)->paginate(6);

        // You can return the sorted data to the view or perform any necessary actions
        // For simplicity, let's assume you want to return the sorted products to a view
        return view('home.products_page', compact('product') );
    }

}
