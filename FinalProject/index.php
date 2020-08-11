<?php
session_start();
session_unset();
session_destroy();
?>

<html>
    <head>       
        <title>Login Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
        <div class="jumbotron jumbotron-fluid bg-info text-white border border-dark">
            <div class="container">
                <h1 class="display-5">Welcome to Kelowna Market Place</h1>
            </div>
        </div>
        <form class="form-inline p-3" method="post" action="user_login.php">            
            <div class="form-group mx-sm-3 mb-2">
                <label class="sr-only">Email</label>
                <input name="email" type="email" class="form-control"placeholder="Email">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label class="sr-only">Password</label>
                <input name="password" type="password" class="form-control"placeholder="Password">
            </div>    
            <div class="form-group mx-sm-3 mb-2">
                <input type="submit" name="submit" value="Login" class="btn btn-primary"/>
            </div>
        </form><br>
        <a href="create_account.php" class="btn btn-secondary">Create Account</a>
        </div>
    </body>
</html>
