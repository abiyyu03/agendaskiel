<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data">	
		@csrf
		<input type="file" name="foto"><br>
		<button type="submit">Submit</button>
	</form>>

</body>
</html>