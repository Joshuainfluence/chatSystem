<?php
session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    //checking if entered email and password matched any from the table in the database

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) { //if users credentials match
        $row = mysqli_fetch_assoc($sql);
        $status = "Active now";
        // once user login  we'll update the status to Active now and in the logout  we'll update the status to offline now if user logs out 
        $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
        if ($sql2) {
            $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique _id in other php file
        echo "success";  
        }
    } else {
        echo "Email or password is incorrect ";
    }
    
} else {
    echo "All input fields are required";
}

