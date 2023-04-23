<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="wrapper">
        <div class="col-6 content-user">
            <div class="login-form-user">
                <div class="judul-forms-ap">
                    LOGIN AS APOLLIANS
                </div>
                <div class="image-user">
                    <img src="user.png" alt=""></img>
                </div>
                <div class="button">
                    <button type="button" class="btn buton-user btn-md"
                        onclick="window.location = '{{url('/data/viewuser')}}'">Masuk</button>
                </div>
            </div>
        </div>
        <div class="col-6 content-admin">
            <div class="login-form-admin">
                <div class="judul-forms">
                    LOGIN AS ADMIN
                </div>
                <form method="get" action="{{url('/validate')}}">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Username</label>
                        <input type="text" class="form-control mt-2" id="formGroupExampleInput"
                            placeholder="Masukan username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Password</label>
                        <input type="password" class="form-control mt-2" id="formGroupExampleInput2"
                            placeholder="Masukan Password" name="password"">
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="hidepw()">
                            <label class="form-check-label" for="flexCheckDefault">
                                Show Password
                            </label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn button-admin btn-md">Masuk</button>
                    </div>
                </form>
            </div>
            <div class="image-admin animate__animated animate__bounce">
                <img src="admin.png" alt="">
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datepicker').datepicker();
        });

    </script>
    <script src="script.js"></script>


</body>

</html>
