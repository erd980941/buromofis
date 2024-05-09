<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::firstOrCreate([]);
        return view('admin.headers.index', compact('header'));
    }

    public function update(Request $request)
    {
        // Validation yapılabilir

        // İlk önce ayarları al
        $header = Header::first();

        // Formdan gelen dosyayı al
        $file = $request->file('background_image');

        // Eğer dosya yüklendi ise
        if ($file) {
            if ($header->background_image) {
                Storage::delete($header->background_image);
            }
            // Dosya adını belirli bir formatta oluştur
            $fileName = 'header_image-' . date('Ymd') . '.' . $file->getClientOriginalExtension();

            // Dosyayı storage/app/public/images klasörüne kaydet (storage/app/public içinde images adında bir klasör oluşturulmalıdır)
            $path = $file->storeAs('public/images', $fileName);

            // Kaydedilen dosyanın tam yolu
            // $filePath = Storage::url($path);

            // background_image yolu veritabanında güncelle
            $header->background_image = $path;
        }

        // Diğer form verilerini güncelle
        $header->fill($request->except('background_image'));

        // Veritabanına kaydet
        $header->save();

        return redirect()->route('admin.headers.index')->with('success', 'Başlık güncellendi');
    }
}
