@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">İletişim Bilgileri Düzenle</h5>

                        <!-- Contact Form Elements -->
                        <form method="POST" action="{{ route('admin.contacts.update') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Adres</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $contact->address ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-sm-2 col-form-label">Şehir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="city" name="city"
                                        value="{{ $contact->city ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="district" class="col-sm-2 col-form-label">İlçe</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="district" name="district"
                                        value="{{ $contact->district ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone1" class="col-sm-2 col-form-label">Telefon 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone1" name="phone1"
                                        value="{{ $contact->phone1 ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone2" class="col-sm-2 col-form-label">Telefon 2</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone2" name="phone2"
                                        value="{{ $contact->phone2 ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                        value="{{ $contact->whatsapp ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">E-posta</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $contact->email ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="map" class="col-sm-2 col-form-label">Harita</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="map" name="map" rows="3">{{ $contact->map ?? '' }}</textarea>
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
