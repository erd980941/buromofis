@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Proje Fotoğrafları</h5>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-end">
                                <div class="">
                                    <a href="{{ route('admin.projects.project-photos.create',['projectId'=>$project->id]) }}" class="btn btn-primary"><i
                                            class="bi bi-file-earmark-plus-fill"></i> Fotoğraf Ekle</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($photos as $photo)
                            <div class="col-lg-3 col-md-4">
                                <img class="img-fluid" src="{{asset(Storage::url($photo->photo_path))}}" >
                                @if ($project->main_photo_id===$photo->id)
                                    <span class="btn btn-success w-100 my-2">Ana Fotoğraf</span>
                                @else
                                    <form  method="POST" action="{{ route('admin.projects.project-photos.editMainPhoto', ['projectId' => $project->id, 'photoId' => $photo->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary w-100 my-2">
                                            Ana Fotoğraf Yap
                                        </button>
                                    </form>
                                @endif
                                <form  method="POST" action="{{ route('admin.projects.project-photos.destroy', ['projectId' => $project->id, 'photoId' => $photo->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100 my-2">
                                        Sil
                                    </button>
                                </form>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
