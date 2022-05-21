<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Crud</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />


</head>

<body>
    <div class="container">
        <h2 class=" text-center mt-4">Edit user</h2>

        @if($errors->any())
        {!! implode('', $errors->all('
        <div>:message</div>')) !!}
        @endif

        <form id="update" method="POST" action="{{url('update')}}" autocomplete="off" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
                <label for="name"> Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="{{$user->name}}" />
            </div>
            <div class="form-group">
                <label for="">select Gender</label>
                <div class="form-control">

                    <div class="form-check">
                        <input id="maleRadio" type="radio" class="form-check-input" value="male" name="gender" <?php echo ($user->gender == 'male') ? 'checked' : '' ?>>
                        <label for="maleRadio" class="form-check-label"> Male</label>
                    </div>

                    <div class="form-check">
                        <input id="femaleRadio" type="radio" class="form-check-input" value="female" name="gender" <?php echo ($user->gender == 'female') ? 'checked' : '' ?>>
                        <label for="femaleRadio" class="form-check-label">Female</label>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="example@abc.com" value="{{$user->email}}" />
            </div>


            <div class="form-group">
                <label for="datepicker"> Date of Birth </label>
                <div class="input-group date">
                    <input id="datepicker" type="date" name="date_of_birth" class=" form-control " value="{{$user->date_of_birth}}" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
          

           

     


            <input class="submit btn btn-primary" type="submit" value="submit">
            <a href="/" class="btn btn-secondary ">cancel</a>


        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="/js/form-validation.js"></script>
    <!-- <script type="text/javascript">
      
    </script> -->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

        $(function() {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                endDate: 'today',
                autoclose: true
            });
        });
    </script>

</body>

</html>