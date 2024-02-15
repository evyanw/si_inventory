@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">                    
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">MERK</label>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk') }}" placeholder="Masukkan Merk barang">
                            
                                <!-- error message untuk merk -->
                                @error('merk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SERI</label>
                                <input type="text" class="form-control @error('seri') is-invalid @enderror" name="seri" value="{{ old('seri') }}" placeholder="Masukkan No Seri barang">
                            
                                <!-- error message untuk seri -->
                                @error('seri')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SPESIFIKASI</label>
                                <input type="text" class="form-control @error('spesifikasi') is-invalid @enderror" name="spesifikasi" value="{{ old('sepsifikasi') }}" placeholder="Masukkan spesifikasi barang">
                            
                                <!-- error message untuk sepsifikasi -->
                                @error('spesifikasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">STOK</label>
                                <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}" placeholder="Masukkan Jml Stok barang">
                            
                                <!-- error message untuk stok -->
                                @error('stok')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                
                                <div class="form-check">
                                    <select class="form-select" name="kategori_id" aria-label="Default select example">
                                        <option value="blank" selected>Pilih Kategroi</option>
                                        <option value="M">M</option>
                                        <option value="A">A</option>
                                        <option value="BHP">BHP</option>
                                        <option value="BTHP">BTHP</option>
                                    </select>

                                </div>
                                error message untuk kelas
                                @error('kategori_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> -->

                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                <div class="form-check">
                                    <select class="form-control" name="kategori_id" aria-label="Default select example">
                                    @foreach ($aKategori as $rowKategori  )
                                    <option value="blank" selected>Pilih Jenis</option>
                                    <option value="{{ $rowKategori->id }}">{{ $rowKategori->kategori}}</option>

                                    @endforeach
                                    </select>

                                </div>
                                <!-- error message untuk kelas -->
                                @error('kategori_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            
                            <!-- <div class="form-group">
                                <label class="font-weight-bold">FOTO</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                            
                                error message untuk foto
                                @error('foto')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> -->

                            

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('barang.index') }}" class="btn btn-md btn-primary">Back</a>

                        </form> 
                    </div>
                </div>

 

            </div>
        </div>
    </div>
@endsection