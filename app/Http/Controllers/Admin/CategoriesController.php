<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.categories.index', compact('category'));
    }

    public function add()
    {
        return view('admin.categories.add');
    }
    public function insert(Request $request)
    {
        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('asset/uploads/categories/', $filename);
            $category->image = $filename;
        }
        $category->name = strip_tags($request->input('name'));
        $category->slug = strip_tags($request->input('slug'));
        $category->description = strip_tags($request->input('description'));
        $category->status = strip_tags($request->input('status') == TRUE ? 1 : 0);
        $category->popular = strip_tags($request->input('popular') == TRUE ? 1 : 0);
        $category->meta_title = strip_tags($request->input('meta_title'));
        $category->meta_descrip = strip_tags($request->input('meta_descrip'));
        $category->meta_keywords = strip_tags($request->input('meta_keywords'));
        $category->save();
        return redirect('/dashboard')->with('status', 'Category added succesfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $path = 'asset/uploads/categories/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $validator = Validator::make($request->all(), [
                'file' => 'max:10240',
            ]);
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('asset/uploads/categories/', $filename);
            $category->image = $filename;
        }
        $category->name = strip_tags($request->input('name'));
        $category->slug = strip_tags($request->input('slug'));
        $category->description = strip_tags($request->input('description'));
        $category->status = strip_tags($request->input('status') == TRUE ? 1 : 0);
        $category->popular = strip_tags($request->input('popular') == TRUE ? 1 : 0);
        $category->meta_title = strip_tags($request->input('meta_title'));
        $category->meta_descrip = strip_tags($request->input('meta_descrip'));
        $category->meta_keywords = strip_tags($request->input('meta_keywords'));

        $category->update();
        return redirect('dashboard')->with('status', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = 'asset/uploads/categories/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status', "Category deleted Successfully");
    }
}
