@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ürün Ekle</h5>

                        <!-- Product Form Elements -->
                        <form method="POST" action="{{ route('admin.products.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="" selected disabled>Kategori Seçin</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">İsim</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Açıklama</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="properties" class="col-sm-2 col-form-label">Özellikler</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="properties" name="properties" rows="3"></textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary w-100">Ekle</button>
                                </div>
                            </div>
                        </form><!-- End Product Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
