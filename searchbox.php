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


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="" method="GET">


                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" name="search" placeholder="search pizza here...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Search a Pizza or Drinks</h4>

                    </div>
                    <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>p_name</th>
                                <th>price</th>
                                <th>ingredients</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_GET['search']))
                            {
                                $con = mysqli_connect('localhost', 'root', '', 'pizzatime');
                                $filtervalue = $_GET['search'];
                                $filterdata = "SELECT * FROM product WHERE CONCAT(p_name,price,ingredients) LIKE '% $filtervalue%' ";
                                $filterdata_run = mysqli_query($con, $filterdata );

                                if(mysqli_num_rows($filterdata_run) > 0)
                                {
                                    foreach($filterdata_run as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['p_name']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['ingredients']; ?></td>
                    
                                        </tr>

                                        <?php
                                    }

                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="3">No record found</td>
                                    </tr>

                                    <?php

                                }
                            }
                            ?>

                            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>