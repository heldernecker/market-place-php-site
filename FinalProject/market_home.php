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
    <title>Market Place</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <style>
    /* Make the image fully responsive */
    .carousel-inner img {
      width: 100%;
      height: 100%;
    }
  </style>
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
                        <li style="margin-right: 10px;" class="nav-item"><a href="sell_item.php" class="btn btn-light">Sell Something</a></li>
                        <li style="margin-right: 10px;"class="nav-item"><a href="home.php" class="btn btn-info">Garage Sales</a></li>
                        <li class="nav-item"><a href="index.php" class="btn btn-danger">Log out</a></li>
                    </ul> 
                </div>                             
            </div>            
        </nav><br>
        <div class="jumbotron jumbotron-fluid bg-info text-white border border-dark">
            <div class="container">
                <h1 class="display-5">Market Place - Kelowna</h1>
            </div>
        </div>
        
<?php

$sql = "SELECT * FROM users inner join items on users.id = items.user_id ORDER BY date_of_post DESC";
$result = mysqli_query($mysqli, $sql);
$item_count = 0;
   
while ($info = mysqli_fetch_array($result)) {
    $div_id = "item".$item_count;
    $name = $info['name'];
    $details = $info['details'];
    $price = $info['price'];
    $date = $info['date_of_post'];
    $user_name = $info['f_name']." ".$info['l_name'];
    $contact = $info['email'];
    $user_id = $info['user_id'];
    $item_id = $info['id'];
    $carousel_slide = "";
    $carousel_inner = "";
    
    $pic_sql = "SELECT * FROM `pictures` WHERE item_id = $item_id AND user_id = $user_id";
    $pic_result = mysqli_query($mysqli, $pic_sql);
    
    $count = 0;    
    while ($pic_info = mysqli_fetch_array($pic_result)) {
        $db_path = $pic_info['path'];
        if ($count == 0) {
            $carousel_slide = $carousel_slide."<li data-target=\"#$div_id\" data-slide-to=\"$count\" class=\"active\"></li></li>";
            $carousel_inner = $carousel_inner.""
                . "<div class=\"carousel-item active\">"
                    . "<img src=\"$db_path\" clas=\"card-img\" alt=\"Item picture\">"
                . "</div>";
        } else {
            $carousel_slide = $carousel_slide."<li data-target=\"#$div_id\" data-slide-to=\"$count\"></li>";
            $carousel_inner = $carousel_inner.""
                . "<div class=\"carousel-item\">"
                    . "<img src=\"$db_path\" clas=\"card-img\" alt=\"Item picture\">"
                . "</div>";            
        }        
        $count++;
    }
    
    $carousel_block = ""
            . "<div id=\"$div_id\" class=\"carousel slide\" data-ride=\"carousel\">"
                . "<ul class=\"carousel-indicators\">"
                    . "$carousel_slide"                    
                . "</ul>"
                . "<div class=\"carousel-inner\">"
                    . "$carousel_inner"                    
                . "</div>"
                . "<a class=\"carousel-control-prev\" href=\"#$div_id\" data-slide=\"prev\">"
                    . "<span class=\"carousel-control-prev-icon\"></span>"
                . "</a>"
                . "<a class=\"carousel-control-next\" href=\"#$div_id\" data-slide=\"next\">"
                    . "<span class=\"carousel-control-next-icon\"></span>"
                . "</a>"
            . "</div>";
    
    $item_block = ""
            . "<div class=\"card border-dark text-white bg-info mb-3\" style=\"max-width: 100%;\">"
                . "<div class=\"row no-gutters\">"
                    . "<div class=\"col-md-3\">"
                        . "$carousel_block"
                    . "</div>"
                    . "<div class=\"col-md-9\">"
                        . "<div class=\"card-body\">"
                            . "<h5 class=\"card-title\">$name</h5>"
                            . "<p class=\"card-text\">$details</p>"
                            . "<p class=\"card-text\">$ $price</p>"                            
                            . "<p class=\"card-text\">Contact: $contact</p>"
                            . "<p class=\"card-text\">Listed by $user_name in $date</p>"
                            
                        . "</div>"
                    . "</div>"
                . "</div>"
            . "</div>";
    
    echo $item_block;
    $item_count++;
}
?>

    </div>
</body>    

