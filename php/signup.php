<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // validate user email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // let's check if the email already exist in the database or not
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) { //if email already exists
            echo "$email - already exists!!";
        } else {
            // lets chaeck if user upload file or not
            if (isset($_FILES['image'])) { //if file is uplooad
                //    $_FILES[] return an array with file name, file type, error, file size, tmp_name
                $img_name = $_FILES['image']['name']; //getting user upload image name
                $img_type = $_FILES['image']['type']; // getting user upload image type
                $tmp_name = $_FILES['image']['tmp_name']; // this temporary name is userd to save/move file in our folder

                // let's explode image and get the last extenstion like jpg png
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); //here we get the extension of the user explode image file

                $extensions = ['jpg', 'png', 'jpeg']; //valide image extensions stored in array

                if (in_array($img_ext, $extensions) === true) { //if user uploaded image ext is matched with any array extension
                    $time = time(); //this will return us current time. we nedd this because when you are uploading user img to in our folder we rename user file with current time, so that all the image file will have unique name

                    // remember we don't upload user uploaded file in the database, we just save the file url there. Actual file will be saved in our particular folder
                    $new_image_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name, "images/".$new_image_name)){ //if user upload image move to our folder successfully
                        $status = "Active now"; //once user signed up thne his status will be active now 
                        $random_id = rand(time(), 1000000); //creating random id for user

                        // let's insert all data inside table
                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')");
                        if ($sql2) { //if the data is inserted
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique _id in other php file
                                echo "success"; 
                            } 
                            
                        } else {
                           echo "Something went wrong!";
                        }
                        
                    }
                    
                } else {
                    echo "Please select an image file - jpg, jpep png";
                }
                

            } else {
                echo "Please upload your image";
            }
        }
    } else {
        echo "$email - This is not a valid email";
    }
} else {
    echo "All fields are required";
}
