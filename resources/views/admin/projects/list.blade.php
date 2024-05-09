@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Projeler</h5>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-end">
                                <div class="">
                                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i
                                            class="bi bi-file-earmark-plus-fill"></i> Proje Ekle</a>
                                </div>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Resim</th>
                                    <th>İsim (Şirket)</th>
                                    <th>Açıklama</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $index => $project)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td width="180">
                                            <a href="{{ route('admin.projects.project-photos.list', $project->id) }}"
                                                class="btn btn-sm btn-secondary me-2">
                                                <i class="bi bi-pencil"></i>
                                                Resim İşlemleri
                                            </a>
                                        </td>
                                        <td>{{ $project->client }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td width="250" class="text-center">
                                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i> Düzenle /
                                                İncele</a>
                                            <form class="d-inline"
                                                action="{{ route('admin.projects.destroy', $project->id) }}" method="post">
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
