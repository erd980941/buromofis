<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectPhotoController extends Controller
{
    public function index(int $projectId)
    {
        // Projeye ait fotoğrafları getir
        $photos = Project::findOrFail($projectId)->photos;
        $project = Project::findOrFail($projectId);
        // Görüntüleme işlemi için view'e verileri geçir
        return view('admin.project-photos.list', compact('photos', 'project'));
    }

    public function create(int $projectId)
    {

        return view('admin.project-photos.create', compact('projectId'));
    }

    public function store(Request $request, int $projectId)
    {
        // Proje oluştur
        $project = Project::findOrFail($projectId);

        // Gelen fotoğrafları kontrol et ve ana fotoğrafı belirle
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                // Fotoğrafı kaydet
                $fileName = 'project_' . date('Ymd_His') . '_' . mt_rand(100000, 999999) . '.' . $photo->getClientOriginalExtension();
                $path = $photo->storeAs('public/images/projects', $fileName);
                // Kaydedilen dosyanın tam yolu


                // Fotoğraf kaydını veritabanına ekle
                $projectPhoto = ProjectPhoto::create([
                    'project_id' => $project->id,
                    'photo_path' => $path,
                ]);

                // İlk fotoğrafı ana fotoğraf olarak belirle
                if (!$project->main_photo_id) {
                    $project->main_photo_id = $projectPhoto->id;
                    $project->save();
                }
            }
        }

        // Başarı mesajıyla proje sayfasına yönlendir
        return redirect()->route('admin.projects.project-photos.list',$projectId)->with('success', 'Fotoğraf başarıyla eklendi.');
    }

    public function updateMainPhoto(int $projectId, int $photoId)
    {
        // Proje ve fotoğrafı bul
        $project = Project::findOrFail($projectId);
        $photo = ProjectPhoto::findOrFail($photoId);

        // Ana fotoğrafı güncelle
        $project->main_photo_id = $photoId;
        $project->save();

        // Ana fotoğraf güncellendi mesajıyla ana projenin düzenleme sayfasına yönlendir
        return redirect()->route('admin.projects.project-photos.list', ['projectId' => $projectId])->with('success', 'Ana fotoğraf başarıyla güncellendi');
    }

    public function destroy(int $projectId, int $photoId)
    {
        $photo = ProjectPhoto::findOrFail($photoId);
        // Projeye ait diğer fotoğrafları al
        $projectPhotos = ProjectPhoto::where('project_id', $projectId)->where('id', '!=', $photoId)->get();

        // Ana fotoğrafı seç (örneğin, ilk fotoğrafı seçelim)
        $newMainPhoto = $projectPhotos->first();

        // Ana fotoğrafı güncelle
        $project = Project::findOrFail($projectId);
        $project->main_photo_id = $newMainPhoto ? $newMainPhoto->id : null; // Eğer başka bir fotoğraf yoksa main_photo_id'yi null yap
        $project->save();

        // Storage::disk('public')->delete($photo->photo_path);ü
        Storage::delete($photo->photo_path);

        // Fotoğrafı sil
        ProjectPhoto::findOrFail($photoId)->delete();


        // Silindi mesajıyla ana projenin fotoğraflar sayfasına yönlendir
        return redirect()->route('admin.projects.project-photos.list', $projectId)->with('success', 'Fotoğraf başarıyla silindi');
    }
}
