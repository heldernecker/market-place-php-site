<?php
session_start();

if ((!filter_input(INPUT_POST, 'email'))
        || (!filter_input(INPUT_POST, 'password'))) {
	header("Location: index.php");
	exit;
}

//connect to server and select database
$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "project");

//create and issue the query
$targetemail = filter_input(INPUT_POST, 'email');
$targetpasswd = filter_input(INPUT_POST, 'password');
$sql = "SELECT id, f_name, l_name FROM users WHERE email = '".$targetemail.
        "' AND password = PASSWORD('".$targetpasswd."')";

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) == 1) {

    //if authorized, get the values of f_name l_name
    while ($info = mysqli_fetch_array($result)) {
	$f_name = stripslashes($info['f_name']);
	$l_name = stripslashes($info['l_name']);
        $user_id = stripslashes($info['id']);
    }
	
    //set authorization cookie using curent Session ID
    setcookie("auth", session_id(), time()+60*30, "/", "", 0);
    
    $_SESSION["user"] = "$f_name $l_name";
    $_SESSION["user_id"] = $user_id;
    $_SESSION["user_email"] = $targetemail;
    
    header("Location: home.php");
    exit;
} else {
    //redirect back to login form if not authorized
    header("Location: index.php");
    exit;
}
?>