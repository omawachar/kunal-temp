@extends('layout.app')

@section('content')



<div class="container mt-3 py-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                        Products
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>
                    </h2>
                </div>

                <div class="card-body">
                    <table id="myTable" class="cell-border table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- <a class="btn btn-primary" href="addProduct"> Add Product</a> -->

</div>
<!--add student data modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="productName" class="form-label"> Product Name</label>
                        <input type="text" class="form-control" name="name" id="inputCategory" placeholder="Add Product Name">
                    </div>
                    <div class="form-group mb-3">
                        <label>Profile Image</label>
                        <div class="mb-3">
                            <img id="preview-image-before-upload" class="rounded img-thumbnail form-control mb-1" alt="preview image" style="max-height: 100px; max-width: 100px; ">
                            <input type="file" name="image" class="form-control" id="image" placeholder="image">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2" for="">Choose Category</label>
                        <select class="form-control " style="width: 100%;" name="category_id" id="category">
                            <option></option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2" for="">Choose Subcategory</label>
                        <select name="subcategory[]" id="subcategory" style="width: 100%;" multiple="multiple" class="form-control ">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_active" value="" id="checkBoxProduct" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            Product Active
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add student data modal -->

@endsection

@section('scripts')


<script type="text/javascript">
    fetchProducts();

    function fetchProducts() {
        $.ajax({
            type: "GET",
            url: "{{url('/products')}}",
            dataType: "json",
            success: function(response) {

                console.log(response);
            }
        });
    }

    $(document).ready(function() {
        clear();
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('get.products') !!}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#category').select2({
            placeholder: "Select Category",

            dropdownParent: $('#exampleModal'),
            dropdownPosition: 'below'
        }).on('change', function(e) {
            var cat_id = e.target.value;
            console.log(cat_id)
            $.ajax({
                url: "{{ url('getSubCat') }}",
                type: "POST",
                data: {
                    cat_id: cat_id
                },
                success: function(data) {
                    console.log(data);
                    $('#subcategory').empty();
                    if (data.subcategories[0].subcategories.length === 0) {
                        $('#subcategory').append('<option value="">' + 'No Subcategory found ' + '</option>');
                    } else {
                        $.each(data.subcategories[0].subcategories, function(index, subcategory) {
                            $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                        })
                    }
                }
            })
        });
        $('#subcategory').select2({
            placeholder: 'Select subcategory',
            dropdownParent: $('#exampleModal'),

        });

        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#addForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                // 
            });
            $.ajax({
                type: "POST",
                url: "{{ url('addProduct') }}",
                data: $('#addForm').serialize(),
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    clear();
                    $('#exampleModal').modal('hide');


                },
                error: function(error) {
                    console.log(error);
                    alert("Data not Saved");
                }
            });
        })




    });
</script>
<script>
    function confirmDelete() {
        let text = "Are you sure you want to delete this Category ?";
        if (confirm(text) == true) {
            location.href = "deleteProduct/this.id";
        } else {
            location.href = "/product";
        }
    }
</script>


<script>
    $('#exampleModal').on('hidden.bs.modal', function() {
        //Close Modal
        console.log("modal close");
        $('#category').val([]).change();
        clear();


    });

    function clear() {
        $("#inputCategory").val("");
        $("#image").val("");
        $("#category").val("");
        $("#subcategory").val("");

    }
</script>




@endsection