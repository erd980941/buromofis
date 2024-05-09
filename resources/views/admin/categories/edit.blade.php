@extends('layouts.admin.app')

@section('content')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sosyal Medya Hesabı Ekle</h5>

                        <!-- Social Media Form Elements -->
                        <form method="POST" action="{{route('admin.categories.update',['categoryId'=>$category->id])}}" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Mevcut Resim</label>
                                <div class="col-sm-10">
                                    <img width="200" src="{{ asset(Storage::url($category->image)) }}" alt="Resim">
                                </div>
                            </div>

                            <hr>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Yeni Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="image" name="image" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Üst Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="parent">
                                        <option value="" {{ $category->parent_id === null ? 'selected' : '' }}>Ana Kategori</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $category->parent_id === $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="link" class="col-sm-2 col-form-label">Kategori Adı</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" required>
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
