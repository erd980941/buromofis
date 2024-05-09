<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedia = SocialMedia::all();
        return view('admin.social-media.list', compact('socialMedia'));
    }

    public function create()
    {
        return view('admin.social-media.create');
    }

    public function store(Request $request)
    {
        // Validation işlemleri burada yapılabilir

        SocialMedia::create($request->all());
        return redirect()->route('admin.socialmedia.list')->with('success', 'Sosyal medya kaydedildi.');
    }

    public function edit(int $id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        return view('admin.social-media.edit', compact('socialMedia'));
    }

    public function update(Request $request, int $id)
    {

        $socialMedia = SocialMedia::findOrFail($id);
        // Validation işlemleri burada yapılabilir

        $socialMedia->update($request->all());

        return redirect()->route('admin.socialmedia.list')->with('success', 'Sosyal medya güncellendi.');
    }

    public function destroy(int $id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->delete();

        return redirect()->route('admin.socialmedia.list')->with('success', 'Sosyal medya silindi.');
    }
}
