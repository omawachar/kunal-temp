<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="/js/jquery-form-validation.js"></script>
    <style>
        form .error {
            color: #ff0000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-4"> Add Category </h1>
        <br>
        <br>
        <form action="createCategory" id="createCategory" method="POST" name="createCategory" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="categoryname" class="form-label"> Category Name</label>
                <input type="text" class="form-control" name="category_name" id="inputCategory" placeholder="Add Category Name">
            </div>

            <div>
                <input type="submit" class="btn btn-primary" value="submit">
                <a href="/" class="btn btn-secondary">Cancel </a>
            </div>
        </form>
    </div>
</body>

</html>