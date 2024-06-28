<!doctype html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!------ Include the above in your HEAD tag ---------->
</head>

<body class="bg-light">
    <div id="login">
        <!-- <hr class="sctn-line mb-1 w-75 mx-auto"> -->
        <div class="container">
            <form id="login-form" class="form w-75 mx-auto mt-5 p-3" action="" method="post">
                <h1 class="text-center  pt-5" style="color:var(--blue);">Login form</h1>
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column">
                        <div id="login-box">

                            <div class="form-group">
                                <label for="username" style="color:var(--blue);">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" style="border-radius: 50px;  border:1px solid var(--blue);">
                            </div>
                            <div class="form-group">
                                <label for="password" style="color:var(--blue);">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" style="border-radius: 50px;  border:1px solid var(--blue);">
                            </div>
                            <div class="form-group">
                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                <input type="submit" name="submit" class="btn btn-success btn-md m-2" value="Submit">
                            </div>
                            <div id="register-link" class="text-right">Not have an Account?
                                <a href="userRegistration" style="color:var(--blue);">Register here</a>
                            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>