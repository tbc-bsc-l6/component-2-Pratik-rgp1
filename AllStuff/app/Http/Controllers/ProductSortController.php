<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductSortController extends Controller
{
    public function sort(Request $request)
    {
        $sortOption = $request->input('short-by', 'default');

        $priceMin = $request->input('price-min', 0);
        $priceMax = $request->input('price-max', PHP_INT_MAX);

        $query = Product::whereNotNull('discounted_price')
            ->whereBetween('discounted_price', [$priceMin, $priceMax]);
        

        $product = $query->orderBy($this->getSortColumn($sortOption), $this->getSortOrder($sortOption))->paginate(12);

        return view('home.products_page', compact('product', 'priceMin', 'priceMax'));
    }

    private function getSortColumn($sortOption)
    {
        // return ($sortOption === 'discount') ? 'desc' : 'asc';
        // Adjust the sorting columns based on your database schema
        switch ($sortOption) {
            case 'discount':
                return 'discounted_price';
            case 'title':
                return 'title';
            case 'highToLow':
                return 'price';
            case 'lowToHigh':
                return 'price';
            default:
                return 'created_at'; // default sorting column
        }
    }

    private function getSortOrder($sortOption)
    {
        return ($sortOption === 'highToLow') ? 'desc' : 'asc';
    }
}
