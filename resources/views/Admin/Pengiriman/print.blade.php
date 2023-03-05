<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CETAK RESI</title>
    <style>
        body {
            padding: 0cm;
            margin: 0cm 0.5cm;
            transform: scale(1.1);
            transform-origin: 0 0;
        }

        table, th, td {
            border: 1px solid darkblue;
            border-collapse: collapse;
            color: darkblue;
        }

        th {
            padding: 4px;
            font-size: 9px
        }


        @page {
            size: A4 portrait;
            margin: 0cm;
        }
    </style>
</head>

<body>
    <div style="width: 14.5cm; height: 10cm; border: 2px solid black; padding: 8px; font-size: 10px; display: flex; flex-direction: column; gap: 4px">
        <div style="display: flex; justify-content: space-around;">
            <div>
                <img src="{{ url('') }}{{ logo_instansi() }}" class="logo-icon" alt="logo icon" style="height: 40px">
            </div>
            <div style="font-size: 20px; font-weight: 600; text-align: center">
                <div style="">
                    PT. Catur Mandiri Pertama
                </div>
                <div style="">
                    Divisi Cargo
                </div>
            </div>
            <div style="padding-top: 4px">
                <div> Tanggal: 06-Feb-2023 14:46 </div>
                <div>Print: SANDY, P:1</div>
                <div>SA - JKT - BDN</div>
            </div>
        </div>
        <div style="display: flex; justify-content: space-around;">
            <div>
                <div style="font-weight: 600; text-decoration: underline">Jakarta</div>
                <div>Komplek Jakarta Gudang</div>
                <div>Jl. Kampung Bandan No.1</div>
                <div>(021)-6914427</div>
            </div>
            <div>
                <div style="font-weight: 600; text-decoration: underline">Cirebon</div>
                <div>Stasiun Cirebon</div>
                <div>(021)-244601</div>
            </div>
            <div>
                <div style="font-weight: 600; text-decoration: underline">Semarang</div>
                <div>Stasiun Poncol</div>
                <div>(021)-3560357</div>
            </div>
            <div>
                <div style="font-weight: 600; text-decoration: underline">Surabaya</div>
                <div>Jl. Cepu Pintu 7</div>
                <div>.........</div>
            </div>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; gap: 4px; margin-bottom: 8px">
            <div style="width: 100%; height: 4px; background-color: blue; border-radius: 8px"></div>
            <div style="width: 95%; height: 4px; background-color: yellow; border-radius: 8px"></div>
        </div>
        <div style="display: flex; justify-content: space-around; margin-bottom: 18px">
            <div>
                <div style="font-weight: 600">Pengirim</div>
                <div>PT. Catur Mandiri Pertama</div>
                <div>Surabaya .0813-5772-3474</div>
            </div>
            <div>
                <div style="font-weight: 600">Penerima</div>
                <div>PT. Catur Mandiri Pertama</div>
                <div>Jkt Bdn</div>
            </div>
            <div>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAclBMVEX///8AAAD9/f3v7+/b29tqamp7e3tVVVUfHx88PDw2Njbs7Oz29vbn5+c/Pz/k5OSbm5txcXGurq4UFBSnp6fDw8O7u7uVlZW0tLTR0dGLi4saGhpKSkokJCQqKipOTk6GhoYMDAzW1tYwMDBjY2NbW1uGIljcAAACd0lEQVR4nO3Q3ZKaQBCGYRowOiM/q6DJRnbR1dz/LaanGyxNUZvKUZKqtw8Epmfm68csoyjq36iqLAv73epHa5U/9/K2rP17W2q3rOw9txPaa+9XFWXq5bYpnajL6arKlgo/d+/p0ty2cM+3mPLx3NTz24rHETy8nWM8P1VpjmmsvUifZa8iX/TGi2hdinnko8hZbxAZ/HuV2nLwS0RueqlIcxe+iBytIdarGpF6ztB68UE7GXWg0ZZKW/LwNPJGxGO8cbBNK+8FEbV+taXeRSJRH1GknfO/+T9jm97zBeEmdTaPwu8mHP179yzU6OI0638Raq8apFsQvslao9eLwncT7p6FO+81D8K9CzsJ+mikWxTGBWGOECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECFChAgRIkSIECHCvyKsTqlz+hNh96nwsiDcfCJ8M+Hqt8LehReJ+ghyWRReJ+ExRl3+iEEt+dhojXfhIUYdqw7BQ7Jz0HZ4tfc2hrOGDGF1F+5jVH17TZu0V63CsJ0ydCn6WPUYdhq9S1dFn+wjpPCkWDfBYq4TPU5Xpd4tNDpYb0sO0fCbPm5h8D+yj/HowrSp+ZFn1H9fPwEzGgnKJcL4jgAAAABJRU5ErkJggg==" style="width: 3cm; height: 0.7cm" alt="">
                <div style="font-weight: 600">
                    1234567890
                </div>
            </div>
        </div>
        <!-- Table -->
        <div style="text-transform: uppercase; text-align: center; font-weight: 600; font-size: 16px; color: darkblue">surat pengiriman</div>
        <table style="font-size: 12px; flex-grow: 1">
            <thead>
                <tr style="white-space: nowrap ;">
                    <th>BANYAKNYA</th>
                    <th>PACKING</th>
                    <th>ISI DAN JENIS BARANG MENURUT PENGAKUAN</th>
                    <th>BERAT - KG</th>
                    <th>BIAYA - Rp.</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align: center">
                    <td>content</td>
                    <td>content</td>
                    <td>content</td>
                    <td>content</td>
                    <td>content</td>
                    <td>content</td>
                </tr>
            </tbody>
        </table>
        <div style="margin-bottom: 18px">
            <span style="color: darkblue">
                Barang TELAH DITERIMA DENGAN BAIK, pada Tanggal, ....................... JAM ................
            </span>
            <span style="font-weight: 600; margin-left: 18px">TOTAL Rp 5.979.190</span>
        </div>

        <!-- Footer -->
        <div style="display: flex; justify-content: space-between; margin-top: auto; color: darkblue">
            <div style="display: flex; flex-direction: column; align-items: center">
                <div>Tanda Tangan Dan Cap</div>
                <div>Penerima Barang</div>
                <div style="margin-top: 10px">(...................................)</div>
            </div>
            <div style="display: flex; flex-direction: column; align-items: center">
                <div>Menyetujui</div>
                <div> a/n Pengirim</div>
                <div style="margin-top: 10px">(...................................)</div>
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: space-between">
                <div>Pengecer / Pengantar Barang</div>
                <div>(...................................)</div>
            </div>
            <div style="display: flex; flex-direction: column; align-items: center">
                <div>Hormat Kami</div>
                <div>Penerima Barang</div>
                <div style="margin-top: 10px">(...................................)</div>
            </div>
        </div>
    </div>
</body>

</html>
