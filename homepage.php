<?php
session_start();
$user = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza Time</title>
  <link rel="icon" type="image/x-icon" href="icons/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/home.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>

<body style="background:#A8A8FF;">

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-0" id="top" style="background:#7878FF;">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <a class="navbar-brand" href="homepage.php">
          <img src="icons/logo.png" alt="Avatar Logo" style="width:55px;" class="rounded-pill">
        </a>
        <li class="nav-item">
          <a class="nav-link active" href="homepage.php"><img src="icons/Pizza Time.png" width="160px"
              height="50px"></a>
        </li>
      </ul>
      <div style="float:right;">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="/admin_panel/index.php"><img src="/icons/admin_login.png" width="45px" height="45px">
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link active" href="searchbox.php"><img src="/icons/s3.png" width="45px" height="45px">
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="cart.php"><img src="icons/shopping-bag (5).png" width="45px" height="45px">
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" href="customer.php"><img src="icons/customer.png" width="45px" height="45px"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="login.php"><img src="icons/login-.png" width="45px" height="45px"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>




  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    </div>

    <!--Slideshow-->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/hd3.png" alt="" class="d-block h-50" style="width:100%">
        <div class="carousel-caption">
          <h3 style="font-family: 'PT Sans Narrow', sans-serif;"> </h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/hd1.png" alt="" class="d-block h-50" style="width:100% ">
        <div class="carousel-caption">
          <h3 style="font-family: 'PT Sans Narrow', sans-serif; color:black;"> </h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/hd2.png" alt="" class="d-block" style="width:100%">
        <div class="carousel-caption">
          <h3 style=" font-family: 'PT Sans Narrow', sans-serif; color:black;"> </h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/hd4.png" alt="" class="d-block" style="width:100%">
        <div class="carousel-caption">
          <h3 style=" font-family: 'PT Sans Narrow', sans-serif;"> </h3>
        </div>
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  <?php
$con = mysqli_connect("localhost", "root", "", "pizzatime");

$bname = array();
$bprice = array();
$bimg = array();
$brating = array();
$bingredients = array();
$bgenre = array();

if (isset($_POST['search'])) {
  $search;
  $search = $_POST["p_name"];
  $con = mysqli_connect('localhost', 'root', '', 'pizzatime');
  $query = "select * from product where p_name='$search' OR genre='$search' OR ingredients like '%$search';";
  $res = mysqli_query($con, $query);


  while ($row = mysqli_fetch_row($res)) {
    $id = $row[0];
    $name = $row[1];
    $price = $row[5];
    $image = $row[6];
    $rating = $row[3];
    $ingredients = $row[7];
    $review = $row[4];
    $genre = $row[2];

?>
  <div class="container" style="border: 3px solid #006FBF; background: #9898FF; margin-top:30px; margin-bottom:30px;">
    <div class="col">
      <div class="card shadow p-2" style="width: 400px; margin-left:30%; background: #C8C8FF;">
        <img style="height: 450px;" class="card-img-top" src="img/books/<?php echo $image ?>" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $name ?>
          </h4>
          <h5 class="card-text">
            <?php echo $ingredients ?>
          </h5>
          <p class="card-text"> Rating:
            <?php echo $rating ?> &nbsp;|&nbsp; Price:
            <?php echo $price ?>
          </p>
          <form action="homepage.php" method="post"> <button class="btn" type="submit" name="<?php echo $id ?>"> <img
                src="icons/add-to-basket.png" alt="" height=40px width=40px></button></form>
          <h4>Details: </h4>
          <p>
            <?php echo $review ?>
          </p>
        </div>
      </div>
    </div>
  </div>

  <?php

  }

}


