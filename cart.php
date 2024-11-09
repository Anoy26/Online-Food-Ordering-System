<?php
    session_start();
    $user=$_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="icon" type="image/x-icon" href="icons/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cart.css">
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

    
    <div style="margin-top:1%">
        <a href="homepage.php" class="btn btn-outline-dark"><img src="icons/back.png" alt="" class="rounded pill" width="30px" style="margin-right:10px;">Continue Shopping</a>
        <a href="payment.php" class="btn btn-outline-dark float-right">Payment <img src="icons/pay.png" alt="" class="rounded pill" width="30px" style="margin-left:10px;">  </a>
    </div>


    <div class="sign" style="font-size: 50px; text-align: center;">
      <span class="fast-flicker">W</span><span class="flicker">e</span><span class="fast-flicker">l</span><span class="flicker">c</span><span class="fast-flicker">o</span><span class="flicker">m</span><span class="fast-flicker">e</span><span class="flicker">, </span><span class="fast-flicker"><?php echo $user?></span>
    </div>

<?php
    $q="select * from customer where name='$user'";
    $con = mysqli_connect("localhost", "root", "", "pizzatime");
    $res=mysqli_query($con,$q);
    $id=0;
    $item=array();
    $item_name=array();
    $item_price=array();
    $item_id=array();
    $total=0;
    $cnt=0;
    $k=0;
    while($row=mysqli_fetch_row($res)){
        $addr=$row[4];
        $phn=$row[6];
        $email=$row[3];
        $P=$row[2];
        $id=$row[0];
    }
    $q="select * from cart where user=$id;";
    $res=mysqli_query($con,$q);
    while($row=mysqli_fetch_row($res)){
        array_push($item,$row[1]);
        array_push($item_id,$row[0]);
        $cnt=$cnt+1;
    }
    foreach($item as $i){
        $q="select * from product where p_id=$i;";
        $res=mysqli_query($con,$q);
        while($row=mysqli_fetch_row($res)){
            array_push($item_name,$row[1]);
            array_push($item_price,$row[5]);
            $total=$total+$item_price[$k];
            $k=$k+1;
        }

    }?>
    <div class="container text-white" style="background: #A8A8FF; margin-top:30px; margin-bottom:30px;">
        <div class="col">
            <table class="table m-0" style="background: #C8C8FF;">
                <tr>
                    <th class="border-dark border-right border-left">Item</th>
                    
                    <th class="border-dark border-right">Price</th>
                    <th class="border-dark border-right">Action</th>
                    
                </tr>
                <?php
                for($i=0;$i<$cnt;$i++)
                {
                ?>
                <tr>
                    <td class="border-dark border-right border-left" style="color: blue;"> <?php echo $item_name[$i];?>    </td>
                    <td class="border-dark border-right" style="color: blue;"><?php echo $item_price[$i];?></td>
                    <form action="cart.php" method="post">
                    	<td class="border-dark border-right"><input type="submit" value="Remove Product" name="rmv<?php echo $i;?>" class="form-control btn btn-warning float-left mb-2" ></td>
                    </form>
                </tr>
                <?php
                	$iid=$item_id[$i];
                    $deleteprice=$item_price[$i];
                }

        for($i=0;$i<=$cnt;$i++)
        {
            if(isset($_POST['rmv'.$i])){
                $con = mysqli_connect("localhost", "root", "", "pizzatime");
                $q="DELETE FROM cart WHERE user = $id AND c_id=$item_id[$i];";
                $res=mysqli_query($con,$q);
                $total=$total-$deleteprice;
                echo "<script>alert('Product Removed From Cart.')</script>";
                echo "<script>location.href='cart.php'</script>";
            }
        }
        

        ?>    
        
        
        
        </table>
        </div>
    </div>
    <div class="m-3">
    <p style="font-weight: bolder;font-size: 30px; text-align: center;" class="text-black">TOTAL : <?php echo $total?> BDT  <br> <br>
    <a href="payment.php" class="btn btn-success">Proceed to Pay <img src="icons/pay.png" alt="" class="rounded pill" width="30px" style="">  </a>
    </p>
    </div>




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