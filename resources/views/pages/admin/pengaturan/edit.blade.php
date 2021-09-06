@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Mapel {{ $data_mapel->nama_mapel }}</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('mapel.update', $data_mapel->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama_mapel">Nama Mapel</label>
                        <input type="text" class="form-control" name="nama_mapel" placeholder="Nama Mapel" value="{{ $data_mapel->nama_mapel }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori_mapels_id">Kategori Mata Pelajaran</label>
                        <select class="form-control" name="kategori_mapels_id">
                            <option selected disabled>- Pilih Kategori Mata Pelajaran -</option>
                            @foreach($data_kategori as $d)
                                <option value="{{$d->id}}">{{$d->nama_kategori_mapel}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                    </button>
                </form>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->
@endsection