$q = "select * from product";
$tab = mysqli_query($con, $q);
while ($row = mysqli_fetch_row($tab)) {
  array_push($bname, $row[1]);
  array_push($brating, $row[3]);
  array_push($bprice, $row[5]);
  array_push($bimg, $row[6]);
  array_push($bingredients, $row[7]);
  array_push($bgenre, $row[2]);
}



      ?>


  <div style="background: #9898FF; width:1420px; margin-left: auto; margin-right: auto;">
  <h5 class="display-4" style="color: brown; background-color: #c8c8ff; padding: 8px; text-align: center; ">Pizza Menu</h5>
    <div class="row">

      <div class="col">
        <div class="card shadow mt-3 mb-2 mx-3 p-2" style="width: 300px; background: #C8C8FF;">
          <img class="card-img-top" src="img/pizza/1.png" alt="Card image cap" height="250px"
            width="150px">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $bname[0] ?>
            </h5>
            <p class="card-text">
              <?php echo $bingredients[0] ?>
            </p>
            <p class="card-text"> Rating:
              <?php echo $brating[0] ?> &nbsp;|&nbsp; Price:
              <?php echo $bprice[0] ?>
            </p>
            <form action="homepage.php" method="post"> <button class="btn" type="submit" name="1"> <img
                  src="icons/add-to-basket.png" alt="" height=40px width=40px></button></form>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow mt-3 mb-2 mx-3 p-2" style="width: 300px; background: #C8C8FF;">
          <img class="card-img-top" src="img/pizza/2.png" alt="Card image cap" height="250px"
            width="150px">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $bname[1] ?>
            </h5>
            <p class="card-text">
              <?php echo $bingredients[1] ?>
            </p>
            <p class="card-text"> Rating:
              <?php echo $brating[1] ?> &nbsp;|&nbsp; Price:
              <?php echo $bprice[1] ?>
            </p>
            <form action="homepage.php" method="post"> <button class="btn" type="submit" name="2"> <img
                  src="icons/add-to-basket.png" alt="" height=40px width=40px></button></form>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow mt-3 mb-2 mx-3 p-2" style="width: 300px; background: #C8C8FF;">
          <img class="card-img-top" src="img/pizza/3.png" alt="Card image cap" height="250px"
            width="150px">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $bname[2] ?>
            </h5>
            <p class="card-text">
              <?php echo $bingredients[2] ?>
            </p>
            <p class="card-text"> Rating:
              <?php echo $brating[2] ?> &nbsp;|&nbsp; Price:
              <?php echo $bprice[2] ?>
            </p>
            <form action="homepage.php" method="post"> <button class="btn" type="submit" name="3"> <img
                  src="icons/add-to-basket.png" alt="" height=40px width=40px></button></form>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow mt-3 mb-2 mx-3 p-2" style="width: 300px; background: #C8C8FF;">
          <img class="card-img-top" src="img/pizza/4.png" alt="Card image cap" height="250px"
            width="150px">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $bname[3] ?>
            </h5>
            <p class="card-text">
              <?php echo $bingredients[3] ?>
            </p>
            <p class="card-text"> Rating:
              <?php echo $brating[3] ?> &nbsp;|&nbsp; Price:
              <?php echo $bprice[3] ?>
            </p>
            <form action="homepage.php" method="post"> <button class="btn" type="submit" name="4"> <img
                  src="icons/add-to-basket.png" alt="" height=40px width=40px></button></form>
          </div>
        </div>
      </div>
</div>
<br>

<h5 class="display-4" style="color: brown; background-color: #c8c8ff; padding: 8px; text-align: center; ">Drinks</h5>
<div class="row">
      <div class="col">
        <div class="card shadow mt-3 mb-2 mx-3 p-2" style="width: 300px; background: #C8C8FF;">
          <img class="card-img-top" src="img/pizza/5.png" alt="Card image cap" height="250px"
            width="150px">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $bname[4] ?>
            </h5>
            <p class="card-text">
              <?php echo $bingredients[4] ?>
            </p>
            <p class="card-text"> Rating:
              <?php echo $brating[4] ?> &nbsp;|&nbsp; Price:
              <?php echo $bprice[4] ?>
            </p>
            <form action="homepage.php" method="post"> <button class="btn" type="submit" name="5"> <img
                  src="icons/add-to-basket.png" alt="" height=40px width=40px></button></form>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow mt-3 mb-2 mx-3 p-2" style="width: 300px; background: #C8C8FF;">
          <img class="card-img-top" src="img/pizza/6.png" alt="Card image cap" height="250px"
            width="150px">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $bname[5] ?>
            </h5>
            <p class="card-text">
              <?php echo $bingredients[5] ?>
            </p>
            <p class="card-text"> Rating:
              <?php echo $brating[5] ?> &nbsp;|&nbsp; Price:
              <?php echo $bprice[5] ?>
            </p>
            <form action="homepage.php" method="post"> <button class="btn" type="submit" name="6"> <img
                  src="icons/add-to-basket.png" alt="" height=40px width=40px></button></form>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow mt-3 mb-2 mx-3 p-2" style="width: 300px; background: #C8C8FF;">
          <img class="card-img-top" src="img/pizza/7.png" alt="Card image cap" height="250px"
            width="150px">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $bname[6] ?>
            </h5>
            <p class="card-text">
              <?php echo $bingredients[6] ?>
            </p>
            <p class="card-text"> Rating:
              <?php echo $brating[6] ?> &nbsp;|&nbsp; Price:
              <?php echo $bprice[6] ?>
            </p>
            <form action="homepage.php" method="post"> <button class="btn" type="submit" name="7"> <img
                  src="icons/add-to-basket.png" alt="" height=40px width=40px></button></form>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow mt-3 mb-2 mx-3 p-2" style="width: 300px; background: #C8C8FF;">
          <img class="card-img-top" src="img/pizza/8.png" alt="Card image cap" height="250px"
            width="150px">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $bname[7] ?>
            </h5>
            <p class="card-text">
              <?php echo $bingredients[7] ?>
            </p>
            <p class="card-text"> Rating:
              <?php echo $brating[7] ?> &nbsp;|&nbsp; Price:
              <?php echo $bprice[7] ?>
            </p>
            <form action="homepage.php" method="post"> <button class="btn" type="submit" name="32"> <img
                  src="icons/add-to-basket.png" alt="" height=40px width=40px></button></form>
          </div>
        </div>
      </div>
    </div>
  </div>





  <?php
