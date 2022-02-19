<!DOCTYPE html>
<html>
<head>
	<title>Room</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<style type="text/css">
	*{
		margin: 0;
	}
	.main-box{
		margin: auto;
		width: 400px;
	}
</style>
<body>
	<x-app-layout>
    	<div class="main-box">
			<br>
			<br>
			<h1 style="font-size: 22px">Create Room</h1>
			<br>
			<br>
			@if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
			<form action="room" method="POST">
				@csrf
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Name</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1" style="border-color: lightgray;border-radius: 4px" name="name">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Key</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1" style="border-color: lightgray; border-radius: 4px" name="key">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Discription</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
			  </div>
			  <br>
			  <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}" hidden>
			  <button class="btn btn-success" type="submit" style="background-color: green">Create</button>
			</form>
		</div>
	</x-app-layout>


</body>
</html>
