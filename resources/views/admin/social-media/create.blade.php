@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sosyal Medya Hesabı Ekle</h5>

                        <!-- Social Media Form Elements -->
                        <form method="POST" action="{{ route('admin.socialmedia.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">İsim</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="link" class="col-sm-2 col-form-label">Link (Url)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="link" name="link" value="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="icon" class="col-sm-2 col-form-label">İkon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="icon" name="icon" value="" required>
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