$con = mysqli_connect("localhost", "root", "", "pizzatime");

$q1 = "select id from customer where name='$user';";
$r1 = mysqli_query($con, $q1);
$u_id = 0;
while ($row = mysqli_fetch_row($r1)) {
  $u_id = $row[0];
}

for ($i = 1; $i <= 51; $i++) {
  if (isset($_POST[$i])) {
    $q = "INSERT INTO cart (c_id, cart, user) VALUES (NULL, $i,$u_id);";
    $r = mysqli_query($con, $q);
    echo "<script>alert('Product Added to Cart.')</script>";
    echo "<script>location.href='homepage.php'</script>";
    break;
  }
}
?>

  <!-- Footer -->
  <footer id="dk-footer" class="dk-footer mt-5" style="padding-top:150px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-4">
          <div class="dk-footer-box-info">
            <a href="homepage.php" class="footer-logo">
              <img src="icons/logo.png" alt="footer_logo" class="img-fluid">
            </a>
            <div class="footer-social-link">
              <h3>Follow Us</h3>
              <ul>
                <li>
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>

          </div>

        </div>

        <div class="col-md-12 col-lg-8">
          <div class="row">
            <div class="col-md-6">
              <div class="contact-us">
                <div class="contact-icon">
                  <i class="fa fa-map-o" aria-hidden="true"></i>
                </div>
                <!-- End contact Icon -->
                <div class="contact-info">
                  <h3>Pizza Time</h3>
                  <p>4580 Road Avenue</p>
                </div>
                <!-- End Contact Info -->
              </div>
              <!-- End Contact Us -->
            </div>
            <!-- End Col -->
            <div class="col-md-6">
              <div class="contact-us contact-us-last">
                <div class="contact-icon">
                  <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                </div>
                <!-- End contact Icon -->
                <div class="contact-info">
                  <h3>+8801712345678</h3>
                  <p>Give Us A Call</p>
                </div>
                <!-- End Contact Info -->
              </div>
              <!-- End Contact Us -->
            </div>
            <!-- End Col -->
          </div>
          <!-- End Contact Row -->
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="footer-widget footer-left-widget">
                <div class="section-heading">
                  <h3>Useful Links</h3>
                  <span class="animate-border border-black"></span>
                </div>
                <ul>
                  <li>
                    <a href="#">About Us</a>
                  </li>
                  <li>
                    <a href="#">Services</a>
                  </li>
                  <li>
                    <a href="#">Our Team</a>
                  </li>
                </ul>
                <ul>
                  <li>
                    <a href="#">Contact Us</a>
                  </li>
                  <li>
                    <a href="#">Blog</a>
                  </li>
                  <li>
                    <a href="#">FAQ</a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-md-12 col-lg-6">
              <div class="footer-widget">
                <div class="section-heading">
                  <h3> © All Rights Reserved</h3>
                  <span class="animate-border border-black"></span>
                </div>
                <h3><a href="homepage.php" style="color:blue;">Logout</a></h3>


              </div>

            </div>

          </div>

        </div>

      </div>

    </div>



    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Copyright © 2022</span>
          </div>
          <!-- End Col -->
          <div class="col-md-6">
            <div class="copyright-menu">
              <ul>
                <li>
                  <a href="#">Home</a>
                </li>
                <li>
                  <a href="#">Terms</a>
                </li>
                <li>
                  <a href="#">Privacy Policy</a>
                </li>
                <li>
                  <a href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- End col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- End Copyright Container -->
    </div>
    <!-- End Copyright -->
    <!-- Back to top -->
    <div id="back-to-top" class="back-to-top">
      <a href="#top">
        <button class="btn btn-dark" title="Back to Top" style="display: block;">
          <i class="fa fa-angle-up"></i>
        </button>


      </a>

    </div>
    <!-- End Back to top -->
  </footer>

</body>

</html>