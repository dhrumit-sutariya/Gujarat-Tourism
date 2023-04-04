<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/userauth.css">
</head>

<body>
    <div class="main">
        <div class="container">
            <h1>Log in</h1>
            <form method="post">

                <label>E-mail&nbsp;&nbsp;</label>
                <input type="email" placeholder="example@gmail.com" name="email"><br>

                <label>Password</label>
                <input type="password" placeholder="Password" name="password" /><br><br>

                <p>Not Registered yet ? <a href="register.php">Register</a></p><br>
                <a href="forget.php">Forget Password</a><br>
                <button type="submit" id="btn" name="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php
    include 'database.php';  
    if (isset($_POST['submit'])) {

        $email = $_POST["email"];
        $Password = $_POST["password"];

        if ($_POST['email']) {

            $sql = "SELECT * FROM Tourism WHERE email = '$email' AND P_assword = '$Password' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);  

            if($count == 1){
                $cookie_name = "user_email";
                $cookie_value = $email;
                // echo '<script>console.log($cookie_value)</script>';
                $_SESSION["userName"] = $row["fullname"];
                $_SESSION["image"] = $row["profile_picture"];
                setcookie($cookie_name, $cookie_value, time() + 120, "/");  

                if(isset($_COOKIE['user_email'])) {
                    echo '<script>alert("Cookie is set!!"); window.location.href = "home.php";</script>';
                } else {
                    echo '<script>alert("Fail to set cookie");</script>';
                }

                	
                
            }  
            else{  
                echo "<script>alert ('Invalid Username or Password')</script>";
            }

        }
        $conn->close();
    }

    ?>

</body>

</html>