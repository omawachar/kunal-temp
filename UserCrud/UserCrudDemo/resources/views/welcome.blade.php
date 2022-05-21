<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container border mt-2">
        <h2 class="py-3 text-center">
            Bootstrap 4 form classes
        </h2>
        <div class="row py-3">
            <div class="col-md-6">
                <div class="form-group p-2">
                    <label for="">Name</label>
                    <input type="text " class="form-control">
                </div>
                <div class="form-group p-2">
                    <label for="">password</label>
                    <input type="password" class="form-control">
                    <small class="form-text text-muted"> your password must have 4 characters </small>
                </div>
                <div class="form-group p-2">
                    <label for="">Country</label>
                    <select name="" id="" class="form-control">
                        <option value="">India</option>
                        <option value="">England</option>
                        <option value="">Australia</option>
                        <option value="">America</option>
                    </select>
                </div>
                <div class="form-group p-2">
                    <label for="">messaage</label>
                    <textarea name="" id="" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-6"></div>

        </div>
    </div>

</body>

</html>