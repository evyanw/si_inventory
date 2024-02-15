@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h2>EDIT BARANG</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.update',$barang->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">MERK</label>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk',$barang->merk) }}" placeholder="Masukkan Merk Barang">
                            
                                <!-- error message untuk merk -->
                                @error('merk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SERI</label>
                                <input type="text" class="form-control @error('seri') is-invalid @enderror" name="seri" value="{{ old('seri',$barang->seri) }}" placeholder="Masukkan Merk Barang">
                            
                                <!-- error message untuk seri -->
                                @error('seri')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SPESIFIKASI</label>
                                <input type="text" class="form-control @error('spesifikasi') is-invalid @enderror" name="spesifikasi" value="{{ old('spesifikasi',$barang->spesifikasi) }}" placeholder="Masukkan spesifikasi Barang">
                            
                                <!-- error message untuk spesifikasi -->
                                @error('spesifikasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="font-weight-bold">STOK</label>
                                <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok',$barang->stok) }}" placeholder="Masukkan Jumlah Stok">
                            
                                <!-- error message untuk stok -->
                                @error('stok')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                <select class="form-control" name="kategori_id" aria-label="Default select example">
                                    @foreach ($akategori as $kategori)
                                        @if ($selectedKategori && $selectedKategori->id == $kategori->id)
                                            <option value="{{ $kategori->id }}" selected>{{ $kategori->kategori }}</option>
                                        @else
                                            <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <!-- error message untuk kategori -->
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