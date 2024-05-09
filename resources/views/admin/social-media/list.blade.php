@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Genel Ayar Düzenle</h5>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-end">
                                <div class="">
                                    <a href="{{ route('admin.socialmedia.create') }}" class="btn btn-primary"><i
                                            class="bi bi-file-earmark-plus-fill"></i> Kayıt Ekle</a>
                                </div>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>İsim</th>
                                    <th>Link (Url)</th>
                                    <th>İkon</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($socialMedia as $index => $media)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $media->name }}</td>
                                        <td>{{ $media->link }}</td>
                                        <td><i class="{{ $media->icon }}"></i></td>
                                        <td width="250" class="text-center">
                                            <a href="{{ route('admin.socialmedia.edit', $media->id) }}"
                                                class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i> Düzenle /
                                                İncele</a>
                                            <form class="d-inline"
                                                action="{{ route('admin.socialmedia.destroy', $media->id) }}"
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
