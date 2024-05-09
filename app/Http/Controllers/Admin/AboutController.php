<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.abouts.index', compact('about'));
    }

    public function update(Request $request)
    {
        // Validation yapılabilir

        // İlk önce hakkımızda bilgisini al
        $about = About::first();

        // Formdan gelen dosyayı al
        $file = $request->file('image');

        // Eğer dosya yüklendi ise
        if ($file) {
            if ($about->image) {
                Storage::delete($about->image);
            }
            // Dosya adını belirli bir formatta oluştur
            $fileName = 'about_image-' . date('Ymd') . '.' . $file->getClientOriginalExtension();

            // Dosyayı storage/app/public/images klasörüne kaydet (storage/app/public içinde images adında bir klasör oluşturulmalıdır)
            $path = $file->storeAs('public/images', $fileName);

            // Kaydedilen dosyanın tam yolu
            // $filePath = Storage::url($path);

            // Resim yolu veritabanında güncelle
            $about->image = $path;
        }

        // Diğer form verilerini güncelle
        $about->fill($request->except('image'));

        // Veritabanına kaydet
        $about->save();

        return redirect()->route('admin.abouts.index')->with('success', 'Hakkımızda bilgileri güncellendi');
    }
}
