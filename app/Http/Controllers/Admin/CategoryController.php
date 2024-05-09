<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get()->toTree();
        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get()->toFlatTree();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        if ($request->parent) {
            $node = Category::find($request->parent);
            $node->appendNode($category);
        }
        $image=$request->file('image');
        if($image){
            $fileName = 'category_' . date('Ymd_His') . '_' . mt_rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/categories', $fileName);
            $category->image=$path;
            $category->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->get()->toFlatTree();
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $category=Category::findOrFail($id);

        $image=$request->file('image');
        if($image){
            if ($category->image) {
                Storage::delete($category->image);
            }
            $fileName = 'category_' . date('Ymd_His') . '_' . mt_rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/categories', $fileName);
            $category->image=$path;
        }
        $category->fill($request->except('image'));
        $category->save();

        if ($request->parent) {
            $node=Category::findOrFail($request->parent);
            $node->appendNode($category);
        }
        return redirect()->route('admin.categories.list')->with('success', 'Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $node = Category::findOrFail($id);
        Storage::delete($node->image);
        $node->delete();
        return redirect()->back();
    }
}
