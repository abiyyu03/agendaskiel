@extends('layouts.form-agenda')
@section('title', 'Form Input Agenda')

@section('content')
    <!-- Begin Page Content -->
    <div class="container bg-light">
        <div class="text-center">
            <img
                src="{{ url('frontend/images/HeaderS.jpg') }}"
                alt="Header"
                class="w-100 mb-0 mt-3"
                />
            </div>

        <!-- Page Heading -->
        <center>
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h4 ml-3 mb-0 mt-3 mb-2 text-gray-800" style="font-family: Segoe UI">AGENDA ONLINE SMKN 1 GUNUNGPUTRI</h1>
            </div>
        </center>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach  
                </ul>
        @endif 
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <h4>{{$message}}</h4>
            </div>
        @endif
        
        <div class="card shadow"> 
            <div class="card-body">
                <form action="{{route('form-agenda.store')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf 
                    <div class="form-group"> 
                        <input type="hidden" class="form-control" name="tanggal" id="tanggal" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                    </div> 
                    <div class="form-group"> 
                        <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                    </div>  
                    <div class="form-group"> 
                        <input type="hidden" class="form-control" name="agenda_id" id="agenda_id">
                    </div> 
                    <div class="form-group">  
                        <label for="jam">Jam KBM</label>
                        <select id="jam" class="form-control" name="jam_id">
                            <option selected disabled>-</option>
                        @foreach($data_jam as $jam)
                            <option value="{{$jam->id}}">{{$jam->jamke}} - {{$jam->waktu}}</option>
                        @endforeach 
                        </select>
                    </div>
                    
                    <label>Kelas Tingkat</label>
                        <select class="form-control kelas_tingkat_id" name="kelas_tingkat_id" id="kelas_tingkat_id">
                            <option value="0" disabled="true" selected="true">-</option>
                            @foreach($kelas_tingkat as $kt)
                                <option value="{{$kt->id}}">{{$kt->kelas_tingkat}}</option>
                            @endforeach
                        </select><br>
                    
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control kelas" name="kelas_id" id="kelas_id">
                            <option value="0" disabled="true" selected="true">Pilih kelas tingkat dulu</option>
                        </select>
                    </div>
                    
                        <label>Mata Pelajaran</label>
                        <select class="form-control mapel" name="mapel_id" id="mapel_id"> 
                            <option value="0" disabled="true" selected="true">Pilih kelas tingkat dulu</option>
                        </select><br>
                    
                    <div class="form-group">
                        <label for="kompetensi_id">Kompetensi</label>
                        <select class="form-control" name="kompetensi_id" id="kompetensi_id" >
                            <option value="0" selected="true">Pilih mata pelajaran dulu</option>
                        </select>  
                    </div> 
                    <div class="form-group">
                        <label for="tugas">Tugas Akhir Pembelajaran</label>
                        <textarea name="tugas" rows="2" class="d-block w-100 form-control"></textarea>
                    </div> 
                    <div class="form-group">
                        <label for="evaluasi">Link Evaluasi Google Form</label>
                        <input name="evaluasi" type="text" class="d-block w-100 form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="gambar">Unggah foto </label>
                        <input type="file" class="form-control" name="gambar" >
                    </div> 
                    <div class="table-responsive">
                        <label for="absensi">Absensi Siswa</label>
                        <table class="table table-bordered" id="absen_table">
                            <tr>
                                <th width="45%">Jumlah Siswa</th>
                                <th width="25%">Opsi Absensi</th>
                                <th width="30%">Keterangan Tambahan</th>
                                <th width="10%">Hapus Baris</th>
                            </tr>  
                            <tr>
                                <td class="jumlah_siswa"><input type="number" class="form-control"name="jumlah_siswa[]" ></td>
                                <td class="keterangan">
                                    <select name="opsi_absensi[]" id="keterangan" class="form-control">
                                        <option selected>-</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Izin">Izin</option> 
                                    </select>
                                </td>
                                <td class="keterangan"><input type="text" class="form-control"name="keterangan[]"></td> 
                                <td><!-- <button type='button' name='remove' data-row='row' class='btn btn-danger btn-xs remove'>-</button> --></td>
                            </tr>
                        </table>
                        <div align="right">
                            <button type="button" name="add" id="add" class="btn btn-success btn-xs">
                                +
                            </button>
                        </div>
                    </div><br>

                    <button type="submit" class="btn btn-primary btn-block bg-info">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@push('addon-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$('#kelas_tingkat_id').on('change',function(){
			// console.log("hmm its change");

			var kelas_tingkat_id=$(this).val();
			// console.log(cat_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findKelas')!!}',
				data:{
					id:kelas_tingkat_id
				},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>Pilih Kelas</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].kelas+'</option>';
				   }

				   div.find('#kelas_id').html(" ");
				   div.find('#kelas_id').append(op);
				}, 
			});
		});

	});
</script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#kelas_tingkat_id').on('change',function(){
			// console.log("hmm its change");

			var kelas_tingkat_id=$(this).val();
			// console.log(cat_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findMapel')!!}',
				data:{
					id:kelas_tingkat_id
				},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>Pilih Mapel</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].nama_mapel+'</option>';
				   }

				   div.find('#mapel_id').html(" ");
				   div.find('#mapel_id').append(op);
				}, 
			});
		});

	});
</script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#mapel_id').on('change',function(){
			// console.log("hmm its change");

			var mapel_id=$(this).val();
			// console.log(cat_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findKompetensi')!!}',
				data:{
					id:mapel_id
				},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>Pilih Kompetensi</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].kompetensi+'</option>';
				   }

				   div.find('#kompetensi_id').html(" ");
				   div.find('#kompetensi_id').append(op);
				}, 
			});
		});

	});
</script>
@endpush

@push('addon-script')
    <script type="text/javascript">
        $(document).ready(function(){
            var count = 1;
            $('#add').click(function(){
                count = count + 1;
                var html_code = "<tr id='row"+count+"'>";
                html_code += "<td class='jumlah_siswa'><input type='text' class='form-control' name='jumlah_siswa[]'></td>";
                html_code += "<td class='opsi_absensi'> <select name='opsi_absensi[]' id='keterangan' class='form-control'>><option selected>-</option><option value='Sakit'>Sakit</option><option value='Izin'>Izin</option><option value='Alfa'>Alfa</option></select></td>";
                html_code += "<td class='keterangan'><input type='text' class='form-control' name='keterangan[]' required></td> ";
                html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
                html_code += "</tr>";  
         $('#absen_table').append(html_code);
        });
        $(document).on('click', '.remove', function(){
            var delete_row = $(this).data("row");
            $('#' + delete_row).remove();
        });
    });
    </script>
@endpush