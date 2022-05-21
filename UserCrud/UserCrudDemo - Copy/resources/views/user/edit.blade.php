<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />


</head>

<body>
    <div class="container ">
        <h2>Registration</h2>
        <form id="register" method="POST" action="/register" name="register" autocomplete="off">
            @csrf

            <fieldset>

                <P>
                    <label for="name"> Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your Name" />
                </P>
                <!-- <P>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name" />
            </P> -->
                <p>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="example@abc.com" />
                </p>
                <p>
                <div class="form-group">
                    <div class='input-group date' id='date_of_birth'>
                        <input type='date' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                </p>
                <!-- <p>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" />
                </p>
                <p>
                    <label for="confirm_password"> Confirm Password</label>
                    <input id="confirm_password" name="confirm_password" type="password" />
                </p> -->
                <p>
                    <input class="submit" type="submit" value="submit">
                    <!-- <button type="submit">Register</button> -->
                </p>
            </fieldset>
        </form>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script src="/js/form-validation.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker').datetimepicker({
                viewMode: 'days',
                format: 'DD/MM/YYYY'
            });
        });
    </script>


</body>

</html>