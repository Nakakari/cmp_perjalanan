@extends('layouts.main')

@section('isi')
    @if ($id_cabang == Auth::user()->id_cabang)
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sales / Counter</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/sales/home"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="/kas/{{ base64_encode(Auth::user()->id_cabang) }}"><i
                                    class="bx bx-wallet"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Laporan Kas</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
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
                    <div class="alert border-0 border-start border-5 border-warning alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-warning"><i class='bx bx-info-circle'></i>
                            </div>
                            <div class="ms-3">
                                <strong>{{ session('gagal') }}</strong>.
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
                                <h6 class="mb-0 text-danger">Wahh :(</h6>
                                <div>Mohon perhatikan lagi kelengkapan data!</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0 text-primary">Detail Laporan Kas</h5>
                        </div>
                        <hr>
                        <form id="form-addKas" class="row g-3" action="/upload/kas/{{ $id_cabang }}"
                              method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <label for="sisa_saldo" class="form-label">Sisa Saldo Kemarin</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Rp</span>
                                    <input id="sisa_saldo" type="text" class="form-control" name="sisa_saldo"
                                       value="{{number_format($sisa['sisa_saldo'], 0, ',', '.') ?: 0}}" readonly>
                                    <input id="cabang_id" type="hidden" class="form-control" name="cabang_id"
                                       value="{{ $id_cabang }}">
                                </div>

{{--                                @if ($errors->has('sisa_saldo'))--}}
{{--                                    <span class="text-danger">{{ $errors->first('sisa_saldo') }}</span>--}}
{{--                                @endif--}}
                            </div>
                            <div class="col-md-4" id="id_keterangan">
                                <label for="inputAddress" class="form-label">Keterangan</label>
                                <input type="text" name="ket[]" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-4" id="nominal_kredit">
                                <label for="inputAddress" class="form-label">Kredit</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text mb-2" id="addon-wrapping">Rp</span>
                                    <input type="input" id="kredit" name="kredit[]" value="{{ old('kredit[]') ?? 0 }}" class="form-control mb-2 dis"
                                       onkeyup="this.value = formatCurrency(this.value);" required />
                                </div>
                            </div>
                            <div class="col-md-4" id="nominal_debet">
                                <div class="align-items-center d-flex">
                                    <div class="col-md-12">
                                        <label for="inputAddress" class="form-label">Debet</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text mb-2" id="addon-wrapping">Rp</span>
                                            <input type="input" id="debet" name="debet[]" value="{{ old('kredit[]') ?? 0 }}" class="form-control mb-2 dis"
                                               onkeyup="this.value = formatCurrency(this.value);" required />
                                        </div>
                                    </div>
                                    <div class="dropdown mt-3">
                                        <div class="font-22 text-primary ps-2">
                                            <i class="fadeIn animated bx bx-plus-circle" id="buttonKlaim"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary button-prevent">Simpan</button>
                                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Whoops!</p>
    @endif
@stop
@section('js')
    <script type="text/javascript">
        let maxInputAllowed = 1;
        $(document).ready(function() {
            var max_fields = maxInputAllowed; //maximum input boxes allowed

            var kredit = $("#nominal_kredit"); //Fields wrapper
            var debet = $("#nominal_debet"); //Fields wrapper
            var keterangan = $("#id_keterangan"); //Fields wrapper

            var add_button = $("#buttonKlaim"); //Add button ID

            let idebet = document.getElementById("#debet");

            var x = 0; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    max_fields++; //text box increment
                    x++; //text box increment
                    console.log(x);
                    $(keterangan).append(
                        `<div class="input-group mb-2" id="new-ket` + x + `"><input placeholder="Keterangan" type="text" name="ket[]" class="form-control" required/>
                           </div>`
                    )
                    $(kredit).append(`
                        <div class="input-group mb-2" id="new-kredit` + x + `">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Rp</span>
                                <input placeholder="Nominal Kredit" type="input" id="kredit` + x + `" name="kredit[]" class="form-control dis"
                                value="{{ old('kredit[]') ?? 0 }}" onkeyup="this.value = formatCurrency(this.value);" required/>
                            </div>
                        </div>
                    `); //add input box
                    $(debet).append(`
                        <div class="mb-2 sould-remove align-items-center d-flex">
                            <div class="col-md-12">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Rp</span>
                                    <input placeholder="Nominal Debet" type="input" id="debet` + x + `" name="debet[]" class="form-control dis"
                                    value="{{ old('kredit[]') ?? 0 }}" onkeyup="this.value = formatCurrency(this.value);" required/>
                                </div>
                            </div>
                            <div class="dropdown">
                                <div class="font-22 text-primary ps-2">
                                    <i class="fadeIn animated bx bx-minus-circle remove_field"></i>
                                </div>
                            </div>
                        </div>
                    `); //add input box
                    disable1();
                } else {
                    warning_noti()
                }
            });

            $(debet).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                document.getElementById("new-ket" + x).remove();
                document.getElementById("new-kredit" + x).remove();
                $(this).parent('div').parent('div').parent('div').remove();
                x--;
            })

            disable1();

        });

        function hitungPembayaran() {
            let url = '{{ route('pengiriman.hitung-pembayaran') }}';
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    bea: $('#bea').val(),
                    bea_penerus: $("#bea_penerus").val(),
                    bea_packing: $("#bea_packing").val(),
                    // asuransi: $("#asuransi").val(),
                    asuransi: 0,
                }
            }).then(function(response) {
                $("#ttl_biaya").val(response.ttl_biaya)
            });
        }

        function disable1(){
            $('.dis').on('keyup', function (e) {
                e.preventDefault();
                let target = e.target.id;
                let target2 = "";
                let gtarget = target.search("kredit");
                let gtarget2 = target.search("debet");
                console.log(gtarget2);

                if (gtarget2 == -1){
                    target2 = target.replace("kredit","debet");
                }else if (gtarget == -1){
                    target2 = target.replace("debet","kredit");
                }
                if ($('#'+target).val()==0){
                    $('#'+target2).prop('readonly', false);
                }else{
                    $('#'+target2).val(0);
                    $('#'+target2).prop('readonly', true);
                }
            })
        }
    </script>
@stop
