<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_detailKas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_detail_kas',
        'kas_id',
        'keterangan',
        'kredit',
        'debet',
        'created_at',
        'updated_at',
    ];
    protected $table = 'detail_kas';
    protected $primaryKey = 'id_kas';
    public $timestamps = true;

    public function getDetailkas($id_kas)
    {
        return M_detailKas::select([
            'detail_kas.id_detail_kas',
            'detail_kas.kas_id',
            'detail_kas.keterangan',
            'detail_kas.kredit',
            'detail_kas.debet',
        ])
            ->where('detail_kas.kas_id', $id_kas)
            ->orderBy('id_detail_kas', "asc");
    }

}
