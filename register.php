<?php 
	require_once 'php/utils.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="<?php echo createToken(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href ='css/register.css'/>

    <title>Register</title>
</head>
<body>
    <section>
        <div class="imgBx">
            <img src="image/folder4.png" alt="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <!-- <p>Hi</p> -->
                <h2>Register</h2>
                
                <form action="" id="registerForm" method="post">
                    <div class="inputBx">
                        <div id="errs" class="errorcontainer"></div>
                        <span>Username</span>
                        <input type="text" id="name" name="name" required onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}"/>
                    </div>
                    <div class="inputBx">
                        <span>Email</span>
                        <input type="email" id="email" name="email" required onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}"/>
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" id="password" name="password" required onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}">
                    </div>
                    <div class="inputBx">
                        <span>Confirm Password</span>
                        <input type="password" id="confirm-password" name="confirm-password" required onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}">
                    </div>
                    <!-- <div class="remember">
                        <label for=""><input type="checkbox" name="">Remember me</label>
                    </div> -->
                    <div class="inputBx">
                        <!-- <input type="submit" value="SIGN UP" onclick="register();"> -->
                        <!-- <div class="btn" onclick="login();">Log In</div> -->
                        <div class="button"  onclick="register();">SIGN UP</div>
                    </div>
                    <div class="inputBx">
                        <p>Have an account? <a href="login">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>