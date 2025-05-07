<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\KategoriAntrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function antrianView()
    {
        $kategoriList = KategoriAntrian::all();

        foreach ($kategoriList as $kategori) {
            $today = now()->toDateString();

            $totalAntrianToday = Antrian::whereDate('tgl_antrian', $today)
                ->where('kategori_antrian_id', $kategori->id)
                ->count();

            $nextAntrian = $totalAntrianToday + 1;

            $kategori->total_antrian_today = $totalAntrianToday;
            $kategori->next_antrian = $nextAntrian;
        }

        return view('antrian.ambil', compact('kategoriList'));
    }

    public function antrianAmbil($kode)
    {
        $kategori = KategoriAntrian::where('kode', $kode)->firstOrFail();

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

        $nomorBaru = $prefix . $nextNumber;
        // dd($nomorBaru);

        $antrian = Antrian::create([
            'tgl_antrian' => $today,
            'kategori_antrian_id' => $kategori->id,
            'nomor_antrian' => $nomorBaru,
            'status_antrian' => '1',
        ]);

        return redirect()->back()->with('success', "Nomor antrian Anda: $nomorBaru");
    }
}
