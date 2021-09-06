@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid"> 
        <div class="row">
            <div class="card-body">
                <div class="card shadow">
                    <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>  
                @endif
                <div class="table-responsive" >
                <h3>Kosongkan Database !</h3>
                <p class="text-danger"><b>Berhati-hati saat mengosongkan data</b>, data yang sudah terhapus <b>tidak dapat</b> di urungkan</p>
                <center>
                    <table class="table table-bordered" width="80%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>#</th>
                                <th>Tabel</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Absensi</td> 
                                <td class="text-center"><a href="{{ route('pengaturan.absensi') }}" ""><i class="fa fa-trash"></i> Kosongkan</a>  
                                </td>    
                            </tr> 
                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">Jam</td> 
                                <td class="text-center"><a href="{{ route('pengaturan.jam') }}" ""><i class="fa fa-trash"></i> Kosongkan</a>  
                                </td>    
                            </tr> 
                            <tr>
                                <td class="text-center">3</td>
                                <td class="text-center">Kompetensi Dasar</td> 
                                <td class="text-center"><a href="{{ route('pengaturan.kompetensi') }}" ""><i class="fa fa-trash"></i> Kosongkan</a>  
                                </td>    
                            </tr> 
                            <tr>
                                <td class="text-center">4</td>
                                <td class="text-center">Kelas</td> 
                                <td class="text-center"><a href="{{ route('pengaturan.kelas') }}" ""><i class="fa fa-trash"></i> Kosongkan</a>  
                                </td>    
                            </tr> 
                            <tr>
                                <td class="text-center">5</td>
                                <td class="text-center">Agenda</td> 
                                <td class="text-center"><a href="{{ route('pengaturan.agenda') }}" ""><i class="fa fa-trash"></i> Kosongkan</a>  
                                </td>    
                            </tr> 
                            <tr>
                                <td class="text-center">6</td>
                                <td class="text-center">Mata Pelajaran</td> 
                                <td class="text-center"><a href="{{ route('pengaturan.mapel') }}" ""><i class="fa fa-trash" onclick="confirm()"></i> Kosongkan</a>  
                                </td>    
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </center>
            </div>
        </div>
            </div>
        </div>  
        <div class="d-sm-flex align-items-center justify-content-between mb-">
           
        </div>


        </div>
        <!-- /.container-fluid -->
@endsection