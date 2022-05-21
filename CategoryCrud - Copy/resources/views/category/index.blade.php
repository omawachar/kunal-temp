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
    <title>Categories</title>
</head>

<body>
    <nav class="navbar navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light p-3 ml-1 mr-1">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active m-2">
                    <a class="nav-link  text-white" href="products">Products <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active m-2">
                    <a class="nav-link  text-white" href="createCategory">Add Category <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active m-2">
                    <a class="nav-link  text-white" href="subcategories">Subcategory <span class="sr-only"></span></a>
                </li>

                @auth
                <li class="nav-item active">
                    <div class="nav-link navbar-brand pull-right">
                        <span class="text-xs font-bold uppercase">Welcome {{auth()->user()->name}}</span>
                        <form method="POST" action="/logout" class="text-xs font-semibold ">
                            @csrf
                            <button type="submit"> Log Out</button>
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item active ">
                    <a class="nav-link  text-white" href="/register">Register <span class="sr-only"></span></a>
                </li>
                <li>
                    <a href="/login" class="nav-link">Log in</a>
                </li>
                @endauth
            </ul>

        </div>
    </nav>

    <div class="container mt-1 pl-5 pr-5 pb-5 border">
        <h1 class="text-center">Categories</h1>
        <br>
        <!-- <div>
          
            <div class="float-end">
                <div>
                    <a class="btn btn-primary " href="createCategory">Add Category</a>
                    <a class="btn btn-primary " href="subcategories">Show Subcategories</a>
                    <a class="btn btn-primary " href="product">Products</a>
                </div>
            </div>
        </div> -->

        <div class="container-fluid mt-2">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table id="datatable" class="table ">
                                <thead>
                                    <th>SNo.</th>
                                    <th>Category</th>
                                    <th>Action</t h>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->category_name}}</td>

                                        <td><a href="edit/{{$category->id}}">Edit</a> <a onclick="confirmDelete('this')" href="">Delete</a></td>

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
                let text = "Are you sure you want to delete this Category ?";
                if (confirm(text) == true) {
                    location.href = "delete/this.id";
                } else {
                    location.href = "/";
                }
            }
        </script>

</body>

</html>