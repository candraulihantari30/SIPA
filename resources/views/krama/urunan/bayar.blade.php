@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>

@endsection

@section('content')
<div class="card p-5">
    <form action="{{ route('iuran.update', $urunan_krama->id_irnw) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="d-flex justify-content-center">
            <img class="img-preview border border-primary mb-3 rounded-circle @error('bukti_pembayaran') is-invalid @enderror" width="150" height="150">
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group col-xl-4">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('bukti_pembayaran') is-invalid @enderror foto" name="bukti_pembayaran" id="real-file" onchange="previewImage()">
                    <label class="custom-file-label" id="custom-text">Pilih file</label>
                    @error('bukti_pembayaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col">
                <label for="nik" class="font-weight-normal">NIK Krama</label>
                <input type="text" name="nik_krama" id="nik" class="form-control @error('nik_krama') is-invalid @enderror" value="{{ old('nik_krama', $urunan_krama->nik_krama) }}" hidden>
                <input type="text" class="form-control" value="{{$urunan_krama->krama->nik}}" disabled>
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="nama" class="font-weight-normal">Nama</label>
                <input type="text" class="form-control" value="{{$urunan_krama->krama->nm}}" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="status_krama" class="font-weight-normal">NIK Krama</label>
                <input type="text" name="status_krama" id="status_krama" class="form-control @error('status_krama') is-invalid @enderror" value="{{ old('status_krama', $urunan_krama->status->status_krama) }}" disabled>
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="" class="font-weight-normal">Periode</label>
                <input type="text" name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror" value="{{ old('periode', $urunan_krama->periode) }}" disabled>
                @error('periode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="jumlah_iuran" class="font-weight-normal">Jumlah Urunan</label>
                <input type="text" name="jumlah_iuran" id="jumlah_iuran" class="form-control @error('jumlah_iuran') is-invalid @enderror" value="{{ old('jumlah_iuran', $urunan_krama->jumlah_iuran) }}" disabled>
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
@endsection