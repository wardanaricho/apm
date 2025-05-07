@extends('layouts.app')

@section('title', 'Menu Pendaftaran Mandiri')

@section('content')
    <div>
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark">Anjungan Pasien Mandiri</h2>
            <p class="text-muted fs-5">Silakan pilih layanan yang tersedia</p>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="menu-card bright-blue">
                    <img src="{{ asset('icon/poliklinik.png') }}" width="30%" alt="">
                    <div class="menu-label">Pendaftaran Poliklinik</div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <a href="/antrian-view" class="text-decoration-none">
                    <div class="menu-card bright-yellow">
                        <img src="{{ asset('icon/antrian.png') }}" width="30%" alt="">
                        <div class="menu-label">Antrian Loket</div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-4">
                <div class="menu-card bright-red">
                    <img src="{{ asset('icon/sep-kontrol.png') }}" width="30%" alt="">
                    <div class="menu-label">SEP Kontrol</div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="menu-card bright-green" data-bs-toggle="modal" data-bs-target="#checkInModal"
                    style="cursor: pointer;">
                    <img src="{{ asset('icon/check-in.png') }}" width="30%" alt="">
                    <div class="menu-label">Checkin Mobile JKN</div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="menu-card bright-cyan">
                    <img src="{{ asset('icon/sep.png') }}" width="30%" alt="">
                    <div class="menu-label">Pasien JKN</div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="menu-card bright-purple">
                    <img src="{{ asset('icon/kontrol.png') }}" width="30%" alt="">
                    <div class="menu-label">Kontrol Beda POLI</div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="menu-card bright-orange">
                    <img src="{{ asset('icon/aktivasi.png') }}" width="30%" alt="">
                    <div class="menu-label">Aktivasi Satu Sehat</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="checkInModal" tabindex="-1" aria-labelledby="checkInModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkInModalLabel">Checkin Mobile JKN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ini adalah konten modal fullscreen.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success">Selesai</button>
                </div>
            </div>
        </div>
    </div>
@endsection
