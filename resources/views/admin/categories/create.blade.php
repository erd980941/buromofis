@extends('layouts.admin.app')

@section('content')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sosyal Medya Hesabı Ekle</h5>

                        <!-- Social Media Form Elements -->
                        <form method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data" >
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Üst Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="parent" >
                                        <option value="" selected >Ana Kategori</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Kategori Adı</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Fotoğraf</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="image" name="image" value="" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary w-100">Ekle</button>
                                </div>
                            </div>
                        </form><!-- End Social Media Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
