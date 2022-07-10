@extends('layouts.main')

@push('style')
<style>
    .photo-profil img {
        width: 150px;
        height: 150px;
        border-radius: 100%;
    }
</style>
@endpush

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card p-5">
    <form action="{{ route('prajuru.update', $prajuru->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="d-flex justify-content-center photo-profil">
            <input type="hidden" name="oldFoto" value="{{ $prajuru->foto }}">
            @if ($prajuru->foto)
            <img src=" {{ asset('storage/' . $prajuru->foto) }} " x="0" y="0" width="100%" height="100%" class="img-preview border border-primary mb-3 @error('foto') is-invalid @enderror">
            @else
            <img class="img-preview border border-primary mb-3 rounded-circle @error('foto') is-invalid @enderror" width="150" height="150">
            @endif
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group col-xl-4">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror foto" name="foto" id="real-file" onchange="previewImage()">
                    <label class="custom-file-label" id="custom-text">Pilih file</label>
                    @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="nik" class="font-weight-normal">Nomor Induk Kependudukan</label>
                <input type="text" name='nik' id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $prajuru->nik) }}" placeholder="Nomor Induk Kependudukan...">
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="nama_pegawai">Nama</label>
                <input type="text" name='nama_pegawai' id="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid @enderror" value="{{ old('nama_pegawai', $prajuru->nama_pegawai) }}" placeholder="Nama ...">
                @error('nama_pegawai')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="jk">Jenis Kelamin</label>
                <select class="custom-select @error('jk') is-invalid @enderror" name="jk" id="jk">
                    <option value="">---Jenis Kelamin---</option>
                    @foreach ( $jenisKelamin as $item )
                    <option value="{{ $item->id }}" {{old('jk') == $item->id||$prajuru->jk == $item->id ? 'selected' : null}}>{{ $item->jenis_kelamin }}</option>
                    @endforeach
                </select>
                @error('jk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col">
                <label for="jabatan">Jabatan</label>
                <select name="jabatan" id="jabatan" class="custom-select @error('jabatan') is-invalid @enderror">
                    <option value="">---Pilih Jabatan---</option>
                    @foreach ( $jabatanPrajuru as $item )
                    <option value="{{ $item->id }}" {{ old('jabatan') == $item->id||$prajuru->jabatan == $item->id ? 'selected' : null }}>{{ $item->jabatan_prajuru }}</option>
                    @endforeach
                </select>
                @error('jabatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="banjar_adat">Banjar Adat</label>
                <select name="banjar_adat" id="banjar_adat" class="custom-select">
                    <option value="">---Pilih Banjar Adat---</option>
                    @foreach ($banjarAdat as $item)
                    <option value="{{ $item->id_banjar_adat }}" {{ old('banjar_adat') == $item->id_banjar_adat||$prajuru->banjar_adat == $item->id_banjar_adat ? 'selected' : null }}>{{ $item->nama_banjar_adat }}</option>
                    @endforeach
                </select>
                @error('banjar_adat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col">
                <label for="tempekan">Tempekan</label>
                <select name="tempekan_id" id="tempekan_id" class="custom-select">

                    <!-- <option value="{{ old($prajuru->tempekan->id_tempekan) }}" selected>{{ $prajuru->tempekan->nama_tempekan }}</option> -->
                    @foreach ($tempekan as $item)
                    <option value="{{ $item->id_tempekan }}" {{ old('tempekan_id') == $item->id_tempekan||$prajuru->tempekan_id == $item->id_tempekan ? 'selected' : null }}>{{ $item->nama_tempekan }}</option>
                    @endforeach
                </select>
                @error('tempekan_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="tangal_lahir">Tanggal Lahir</label>
                <input type="date" name='tangal_lahir' id="tangal_lahir" class="form-control @error('tangal_lahir') is-invalid @enderror" value="{{ old('tangal_lahir', $prajuru->tangal_lahir) }}" placeholder="Tanggal Lahir...">
                @error('tangal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="password">Password</label>
                <input type="text" name='password' id="password" class="form-control" placeholder="Password...">
            </div>
        </div>

        <div class="col-sm-12 d-flex justify-content-start">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection

@push('javascript')
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
                            $('#tempekan_id').append('<option hidden>Pilih Tempekan</option>');
                            $.each(data, function(key, tempekan_id) {
                                $('select[name="tempekan_id"]').append('<option value="' + tempekan_id.id_tempekan + '">' + tempekan_id.nama_tempekan + '</option>');
                            });
                        } else {
                            $('#tempekan_id').empty;
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