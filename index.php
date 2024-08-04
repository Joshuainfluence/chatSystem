<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
} 
include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>
                Influence Chat App
            </header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" name="fname" placeholder="First Name" id="" required>
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" id="" required>
                    </div>
                </div>

                <div class="field input">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Enter your Email" id="" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your Password" id="" required>
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="">Select Image</label>
                    <input type="file" name="image" placeholder="Enter your Password" id="" required>
                </div>
                <div class="field button">

                    <input type="submit" name="" value="Continue to chat" id="">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/signup.js"></script>

</body>

</html>