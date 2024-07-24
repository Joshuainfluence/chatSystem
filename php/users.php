<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id != {$outgoing_id}"); //this will display all users in the database except the user that is currently logged in to the account

// you can also use this sql query in place of the other one
//SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}"
$output = null;
if (mysqli_num_rows($sql) == 1) {
    $output .= "No users are available to chat";
}elseif (mysqli_num_rows($sql) > 0) {
    include "data.php";
}
echo $output;
