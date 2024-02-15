@extends('layouts.adm-main')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
		<div class="pull-left">
		    <h2>DAFTAR kategori</h2>
		</div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('kategori.create') }}" class="btn btn-md btn-success mb-3">TAMBAH ITEM</a>
                    </div>

                </div>


                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>KATEGORI</th>
                            <th>JENIS</th>
                            <th style="width: 15%">AKSI</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $rowkategori)
                            <tr>
                                <td>{{ $rowkategori->kategori  }}</td>
                                <td>{{ $rowkategori->ketKategori  }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');" action="{{ route('kategori.destroy', $rowkategori->id) }}" method="POST">
                                <a href="{{ route('kategori.show', $rowkategori->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                               
                            </tr>
                        @empty
                            <div class="alert">
                                Data kategori belum tekategoridia!
                            </div>
                        @endforelse
                    </tbody>
                   
                </table>
                {!! $kategori->links('pagination::bootstrap-5') !!}

            </div>
        </div>
    </div>
@endsection