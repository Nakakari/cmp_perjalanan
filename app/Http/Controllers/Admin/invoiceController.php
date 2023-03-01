<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_akunBank;
use App\Models\M_beaTambahanInvoice;
use App\Models\M_cabang;
use App\Models\M_detailInvoice;
use App\Models\M_invoice;
use Illuminate\Http\Request;
use App\Models\M_jabatan;
use App\Models\M_klaimInvoice;
use App\Models\M_pelanggan;
use App\Models\M_pengiriman;
use Illuminate\Support\Facades\DB;

class invoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'jab' => M_jabatan::getJab(),
            'cab' => M_cabang::getAll(),
        ];
        return view('Admin.Invoice.v_invoice', $data);
    }

    public function list_pelanggan(Request $request)
    {
        $columns = [
            'nama_perusahaan',
            'kota',
            'alamat',
            'nama_spv',
            'tlp_spv',
            'k_perusahaan',
            'email_prshn'
        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = M_pelanggan::select(
            'pelanggan.nama_perusahaan',
            DB::raw('COUNT(IF((pengiriman.is_buat = 0) AND (pengiriman.tipe_pembayaran = 1), 1, NULL)) as inv_blm_buat'),
            DB::raw('COUNT(IF(pengiriman.is_lunas = 0, 1, NULL)) as inv_blm_lunas'),
            DB::raw('COUNT(pengiriman.no_resi)'),
            'pelanggan.id_pelanggan'
        )
            ->leftjoin('pengiriman', 'pengiriman.id_pelanggan', '=', 'pelanggan.id_pelanggan')
            // ->where('pengiriman.tipe_pembayaran', '=', 1)
            ->groupBy('pelanggan.nama_perusahaan', 'pelanggan.id_pelanggan')
            ->orderBy('pengiriman.id_pelanggan', "desc");
        // DB::raw('COUNT(IF(pengiriman.is_buat = 0, IF(pengiriman.tipe_pembayaran = 1, 1, 1), 1)) as inv_blm_buat')
        if (request()->input("search.value")) {
            $data = $data->where(function ($query) {
                $query->whereRaw('LOWER(pelanggan.nama_perusahaan) like ?', ['%' . strtolower(request()->input("search.value")) . '%'])
                    ->orWhereRaw('LOWER(pelanggan.kota) like ?', ['%' . strtolower(request()->input("search.value")) . '%']);
            });
        }

        $recordsFiltered = $data->get()->count();
        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy, $request->input('order.0.dir'))->get();
        $recordsTotal = $data->count();
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
    }

    public function transPelanggan($id_pelanggan)
    {
        $id = base64_decode($id_pelanggan);
        $data = [
            'kondisi' => M_cabang::getKondisi(),
            'jab' => M_jabatan::getJab(),
            'cab' => M_cabang::getAll(),
            'getPerusahaan' => M_pelanggan::getNama($id),
            'id_pelanggan' => $id
        ];
        return view('Admin.Invoice.v_showPenjualanPelanggan', $data);
    }

    public function invPelanggan(Request $request, $id_pelanggan)
    {
        $id_pelanggan = base64_decode($id_pelanggan);
        $columns = [
            'id_pengiriman', 'no_resi', 'nama_penerima',
            'biaya', 'tipe_pembayaran',
            'nama_pengirim',  'dari_cabang'
        ];

        $orderBy = $columns[request()->input("order.0.column")];
        $data = (new M_pengiriman())->invPelanggan($id_pelanggan);

        if (request()->input("search.value")) {
            $data = $data->where(function ($query) {
                $query->whereRaw('LOWER(pengiriman.no_resi) like ?', ['%' . strtolower(request()->input("search.value")) . '%'])
                    ->orWhereRaw('LOWER(pengiriman.no_resi_manual) like ?', ['%' . strtolower(request()->input("search.value")) . '%'])
                    ->orWhereRaw('LOWER(pengiriman.kota_penerima) like ?', ['%' . strtolower(request()->input("search.value")) . '%'])
                    ->orWhereRaw('LOWER(pengiriman.nama_penerima) like ?', ['%' . strtolower(request()->input("search.value")) . '%'])
                    ->orWhereRaw('LOWER(pengiriman.nama_pengirim) like ?', ['%' . strtolower(request()->input("search.value")) . '%']);
            });
        }

        if (request()->input('dari') != null || request()->input('sampai') != null) {
            $data = $data->whereBetween('pengiriman.tgl_masuk', [request()->dari, request()->sampai]);
        }

        if (request()->input('kondisi') != null) {
            $data = $data->where('pengiriman.is_kondisi_resi', request()->kondisi);
        }

        $recordsFiltered = $data->get()->count();
        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy, $request->input('order.0.dir'))->get();
        $recordsTotal = $data->count();
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
    }

    public function reselect($id_invoice, M_invoice $invoice, M_detailInvoice $detail_invoice)
    {
        $id_invoice = base64_decode($id_invoice);
        $invoice = $invoice->where('id_invoice', $id_invoice)->first();
        $id_pelanggan = $invoice["id_pelanggan"];
        $detail_invoice = $detail_invoice->where('id_invoice', $id_invoice)->get();
        $arr = [744, 746];
        // foreach ($detail_invoice as $v) {
        //     $arr[] = $v['id_pengiriman'];
        // }
        $data = [
            'kondisi' => M_cabang::getKondisi(),
            'jab' => M_jabatan::getJab(),
            'cab' => M_cabang::getAll(),
            'getPerusahaan' => M_pelanggan::getNama($id_pelanggan),
            'id_pelanggan' => $id_pelanggan,
            'selected' => $arr,
        ];
        return view('Admin.Invoice.v_reselectInvoice', $data);
    }

    public function invoice($id_pelanggan)
    {
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'jab' => M_jabatan::getJab(),
            'getPerusahaan' => M_pelanggan::getNama(base64_decode($id_pelanggan)),
            'bank' => M_akunBank::getAll()
        ];
        return view('Admin.Invoice.v_buatInvoice', $data);
    }

    public function push_invoice(Request $request, $id_pelanggan)
    {
        // dd(request()->all());
        $this->validate($request, [
            'no_invoice' => ['required', 'max:255', 'unique:tbl_invoice'],
            'id_pengiriman' => 'required',
            'id_bank' => 'required',
            'jatuh_tempo' => 'required',
            'pembuat' => 'required',
            'mengetahui' => 'required',
            'diterbitkan' => 'required',
            'ppn' => 'required',
            'keterangan' => 'required',
        ]);

        $getid = $request->id_pengiriman;
        $id_pengiriman = explode(',', $getid);

        $data = M_pengiriman::whereIn('id_pengiriman', $id_pengiriman)
            ->get();

        $biaya_invoice = 0;
        foreach ($data as $role) {
            $biaya_invoice += $role->biaya;
        }

        $id = base64_decode($id_pelanggan);
        $klaim = $request->get('klaim');
        $nominal_klaim = $request->get('nominal_klaim');
        $bea_tambahan = $request->get('bea_tambahan');
        $nominal_bea = $request->get('nominal_bea');
        $ppn = $request->get('ppn');

        $klaim_total = 0;
        foreach ($klaim as $k => $key) {
            foreach ($nominal_klaim as $nk => $val) {
                if ($k == $nk) {
                    $klaim_total += str_ireplace(".", "", $val);
                }
            }
        }

        $bea_tambahan_total = 0;
        foreach ($bea_tambahan as $b => $bea) {
            foreach ($nominal_bea as $nb => $nom) {
                if ($b == $nb) {
                    $bea_tambahan_total += str_ireplace(".", "", $nom);
                }
            }
        }

        $ttl_biaya_invoice = $biaya_invoice + $bea_tambahan_total - $klaim_total;
        $get_ppn = $ppn / 100 * $ttl_biaya_invoice;
        $get_final_total = $ttl_biaya_invoice + $get_ppn;

        $data = new M_invoice();
        $data->no_invoice = $request->get('no_invoice');
        $data->id_bank = $request->get('id_bank');
        $data->jatuh_tempo = $request->get('jatuh_tempo');
        $data->pembuat = $request->get('pembuat');
        $data->mengetahui = $request->get('mengetahui');
        $data->diterbitkan = $request->get('diterbitkan');
        $data->ppn = $request->get('ppn');
        $data->keterangan = $request->get('keterangan');
        $data->biaya_invoice = $biaya_invoice;
        $data->ttl_biaya_invoice = $get_final_total;
        $data->id_pelanggan = $id;
        $data->is_lunas = 0;
        $data->save();

        M_pengiriman::whereIn('id_pengiriman', $id_pengiriman)
            ->update(['is_buat' => 1, 'is_lunas' => 0]);

        foreach ($id_pengiriman as $peng) {
            M_detailInvoice::create([
                'id_invoice' => $data->id_invoice,
                'id_pengiriman' => $peng
            ]);
        }

        $klaim_total = 0;
        foreach ($klaim as $k => $key) {
            foreach ($nominal_klaim as $nk => $val) {
                if ($k == $nk) {
                    M_klaimInvoice::create([
                        'id_invoice' => $data->id_invoice,
                        'klaim' => $key,
                        'nominal_klaim' => str_ireplace(".", "", $val),
                    ]);
                    $klaim_total += str_ireplace(".", "", $val);
                }
            }
        }

        $bea_tambahan_total = 0;
        foreach ($bea_tambahan as $b => $bea) {
            foreach ($nominal_bea as $nb => $nom) {
                if ($b == $nb) {
                    M_beaTambahanInvoice::create([
                        'id_invoice' => $data->id_invoice,
                        'bea_tambahan' => $bea,
                        'nominal_bea' => str_ireplace(".", "", $nom),
                    ]);
                    $bea_tambahan_total += str_ireplace(".", "", $nom);
                }
            }
        }

        return redirect('/piutang')->with('pesan', 'Data Berhasil Ditambah!!');
    }

    public function edit_invoice($id_invoice)
    {
        $id_invoice = base64_decode($id_invoice);
        $invoice = M_invoice::where('id_invoice', $id_invoice)->first();
        $id_pelanggan = $invoice['id_pelanggan'];
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'jab' => M_jabatan::getJab(),
            'getPerusahaan' => M_pelanggan::getNama($id_pelanggan),
            'bank' => M_akunBank::getAll(),
            'id_invoice' => $id_invoice,
            'detailInvoiceList' => M_detailInvoice::where('id_invoice', $id_invoice)->get(),
            'invoice' => $invoice,
        ];
        return view('Admin.Invoice.v_edit', $data);
    }
}
