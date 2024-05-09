@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Genel Ayar Düzenle</h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="row mb-5">
                                <label class="col-sm-2 col-form-label">Mevcut Logo</label>
                                <div class="col-sm-10">
                                    <img width="200" src="{{ asset(Storage::url($setting->logo)) }}" alt="Logo">
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Yeni Logo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="logo" name="logo">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title (Başlık)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $setting->title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="url" class="col-sm-2 col-form-label">Site Url</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="url" name="url"
                                        value="{{ $setting->url }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ $setting->description }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keywords" name="keywords"
                                        value="{{ $setting->keywords }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="author" class="col-sm-2 col-form-label">Author</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="author" name="author"
                                        value="{{ $setting->author }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="zopim" class="col-sm-2 col-form-label">Zopim</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zopim" name="zopim"
                                        value="{{ $setting->zopim }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
