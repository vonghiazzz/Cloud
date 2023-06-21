<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN Store</title>
    <link rel="stylesheet" href="header.css" />
    <link rel="icon" href="./image/logo.png" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* .navbar-nav div.dropdown{
            padding: 0 50px;
        } */
    </style>
</head>

<body>
    <header class="navbar navbar-expand-md navbar-dark bg-white">
        <div class="container-fluid">
            <a href="index.php"  ><img src="./images/logo.png" alt="ToyVB" width="100%" height="100px"></a>
            <a href="#" class="navbar-brand" id="Logo">ATN STORE</a>
            <div class="navbar-nav">
                <div class="navbar-nav ms-auto">
                    <?php
                if(isset($_SESSION['user_name'])):
                ?>
                    <a  onclick="window.location.href='update_customer.php'"class="nav-item nav-link" style="color:black">Welcome,<?=$_SESSION['user_name']?></a>
                    <button onclick="window.location.href='logout.php'" type="button" class="nav-item nav-link"
                        style="color:black">Logout</button>
                    <?php
                    else:
                ?>
                
				<button onclick="window.location.href='login.php'" class="btn btn-outline-secondary"
                  type="button">Login</button>
                  <button onclick="window.location.href='register.php'" class="btn btn-outline-secondary"
                  type="button">Register</button>
                   
                    <?php
                endif;
                ?>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-md" style="background-color:#0000FF;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarMain">
            <div class="navbar-nav col-md-8">
                <a class="nav-link active me-4 text-light" href="index.php">Home</a>
           
                <div class="dropdown">

                    <!--dropdown để sổ r sổ tiếp -->
                    <div class="dropdown-menu bg-dark">
                        <?php 
                            include_once('connect.php');
                            $c = new Connect();
                            $dblink = $c->connectToMySQL();
                            $sql = "SELECT * FROM category c join product p WHERE c.Category_id=p.Category_id GROUP BY Category_name ";
                            $re = $dblink->query($sql);
                            while($row= $re->fetch_row()):
                         ?>
                        <a class="dropdown-item text-light" href="search.php?search=<?=$row[2]?>&btnSearch=<?=$row[2]?>"><?=$row[2]?></a>
                        <?php
                             endwhile;
                        ?>
                    </div>
                </div>
                <div class="dropdown">
                    <a href ="#" class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown">Manager</a>
                             <div class="dropdown-menu bg-dark">
                                 <a class="dropdown-item text-light" href="category_management.php">Category</a>
                                 <a class="dropdown-item text-light" href="product_manger.php">Product</a>
                             </div>
                </div>

            </div>


            <div class="col-md-4 d-inline-flex ">
            <form class="d-flex example1" action="search.php" method="get">
          <input class="form-control me-2" name="search" type="search" placeholder="What do you looking?"
            aria-label="Search">
          <button class="btn btn-outline-success" name="btnSearch" type="submit">Search</button>
        </form>
            </div>
        </div>
    </nav>
    <!-- <?php
	    include_once("connection.php");
        if(isset($_GET['page']))
    {
        $page = $_GET['page'];
        if($page=="register"){
            include_once("register.php");
        }
        elseif($page=="login"){
            include_once("login.php");
        }
        elseif($page=="category_management"){
            include_once("category_management.php");
        }
        elseif($page=="product_management"){
            include_once("product_management.php");
        }
        elseif($page=="add_category"){
            include_once("add_category.php");
        }
        elseif($page=="update_category"){
            include_once("update_category.php");
        }
        elseif($page=="logout"){
            include_once("logout.php");
        }
    }
    else{
        include("Content.php");
    }
	?> -->