@extends('layouts.admin')

@section('content') 
        <!-- Begin Page Content -->
        <style type="text/css" media="screen">
            td{ 
                column-width: 344px;
            }
        </style>
        <div class="container-fluid">    
        <div class="row">
            <div class=" form-group d-none d-sm-inline-block form-inline d-sm-flex align-items-center ml-4">
                <div class="daterange "> 
                    <input type="date" class="form-control" name="from_date" id="from_date" placeholder="Date from">   
                    <input type="date" class="form-control" name="to_date" id="to_date" placeholder="to">  
                    <button type="button" name="search" class="btn btn-primary " id="search"><i class="fas fa-search"></i></button>   
                </div> 
            </div> 
            <div class=" form-group d-none d-sm-inline-block form-inline d-sm-flex align-items-center justify-content-between ml-4">
                <select name="nama_guru" class="form-control"id="nama_guru">
                    <option selected disabled>- Pilih guru -</option>
                    option
                    @foreach($data_user as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <button type="button" name="reset" class="btn btn-warning ml-1" id="reset">Reset Filters</button>  
            </div>
            
            <div class="card-body" style="max-width: 99.9%;"> 
                <div class="card shadow">
                    <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif   
                <!-- <div class="form-group">
                    <select class="filter-name">
                        {--@foreach ($data_user as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>  
                        @endforeach --}
                    </select>
                </div> -->

                    {!!$dataTable->table(['class'=> 'table table-bordered'])!!}
               
                
                <!-- <div class="table-responsive">
                    <table class="table table-bordered" id="table_mapel" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Jam</th> 
                                <th>Kelas</th>
                                <th>Nama Guru</th>
                                <th>Kelas Tingkat</th>
                                <th>Mapel</th>
                                <th>Kompetensi</th>
                                <th>Tugas</th>
                                <th>Evaluasi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead> 
                    </table>
                </div> -->
            </div>
        </div>   
        <!-- /.container-fluid -->
@endsection
@push('addon-script')   

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js" integrity="sha512-HLbtvcctT6uyv5bExN/qekjQvFIl46bwjEq6PBvFogNfZ0YGVE+N3w6L+hGaJsGPWnMcAQ2qK8Itt43mGzGy8Q==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js" integrity="sha512-y3o0Z5TJF1UsKjs/jS2CDkeHN538bWsftxO9nctODL5W40nyXIbs0Pgyu7//icrQY9m6475gLaVr39i/uh/nLA==" crossorigin="anonymous"></script> 
<script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/1.6.5/js/dataTables.buttons.min.js" integrity="sha512-C6bH79vwmIG/SVdXp2MT1SziCMrJ35rywNWqbYFLJXuiQsLlS5PH356A+FjsboOUaVjvtd+ELK3pb9hq0SXNrQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/1.6.5/js/buttons.html5.min.js" integrity="sha512-ehHOosb2HF/KK/7kZSGFaOijR+smIS5PvSPBG0He69iTEQe30Q+g0NLJYQUmySpqGrol1frtzE1Re2a9AebxiQ==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons-bs4/1.6.5/buttons.bootstrap4.min.css" integrity="sha512-U93Ait+5t0t8UxFrYkC8pW9VzNwLO5IZAQd+uhAwemeIjarwtk8uaX1Seku+q2CTMxLmLQsbeQuS4nyosLVUrg==" crossorigin="anonymous" />
<script src="{{asset('/backend/vendor/datatables/Buttons-1.6.5/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('/backend/vendor/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script> 
    {!!$dataTable->scripts()!!} 
    <script> 
        // $('.filter-name').change(function(){
        //     table-agenda.column($(this).data('column'))
        //     .search($(this).val() )
        //     .draw();
        // });
        const table = $('#agenda-table');
        table.on('preXhr.dt',function(e,settings,data){
            data.from_date = $('#from_date').val();
            data.to_date = $('#to_date').val();
            data.nama_guru = $('#nama_guru').val(); 
        });
        $('#search').on('click',function(){
            table.DataTable().ajax.reload();
            return false;
        });
        var tables = $('#agenda-table');
        $('#nama_guru').on('change',function(){ 
            table.DataTable().ajax.reload();
            return false;
        });
        $('#reset').on('click',function(){ 
        table.on('preXhr.dt',function(e,settings,data){
            data.from_date = '';
            data.to_date = '';
            data.nama_guru = ''; 
        }); 
            table.DataTable().ajax.reload();
            return false;
        });

    </script>
@endpush


<!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script> -->