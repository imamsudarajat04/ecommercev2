<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(12);
        return view('shop', compact('products', 'categories'));
    }
    
    public function category($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->paginate(12);
        return view('shop', compact('products', 'categories'));
    }
}
