<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'name' => 'Facebook',
            'link' => 'https://www.facebook.com',
            'icon' => 'fab fa-facebook',
        ]);

        SocialMedia::create([
            'name' => 'Twitter',
            'link' => 'https://www.twitter.com',
            'icon' => 'fab fa-twitter',
        ]);

        SocialMedia::create([
            'name' => 'Instagram',
            'link' => 'https://www.instagram.com',
            'icon' => 'fab fa-instagram',
        ]);

        SocialMedia::create([
            'name' => 'LinkedIn',
            'link' => 'https://www.linkedin.com',
            'icon' => 'fab fa-linkedin',
        ]);
    }
}
