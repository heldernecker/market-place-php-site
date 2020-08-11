<?php
session_start();
$user = $_SESSION["user"];

$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "project");
 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>

<head>
    <title>Garage Sales</title>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="row w-100">
                <div class="col-6">
                    <span class="navbar-text text-white"> Hello <?php echo $user; ?></span>
                </div>
                <div class="col-6">
                    <ul class="navbar-nav mr-auto" style="float: right;">
                        <li style="margin-right: 10px;" class="nav-item"><a href="create_garage.php" class="btn btn-light">List Garage Sale</a></li>
                        <li style="margin-right: 10px;"class="nav-item"><a href="market_home.php" class="btn btn-info">Market Place</a></li>
                        <li class="nav-item"><a href="index.php" class="btn btn-danger">Log out</a></li>
                    </ul>
                </div>                         
            </div>            
        </nav><br>
        <div class="jumbotron jumbotron-fluid bg-info text-white border border-dark">
            <div class="container">
                <h1 class="display-5">Garage Sales - Kelowna</h1>                
            </div>
        </div>
        
<?php

$sql = "SELECT * FROM users inner join garage on users.id = garage.user_id ORDER BY date ASC";
$result = mysqli_query($mysqli, $sql);
   
while ($info = mysqli_fetch_array($result)) {
    $title = $info['title'];
    $description = $info['description'];
    $address = $info['address'];
    $date = $info['date'];
    $user_name = $info['f_name']." ".$info['l_name'];
    $hours = $info['start_hour']." - ".$info['end_hour'];
    
    // Not using this block
    $map_block = ""
            . "<div class=\"card border-dark bg-light mb-3\" style=\"max-width: 100%;\">"
                . "<div class=\"row no-gutters\">"
                    . "<div class=\"col-md-3\">"
                        . "<div id=\"googleMap\" style=\"width:100%;height:100%;\"></div>"
                    . "</div>"
                    . "<div class=\"col-md-9\">"
                        . "<div class=\"card-body\">"
                            . "<h5 class=\"card-title\">$title</h5>"
                            . "<p class=\"card-text\">$description</p>"
                            . "<p class=\"card-text\">Address: $address, Date: $date, Hours: $hours</p>"
                            . "<p class=\"card-text\">Listed by $user_name</p>"
                        . "</div>"
                    . "</div>"
                . "</div>"
            . "</div>";
      
    $listing_block = ""
            . "<div class=\"card text-center border border-dark text-white bg-info mb-3\">"
                . "<div class=\"card-header\">$title</div>"
                . "<div class=\"card-body\">"
                    . "<p class=\"card-text text-left\">$description</p>"
                    . "<hr size=\"10\" noshade>"             
                    . "<p class=\"card-text text-left\">Address: $address, Date: $date, Hours: $hours</p>"
                . "</div>"
                . "<div class=\"card-footer\">"                                   
                    . "<p class=\"text-right card-text\">Listed by $user_name</p>"               
                . "</div>"
            . "</div>";
    
    echo $listing_block;
    echo "<br>";
}
?>

</div>
