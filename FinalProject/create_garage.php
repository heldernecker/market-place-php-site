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
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$address = filter_input(INPUT_POST, 'address');
$date = filter_input(INPUT_POST, 'date');
$start_hour = filter_input(INPUT_POST, 'start_hour');
$end_hour = filter_input(INPUT_POST, 'end_hour');
$user_id = $_SESSION['user_id'];

if (!isset($_POST['submit'])) {
?> 
    <body>
        <div class="container">
            <h4>Enter the information for creating a Garage Listing</h4>
        <p class="text-danger">All fields bellow are required</p>
        <form method="POST" action="" class="border border-primary p-3" style ="max-width: 75%">        
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea style ="max-width: 100%" name="description" rows="10" cols="100" 
                              placeholder="Give a brief description of items that will be for sale"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="address">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input required type="date" class="form-control" name="date">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Hours</label>
                <label class="col-sm-2 col-form-label">Starts at</label>
                <div class="col-sm-3">
                    <select class="custom-select" name="start_hour">                        
                        <option value="08:00 AM">08:00 AM</option>
                        <option value="09:00 AM">09:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="01:00 PM">01:00 PM</option>
                        <option value="02:00 PM">02:00 PM</option>
                        <option value="03:00 PM">03:00 PM</option>
                        <option value="04:00 PM">04:00 PM</option>
                        <option value="05:00 PM">05:00 PM</option>
                        <option value="06:00 PM">06:00 PM</option>
                    </select>                       
                </div>
                <label class="col-sm-2 col-form-label">Ends at</label>
                <div class="col-sm-3">
                    <select class="custom-select" name="end_hour">                        
                        <option value="08:00 AM">08:00 AM</option>
                        <option value="09:00 AM">09:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="01:00 PM">01:00 PM</option>
                        <option value="02:00 PM">02:00 PM</option>
                        <option value="03:00 PM">03:00 PM</option>
                        <option value="04:00 PM">04:00 PM</option>
                        <option value="05:00 PM">05:00 PM</option>
                        <option value="06:00 PM">06:00 PM</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-end">
                <a style="margin-right: 10px;" href="home.php" class="btn btn-secondary">Cancel</a>
                <input style="margin-right: 15px;" type="submit" class="btn btn-primary" value="Create Garage Listing" 
                name="submit">                  
            </div>            
        </form>
        </div>
    

<?php
} elseif (isset($_POST['submit'])) {
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "project");    
    
    $sql = "INSERT INTO `garage` (`user_id`, `title`, `description`, `address`, `date`, `start_hour`, `end_hour`) 
    VALUES ('".$user_id."', '".$title."', '".$description."', '".$address."', '".$date."', '".$start_hour."', '".$end_hour."')";

    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
    echo "<body>";
    echo "<div class=\"container\">";
    echo "<div class=\"alert alert-primary\" role=\"alert\">";
        echo "Your Garage Sale has been listing!";
    echo "</div>";
    echo "<a href=\"home.php\" class=\"btn btn-primary btn-lg\">Back to Listings</a>";
    echo "</div>";
    echo "<body/>";
}
?>

</body>
</html>