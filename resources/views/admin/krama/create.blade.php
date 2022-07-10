@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card p-5">
    @if (Str::length(Auth::guard('krama')->user()) > 0)
    <form action="{{ route('keluarga.store') }}" method="POST" enctype="multipart/form-data">
        @endif
        <form action="{{ route('krama.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Photo Profil -->
            <div class="d-flex justify-content-center">
                <img class="img-preview border border-primary mb-3 rounded-circle @error('ft') is-invalid @enderror" width="150" height="150">
            </div>
            <div class="row d-flex justify-content-center">
                <div class="form-group col-xl-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('ft') is-invalid @enderror foto" name="ft" id="real-file" onchange="previewImage()">
                        <label class="custom-file-label" id="custom-text">Pilih file</label>
                        @error('ft')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <!--- End Photo Profil -->
            <div class="row">
                <div class="form-group col">
                    <label for="nik" class="font-weight-normal">NIK</label>
                    <input type="text" name='nik' id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" placeholder="Nomor Induk Kependudukan...">
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="bnjr_adt">Banjar Adat</label>
                    <select name="bnjr_adt" id="banjar_adat" class="custom-select">
                        <option value="">---Pilih Banjar Adat---</option>
                        @foreach ($banjarAdat as $item)
                        <option value="{{ $item->id_banjar_adat }}" {{ old('bnjr_adt') == $item->id_banjar_adat ? 'selected' : null }}>{{ $item->nama_banjar_adat }}</option>
                        @endforeach
                    </select>
                    @error('bnjr_adt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="no_kk">No KK</label>
                    <input type="text" name='no_kk' id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" value="{{ old('no_kk') }}" placeholder="Nomor Kartu ...">
                    @error('no_kk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="tmpkn">Tempekan</label>
                    <select name="tmpkn" id="tempekan_id" class="custom-select">
                        <option value="">---Pilih Tempekan---</option>
                        @foreach ($tempekan as $item)
                        <option value="{{ $item->id_tempekan }}" {{ old('tmpkn') == $item->id_tempekan ? 'selected' : null }}>{{ $item->nama_tempekan }}</option>
                        @endforeach
                    </select>
                    @error('tmpkn')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="nm">Nama</label>
                    <input type="text" name='nm' id="nm" class="form-control @error('nm') is-invalid @enderror" value="{{ old('nm') }}" placeholder="Nama Lengkap...">
                    @error('nm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="jbt">Jabatan</label>
                    <select name="jbt" id="jbt" class="custom-select @error('jbt') is-invalid @enderror">
                        <option value="">---Pilih Jabatan---</option>
                        @foreach ( $jabatan as $item )
                        <option value="{{ $item->id }}" {{ old('jbt') == $item->id ? 'selected' : null }}>{{ $item->jabatan }}</option>
                        @endforeach
                    </select>
                    @error('jbt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="tmpt">Tempat Lahir</label>
                    <input type="text" name='tmpt' id="tmpt" class="form-control @error('tmpt') is-invalid @enderror" value="{{ old('tmpt') }}" placeholder="Tempat Lahir...">
                    @error('tmpt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="stts">Status Krama</label>
                    <select class="custom-select @error('stts') is-invalid @enderror" name="stts" id="stts">
                        <option value="">---Pilih Status Krama---</option>
                        @foreach ( $status_krama as $item )
                        <option value="{{ $item->id }}" {{ old('stts') == $item->id ? 'selected' : null }}>{{ $item->status_krama }}</option>
                        @endforeach
                    </select>
                    @error('stts')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="tgl">Tanggal Lahir</label>
                    <input type="date" name='tgl' id="tgl" class="form-control @error('tgl') is-invalid @enderror" value="{{ old('tgl') }}" placeholder="Tanggal Lahir...">
                    @error('tgl')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="nm_kt_ddy">Nama Ketua Dadya</label>
                    <select class="custom-select @error('nm_kt_ddy') is-invalid @enderror" name="nm_kt_ddy" id="nm_kt_ddy">
                        <option value="">---Pilih Nama Ketua Dadya---</option>
                        @foreach ( $dadya as $item )
                        <option value="{{ $item->id_ddy }}" {{ old('nm_kt_ddy') == $item->id_ddy ? 'selected' : null }}>{{ $item->nm_kt }}</option>
                        @endforeach
                    </select>
                    @error('nm_kt_ddy')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="stts_dlm_klrg">Status dalam Keluarga</label>
                    <select class="custom-select @error('stts_dlm_klrg') is-invalid @enderror" name="stts_dlm_klrg" id="stts_dlm_klrg">
                        <option value="">---Pilih Status dalam Keluarga---</option>
                        @foreach ( $status_keluarga as $item )
                        <option value="{{ $item->id }}" {{old('stts_dlm_klrg') == $item->id ? 'selected' : null}}>{{ $item->status_dalam_keluarga }}</option>
                        @endforeach
                    </select>
                    @error('stts_dlm_klrg')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="nm_ddy">Nama Dadya</label>
                    <select class="custom-select @error('nm_ddy') is-invalid @enderror" name="nm_ddy" id="nm_ddy">
                        <option value="">---Pilih Nama Dadya---</option>
                        @foreach ( $nmddy as $item )
                        <option value="{{ $item->id_ddys }}" {{ old('nm_ddy') == $item->id_ddy ? 'selected' : null }}>{{ $item->nm_ktd }}</option>
                        @endforeach
                    </select>
                    @error('nm_ddy')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="pndd">Pendidikan</label>
                    <select class="custom-select @error('pndd') is-invalid @enderror" name="pndd" id="pndd">
                        <option value="">---Pilih Pendidikan---</option>
                        @foreach ( $jenispendidikan as $item )
                        <option value="{{ $item->id_pendidikan }}" {{ old('pndd') == $item->id_pendidikan ? 'selected' : null }}>{{ $item->nama_pendidikan }}</option>
                        @endforeach
                    </select>
                    @error('pkrjn')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="pkrjn">Pekerjaan</label>
                    <select class="custom-select @error('pkrjn') is-invalid @enderror" name="pkrjn" id="pkrjn">
                        <option value="">---Pilih Pekerjaan---</option>
                        @foreach ( $jenispekerjaan as $item )
                        <option value="{{ $item->id_pekerjaan }}" {{ old('pkrjn') == $item->id_pekerjaan ? 'selected' : null }}>{{ $item->nama_pekerjaan }}</option>
                        @endforeach
                    </select>
                    @error('pkrjn')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="">Jenis Kelamin</label>
                    <div class="d-block">
                        <div class="custom-control custom-radio">
                            @foreach ($jenisKelamin as $kelamin)
                            <div class="custom-control-inline pr-3">
                                <input type="radio" id="{{ $kelamin->id }}" name="jk" class="custom-control-input @error('jk') is-invalid @enderror" value="{{ $kelamin->id }}" {{ old('jk') == $kelamin->id ? 'checked' : null }}>
                                <label class="custom-control-label fs-5" for="{{ $kelamin->id }}">{{ $kelamin->jenis_kelamin }}</label>
                            </div>
                            @endforeach
                            @error('jk')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group col">
                    <label for="ktrgn">Keterangan</label>
                    <select class="custom-select @error('ktrgn') is-invalid @enderror" name="ktrgn" id="ktrgn">
                        <option value="">---Pilih keterangan---</option>
                        @foreach ( $keterangan as $item )
                        <option value="{{ $item->id_keterangan }}" {{ old('ktrgn') == $item->id_keterangan ? 'selected' : null }}>{{ $item->nama_keterangan }}</option>
                        @endforeach
                    </select>
                    @error('ktrgn')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="password">Password</label>
                    <input type="text" name='password' id="password" class="form-control" placeholder="Password...">
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
</div>

<script>
    const realFileBtn = document.getElementById("real-file");
    const customTxt = document.getElementById("custom-text");

    realFileBtn.addEventListener("change", function() {
        if (realFileBtn.value) {
            customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(-)]+)$/)[1];
        } else {
            customTxt.innerHTML = "Choose file";
        }
    });

    function previewImage() {
        const image = document.querySelector('.foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@push('javascript')
<script>
    $(document).ready(function() {
        $('#banjar_adat').on('change', function() {
            var banjarAdatID = $(this).val();
            if (banjarAdatID) {
                $.ajax({
                    url: '/tempekan/' + banjarAdatID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#tempekan_id').empty();
                            $('#tempekan_id').append('<option hodden>Pilih Tempekan</option>');
                            $.each(data, function(key, tempekan_id) {
                                $('select[name="tmpkn"]').append('<option value="' + tempekan_id.id_tempekan + '">' + tempekan_id.nama_tempekan + '</option>');
                            });
                        } else {
                            $('#tempekan_id').empty();
                        }
                    }
                });
            } else {
                $('#tempekan_id').empty();
            }
        });
    });
</script>
@endpush
@endsection