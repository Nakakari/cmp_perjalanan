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
                    <li class="breadcrumb-item"><a href="/direksi/home"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="/laporan_kas">Laporan Kas Cabang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Kas Cabang {{$ncabang->nama_kota}}</li>
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
                        <p>Daftar laporan kas dari cabang <b>{{ $ncabang->nama_kota }}
                                ({{ $ncabang->kode_area }})
                            </b>
                        </p>
                    </div>
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
                        <th>Dibuat Oleh</th>
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
@section('modal')
    @foreach ($kas as $k)
        <div class="modal fade" id="modalEdit{{ $k->id_kas }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Transfer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="lni lni-wallet me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">Tambah Transfer</h5>
                                </div>
                                <hr>
                                <form class="row g-3" action="/tambah_transfer/{{base64_encode($id_cabang)}}/{{ $k->id_kas }}" method="POST"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-6">
                                        <label for="inputAddress" class="form-label">Keterangan Transfer</label>
                                        <input type="hidden" name="id_kas" value="{{ $k->id_kas }}">
                                        <input id="keterangan" type="text"
                                               class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" required>
                                        @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sisa_saldo" class="form-label">Nominal Transfer</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping">Rp</span>
                                            <input id="nominal" type="text" class="form-control" name="nominal" value="{{ old('nominal') ?? 0 }}"
                                                   onkeyup="this.value = formatCurrency(this.value);" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary ">Simpan</button>
                                        <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

@stop
@section('js')
    <script type="text/javascript">
        var last = {{$last['id_kas']}};

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
                url: "{{ url('/list_cabkas/' . base64_encode($id_cabang)) }}",
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

                    if (row.transfer != null) {
                        var tf = new Intl.NumberFormat(['ban', 'id']).format(row.transfer);
                        return 'Rp '+debet+' + Rp '+tf;
                    } else if (debet == 0) {
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
            },{
                "targets": 5,
                "data": "name",
                "sortable": false,
                "render": function(data, type, row, meta) {
                    return data;
                }
            }, {
                "targets": 6,
                "data": "id_kas",
                "sortable": false,
                "render": function(data, type, row, meta) {
                    var url = "{{ url('/detail_cabkas/' . base64_encode($id_cabang)) }}/" + btoa(data)

                    if (data == last){
                        return `<div class="d-flex order-actions">
                            <a href=` + url + ` class="ms-3"><i class='lni lni-eye'></i></a>
                            <a href="javascript:;" class="ms-3" data-bs-toggle="modal" data-bs-target="#modalEdit${data}"><i class='bx bxs-edit'></i></a>
                        </div>`;
                    } else{
                        return `<div class="d-flex order-actions">
                            <a href=` + url + ` class="ms-3"><i class='lni lni-eye'></i></a>
                        </div>`;
                    }
                }
            },
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
