<!DOCTYPE html>
<html>
<head>
    <title>Classroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <h1 style="font-size: 22px">Join Classroom</h1>
        <br>
        <br>
        @if ($message = Session::get('success-join'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('wrongkey'))
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('again'))
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/classroom') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Search Room</label>
                <input type="text" class="search form-control" id="exampleFormControlInput1" style="border-color: lightgray;border-radius: 4px" name="search_room">
            </div><br>
            <button class="btn btn-success" type="submit" style="background-color: green"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form><br>
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Room Name</th>
                <th scope="col">Description</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($filterData))
                @foreach ($filterData as $filterDatas)
                    <tr>
                        <td>{{ $filterDatas->rname }}</td>
                        <td>{{ $filterDatas->description }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="color: #111827">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Insert your key here</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/joinroom') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                </div>
                                                <div class="form-group">
{{--                                                    <input type="text" class="form-control" name="room_id" value="{{ Auth::room()->id }}" hidden>--}}
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Key..." name="mykey">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Join</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
