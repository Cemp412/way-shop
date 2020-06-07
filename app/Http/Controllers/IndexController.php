<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Category;
use App\Product;
class IndexController extends Controller
{
    public function index()
    {
    	$banners = Banners::where('status', '1')->orderBy('sort_order', 'asc')->get();
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $products = Product::get();
    	return view('way-shop.index', compact('banners', 'categories', 'products'));
    }
}
