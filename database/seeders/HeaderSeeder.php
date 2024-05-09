<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Header::create([
            'title' => 'Hoş Geldiniz!',
            'subtitle' => 'Sitenizin alt başlığı burada yer alır.',
            'background_image' => 'images/background.jpg', // Varsayılan bir arka plan görseli
        ]);
    }
}
