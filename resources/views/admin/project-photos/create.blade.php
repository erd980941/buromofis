@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Proje Fotoğraf Ekle</h5>

                        <!-- Project Form Elements -->
                        <form method="POST" action="{{ route('admin.projects.project-photos.store',['projectId'=>$projectId]) }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Photo Upload Section -->
                            <div class="row mb-3">
                                <label for="photos" class="col-sm-2 col-form-label">Fotoğraflar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="photos" name="photos[]" multiple required>
                                </div>
                            </div>
                            <!-- End Photo Upload Section -->

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary w-100">Ekle</button>
                                </div>
                            </div>
                        </form><!-- End Project Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
