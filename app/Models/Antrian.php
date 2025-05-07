<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'apm_antrian';

    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(KategoriAntrian::class, 'kategori_antrian_id');
    }
}
