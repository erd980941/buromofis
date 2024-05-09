@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Proje Düzenle</h5>

                        <!-- Project Edit Form Elements -->
                        <form method="POST" action="{{ route('admin.projects.update', $project->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="client" class="col-sm-2 col-form-label">Müşteri</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="client" name="client" value="{{ $project->client }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Açıklama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description" value="{{ $project->description }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                                </div>
                            </div>
                        </form><!-- End Project Edit Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
