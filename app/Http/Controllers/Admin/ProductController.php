<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function add()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }
    public function insert(Request $request)
    {
        $product = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('asset/uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->name = strip_tags($request->input('name'));
        $product->cate_id = strip_tags($request->input('cate_id'));
        $product->small_descriptions = strip_tags($request->input('small_descriptions'));
        $product->original_price = strip_tags($request->input('original_price'));
        $product->selling_price = strip_tags($request->input('selling_price'));
        $product->tax = strip_tags($request->input('tax'));
        $product->quantity = strip_tags($request->input('quantity'));
        $product->slug = strip_tags($request->input('slug'));
        $product->descriptions = strip_tags($request->input('descriptions'));
        $product->status = strip_tags($request->input('status') == TRUE ? 1 : 0);
        $product->trending = strip_tags($request->input('trending') == TRUE ? 1 : 0);
        $product->meta_title = strip_tags($request->input('meta_title'));
        $product->meta_descriptions = strip_tags($request->input('meta_descriptions'));
        $product->meta_keywords = strip_tags($request->input('meta_keywords'));
        $product->save();
        return redirect('products')->with('status', "Product Added Successfully");
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $path = 'asset/uploads/products/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('asset/uploads/products/', $filename);
            $product->image = $filename;
        }

        $product->name = strip_tags($request->input('name'));
        $product->cate_id = strip_tags($request->input('cate_id'));
        $product->small_descriptions = strip_tags($request->input('small_descriptions'));
        $product->original_price = strip_tags($request->input('original_price'));
        $product->selling_price = strip_tags($request->input('selling_price'));
        $product->tax = strip_tags($request->input('tax'));
        $product->quantity = strip_tags($request->input('quantity'));
        $product->slug = strip_tags($request->input('slug'));
        $product->descriptions = strip_tags($request->input('descriptions'));
        $product->status = strip_tags($request->input('status') == TRUE ? 1 : 0);
        $product->trending = strip_tags($request->input('trending') == TRUE ? 1 : 0);
        $product->meta_title = strip_tags($request->input('meta_title'));
        $product->meta_descriptions = strip_tags($request->input('meta_descriptions'));
        $product->meta_keywords = strip_tags($request->input('meta_keywords'));
        $product->update();
        return redirect('products')->with('status', "Product Updated Successfully");
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            $path = 'asset/uploads/products/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('products')->with('status', "Product deleted Successfully");
    }
}
