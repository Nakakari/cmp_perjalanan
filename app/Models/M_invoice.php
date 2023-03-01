<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_invoice',
        'id_pengiriman',
        'id_bank',
        'jatuh_tempo',
        'pembuat',
        'mengetahui',
        'diterbitkan',
        'klaim',
        'nominal_f',
        'bea_tambahan',
        'nominal_s',
        'ppn',
        'keterangan',
    ];
    protected $table = 'tbl_invoice';
    protected $primaryKey = 'id_invoice';
    public $timestamps = true;

    public function klaim()
    {
        return $this->hasMany(M_klaimInvoice::class, 'id_invoice', 'id_invoice');
    }
}
