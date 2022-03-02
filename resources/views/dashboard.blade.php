<x-app-layout>
    @if (Auth::user()->role == '0')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg items-center">
                    <br>
                    <br>
                    <div class="d-flex justify-content-center">

                        <form action="/dashboard" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
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
                            <div class="form-group">
                                <select name="room_name">
                                        @if(isset($check_ins))
                                            @foreach($check_ins as $chekin)
                                                <option value="{{ $chekin->room_id }}">{{ $chekin->room->rname }}</option>
                                            @endforeach
                                        @endif
                                </select>
                                <label for="exampleFormControlFile1">Upload your file here</label>
                                <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                                <input class="btn btn-success" type="submit" name="Submit">
                            </div>
                        </form>

                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg items-center pt-6 pl-3 pr-4">
                    <h2>Group</h2>
                    <hr>
                    <table class="table table-striped table-dark">
                        <thead>
                        <tr>
                            <th scope="col">Group Name</th>
                            <th scope="col">Mem 1</th>
                            <th scope="col">Mem 2</th>
                            <th scope="col">Mem 3</th>
                            <th scope="col">Mem 4</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($groups as $group)
                        <tr>
                                <td>{{ $group->group_name }}</td>
                                <td>{{ $group->member1 }}</td>
                                <td>{{ $group->member2 }}</td>
                                <td>{{ $group->member3 }}</td>
                                <td>{{ $group->member4 }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg items-center pt-6 pl-3 pr-4">
                    <h2>File Submitted List</h2>
                    <hr>
                    <table class="table table-striped table-dark">
                        <thead>
                        <tr>
                            <th scope="col">File Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($files))
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ $file->name }}</td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
