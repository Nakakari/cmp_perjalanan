@extends('layouts.main')
@section('css')
    <style>
        .dataTables_length {
            padding-bottom: 15px;
        }

        .header-print {
            display: table-header-group;
        }
    </style>
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css"
          rel="stylesheet" />
@stop
@section('isi')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/admin/home"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Kas</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card radius-10">
        <div class="card-body">
            @if (session('pesan'))
                <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <strong>{{ session('pesan') }}</strong>.
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('gagal'))
                <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
                        </div>
                        <div class="ms-3">
                            <strong>{{ session('hapus') }}</strong>.
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (count($errors) > 0)
                <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
                        </div>
                        <div class="ms-3">
                            @foreach ($errors->all() as $error)
                                <h6 class="mb-0 text-danger">Wahh</h6>
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-2">Laporan Kas</h6>
                    <div class="col-12">
                        @foreach ($cab as $ca)
                            @if (Auth::user()->id_cabang == $ca->id_cabang)
                                <p>Daftar laporan kas dari cabang <b>{{ $ca->nama_kota }}
                                        ({{ $ca->kode_area }})
                                    </b>
                                </p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="dropdown ms-auto mb-2">
                    <button id="proses-data" class="btn btn-warning" onclick="prosesData()" disabled>Tambah
                        Data</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" style="width:100%" id="kas-dt">
                    <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Buat</th>
                        <th>Total Kredit</th>
                        <th>Total Debet</th>
                        <th>Sisa Saldo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            let bisa = {{$bisakah}};
            console.log(bisa);
            $("#proses-data").prop('disabled', bisa)
        });
        let list_kas = [];

        const table = $("#kas-dt").DataTable({
            "pageLength": 10,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All Data']
            ],
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "processing": true,
            "bServerSide": true,
            "order": [
                [1, "asc"]
            ],
            "scrollX": true,
            "ajax": {
                url: "{{ url('/list_kas/' . base64_encode($id_cabang)) }}",
                type: "POST",
                data: function(d) {
                    d._token = "{{ csrf_token() }}"
                }
            },
            "columnDefs": [{
                "targets": 0,
                "data": "id_kas",
                "sortable": false,
                "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                    list_kas[row.id_kas] = row;
                }
            }, {
                "targets": 1,
                "data": "tgl_buat",
                "sortable": false,
                "render": function(data, type, row, meta) {
                    return data;
                }
            }, {
                "targets": 2,
                "data": "t_kredit",
                "sortable": false,
                "render": function(data, type, row, meta) {
                    var kredit = new Intl.NumberFormat(['ban', 'id']).format(data);
                    if (kredit == 0) {
                        return 'Rp '+0;
                    } else {
                        return 'Rp '+kredit;
                    }
                }
            }, {
                "targets": 3,
                "data": "t_debet",
                "sortable": false,
                "render": function(data, type, row, meta) {
                    var debet = new Intl.NumberFormat(['ban', 'id']).format(data);
                    if (debet == 0) {
                        return 'Rp '+0;
                    } else {
                        return 'Rp '+debet;
                    }
                }
            },{
                "targets": 4,
                "data": "sisa_saldo",
                "sortable": false,
                "render": function(data, type, row, meta) {
                    var sisasaldo = new Intl.NumberFormat(['ban', 'id']).format(data);
                    if (sisasaldo == 0) {
                        return 'Rp '+0;
                    } else {
                        return 'Rp '+sisasaldo;
                    }
                }
            }, {
                "targets": 5,
                "data": "id_kas",
                "sortable": false,
                "render": function(data, type, row, meta) {
                    var url = "/detailkas/" + btoa(row.id_kas)
                    return `<div class="d-flex order-actions">
                            <a href=` + url + ` class="ms-3"><i class='lni lni-eye'></i></a>
                        </div>`;
                }
            }
            ]
        });

        function filter() {
            table.ajax.reload(null, false)
        }

        function prosesData() {
            window.location.href = "{{ url('/addKas/' . base64_encode($id_cabang)) }}";
        }
    </script>
@stop
