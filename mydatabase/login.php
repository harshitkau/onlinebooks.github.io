<?php

    include 'config.php';
    
    session_start();
    error_reporting(0);

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']); 

        $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows>0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: project/homepage/homepage.php");


        } else{
            echo "<script>alert('Email or Password is worng.')</script>";
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.php</title>
    <link rel="stylesheet" href="loginpage.css">
</head>
<body>
    <header>
        <h1>Online Book store</h1>
    </header>
    
<div class="login">
        <div class="box">
            <h1>LOGIN Here</h1>
            <div class="member">
                <label>
                    <p>Already a Member? Log in here.</p>
                </label>
            </div>


            <form action="" method="POST">


            <div class="box1">
                <div class="user">
                    <input type="text" name="email" id="text1" placeholder="Email" value="<?php echo $email; ?>" required>
                </div>
                <div class="pass">
                    <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="remem">
                    <label>
                        <input name="rememeberme" type="checkbox" id="rememberme" value="forever">
                        Remember me
                    </label>
                </div>
                <button name="submit" id="btn1">Login</button>
                <label id="signup">
                    <p><a href="signup.php">If you not sign in. Register here</a></p>
                </label>
            </div>
            </form>
        </div>
    </div> 
    
</body>
</html>