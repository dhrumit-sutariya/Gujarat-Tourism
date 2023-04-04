<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget</title>
    <link rel="stylesheet" href="Css/forget.css">
</head>
<body>
    <div class="main">
        <div class="container">
            <h1>Forget Password</h1>
            <form method="post" action="" id="data">

                <label>E-Mail&nbsp;&nbsp;</label>
                <input type="email" name="user"><br>
                
                <label>Security</label>
                <input type="text" placeholder="Favourite Book" name="book"/><br>

                <button type="submit" id="btn" name="submit">See Password</button>
            </form>
        </div>
    </div>

</body>

<?php
include('database.php');
if($_POST){

    $mail = $_POST['user'];
    $security = $_POST['book'];

    $sql = "SELECT * FROM Tourism WHERE email = '$mail' AND favoutite_book = '$security' ";

    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);  

    if($count == 1){
        $row = $result->fetch_assoc();
        $correct = $row['P_assword'];
        echo "<script>alert('Your Password is $correct')</script>";
    }else{
        echo "<br>";
        echo "Enter valid id and security question";
    }

}

?>
</html>