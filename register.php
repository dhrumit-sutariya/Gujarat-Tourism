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
  <title>Registration</title>
  <link rel="stylesheet" href="Css/register.css">
</head>

<body>
  <div class="main">
    <div class="container">
      <h1>Registration</h1>
      <form action="" method="post" enctype="multipart/form-data">

        <input type="radio" name="person" value="user" required />
        <label>User&nbsp;&nbsp;</label>
        <input type="radio" name="person" value="tour guide" />
        <label>Tour Guide&nbsp;&nbsp;</label>
        <input type="radio" name="person" value="admin" />
        <label>Admin</label><br>

        <label>Full Name</label>
        <input type="text" placeholder="Name" name="Name" required><br>

        <label>Contact No.</label>
        <input type="tel" placeholder="8888888888" name="contact" required min="10" max="10" /><br>

        <label>E-Mail</label>
        <input type="email" placeholder="abc@example.com" name="email" required><br>

        <label>Gender</label>
        <input type="radio" name="gender" value="male" required />
        <label>Male&nbsp;&nbsp;</label>
        <input type="radio" name="gender" value="female" />
        <label>Female</label><br>
 
        <label for="dob">Date Of Birth</label>
        <input type="date" id="dob" name="dob"><br>

        <label>Password</label>
        <input type="password" placeholder="Password" name="password" required /><br>

         


        <label>Favourite Book</label>
        <input type="text" placeholder="" name="book" id="book" required><br>
        <br>
        <p class="warning">In case you forget the password</p>

        <p>Already Have an Account? <a href="userauthentication.php">Log in</a></p>

        <button type="submit" id="btn">Submit</button>
      </form>
    </div>
  </div>
</body>

<?php

include 'database.php';
if ($_POST) {

  $User_Type = $_POST["person"];
  $Name = $_POST["Name"];
  $Contact_no = $_POST["contact"];
  $Email = $_POST["email"];
  $Gender = $_POST["gender"];
  $Password = $_POST["password"];
  $Favourite_Book = $_POST["book"];
  $Birthday = $_POST["dob"];

  $Profile_Picture = $_FILES["Photos"]["name"];
  $tmp_Profile_Picture = $_FILES["Photos"]["tmp_name"];
  $folder = "Upload/";
  move_uploaded_file($tmp_Profile_Picture, $folder . $Profile_Picture);

  // echo "<pre>";
  // print_r($_FILES['Photos']);
  // echo "</pre>";
  $count = 0;
  $bday = new DateTime($Birthday);
  $today = new Datetime(date('m.d.y'));
  $diff = $today->diff($bday);


  $sql = "INSERT INTO Tourism (user_type,fullname,contact,email,gender,P_assword,favoutite_book,profile_picture)
  VALUES ('$User_Type','$Name','$Contact_no','$Email','$Gender','$Password','$Favourite_Book','$Profile_Picture')";

  if ($diff->y > 18) {
    if ($conn->query($sql) === TRUE) {
      echo '<script>alert("Registered Successfully"); window.location.href = "userauthentication.php";</script>';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  } else {
    echo "<script>alert('Your age is below 18')</script>";
  }

}



?>

</html>