@extends('layouts.admin.app')
@section('css')
<style>
    .category-tree ul {
        list-style-type: none;
    }
    .category-tree .sub-categories {
        display: none; /* Alt kategorileri varsayılan olarak gizle */
    }
    .category-tree .toggle-button {
        cursor: pointer; /* Tıklanabilir bir imleç göster */
        text-decoration: underline; /* Açılır/kapanır menüyü belirtmek için altı çizili görünüm */
    }

</style>
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-12 ">
                        <div class="card info-card sales-card pt-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Kategoriler</h5>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-end">
                                        <div class="">
                                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary"><i
                                                    class="bi bi-file-earmark-plus-fill"></i> Kayıt Ekle</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="category-tree">
                                    @foreach($categories as $category)
                                        <ul>
                                            <li>
                                                <details>
                                                    <summary class="btn btn-secondary mb-1" >
                                                        {{ $category->name }}
                                                        @include('admin.categories.delete-form', ['subcategory' => $category])
                                                    </summary>
                                                    <ul>
                                                        @include('admin.categories.subcategories', ['subcategories' => $category->children])
                                                    </ul>
                                                </details>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>
@endsection
