<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="icon" type="image/x-icon" href="icons/logo.png">
    <link rel="stylesheet" type="text/css" href="css/customer.css?v=<?php echo time(); ?>"/>
    <link rel="stylesheet" type="text/css" href="css/home.css?v=<?php echo time(); ?>"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <style>
        body{
            color: orange;
        }
    </style>
</head>
<body>
<?php

$uname= $_SESSION['uname'];
$q="select * from customer where name='$uname'";
$con=mysqli_connect("localhost", "root", "", "pizzatime");
$res=mysqli_query($con, $q);
while ($row=mysqli_fetch_row($res)) {
    $addr=$row[4];
    $phn=$row[6];
    $email=$row[3];
    $P=$row[2];
    $id=$row[0];
}

?>

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
                <a class="nav-link active" href="cart.php"><img src="icons/shopping-bag (5).png" width="45px" height="45px"> </a>
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

    <div class="container">
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-md-12 ">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile" style="padding-left:3%; padding-top:5%">
                                    <div class="card-block text-center text-white">
                                        <div class="mb-2"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                        <a href="customer.php" class="mdi mdi-account mdi-36px mdiclr" ></a>                                     
                                    </div>
                                </div>
                                
                                <div class="col-sm-8 center-block hello">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Edit Information</h6>
                                        <form action="edit_profile.php" method="post">
                                        
                                        <div class="form-control">
                                            <input type="email" name="email" id="email" placeholder="New Email" class="form-control">
                                        </div>
                                        
                                        <input type="submit" value="Change Email" name="bemail" class="form-control btn btn-dark float-left mb-3">
                                        <div class="form-control">
                                            <input type="phone" name="phn" id="phn" placeholder="New Phone Number" class="form-control">
                                        </div>
                                        
                                        <input type="submit" value="Change Phone Number" name="bphn" class="form-control btn btn-dark float-left mb-3">  
                                        <div class="form-control">
                                            <input type="text" name="addr"  placeholder="New Address" class="form-control">
                                        </div>
                                        
                                        <input type="submit" value="Change Address" name="baddr" class="form-control btn btn-dark float-left mb-3"> 

                                        <div class="form-control">
                                        <input type="password" name="ppass"  placeholder="Enter Previous Password" class="form-control">
                                        <input type="password" name="npass"  placeholder="Enter New Password" class="form-control" style="margin-top:2%;"> 
                                        </div>
                                        <input type="submit" value="Change Password" name="bpass" class="form-control btn btn-dark float-left mb-3">
                                    </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

                if (isset($_POST['bpass'])) {
                    $con=mysqli_connect("localhost", "root", "", "pizzatime");
                    $n=$_POST['ppass'];
                    $np=$_POST['npass'];
                    if ($P==$n) {
                        $q="UPDATE customer SET pass='$np' WHERE name ='$uname' ;";
                        $res=mysqli_query($con, $q);
                        echo "<script>alert('Password has been updated.')</script>";
                        echo "<script>location.href='customer.php'</script>";
                    } else {
                        echo "<script>alert('Enter previous password correctly.')</script>";
                    }
                } elseif (isset($_POST['bemail'])) {
                    $con=mysqli_connect("localhost", "root", "", "pizzatime");
                    $n=$_POST['email'];
                    $q="UPDATE customer SET email = '$n' WHERE id = $id;";
                    $res=mysqli_query($con, $q);
                    echo "<script>alert('Email has been updated.')</script>";
                    echo "<script>location.href='customer.php'</script>";
                } elseif (isset($_POST['baddr'])) {
                    $con=mysqli_connect("localhost", "root", "", "pizzatime");
                    $n=$_POST['addr'];
                    $q="UPDATE customer SET addr = '$n' WHERE id = $id;";
                    $res=mysqli_query($con, $q);
                    echo "<script>alert('Address has been updated.')</script>";
                    echo "<script>location.href='customer.php'</script>";
                } elseif (isset($_POST['bphn'])) {
                    $con=mysqli_connect("localhost", "root", "", "pizzatime");
                    $n=$_POST['phn'];
                    $q="UPDATE customer SET phone = '$n' WHERE id = $id;";
                    $res=mysqli_query($con, $q);
                    echo "<script>alert('Phone number has been updated.')</script>";
                    echo "<script>location.href='customer.php'</script>";
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