<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class instansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('instansi')->insert([
        //     'title' => 'Aisysaeexpress',
        //     'nama' => "PT. Aisy Sae Bersaudara",
        //     'singkatan' => 'ASB',
        //     'logo' => "/img_aplikasi/icon.png",
        //     'alamat' => "Kantor pusat JL. Semut Kali, Ruko Semut Indah Blok B No.14 Surabaya",
        //     'telp' => "031-99220818",
        //     'website' => "aisysaeexpress.com",
        //     'informasi' => 'Dengan diterbitkannya resi ini, maka pelanggan telah menyetujui syarat dan
        //                         ketentuan yang berlaku di PT. KonyaKonya
        //                         ;CUSTOMER SERVICE : wa (0000000000000), Telp (000000000000000)
        //                         ;Informasi Syarat dan Ketentuan, Lacak resi pengiriman barang dapat dilihat
        //                         melalui website : www.anakgoogle.com
        //                             ',
        //     'created_by' => 1,
        //     'updated_by' => 1,
        // ]);
        // DB::table('instansi')->insert([
        //     'title' => 'DemoAplikasiKodeIn',
        //     'nama' => "PT. Kode In Dong",
        //     'singkatan' => 'KID',
        //     'logo' => "/img_aplikasi/icon.png",
        //     'alamat' => "Jl. Cendrawasih No. 90, Ngawi Regency, Jawa Timur Ke Barat-Baratan",
        //     'telp' => "032-0000000",
        //     'wa' => '+6287777777777',
        //     'website' => "kodein.tech",
        //     'email' => 'demo@mail.com',
        //     'informasi' => 'Dengan diterbitkannya resi ini, maka pelanggan telah menyetujui syarat dan
        //                         ketentuan yang berlaku di PT. KonyaKonya
        //                         ;CUSTOMER SERVICE : wa (0000000000000), Telp (000000000000000)
        //                         ;Informasi Syarat dan Ketentuan, Lacak resi pengiriman barang dapat dilihat
        //                         melalui website : www.anakgoogle.com
        //                             ',
        //     'created_by' => 1,
        //     'updated_by' => 1,
        // ]);
        DB::table('instansi')->insert([
            'title' => 'CaturMandiriPertama',
            'nama' => "PT. Catur Mandiri Pertama",
            'singkatan' => 'CMP',
            'logo' => "/img_aplikasi/CMP/logo.png",
            'alamat' => "Jl. Cendrawasih No. 90, Ngawi Regency, Jawa Timur Ke Barat-Baratan",
            'telp' => "032-0000000",
            'wa' => '+6287777777777',
            'website' => "cmp.kodein.tech",
            'email' => 'demo@mail.com',
            'informasi' => 'Dengan diterbitkannya resi ini, maka pelanggan telah menyetujui syarat dan
                                ketentuan yang berlaku di PT. KonyaKonya
                                ;CUSTOMER SERVICE : wa (0000000000000), Telp (000000000000000)
                                ;Informasi Syarat dan Ketentuan, Lacak resi pengiriman barang dapat dilihat
                                melalui website : www.anakgoogle.com
                                    ',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
