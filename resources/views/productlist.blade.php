<!DOCTYPE html>
<html>
<head>
	<title>Dependent</title>
</head>
<body>

	{{-- <center>
	
		<h1>Laravel Dynamic Drop Down with ajax</h1>
	
		<span>Product Category: </span>
		<select style="width: 200px" class="productcategory" id="prod_cat_id">
			<option value="0" disabled="true" selected="true">-Select-</option>
			@foreach($prod as $cat)
				<option value="{{$cat->id}}">{{$cat->product_cat_name}}</option>
			@endforeach
		</select>
	
		<span>Product Name: </span>
		<select style="width: 200px" class="productname">
			<option value="0" disabled="true" selected="true">Product Name</option>
		</select>
	
		<span>Product Price: </span>
		<input type="text" class="prod_price">
	
	</center> --}}

<br>
{{-- ========================================================================================= --}}
<center>
	<span>Jurusan </span>
	<select style="width: 200px" class="filter_jurusan_id" id="filter_jurusan_id">
		<option value="0" disabled="true" selected="true">-Select-</option> 
		@foreach($data_jurusan as $jurusan)
			<option value="{{$jurusan->id}}">{{$jurusan->jurusan}}</option>
		@endforeach
	</select>
	<br>
	<span>Kelas Tingkat </span>
	<select style="width: 200px" class="filter_kelas_tingkat_id" id="filter_kelas_tingkat_id">
		<option value="0" disabled="true" selected="true">-Select-</option>
		@foreach($kelas_tingkat as $kt)
			<option value="{{$kt->id}}">{{$kt->kelas_tingkat}}</option>
		@endforeach
	</select>
	<br>
	<span>Kelas </span>
	<select style="width: 200px" class="kelas" id="kelas">
		<option value="0" disabled="true" selected="true">Kelas</option>
	</select>
	<br>
	<span>Mapel </span>
	<select style="width: 200px">
		<option value="0" disabled="true" selected="true">-Select-</option>
	</select>
	<br>
	<span>Kompetensi </span>
	<input type="text">
</center>
{{-- <center>
	<span>Jurusan </span>
	<select style="width: 200px" class="jurusan" id="jurusan" name="jurusan">
		<option value="0" disabled="true" selected="true">-Select-</option> 
		@foreach($data_jurusan as $jurusan)
			<option value="{{$jurusan->id}}">{{$jurusan->jurusan}}</option>
		@endforeach
	</select>
	<br>
	<span>Kelas Tingkat </span>
	<select style="width: 200px" class="kelas_tingkat" id="kelas_tingkat" name="kelas_tingkat">
		<option value="0" disabled="true" selected="true">-Select-</option>
		@foreach($kelas_tingkat as $kt)
			<option value="{{$kt->id}}">{{$kt->kelas_tingkat}}</option>
		@endforeach
	</select>
	<br>
	<span>Kelas </span>
	<select style="width: 200px" class="kelas">
		<option value="0" disabled="true" selected="true">Kelas</option>
	</select>
</center> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.filter_kelas_tingkat_id',function(){
			// console.log("hmm its change");

			var filter_kelas_tingkat_id=$(this).val();
			// console.log(cat_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findKelas')!!}',
				data:{
					id:filter_kelas_tingkat_id
				},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>Pilih Kelas</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].kelas+'</option>';
				   }

				   div.find('.kelas').html(" ");
				   div.find('.kelas').append(op);
				}, 
			});
		});

	});
</script>

{{-- <script type="text/javascript" >
	$(document).ready(function(){
		$(document).on('change','.filter_jurusan_id',function(){
			$('#filter').click(function(){
				var filter_jurusan_id = $('#filter_jurusan_id').val();
				var filter_kelas_tingkat_id = $('#filter_kelas_tingkat_id').val();

				var div=$('#filter_jurusan_id');
				var div=$('#filter_kelas_tingkat_id');

				$.ajax({
					type:'get',
					url:'{!!URL::to('findKelas')!!}',
					data:{filter_jurusan_id:filter_jurusan_id},
					success:function(data){
						//console.log('success');

						//console.log(data);

						//console.log(data.length);
						op+='<option value="0" selected disabled>Pilih Kelas</option>';
						for(var i=0;i<data.length;i++){
						op+='<option value="'+data[i].id+'">'+data[i].kelas+'</option>';
						
					div.find('.kelas').html(" ");
					div.find('.kelas').append(op);
					}

					}, 
				});
			});
		});
	});
</script> --}}

{{-- <script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.productcategory',function(){
			// console.log("hmm its change");

			var cat_id=$(this).val();
			// console.log(cat_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findProductName')!!}',
				data:{'id':cat_id},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>chose product</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].productname+'</option>';
				   }

				   div.find('.productname').html(" ");
				   div.find('.productname').append(op);
				},
				error:function(){

				}
			});
		});

		$(document).on('change','.productname',function () {
			var prod_id=$(this).val();

			var a=$(this).parent();
			console.log(prod_id);
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findPrice')!!}',
				data:{'id':prod_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("price");
					console.log(data.price);

					// here price is coloumn name in products table data.coln name

					a.find('.prod_price').val(data.price);

				},
				error:function(){

				}
			});


		});

	});
</script> --}}

</body>
</html>