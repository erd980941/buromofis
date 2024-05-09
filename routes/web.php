<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPhotoController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectPhotoController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Middleware\AdminAuthenticate;


Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->middleware(['auth','admin'])->group(function () {

    Route::get('/', function () {
        return view('admin.home');
    })->name("admin.home");

    Route::get('/ayarlar', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('/ayarlar', [SettingController::class, 'update'])->name('admin.settings.update');

    Route::get('/iletisim-ayarlari', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::post('/iletisim-ayarlari', [ContactController::class, 'update'])->name('admin.contacts.update');

    Route::get('/sosyal-medya', [SocialMediaController::class, 'index'])->name('admin.socialmedia.list');
    Route::get('/sosyal-medya/ekle', [SocialMediaController::class, 'create'])->name('admin.socialmedia.create');
    Route::post('/sosyal-medya/ekle', [SocialMediaController::class, 'store'])->name('admin.socialmedia.store');
    Route::get('/sosyal-medya/{socialmediaId}/duzenle', [SocialMediaController::class, 'edit'])->name('admin.socialmedia.edit');
    Route::put('/sosyal-medya/{socialmediaId}/duzenle', [SocialMediaController::class, 'update'])->name('admin.socialmedia.update');
    Route::delete('/sosyal-medya/{socialmediaId}/sil', [SocialMediaController::class, 'destroy'])->name('admin.socialmedia.destroy');

    Route::get('/baslik', [HeaderController::class, 'index'])->name('admin.headers.index');
    Route::post('/baslik', [HeaderController::class, 'update'])->name('admin.headers.update');

    Route::get('/hakkimizda', [AboutController::class, 'index'])->name('admin.abouts.index');
    Route::post('/hakkimizda', [AboutController::class, 'update'])->name('admin.abouts.update');

    Route::prefix('proje')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('admin.projects.list');
        Route::get('ekle', [ProjectController::class, 'create'])->name('admin.projects.create');
        Route::post('ekle', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::get('{projectId}/duzenle', [ProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::put('{projectId}/duzenle', [ProjectController::class, 'update'])->name('admin.projects.update');
        Route::delete('{projectId}/sil', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

        Route::get('{projectId}/foto',[ProjectPhotoController::class, 'index'])->name('admin.projects.project-photos.list');
        Route::get('{projectId}/foto-ekle',[ProjectPhotoController::class, 'create'])->name('admin.projects.project-photos.create');
        Route::post('{projectId}/foto-ekle',[ProjectPhotoController::class, 'store'])->name('admin.projects.project-photos.store');
        Route::put('{projectId}/foto/{photoId}/duzenle',[ProjectPhotoController::class, 'updateMainPhoto'])->name('admin.projects.project-photos.editMainPhoto');
        Route::delete('{projectId}/foto/{photoId}/sil',[ProjectPhotoController::class, 'destroy'])->name('admin.projects.project-photos.destroy');
    });

    Route::prefix('kategori')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.list');
        Route::get('/ekle', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/ekle', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::delete('/{categoryId}/sil', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        Route::get('/{categoryId}/duzenle', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/{categoryId}/duzenle', [CategoryController::class, 'update'])->name('admin.categories.update');

    });

    Route::prefix('urun')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.list');
        Route::get('/ekle', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/ekle', [ProductController::class, 'store'])->name('admin.products.store');
        Route::delete('/{productId}/sil', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        Route::get('/{productId}/duzenle', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/{productId}/duzenle', [ProductController::class, 'update'])->name('admin.products.update');


        Route::get('{productId}/foto',[ProductPhotoController::class, 'index'])->name('admin.products.product-photos.list');
        Route::get('{productId}/foto-ekle',[ProductPhotoController::class, 'create'])->name('admin.products.product-photos.create');
        Route::post('{productId}/foto-ekle',[ProductPhotoController::class, 'store'])->name('admin.products.product-photos.store');
        Route::put('{productId}/foto/{photoId}/duzenle',[ProductPhotoController::class, 'updateMainPhoto'])->name('admin.products.product-photos.editMainPhoto');
        Route::delete('{productId}/foto/{photoId}/sil',[ProductPhotoController::class, 'destroy'])->name('admin.products.product-photos.destroy');
    });

    Route::get('profil',[AdminController::class,'showProfile'])->name('admin.showProfile');
    Route::post('profil-guncelle',[AdminController::class,'update'])->name('admin.update');
    Route::post('profil-sifre-degistir',[AdminController::class,'updatePassword'])->name('admin.updatePassword');


    Route::get('login',[AdminController::class,'showLogin'])->withoutMiddleware(['auth','admin'])->name('admin.showLogin');
    Route::post('login',[AdminController::class,'login'])->withoutMiddleware(['auth','admin'])->name('admin.login');
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
});

