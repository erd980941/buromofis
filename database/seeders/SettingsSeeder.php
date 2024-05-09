<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'logo' => 'default-logo.png',
            'title' => 'Site Başlığı',
            'url' => 'http://example.com',
            'description' => 'Site açıklaması buraya gelecek',
            'keywords' => 'anahtar kelime, site, örnek',
            'author' => 'Yazar Adı',
            'zopim' => 'Zopim ID',
            'maps' => 'Google Maps API Key',
        ]);
    }
}
