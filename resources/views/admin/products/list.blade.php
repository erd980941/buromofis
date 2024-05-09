@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Ürünler Listesi</h5>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-end">
                                <div class="">
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i
                                            class="bi bi-file-earmark-plus-fill"></i> Ürün Ekle</a>
                                </div>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Resim</th>
                                    <th>İsim</th>
                                    <th>Açıklama</th>
                                    <th>Kategori</th>
                                    <th>Özellikler</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td width="180">
                                            <a href="{{ route('admin.products.product-photos.list', $product->id) }}"
                                                class="btn btn-sm btn-secondary me-2">
                                                <i class="bi bi-pencil"></i>
                                                Resim İşlemleri
                                            </a>
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->properties }}</td>
                                        <td width="250" class="text-center">
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i> Düzenle /
                                                İncele</a>
                                            <form class="d-inline"
                                                action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-x-octagon"></i> Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
