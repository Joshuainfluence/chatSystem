<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat app</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.css">
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>
                Realtime Chat App
            </header>
            <form action="#" enctype="multipart/form-data">
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
            <div class="link">Already signed up? <a href="login.html">Login now</a></div>
        </section>
    </div>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/signup.js"></script>

</body>

</html>