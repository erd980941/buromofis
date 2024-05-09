<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get()->toFlatTree();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Formdan gelen verileri doğrulama
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'properties' => 'nullable|string',
        //     'category_id' => 'required|exists:categories,id',
        // ]);

        // Yeni bir ürün oluştur
        Product::create($request->all());

        // Başarılı bir şekilde oluşturulan ürünü kullanıcıya bildir
        return redirect()->route('admin.products.list')->with('success', 'Ürün başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $product=Product::findOrFail($id);
        $categories = Category::get()->toFlatTree();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $product=Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('admin.products.list')->with('success','Ürün Başarıyla Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.list')->with('success',"Ürün Başarıyla Silindi");
    }
}
