<html>
    <head>
        <title>Create Account</title>
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

<?php

$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if (isset($_POST['submit'])) {
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "project");
    
    $sql = "SELECT * FROM users WHERE email = '".$email."'";

    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
    if (mysqli_num_rows($result) >= 1) {
    ?>

<body>
    <div class="container">
        <div class="alert alert-danger" role="alert">
            The email address "<?php echo $email ?>" is already in use!
        </div>
        <h4>Enter your information for creating an account</h4>
        <p class="text-danger">All fields bellow are required</p>
        <form method="POST" action="" class="border border-primary p-3" style ="max-width: 50%">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">First Name</label>
                <div class="col-sm-8">
                    <input required type="text" class="form-control" name="fname">
                </div>
            </div>     
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Last Name</label>
                <div class="col-sm-8">
                    <input required type="text" class="form-control" name="lname">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input required type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input required type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="row justify-content-end">
                <a style="margin-right: 10px;" href="index.php" class="btn btn-secondary">Cancel</a>
                <input style="margin-right: 15px;" type="submit" class="btn btn-primary" value="Create Account" 
                name="submit">             
            </div>        
        </form>
    </div>
</body>
</html        
    <?php    
    } else {
        $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "project");

        $targetemail = filter_input(INPUT_POST, 'email');
        $targetpasswd = filter_input(INPUT_POST, 'password');

        $sql = "INSERT INTO `users` (`f_name`, `l_name`, `email`, `password`) 
        VALUES ('".$fname."', '".$lname."', '".$email."', PASSWORD('".$password."'))";

        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
        
        mkdir("/var/www/html/FinalProject/users-directory/".$email."/", 733);

        echo "<body>";
        echo "<div class=\"container\">";
        echo "<div class=\"alert alert-primary\" role=\"alert\">";
            echo "Thank you for signing up! Use your email ".$targetemail. " for log in!";
        echo "</div>";
        echo "<a href=\"index.php\" class=\"btn btn-primary btn-lg\">Login Page</a>";
        echo "</div>";
        echo "<body/>";
    }
}

elseif (!isset($_POST['submit'])) { // if page is not submitted to itself echo the form
?>
<body>
    <div class="container">
        <h4>Enter your information for creating an account</h4>
        <p class="text-danger">All fields bellow are required</p>
        <form method="POST" action="" class="border border-primary p-3" style ="max-width: 60%">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">First Name</label>
                <div class="col-sm-8">
                    <input required type="text" class="form-control" name="fname">
                </div>
            </div>     
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Last Name</label>
                <div class="col-sm-8">
                    <input required type="text" class="form-control" name="lname">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input required type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input required type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="row justify-content-end">
                <a style="margin-right: 10px;" href="index.php" class="btn btn-secondary">Cancel</a>
                <input style="margin-right: 15px;" type="submit" class="btn btn-primary" value="Create Account" 
                name="submit">             
            </div>        
        </form>
    </div>
</body>
</html
<?php
}
?>