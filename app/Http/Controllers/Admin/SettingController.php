<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        // dd($setting);
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        // Validation yapılabilir

        // İlk önce ayarları al
        $setting = Setting::first();

        // Formdan gelen dosyayı al
        $file = $request->file('logo');

        // Eğer dosya yüklendi ise
        if ($file) {
            if ($setting->logo) {
                Storage::delete($setting->logo);
            }
            // Dosya adını belirli bir formatta oluştur
            $fileName = 'logo-' . date('Ymd') . '.' . $file->getClientOriginalExtension();

            // Dosyayı storage/app/public/images klasörüne kaydet (storage/app/public içinde images adında bir klasör oluşturulmalıdır)
            $path = $file->storeAs('public/images', $fileName);

            // Kaydedilen dosyanın tam yolu
            // $filePath = Storage::url($path);

            // Logo yolu veritabanında güncelle
            $setting->logo = $path;
        }

        // Diğer form verilerini güncelle
        $setting->fill($request->except('logo'));

        // Veritabanına kaydet
        $setting->save();

        return redirect()->route('admin.settings.index')->with('success', 'Ayarlar güncellendi');
    }
}
