<?php

namespace App\Livewire;

use App\Models\Antrian;
use App\Models\KategoriAntrian;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

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
        $this->printAntrian($nomorBaru);
    }

    public function printAntrian($nomorAntrian)
    {
        try {
            $printerName = 'EPSON TM-U220';
            $connector = new WindowsPrintConnector($printerName);

            $printer = new Printer($connector);
            $printer->setJustification(Printer::JUSTIFY_CENTER);

            $printer->text("Rumah Sakit XYZ\n");
            $printer->text("Nomor Antrian\n");

            $printer->feed(2);

            $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH | Printer::MODE_DOUBLE_HEIGHT);

            $printer->setEmphasis(true);
            $printer->text($nomorAntrian . "\n");
            $printer->setEmphasis(false);

            $printer->selectPrintMode();

            $printer->feed(2);

            $printer->text("Terima kasih telah\n");
            $printer->text("menggunakan layanan kami\n");


            $printer->feed(2);
            $printer->cut();
            $printer->close();

            session()->flash('success', "Antrian berhasil dicetak: $nomorAntrian");
        } catch (\Exception $e) {
            Log::error("Gagal mencetak antrian: " . $e->getMessage());
            session()->flash('error', 'Gagal mencetak: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.ambil-antrian');
    }
}
