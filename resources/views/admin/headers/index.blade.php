@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Başlık Bilgilerini Düzenle</h5>

                        <!-- Header Form Elements -->
                        <form method="POST" action="{{ route('admin.headers.update') }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-5">
                                <label class="col-sm-2 col-form-label">Mevcut Foto</label>
                                <div class="col-sm-10">
                                    <img width="200" src="{{ asset(Storage::url($header->background_image)) }}" alt="Başlık Foto">
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="background_image" class="col-sm-2 col-form-label">Arka Plan Resmi</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="background_image" name="background_image"
                                        value="{{ $header->background_image ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="slogan" class="col-sm-2 col-form-label">Slogan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $header->title ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="slogan" class="col-sm-2 col-form-label">Alt Slogan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                                        value="{{ $header->subtitle ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                                </div>
                            </div>
                        </form><!-- End Header Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
