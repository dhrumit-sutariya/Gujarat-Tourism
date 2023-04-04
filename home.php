<?php
// Start the session
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>

  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- font link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="Css/home.css">
  <link rel="stylesheet" href="Css/navbar.css">
</head>
<style>
  h1{
    color: white;
    font-size: 23px;
  }
  .avatar{
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-left: 10px;
  }
</style>

<body>
  <?php
  if (!isset($_COOKIE['count'])) {
    $cookie = 1;
    setcookie("count", $cookie);
  } else {
    $cookie = ++$_COOKIE['count'];
    setcookie("count", $cookie, time() + 12);
    echo $cookie;
  }
  ?>
  <nav class="navbar">
    <a class="brand" href="home.php">GJ Tourism</a><br>

    <img src="Upload/<?php echo $_SESSION["image"]; ?>" alt="Avatart" style="cursor: grab;" class="avatar">
    <h1><?php echo "Welcome ".$_SESSION["userName"]; ?></h1>
    <p id="pageReloadCount"></p>
    <ul>
      <li>
        <a href="touristplaces.html">Places</a>
      </li>
      <li>
        <a href="virtualtourguide.html">Virtual Tour</a>
      </li>
      <li>
        <a href="aboutus.html">About us</a>
      </li>
      <li>
        <a href="contactus.html">Contact</a>
      </li>
    </ul>
  </nav>
  <div class="main">
    <div class="container">
      <div>
        <h1>Discover the world</h1>
        <p>'The world is a book and those who don’t travel read only one page.'</p>
      </div>

      <div class="btn1">
        <a href="touristplaces.html"><button type="submit">Explore</button></a>
      </div>
      <div class="btn">
        <a href="aboutus.html"><button type="submit">About us</button></a>
      </div>
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></scrip>
</body>

</html>