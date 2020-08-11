<html>
    <head>
        <title>Create Garage Listing</title>
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
session_start();
$name = filter_input(INPUT_POST, 'name');
$details = filter_input(INPUT_POST, 'details');
$price = filter_input(INPUT_POST, 'price');
$category = filter_input(INPUT_POST, 'category');
$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];

if (!isset($_POST['submit'])) {
?> 
    <body>
        <div class="container">
        <div class="container">
            <h4>Enter the information for creating a Item Listing</h4>
        <p class="text-danger">All fields excpet by pictures are required</p>
        <form method="POST" enctype="multipart/form-data" action="" class="border border-primary p-3" style ="max-width: 75%">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Details</label>
                <div class="col-sm-10">
                    <textarea style ="max-width: 100%" name="details" rows="6" cols="100" 
                              placeholder="Give a brief description of the item, the condition and some details"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control" name="price">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">                
                        <input type="radio" id="Vehicles" name="category" value="Vehicles" class="custom-control-input">
                        <label class="custom-control-label" for="Vehicles">Vehicles</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="Eletronics" name="category" value="Eletronics" class="custom-control-input">
                        <label class="custom-control-label" for="Eletronics">Eletronics</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="Home" name="category" value="Home" class="custom-control-input">
                        <label class="custom-control-label" for="Home">Home</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="Clothing" name="category" value="Clothing" class="custom-control-input">
                        <label class="custom-control-label" for="Clothing">Clothing</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="Entertainment" name="category" value="Entertainment" class="custom-control-input">
                        <label class="custom-control-label" for="Entertainment">Entertainment</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="Other" name="category" value="Other" class="custom-control-input">
                        <label class="custom-control-label" for="Other">Other</label>
                    </div>                    
                </div>
            </div>
            <div class="form-group row">
                <div class="custom-file" style ="max-width: 40%">
                <input name="pictures[]" multiple type="file" class="custom-file-input" id="pictures" lang="es">
                <label class="custom-file-label" for="pictures">Add Pictures</label>
            </div>
            </div>            
            <div class="row justify-content-end">
                <a style="margin-right: 10px;" href="market_home.php" class="btn btn-secondary">Cancel</a>
                <input style="margin-right: 15px;" type="submit" class="btn btn-primary" value="Create Garage Listing" 
                name="submit">                
            </div>            
        </form>
        </div>
    

<?php
} elseif (isset($_POST['submit'])) {
    $item_id = rand(0, 2147483647);
    
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "project");
    
    $sql = "INSERT INTO `items` (`id`, `user_id`, `name`, `details`, `price`, `category`, `date_of_post`) 
    VALUES ('".$item_id."', '".$user_id."', '".$name."', '".$details."', '".$price."', '".$category."', CURRENT_DATE())";

    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
    $target_path = "/var/www/html/FinalProject/users-directory/$user_email/";

    for ($i =0; $i < count ($_FILES['pictures']['name']); $i++){
        $file_path = $target_path . basename($_FILES['pictures']['name'][$i]);
        $db_path = "/FinalProject/users-directory/$user_email/".basename($_FILES['pictures']['name'][$i]);
        $upload_msg = "";
        $msg_type = "";      

        if(move_uploaded_file($_FILES['pictures']['tmp_name'][$i], $file_path)) {
            $upload_msg = "Pictures have been uplodaded!";
            
            $msg_type = "primary";
            $sql = "INSERT INTO `pictures` (`item_id`, `user_id`, `path`) "
            . "VALUES ('".$item_id."', '".$user_id."', '".$db_path."')";

            $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
            
        } else {
            $upload_msg = "No pictures uploaded!";
            $msg_type = "alert";            
        }
    }
    
    
    
    echo "<body>";
    echo "<div class=\"container\">";
    echo "<div class=\"alert alert-primary\" role=\"alert\">";
        echo "Your item has been listing!";
    echo "</div>";
    echo "<div class=\"alert alert-$msg_type\" role=\"alert\">";
        echo $upload_msg;
    echo "</div>";
    echo "<a href=\"market_home.php\" class=\"btn btn-primary btn-lg\">Back to Listings</a>";
    echo "</div>";
    echo "<body/>";
}
?>

</body>
</html>