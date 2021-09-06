@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Absensi</h1>
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
                <form action="{{ route('absensi.update', $data_absensi->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group"> 
                        <table class="table table-bordered" id="absen_table">
                            <tr>
                                <th width="45%">Jumlah Siswa</th>
                                <th width="25%">Opsi Absensi</th>
                                <th width="30%">Keterangan Tambahan</th>
                                <th width="10%">Hapus Baris</th>
                            </tr> 
                            <input type="hidden" class="form-control" name="tanggal2" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" > 
                            <tr>
                                <td class="jumlah_siswa"><input type="number" class="form-control"name="jumlah_siswa" value="{{$data_absensi->jumlah_siswa}}"></td>
                                <td class="keterangan">
                                    <select name="opsi_absensi" id="keterangan" class="form-control">
                                        <option selected>-</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Izin">Izin</option> 
                                    </select>
                                </td>
                                <td class="keterangan"><input type="text" value="{{$data_absensi->keterangan}}" class="form-control"name="keterangan"></td> 
                                <td><!-- <button type='button' name='remove' data-row='row' class='btn btn-danger btn-xs remove'>-</button> --></td>
                            </tr>
                        </table>
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