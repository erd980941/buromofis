<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $productId)
    {
        $photos=Product::findOrFail($productId)->photos;
        $product=Product::findOrFail($productId);
        return view('admin.product-photos.list',compact('photos','product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $productId)
    {
        return view('admin.product-photos.create',compact('productId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,int $productId)
    {
        $product=Product::findOrFail($productId);

        if($request->hasFile('photos')){
            foreach ($request->file('photos') as $photo) {
                $fileName='product_'. date('Ymd_His').'_'.mt_rand(100000, 999999).'.'.$photo->getClientOriginalExtension();
                $path=$photo->storeAs('public/images/products',$fileName);

                $productPhoto=ProductPhoto::create([
                    'product_id'=>$product->id,
                    'photo_path'=>$path,
                ]);
                if(!$product->main_photo_id){
                    $product->main_photo_id=$productPhoto->id;
                    $product->save();
                }
            }
        }
        return redirect()->route('admin.products.product-photos.list',$productId)->with('success', 'Fotoğraf başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function updateMainPhoto(int $productId, int $photoId)
    {
        $product=Product::findOrFail($productId);
        $photo=ProductPhoto::findOrFail($photoId);

        $product->main_photo_id=$photoId;
        $product->save();
        return redirect()->route('admin.products.product-photos.list', $productId)->with('success', 'Ana Fotoğraf başarıyla güncellendi');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $productId, int $photoId)
    {
        $photo=ProductPhoto::findOrFail($photoId);
        $productPhotos=ProductPhoto::where('product_id',$productId)->where('id','!=',$photoId)->get();

        $newMainPhoto=$productPhotos->first();

        $product=Product::findOrFail($productId);
        $product->main_photo_id=$newMainPhoto?$newMainPhoto->id:null;
        $product->save();

        Storage::delete($photo->photo_path);
        ProductPhoto::findOrFail($photoId)->delete();
        return redirect()->route('admin.products.product-photos.list', $productId)->with('success', 'Fotoğraf başarıyla silindi');
    }
}
