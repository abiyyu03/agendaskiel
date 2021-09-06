@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kelas {{ $data_kelas->kelas }}</h1>
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
                <form action="{{ route('kelas.update', $data_kelas->id) }}" method="POST">
                @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Kelas</label>
                        <input type="text" class="form-control" name="kelas" placeholder="Kelas" value="{{ $data_kelas->kelas }}" required="true">
                    </div>
                    <div class="form-group">
                        <label for="title">Kelas Tingkat</label> 
                        <select class="form-control" name="kelas_tingkat_id" id="kelas_tingkat_id">
                            <option disabled selected>-</option> 
                            @foreach ($data_kelas_tingkat as $dkt)
                                <option value="{{$dkt->id}}" @if($data_kelas->kelas_tingkat_id == $dkt->id) selected @endif>{{$dkt->kelas_tingkat}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="title">Jurusan</label> 
                        <select class="form-control" name="kelas_tingkat_id" id="kelas_tingkat_id">
                            <option disabled selected>-</option>
                            <option value="1" @if($data_kelas->jurusan['jurusan'] == "IPA") selected @endif}}>IPA</option>
                            <option value="2" @if($data_kelas->jurusan['jurusan'] == "IPS") selected @endif}}>IPS</option> 
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