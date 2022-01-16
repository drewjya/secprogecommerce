<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->get();
        $trending_categories = Category::where('popular', '1')->get();

        return view('frontend.index',  compact('featured_products', 'trending_categories'));
    }
    public function categories()
    {
        $categories = Category::where('status', 1)->get();
        return view('frontend.categories', compact('categories'));
    }
    public function productview($name, $id)
    {
        if (Category::where('name', $name)->exists()) {
            if (Product::where('id', $id)->exists()) {
                $products = Product::where('id', $id)->first();
                return view('frontend.products.view', compact('products'));
            } else {
                return redirect('/')->with('status', "Link was Broken");
            }
        } else {
            return redirect('/')->with('status', "No Such Categories");
        }
    }
    public function viewcategory($id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::where('id', $id)->first();
            $products = Product::where('cate_id', $id)->where('status', 0)->get();
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', 'Categories does not exist');
        }
    }
}
