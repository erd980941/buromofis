@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Admin Bilgileri Düzenle</h5>

                        <!-- Contact Form Elements -->
                        <form class="needs-validation" novalidate method="POST" action="{{ route('admin.update') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">E-Posta</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ auth()->user()->email ?? '' }}"  >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-sm-2 col-form-label">İsim</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="name" name="name"
                                        value="{{ auth()->user()->name ?? '' }}" >
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                                </div>
                            </div>
                        </form><!-- End Contact Form Elements -->

                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Şifre Değiştir</h5>

                        <!-- Contact Form Elements -->
                        <form class="needs-validation" novalidate method="POST" action="{{ route('admin.updatePassword') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Mevcut Şifre</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-sm-2 col-form-label">Yeni Şifre</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-sm-2 col-form-label">Yeni Şifre Tekrar</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                                </div>
                            </div>
                        </form><!-- End Contact Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
