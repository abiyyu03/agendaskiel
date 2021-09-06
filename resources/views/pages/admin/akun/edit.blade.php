@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaturan Akun</h1>
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
                <form action="{{route('pengaturan.update',$user->id)}}" method="POST"> 
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="email_verified_at">Email Verified</label>
                        <input type="date" class="form-control" name="email_verified_at" placeholder="Email Verified" value="">
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <select class="form-control" name="roles"> 
                                <option value="ADMIN">Admin</option> 
                                <option value="USER">User</option> 
                        </select>
                    </div>
                    {{-- <h3>Ubah password</h3>
                    <div class="form-group">
                        <label for="current_password">Password Sebelumnya</label>
                        <input type="password" class="form-control" name="current_password" placeholder="Current Password" value="">
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="text" class="form-control" name="new_password" placeholder="New Password" value="{{ old('title') }}">
                    </div> --}}
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan Pengaturan
                    </button>
                </form>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->
@endsection