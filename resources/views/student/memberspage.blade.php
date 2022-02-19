<!DOCTYPE html>
<html>
<head>
    <title>Create Group Members</title>
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
        <h1 style="font-size: 22px">Create Group Members</h1>
        <br>
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                <li class="text-red-500 list-none">
                    {{ $error }}
                </li>
            @endforeach
        @endif
        <form action="members" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Group Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" style="border-color: lightgray;border-radius: 4px" name="group_name" placeholder="Team Example">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Members</label>
                <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}" hidden>
                <input type="text" class="form-control" id="exampleFormControlInput1" style="border-color: lightgray; border-radius: 4px" name="member1" placeholder="Lastname, Firstname, MI"><br>
                <input type="text" class="form-control" id="exampleFormControlInput1" style="border-color: lightgray; border-radius: 4px" name="member2" placeholder="Lastname, Firstname, MI"><br>
                <input type="text" class="form-control" id="exampleFormControlInput1" style="border-color: lightgray; border-radius: 4px" name="member3" placeholder="Lastname, Firstname, MI"><br>
                <input type="text" class="form-control" id="exampleFormControlInput1" style="border-color: lightgray; border-radius: 4px" name="member4" placeholder="Lastname, Firstname, MI"><br>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Course, Year, Section</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" style="border-color: lightgray; border-radius: 4px" name="yearnsection" placeholder="BSIT, 1, A">
            </div>
            <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}" hidden>
            <br>
            <button class="btn btn-success" type="submit" style="background-color: green">Create</button>
        </form>
    </div>
</x-app-layout>


</body>
</html>
