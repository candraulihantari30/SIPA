@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card p-5">
    <form action="{{ route('prajuru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-center">
            <img class="img-preview border border-primary mb-3 rounded-circle @error('foto') is-invalid @enderror" width="150" height="150">
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
                <input type="text" name='nik' id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" placeholder="Nomor Induk Kependudukan...">
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="nama_pegawai">Nama</label>
                <input type="text" name='nama_pegawai' id="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid @enderror" value="{{ old('nama_pegawai') }}" placeholder="Nama ...">
                @error('nama_pegawai')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">

            <div class="form-group col">
                <label for="tempat">Tempat Lahir</label>
                <input type="text" name='tempat' id="tempat" class="form-control @error('tempat') is-invalid @enderror" value="{{ old('tempat') }}" placeholder="Tempat Lahir...">
                @error('tempat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="tangal_lahir">Tanggal Lahir</label>
                <input type="date" name='tangal_lahir' id="tangal_lahir" class="form-control @error('tangal_lahir') is-invalid @enderror" value="{{ old('tangal_lahir') }}" placeholder="Tanggal Lahir...">
                @error('tangal_lahir')
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
                    <option value="{{ $item->id }}" {{ old('jabatan') == $item->id ? 'selected' : null }}>{{ $item->jabatan_prajuru }}</option>
                    @endforeach
                </select>
                @error('jabatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="">Jenis Kelamin</label>
                <div class="d-block">
                    <div class="custom-control custom-radio">
                        @foreach ($jenisKelamin as $item)
                        <div class="custom-control-inline pr-3">
                            <input type="radio" id="{{ $item->id }}" name="jk" class="custom-control-input @error('jk') is-invalid @enderror" value="{{ $item->id }}" {{ old('jk') == $item->id ? 'checked' : null }}>
                            <label class="custom-control-label fs-5" for="{{ $item->id }}">{{ $item->jenis_kelamin }}</label>
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
        </div>

        <div class="row">
            <div class="form-group col">
                <label for="banjar_adat">Banjar Adat</label>
                <select name="banjar_adat" id="banjar_adat" data-placeholder="Select" class="custom-select">
                    <option value="">---Pilih Banjar Adat---</option>
                    @foreach ($banjarAdat as $item)
                    <option value="{{ $item->id_banjar_adat }}" {{ old('banjar_adat') == $item->id_banjar_adat ? 'selected' : null }}>{{ $item->nama_banjar_adat }}</option>
                    @endforeach
                </select>
                @error('banjar_adat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="tempekan">Tempekan</label>
                <select name="tempekan_id" id="tempekan_id" data-placeholder="Select" class="custom-select">
                    <option value="">---Pilih Tempekan---</option>
                    @foreach ($tempekan as $item)
                    <option value="{{ $item->id_tempekan }}" {{ old('tempekan_id') == $item->id_tempekan ? 'selected' : null }}>{{ $item->nama_tempekan }}</option>
                    @endforeach
                </select>
                @error('tempekan_id')
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
                                $('select[name="tempekan_id"]').append('<option value="' + tempekan_id.id_tempekan + '">' + tempekan_id.nama_tempekan + '</option>');
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