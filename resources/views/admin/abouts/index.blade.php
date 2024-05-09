@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hakkımızda Bilgilerini Düzenle</h5>

                        <!-- About Form Elements -->
                        <form method="POST" action="{{ route('admin.abouts.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Mevcut Resim</label>
                                <div class="col-sm-10">
                                    <img width="200" src="{{ asset(Storage::url($about->image)) }}" alt="Resim">
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Yeni Resim</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Başlık</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $about->title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="content" class="col-sm-2 col-form-label">İçerik</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="content" name="content"
                                              rows="5">{{ $about->content }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                                </div>
                            </div>
                        </form><!-- End About Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
