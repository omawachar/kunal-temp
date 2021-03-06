<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        h1 {
            text-align: center;
        }
    </style>

    <title>Document</title>
</head>

<body>
    <h1>Add Product</h1>
    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @endif
    <div class="container">
        <form action="addProduct" id="createProduct" method="POST" name="createProduct" autocomplete="off" enctype="multipart/form-data">
            @csrf
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
                <label for="">Choose Category</label>
                <select class="form-control mb-2" name="category_id" id="category">
                    <option value="">Select</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Choose Subcategory</label>
                <select name="subcategory[]" id="subcategory" multiple="multiple" class="form-control mt-2">
                    <option value=""></option>
                </select>
            </div>
            <br><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_active" value="" id="checkBoxProduct" checked>
                <label class="form-check-label" for="flexCheckDefault">
                    Product Active
                </label>
            </div>

            <br>
            <div>
                <input type="submit" class="btn btn-primary" value="submit">
                <a href="/product" class="btn btn-secondary">Cancel </a>
            </div>
        </form>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#category').select2({
                placeholder: 'Select Category'
            }).on('change', function(e) {
                var cat_id = e.target.value;
                $.ajax({
                    url: "{{ url('getSubCat') }}",
                    type: "POST",
                    data: {
                        cat_id: cat_id
                    },
                    success: function(data) {
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
                placeholder: 'Select subcategory'
            });
        });

        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

           

    </script>




    </script>
</body>

</html>