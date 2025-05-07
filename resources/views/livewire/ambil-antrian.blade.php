<div>
    <div class="mb-4">
        <a href="{{ url('/') }}" class="btn btn-outline-dark px-4 py-2 rounded-3 shadow-sm">
            ← Kembali
        </a>
    </div>

    <div class="text-center mb-4">
        <h2 class="fw-bold text-dark">Ambil Antrian</h2>
        <p class="text-muted fs-5">Pilih kategori antrian sesuai kebutuhan Anda</p>
    </div>

    <div class="row g-4 mt-3">
        @foreach ($kategoriList as $kategori)
            @php
                $kategoriLower = strtolower($kategori->kategori_antrian);
                $warna = match (true) {
                    str_contains($kategoriLower, 'bpjs lama') => 'danger',
                    str_contains($kategoriLower, 'bpjs baru') => 'success',
                    str_contains($kategoriLower, 'asuransi') => 'warning',
                    str_contains($kategoriLower, 'umum') => 'secondary',
                    default => 'primary',
                };
            @endphp

            <div class="col-md-12 col-lg-12">
                <button wire:click="ambilAntrian('{{ $kategori->kode }}')"
                    class="btn btn-{{ $warna }} w-100 py-4 px-4 rounded-4 shadow border-0 text-white"
                    style="min-height: 100px; font-size: 1.5rem; font-weight: 700;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-start">
                            <div>{{ $kategori->kategori_antrian }}</div>
                            <div class="fs-6 fw-normal">{{ $kategori->nama }}</div>
                        </div>
                        <div class="text-end fs-3">
                            {{ $kategori->kode }} {{ $nextAntrian[$kategori->kode] ?? 0 }}
                        </div>
                    </div>
                </button>
            </div>
        @endforeach
    </div>
</div>
