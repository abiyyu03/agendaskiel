@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Mata Pelajaran</h1> 
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
                <form action="{{route('mapel.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_mapel">Nama Mapel</label>
                        <input type="text" class="form-control" name="nama_mapel" placeholder="Nama Mapel" value="{{ old('nama_mapel') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas_tingkat_id">Kelas Tingkat</label>
                        <select class="form-control" name="kelas_tingkat_id"> 
                            <option selected disabled>- Pilih Tingkatan -</option>
                            @foreach($data_kelas_tingkat as $dkt)
                                <option value="{{$dkt->id}}">{{$dkt->kelas_tingkat}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->
@endsection