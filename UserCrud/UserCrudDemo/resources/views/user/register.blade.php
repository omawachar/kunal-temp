<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Crud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        form .error {
            color: #ff0000;
        }
    </style>
</head>

<body>

    <div class="container border  mt-1 p-3">

        <h2 class="text-center">Register form</h2>
        <br>




        <form action="register" id="register" method="POST" name="register" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name" value="{{old('name')}}">
            </div>


            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@abc.com" value="{{old('email')}}" />
            </div>
            <div class="form-group">
                <label for="">select Gender</label>
                <div class="">

                    <div class="form-check">
                        <input id="maleRadio" type="radio" class="form-check-input" value="male" name="gender" checked>
                        <label for="maleRadio" class="form-check-label"> Male</label>
                    </div>

                    <div class="form-check">
                        <input id="femaleRadio" type="radio" class="form-check-input" value="female" name="gender">
                        <label for="femaleRadio" class="form-check-label">Female</label>
                    </div>

                </div>
            </div>

            <div class="sm-4">
                <label for=""> Date of Birth</label>
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" name="date_of_birth">
                    <span class="input-group-append">
                        <span class="input-group-text bg-white d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label> Role </label>
                <select class="form-check" id="role_id" name="role_id" value="{{ old('role') }}">
                    <option disabled selected> Select Role </option>
                    @foreach($roles as $role){
                    <option value="{{$role->id}}"> {{$role->name}} </option>
                    }
                    @endforeach
                </select>
            </div>

            <div>
                <label>Profile Image</label>

                <div class="form-inline">
                    <img id="preview-image-before-upload" class="rounded img-thumbnail" alt="preview image" style="max-height: 100px; max-width: 100px; ">
                    <input type="file" name="profile_image" class="form-control" id="image" placeholder="image">

                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}" />
            </div>
            <div class="form-group">
                <label for="confirm_password"> Confirm Password</label>
                <input id="confirm_password" class="form-control" name="confirm_password" type="password" />
            </div>
            <input  type="submit" value="submit" class="btn btn-primary ">
        </form>



    </div>

    <!-- all scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/form-validation.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker({
                format: 'yyyy/mm/dd',
                endDate: '-today',
                weekStart: 0,
                autoclose: true,
                todayHighlight: true,
                orientation: "auto"
            });
        });
    </script>

</body>

</html>