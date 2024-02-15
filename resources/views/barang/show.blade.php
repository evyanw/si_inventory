@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="pull-left">
            <h2>TAMPILKAN BARANG</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
               <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Merk</td>
                                <td>{{ $barang->merk }}</td>
                            </tr>
                            <tr>
                                <td>Seri</td>
                                <td>{{ $barang->seri }}</td>
                            </tr>
                            <tr>
                                <td>Spesifikasi</td>
                                <td>{{ $barang->spesifikasi }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>{{ $barang->kategori->kategori }}</td>
                            </tr>
                            <tr>
                        </table>
                    </div>
               </div>
            </div>

            <!-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/foto/'.$barang->foto) }}" class="w-100 rounded">
                    </div>
                </div>
            </div> -->

        </div>
        <div class="row">
            <div class="col-md-12  text-center">
                

                <a href="{{ route('barang.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>

    </div>
@endsection
