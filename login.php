<?php 
include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>
                Influence Chat App
            </header>
            <form action="#" autocomplete="off">
                <div class="error-txt"></div>
            

                <div class="field input">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Enter your Email" id="">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your Password" id="">
                    <i class="fa fa-eye"></i>
                </div>
              
                <div class="field button">

                    <input type="submit" name="" value="Continue to chat" id="">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/login.js"></script>


</body>

</html>