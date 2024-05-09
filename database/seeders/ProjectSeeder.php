<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Projeleri oluştur
         $projects = Project::factory(3)->create();

         // Her bir proje için 3 adet fotoğraf oluştur ve ana fotoğrafı seç
         $projects->each(function ($project) {
             $photos = ProjectPhoto::factory(3)->create(['project_id' => $project->id]);

             // Her bir projenin fotoğraflarından rastgele birini seç ve ana fotoğraf olarak belirle
             $randomPhoto = $photos->random();
             $project->main_photo_id = $randomPhoto->id;
             $project->save();
         });
    }
}
