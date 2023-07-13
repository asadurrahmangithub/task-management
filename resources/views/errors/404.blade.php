<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap Css -->
    <link href="{{asset('admin')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
</head>
<body class="auth-body-bg">
    <div class="bg-overlay pt-5 mt-5"></div>
        <div class="my-5 pt-5 mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="ex-page-content text-center">
                                    <h1 class="text-danger" style="font-size: 100px; padding-top: 20px">404!</h1>
                                    <h3 class="text-danger">Sorry, page not found</h3><br>

                                    <button class="btn btn-info mb-5 waves-effect waves-light" onclick="history.back()"> GO BACK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{asset('admin')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
