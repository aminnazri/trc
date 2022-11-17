<?php 
	require_once 'php/utils.php'; 
    // echo basename((__DIR__));
    echo getcwd();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="<?php echo createToken(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href ='css/login.css'/>
    <title>Login</title>
</head>
<body>
    <section>
        <div class="imgBx">
            <img src="image/folder4.png" alt="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Login</h2>
                <form action="" id="loginForm">
                    <div class="inputBx">
                        <div id="errs" class="errorcontainer"></div>
                        <span>Email</span>
                        <input type="email" id="email" name="email" required onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}"/>
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" id="password" name="password" required onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}">
                    </div>
                    <div class="remember">
                        <label for=""><input type="checkbox" name="">Remember me</label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="LOGIN" onclick="login();">
                        <!-- <div class="btn" onclick="login();">Log In</div> -->
                    </div>
                    <div class="inputBx">
                        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>