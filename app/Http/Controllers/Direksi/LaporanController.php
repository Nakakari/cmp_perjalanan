<?php

namespace App\Http\Controllers\Direksi;

use App\Http\Controllers\Controller;
use App\Models\M_cabang;
use App\Models\M_detailKas;
use App\Models\M_jabatan;
use App\Models\M_Kas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = [
            'jab' => M_jabatan::getJab(),
            'cab' => M_cabang::getAll(),
            'status' => M_cabang::getStatus(),
            'kondisi' => M_cabang::getKondisi(),
        ];
        return view('Direksi.Kas.v_cabang',$data);
    }

    public function listCab()
    {
        $columns = [
            'kas.id_kas',
            'cabang_id',
            'nama_kota',
        ];

        $orderBy = $columns[request()->input("order.0.column")];

        $data = (new M_Kas())->getListCab();

        $recordsFiltered = $data->get()->count(); //menghitung data yang sudah difilter

        if (request()->input("search.value")) {
            $data = $data->where(function ($query) {
                $query->whereRaw('LOWER(cabang.nama_cabang) like ?', ['%' . strtolower(request()->input("search.value")) . '%']);
            });
        }

        $data = $data
            ->skip(request()->input('start'))
            ->take(request()->input('length'))
            ->orderBy($orderBy, request()->input("order.0.dir"))
            ->get();
        $recordsTotal = $data->count();

        return response()->json([
            'draw' => request()->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
            'all_request' => request()->all()
        ]);
    }

    public function cabkas($id_cabang)
    {
        $id_cabang = base64_decode($id_cabang);
        $data = [
            'jab' => M_jabatan::getJab(),
            'kas' => M_kas::all(),
            'ncabang' => M_cabang::getNama($id_cabang),
            'id_cabang' => $id_cabang,
            'last' => M_Kas::getSisa($id_cabang),
        ];
        return view('Direksi.Kas.v_kas',$data);
    }

    public function listCabkas($id_cabang)
    {
        $id_cabang = base64_decode($id_cabang);
        $columns = [
            'tgl_buat',
            't_kredit',
            't_debet',
            'transfer',
            'sisa_saldo',
        ];

        $orderBy = $columns[request()->input("order.0.column")];

        $data = (new M_Kas())->getListKas($id_cabang);

        $recordsFiltered = $data->get()->count(); //menghitung data yang sudah difilter

        if (request()->input("search.value")) {
            $data = $data->where(function ($query) {
                $query->whereRaw('LOWER(kas.tgl_buat) like ?', ['%' . strtolower(request()->input("search.value")) . '%']);
            });
        }

        $data = $data
            ->skip(request()->input('start'))
            ->take(request()->input('length'))
            ->orderBy($orderBy, request()->input("order.0.dir"))
            ->get();
        $recordsTotal = $data->count();

        return response()->json([
            'draw' => request()->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
            'all_request' => request()->all()
        ]);
    }

    public function detail_cabkas($id_cabang,$id_kas)
    {
        $id_cabang = base64_decode($id_cabang);
        $id_kas = base64_decode($id_kas);
        $tgl = M_Kas::getTgl($id_kas);
        $data = [
            'jab' => M_jabatan::getJab(),
            'cab' => M_cabang::getAll(),
            'ncabang' => M_cabang::getNama($id_cabang),
            'id_cabang' => $id_cabang,
            'id_kas' => $id_kas,
            'tgl' => $tgl,
        ];
        return view('Direksi.Kas.v_detail',$data);
    }

    public function listdetailCabkas($id_cabang,$id_kas)
    {
//        $id_cabang = base64_decode($id_cabang);
        $id_kas = base64_decode($id_kas);
        $columns = [
            'keterangan',
            'kredit',
            'debet',
        ];

        $orderBy = $columns[request()->input("order.0.column")];

        $data = (new M_detailKas())->getDetailkas($id_kas);

        $recordsFiltered = $data->get()->count(); //menghitung data yang sudah difilter

        if (request()->input("search.value")) {
            $data = $data->where(function ($query) {
                $query->whereRaw('LOWER(detail_kas.keterangan) like ?', ['%' . strtolower(request()->input("search.value")) . '%']);
//                    ->orWhereRaw('LOWER(pengiriman.no_resi_manual) like ?', ['%' . strtolower(request()->input("search.value")) . '%'])
//                    ->orWhereRaw('LOWER(pengiriman.nama_pengirim) like ?', ['%' . strtolower(request()->input("search.value")) . '%'])
//                    ->orWhereRaw('LOWER(pengiriman.nama_penerima) like ?', ['%' . strtolower(request()->input("search.value")) . '%'])
//                    ->orWhereRaw('LOWER(pengiriman.kota_penerima) like ?', ['%' . strtolower(request()->input("search.value")) . '%']);
            });
        }

        $data = $data
            ->skip(request()->input('start'))
            ->take(request()->input('length'))
            ->orderBy($orderBy, request()->input("order.0.dir"))
            ->get();
        $recordsTotal = $data->count();

        return response()->json([
            'draw' => request()->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
            'all_request' => request()->all()
        ]);
    }

    public function tambah_transfer($id_cabang,$id_kas, Request $request){
        $id_cabang = base64_decode($id_cabang);
        $id_kas = $request->id_kas;
        $keterangan = $request->keterangan;
        $gnominal = $request->nominal;
        $transfer = str_ireplace(".", "", $gnominal);
        $gsisa = M_Kas::query()->find($id_kas)->sisa_saldo;
        $sisa_saldo = $transfer+$gsisa;

        M_detailKas::create([
            'kas_id' => $id_kas,
            'keterangan' => $keterangan,
            'kredit' => 0,
            'debet' => $transfer,
            'created_at' => Carbon::now(),
        ]);

//dd($transfer,$keterangan,$id_kas,$sisa_saldo,$gsisa);
        M_Kas::query()->where('id_kas','=',$id_kas)
            ->update([
                'transfer' => $transfer,
                'sisa_saldo' => $sisa_saldo,
            ]);
        return redirect('/cabkas/'.base64_encode($id_cabang))->with('pesan', 'Data Transfer Berhasil Ditambah!!');
//        dd($sisa_saldo,$id_cabang,$arrKet,$arrKredit,$arrDebet,$tkredit,$tdebet,$total,$data->id_kas);
    }

}
