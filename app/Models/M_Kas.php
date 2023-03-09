<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Kas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kas',
        'tgl_buat',
        't_kredit',
        't_debet',
        'total',
        'sisa_saldo',
        'transfer',
        'created_by',
        'updated_by',
    ];
    protected $table = 'kas';
    protected $primaryKey = 'id_kas';
    public $timestamps = true;

    public function getListKas($id_cabang)
    {
        return M_Kas::query()->select([
            'kas.id_kas',
            'kas.tgl_buat',
            'kas.t_kredit',
            'kas.t_debet',
            'kas.total',
            'kas.sisa_saldo',
            'kas.transfer',
            'kas.cabang_id',
            'kas.created_by',
            'users.name',
        ])
            ->join('users', 'kas.created_by','=','users.id')
            ->where('kas.cabang_id', $id_cabang)
            ->orderBy('id_kas', "desc");
    }

    public static function getCreate($id_cabang)
    {
        $tgl_buat = Carbon::today()->toDateString();
        $kas = M_Kas::query()
            ->where('cabang_id','=',$id_cabang)
            ->where('tgl_buat','=',$tgl_buat)
            ->get();
        $hkas = count($kas);
        $hasil="";
        if ($hkas==0){
            $hasil="false";
        }else{
            $hasil="true";
        }

        return $hasil;
    }

    public static function getSisa($id_cabang)
    {
        $sisa = M_Kas::query()->where('cabang_id','=',$id_cabang)->latest()->first();
        if ($sisa == null){
            $sisa['sisa_saldo'] = 0;
        }
        return $sisa;
    }

    public static function getTgl($id_kas)
    {
        $detail = M_Kas::query()->find($id_kas);
        return $detail->tgl_buat;
    }

    public function getListCab()
    {
        return M_Kas::query()->select([
//            'kas.id_kas',
            'kas.cabang_id',
            'cabang.nama_kota',
            DB::raw('COUNT(IF(kas.cabang_id = cabang.id_cabang, 1, NULL)) as jkas'),
        ])
            ->join('cabang','kas.cabang_id','=','cabang.id_cabang')
            ->groupBy(
//                'kas.id_kas',
                'kas.cabang_id',
                'cabang.nama_kota'
            )
            ->orderBy('id_kas', "desc");
    }
}
