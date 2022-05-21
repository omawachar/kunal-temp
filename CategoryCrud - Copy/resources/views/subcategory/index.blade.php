<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css" />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <title>Subcategory</title>
</head>

<body>
    <div class="container mt-1 pl-5 pr-5 pb-5 border">
        <h1 class="text-center">Categories With Subcategories</h1>
        <br>
        <div>
            @if(session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
            <div class="float-end">
                <div>
                    <a class="btn btn-primary " href="createSubcategory">Add Subcategory</a>
                    <a href="/" class="btn btn-primary">Categories </a>
                </div>
            </div>
        </div><br>
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table id="datatable" class="table ">
                                <thead>
                                    <th>Sr No.</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Action</t h>
                                </thead>
                                <tbody>
                                    @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td>{{$subcategory->id}}</td>
                                        <td>{{$subcategory->category->category_name}}</td>
                                        <td>{{$subcategory->name}}</td>

                                        <td><a href="editSubcategory/{{$subcategory->id}}">Edit</a> <a onclick="confirmDelete('this')" href="">Delete</a></td>

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

        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>
        <script type="text/javascript">
            $('#datatable').DataTable({})
        </script>
        <script>
            function confirmDelete() {
                let text = "Are you sure you want to delete this subcategory ?";
                if (confirm(text) == true) {
                    location.href = "subcategory/delete/this.id";
                } else {
                    location.href = "subcategories";

                }
            }
        </script>

</body>

</html>