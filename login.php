<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "pizzatime");

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="icons/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="fonts/Rancho.ttf" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <style>

    </style>
</head>

<body style="background-image: url('img/loginfinal.png'); backgrologinund-position: center center; background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">

<nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-0" id="top" style="background:#7878FF;">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <a class="navbar-brand" href="homepage.php">
            <img src="icons/logo.png" alt="Avatar Logo" style="width:55px;" class="rounded-pill"> 
          </a>
          <li class="nav-item">
            <a class="nav-link active" href="homepage.php"><img src="icons/Pizza Time.png" width="160px" height="50px"></a>
          </li>
        </ul>
        <div style="float:right;">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="login.php"><img src="icons/login-.png" width="45px" height="45px"></a>
            </li>
            </ul>
        </div>
      </div>
    </nav>

 <div class="container" id="container" style="margin-top:2%; position:center; align-items: center;">
   <div style="background: rgba(0,0,0,0.5) center; backdrop-filter: blur(3px); ">
    <div class="container mt-3 shadow mt-3 mb-2 p-3 mx-2">
      <h1 class="fill" style="color: whitesmoke;">Fill the form to login:</h1>
      <form action="login.php" method="POST">
        <div class="mb-3 mt-3 shadow mt-3 mb-2 p-3 mx-2">
          <label for="uname"  class="fill" style="color: whitesmoke;">Username:</label>
          <input type="text" class="form-control" id="uname" placeholder="Enter Username" name="uname" required>
        </div>
        <div class="mb-3 shadow mt-3 mb-2 p-3 mx-2">
          <label for="pwd" class="fill" style="color: whitesmoke;">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
        </div>
        <button type="submit" class="btn shadow mb-4 mx-4" style="background-color:#006FBF; color:white;" name="submit">Login</button>
      </form>
  <h2><a href="index.php" class="mt-3 shadow mb-2 p-3 mx-2" style="color: chocolate;">Click Here to Sign Up</a></h2>
</div>

</div>
</div>
<?php
        if (isset($_POST['submit'])) {
            $uname=$_POST["uname"];
            $pass=$_POST["pass"];
            $q="select * from customer where name='$uname' and pass='$pass';";
            $res=mysqli_query($con, $q);

            $row=mysqli_fetch_array($res);
            if (is_array($row)) {
                $_SESSION['uname']=$row['name'];
                $_SESSION['pass']=$row['pass'];
                echo "<script>location.href='homepage.php'</script>";
            } else {
                echo "<script>alert('Ivalid Username or Password')</script>";
            }
        }
    ?>



</body>
</html>
