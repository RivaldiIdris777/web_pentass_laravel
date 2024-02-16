@extends('frontend.app')
<!-- ======= Hero Section ======= -->
<main id="main">
    
    <section id="cta" class="cta"  style="background-color:yellow;">
        <div class="container pt-5" data-aos="fade-in">

            <div class="text-center pt-5">                
            <h2 style="color:#800000;">Pendaftaran Lomba</h2>
                    <h5 style="color:#800000;">Terdapat tata cara dalam pendaftaran. Silahkan Klik Tombol Dibawah.</h5>
                    <br>
                    <a href="{{ route('pendaftaran.panduan') }}" class="btn btn-danger mb-5">Syarat/Ketentuan & Tata
                        Cara Pendaftaran</a>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <section id="form-registry">
        <div class="container mt-4">
            <div class="card">
                <div class="card-header text-center" style="background-color:#800000;">
                    <h4 style="color:#fff;">Pendaftaran Lomba PENTASS Tahun 2024</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pendaftaran.store') }}" method="post" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="lomba" class="form-label">Pilih Lomba</label>
                            <select name="lomba" class="form-control  @error('lomba') is-invalid @enderror">
                                <option value="">-- Pilih Lomba Yang ingin Diikuti --</option>
                                @foreach($lomba as $dt)
                                @if (Request::input('lomba') == $dt)
                                <option value="{{ old('lomba') }}" selected>{{ old('lomba') }}</option>
                                @else
                                <option value="{{ $dt->nama_lomba }}">{{ $dt->nama_lomba }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('lomba')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" id="email" placeholder="Masukkan email...">
                            @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}" id="nama" placeholder="Masukkan nama lengkap...">
                            @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="no_wa" class="form-label">Nomor Telepon / Whatsapp</label>
                            <input type="number" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror"
                                value="{{ old('no_wa') }}" id="no_wa">
                            @error('no_wa')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah"
                                class="form-control @error('asal_sekolah') is-invalid @enderror"
                                value="{{ old('asal_sekolah') }}" placeholder="Masukkan Asal Sekolah secara lengkap...">
                            @error('asal_sekolah')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="file_ktp_suket" class="form-label">Masukkan Gambar Kartu Tanda Pelajar Atau
                                Surat Keterangan dari Sekolah ("Format file harus JPG/PNG/JPEG")</label>
                            <input type="file" name="file_ktp_suket"
                                class="form-control @error('file_ktp_suket') is-invalid @enderror"
                                value="{{ old('file_ktp_suket') }}">
                            @error('file_ktp_suket')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="url" class="form-label">Link Google Drive Materi Lomba</label>
                            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                value="{{ old('url') }}"
                                placeholder="Masukkan Alamat Url Google Drive yang sudah dibuat...">
                            @error('url')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="keterangan" class="form-label">Ceritakan sedikit tentang diri anda
                                (Optional)</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" cols="30"
                                rows="10">{{ old('keterangan') }}</textarea>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="setuju_syarat_ketentuan" value="setuju" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Kami telah menerima <a class="text-primary" href="{{ route('pendaftaran.panduan') }}"><strong>Syarat & ketentuan yang berlaku</strong></a></label>
                        </div>
                        <div class="text-center">
                            <strong>Konfirm Captcha:</strong><br>
                        </div>
                        <div class="form-group mb-3 d-flex justify-content-center">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn" style="background:#800000; color:#fff;">
                                <h4>DAFTAR SEKARANG</h4>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@include('sweetalert::alert')
@push('scriptfrontend')

@endpush
