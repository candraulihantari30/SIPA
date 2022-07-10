@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>

@endsection

@section('content')
<div class="card p-5">
    <form action="{{ route('JadwalKegiatan.update', $jdl->id_kegiatan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="form-group col">
                <label for="nm_kgtn" class="font-weight-normal">Rencana Kegiatan</label>
                <input type="text" name='nm_kgtn' id="nm_kgtn" class="form-control @error('nm_kgtn') is-invalid @enderror" value="{{ old('nm_kgtn', $jdl->nm_kgtn) }}" placeholder="Rencana Kegiatan...">
                @error('nm_kgtn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="peserta">Peserta</label>
                <input type="text" name='peserta' id="peserta" class="form-control @error('peserta  ') is-invalid @enderror" value="{{ old('peserta', $jdl->peserta) }}" placeholder="Peserta...">
                @error('peserta')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="interval">Interval</label>
                <input type="text" name='interval' id="interval" class="form-control @error('interval') is-invalid @enderror" value="{{ old('interval', $jdl->interval) }}" placeholder="Interval...">
                @error('interval')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col">
                <label for="tmpt">Tempat</label>
                <input type="text" name='tmpt' id="tmpt" class="form-control @error('tmpt') is-invalid @enderror" value="{{ old('tmpt', $jdl->tmpt) }}" placeholder="Tempat...">
                @error('tmpt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="tgl">Tanggal</label>
                <input type="date" name='tgl' id="tgl" class="form-control @error('tgl') is-invalid @enderror" value="{{ old('tgl', $jdl->tgl) }}" placeholder="Tanggal...">
                @error('tgl')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="jam">Jam</label>
                <input type="text" name='jam' id="jam" class="form-control @error('jam') is-invalid @enderror" value="{{ old('jam', $jdl->jam) }}" placeholder="Jam...">
                @error('jam')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-sm-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
</div>
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