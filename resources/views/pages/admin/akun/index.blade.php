@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Page Heading -->  
        <div class="row">
            <div class="card-body"> 
                <div class="card shadow">
                    <div class="card-body">
                        <div class="form-group d-none d-sm-inline-block form-inline d-sm-flex align-items-center justify-content-between">
                            <h3>Kelola Akun</h3>
                            <a href={{ route('akun.create') }} class="btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Akun 
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0" id="table_akun"> 
                                <thead>
                                    <tr align="center">
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Status Email</th>
                                        <th>Role</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>  
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
        </div>  
        <!-- /.container-fluid -->
@endsection
@push('addon-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
        $('.hapus').on('click',function(event){
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title:"Apakah anda yakin ?",
                text:"akun akan terhapus secara permanen !",
                icon:"warning",
                button:["cancel","yes"]
            }).then(function(value){
                if(value){
                    window.location.href=url;
                }
            });
        });
    </script>
    <script> 
        $('#table_akun').DataTable({
                processing: true,
                serverSide: true,  
                ajax: {
                    url:'{!! route('akun.index') !!}',
                    type:'GET'
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                 {
                    data: 'email_verified_at',
                    name: 'email_verified_at'
                },
                {
                    data: 'roles',
                    name: 'roles'
                },
                {
                    data:'action',
                    name:'action',
                    searchable:false,
                    orderable:false
                }
            ],
        });
    </script>
@endpush