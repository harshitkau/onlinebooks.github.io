 <?php
    
    include'config.php';

    error_reporting(0);

    session_start();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']); 
        
        if($password==$cpassword){
            $sql = "SELECT * FROM users WHERE email='$email'";

            $result = mysqli_query($conn, $sql);
              
            if(!$result->num_rows>0){
               
                $sql = "INSERT INTO  users(name,username,email,password) VALUES ('$name','$username','$email','$password')";
                $result = mysqli_query($conn, $sql); 
                if($result){
                    echo "<script>alert('registration succesful.')</script>";
                    $name = "";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                    header("Location:login.php");
            }
            else{
                echo "<script>alert('Somthing Went Wrong.')</script>";
            }
        }
        else{
            echo "<script>alert('Email Address already exits.')</script>";
           }
        }
    
        else{
            echo "<script>alert('password not matched.')</script>";
        }

    
    }

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signuppagestyle.css">
    <title>Registration Form</title>
</head>

<body>
    <header>
        <div>
            <h1>Online Book Store</h1>
        </div>

    </header>


    <section>
        <h1>Registration Form</h1>
        <form action="" method="POST">

            <div class="block">
                <label class="regi">
                    <p>Name</p>
                </label>
                <input type="text" name="name" id="box" value="<?php echo $name; ?>" required>
            </div>
            <div class="block">
                <label class="regi">
                    <p>UserName or UserId</p>
                </label>
                <input type="text" name="username" id="box" value="<?php echo $username; ?>" required>
            </div>


            <div class="block">
                <label class="regi">
                    <p>Email Id</p>
                </label>
                <input type="text" name="email" id="box" value="<?php echo $email; ?>" required>
            </div>

            <div class="block">
                <label class="regi">
                    <p>Password</p>
                </label>
                <input type="text" name="password" id="box" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="block">
                <label class="regi">
                    <p>Confirm Password</p>
                </label>
                <input type="password" name="cpassword" id="box" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="sign">
                <!-- <input type="button" value="Register Now" id="register"> -->
                <button type="submit" name="submit" id="register">Register Now</button>
                <label id="signup">
                    <p><a href="#">Already Registered. LOGIN here</a></p>
                </label>
            </div>
        </form>
    </section>



    <footer>
        <!-- <h2>About</h2> -->
        <div class="flexing">
            <div class="recs">
                <img src="./recimg.png" alt="recs" height="100px" width="100px">
                <p>Rajkiya Engineering College, Sonbhadra <br> 231206 <br>Tel: 05444-252002</p>
            </div>
            <div class="address">
                <span>Address:</span>
                <p>Rajkiya Engineering College <br>Churk, Sonbhadra <br>pin: 231206 <br>Tel:
                    05444-252002</p>
            </div>
            <div class="connect">
                <p>Connect with us</p>
                <nav>
                    <ul>
                        <li><img src="./fbimg.png" alt="" height="50px" width="50px"></li>
                        <li><img src="./instaimg.png" alt="" height="50px" width="50px"></li>
                        <li><img src="./twitimg.png" alt="" height="50px" width="50px"></li>
                    </ul>
                </nav>
                <span>Rajkiya Engineering College Sonbhadra</span>
            </div>
        </div>

    </footer>

</body>

</html>