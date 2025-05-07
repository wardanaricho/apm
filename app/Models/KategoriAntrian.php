<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriAntrian extends Model
{
    protected $table = 'apm_kategori_antrian';

    public function antrian()
    {
        return $this->hasMany(Antrian::class, 'kategori_antrian_id');
    }
}
