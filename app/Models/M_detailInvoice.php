<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_detailInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_invoice',
        'id_pengiriman',
        'id_pelanggan'
    ];
    protected $table = 'tbl_detail_invoice';
    protected $primaryKey = 'id_detail_invoice';
    public $timestamps = false;
}
