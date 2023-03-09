<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\M_beaTambahanInvoice;
use App\Models\M_cabang;
use App\Models\M_detailKas;
use App\Models\M_invoice;
use App\Models\M_jabatan;
use App\Models\M_Kas;
use App\Models\M_pelanggan;
use App\Models\M_pengiriman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasController extends Controller
{
    public function index($id_cabang)
    {
        $id_cabang = base64_decode($id_cabang);
        $cab = M_cabang::getAll();
        $jab =  M_jabatan::getJab();
        $bisakah = M_Kas::getCreate($id_cabang);
        return view('Sales.Kas.v_kas', compact('bisakah','cab', 'id_cabang', 'jab'));
    }

    public function listKas($id_cabang)
    {
        $id_cabang = base64_decode($id_cabang);
        $columns = [
            'tgl_buat',
            't_kredit',
            't_debet',
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

    public function add($id_cabang)
    {
        $id_cabang = base64_decode($id_cabang);
        $cab = M_cabang::getAll();
        $jab =  M_jabatan::getJab();
        $sisa = M_Kas::getSisa($id_cabang);
//        dd($sisa);
        return view('Sales.Kas.v_addKas', compact('sisa','jab', 'cab', 'id_cabang'));
    }

    public function uploadKas($id_cabang, Request $request){
        $gsisa_saldo = $request->get('sisa_saldo');
        $sisa_saldo = str_ireplace(".", "", $gsisa_saldo);
        $id_cab = $request->id_cabang;
        $arrKet2 = $request->get('ket');
        $arrKredit2 = $request->get('kredit');
        $arrDebet2 = $request->get('debet');
        $tgl_buat = Carbon::today()->toDateString();
        $created_by = auth()->user()->id;

        if ($sisa_saldo < 0){
            $kresisa = str_ireplace("-", "", $sisa_saldo);
            $debsisa = 0;
        }elseif ($sisa_saldo >= 0){
            $kresisa = 0;
            $debsisa = $sisa_saldo;
        }

        $arrKet1 = array_reverse($arrKet2);
        array_push($arrKet1,"Sisa Saldo");
        $arrKet = array_reverse($arrKet1);

        $arrKredit1 = array_reverse($arrKredit2);
        array_push($arrKredit1,$kresisa);
        $arrKredit = array_reverse($arrKredit1);

        $arrDebet1 = array_reverse($arrDebet2);
        array_push($arrDebet1,$debsisa);
        $arrDebet = array_reverse($arrDebet1);

//        dd($arrKet,$arrKredit,$arrDebet);

        $tkredit = 0;
        $tdebet = 0;
        $total = 0;

        $data = new M_Kas();
        $data->tgl_buat = $tgl_buat;
        $data->created_by = $created_by;
        $data->t_kredit = $tkredit;
        $data->t_debet = $tdebet;
        $data->total = $total;
        $data->sisa_saldo = $total;
        $data->cabang_id = $id_cab;
        $data->save();

        foreach ($arrKet as $k => $key) {
            foreach ($arrKredit as $nk => $val) {
                if ($k == $nk) {
                    $tkredit += str_ireplace(".", "", $val); //hitung total kredit
                }
            }
            foreach ($arrDebet as $nb => $val) {
                if ($k == $nb) {
                    $tdebet += str_ireplace(".", "", $val); //hitung total debet
                }
            }
            M_detailKas::create([
                'kas_id' => $data->id_kas,
                'keterangan' => $key,
                'kredit' => str_ireplace(".", "", $arrKredit[$k]),
                'debet' => str_ireplace(".", "", $arrDebet[$k]),
                'created_at' => Carbon::now(),
            ]);
        }

        $total += $tdebet-$tkredit;

        M_Kas::query()->where('id_kas','=',$data->id_kas)
            ->update([
                'total' => $total,
                'sisa_saldo' => $total,
                't_kredit' => $tkredit,
                't_debet' => $tdebet,
        ]);
        return redirect('/kas/'.base64_encode($id_cabang))->with('pesan', 'Data Berhasil Ditambah!!');
//        dd($sisa_saldo,$id_cabang,$arrKet,$arrKredit,$arrDebet,$tkredit,$tdebet,$total,$data->id_kas);
    }

    public function detail($id_kas)
    {
//        $id_cabang = base64_decode($id_cabang);
        $id_kas = base64_decode($id_kas);
        $cab = M_cabang::getAll();
        $jab =  M_jabatan::getJab();
        $tgl = M_Kas::getTgl($id_kas);
        return view('Sales.Kas.v_detailkas', compact('id_kas','tgl','cab', 'jab'));
    }

    public function listdetailKas($id_kas)
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
}
