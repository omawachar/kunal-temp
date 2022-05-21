<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.css" />



    <title>Users</title>
</head>

<body>
    <h1 class="text-center"> Users Crud</h1>

    <!-- <div class="border border-blue-400">
        <a class="btn" href="/register">Add User</a>
    </div> -->
    <div id="app">

        <x-flash />

    </div>
    <p class="pr-4">
        <button type="button" class="btn btn-primary btn-sm" style="float:right ">
            <a class="btn text-white" href="/register">Add User</a>
        </button>
    </p>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table id="datatable" class="table ">
                            <thead>
                                <th>SNo.</th>
                                <th>name</th>
                                <th>email</th>
                                <th>Date Of Birth</th>
                                <th>Action</t h>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->date_of_birth}}</td>
                                    <td><a href="edit/{{$user->id}}">Edit</a> <a onclick="confirmDelete('this')" href="delete/{{$user->id}}">Delete</a></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('#datatable').DataTable({})
    </script>

    <script>
        function confirmDelete() {
            let text = "Are you sure you want to delete this User ?";
            if (confirm(text) == true) {
                location.href = "/delete/this.id"
            } else {
                text = "You canceled!";
            }
        }
    </script>


</body>

</html>