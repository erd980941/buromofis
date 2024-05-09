<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'address' => '123 Main Street',
            'city' => 'Example City',
            'district' => 'Example District',
            'phone1' => '1234567890',
            'phone2' => '0987654321',
            'whatsapp' => '5551234567',
            'email' => 'info@example.com',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3192.386229881179!2d-122.08624648467545!3d37.42199907981966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085806e78a28d25%3A0x4d46e4114482ce09!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1620975325625!5m2!1sen!2sus'
        ]);
    }
}
