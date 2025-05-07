<?php

namespace App\Livewire;

use App\Models\Antrian;
use App\Models\KategoriAntrian;
use Livewire\Component;

class AmbilAntrian extends Component
{
    public $kategoriList;
    public $nextAntrian = [];

    public function mount()
    {
        $this->kategoriList = KategoriAntrian::all();

        foreach ($this->kategoriList as $kategori) {
            $today = now()->toDateString();

            $this->nextAntrian[$kategori->kode] = Antrian::whereDate('tgl_antrian', $today)
                ->where('kategori_antrian_id', $kategori->id)
                ->count();
        }
    }


    public function ambilAntrian($kodeKategori)
    {
        $kategori = KategoriAntrian::where('kode', $kodeKategori)->firstOrFail();

        $prefix = strtoupper(substr($kategori->kode, 0, 1));
        $today = now()->toDateString();

        $lastAntrian = Antrian::whereDate('tgl_antrian', $today)
            ->where('kategori_antrian_id', $kategori->id)
            ->orderBy('nomor_antrian', 'desc')
            ->first();


        if ($lastAntrian) {
            $lastNumber = (int) substr($lastAntrian->nomor_antrian, 1);

            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $nomorBaru = $prefix . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        Antrian::create([
            'tgl_antrian' => $today,
            'kategori_antrian_id' => $kategori->id,
            'nomor_antrian' => $nomorBaru,
            'status_antrian' => '1',
        ]);

        $this->nextAntrian[$kodeKategori]++;
    }

    public function render()
    {
        return view('livewire.ambil-antrian');
    }
}
