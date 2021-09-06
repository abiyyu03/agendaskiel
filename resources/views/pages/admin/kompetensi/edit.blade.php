@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kompetensi Dasar nomor {{ $data_kompetensi->nomor}}</h1>
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
                <form action="{{route('kompetensi.update',$data_kompetensi->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nomor">Nomor Kompetensi Dasar</label>
                        <input type="text" class="form-control" name="nomor" placeholder="Nomor KD" value="{{ $data_kompetensi->nomor }}" required="true">
                    </div>
                    <div class="form-group">
                        <label for="kompetensi">Kompetensi Dasar</label>
                        <input type="text" class="form-control" name="kompetensi" placeholder="Kompetensi Dasar" value="{{ $data_kompetensi->kompetensi}}" required="true">
                    </div> 
                    <div class="form-group">
                        <label for="mapel_id">Mata Pelajaran</label>
                        <select name="mapel_id" class="form-control">
                            <option disabled selected>-</option>
                            @foreach($data_mapel as $mapel)
                                <option value="{{$mapel->id}}" {{($mapel->id === $data_kompetensi->mapel_id ? 'selected' : '')}}>{{$mapel->kelas_tingkat['kelas_tingkat']}} - {{$mapel->nama_mapel}}</option>
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