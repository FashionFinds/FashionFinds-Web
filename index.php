<?php
include('includes/connect.php');
include('./functions/common_funk.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
              <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">

              <!-- font awesom link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
       integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
       crossorigin="anonymous" referrerpolicy="no-referrer" />
      
       <!-- css -->
       <link rel="stylesheet" href="style.css">
      <style>
        body
        {
            overflow-x:hidden;
        }
      </style>
</head>
<body>
    <!-- navbar -->

    <div class ="container-fluid p-0" >
          <!-- first cild  -->
          <nav class="navbar navbar-expand-lg navbar-light bg-info">
          <img src="./images/logo.jpg" alt="" class="juice px-1">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
          data-bs-target="#navbarSupportedContent" 
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="display_all_product.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./user_area/user_register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup>
                  <?php  cart_item();
                  ?>
                   </sup></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Total  Price: <?php  total_cart_price();
                  ?>/-</a>
              </li>
              
            <pre>                               </pre>
            <pre>                               </pre>
            <form class="d-flex" action="search.php" method="get">
              <input class="form-control  me-2 " type="search" name="search_data" placeholder="Search" aria-label="Search">
              <input type="submit" class="btn btn-outline-success " name="search_data_product"
               value="Search"  >
              <!-- <button class="btn btn-outline-success " type="submit">Search</button> -->
            </form>
          </div>
        </nav>
    </div>
    <?php
      card_function();
        
      ?>
   <!-- second child -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
              
              <?php
              if(!isset($_SESSION['username']))
              {
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='#'>Welcome guest</a>
                </li>";
              
              }
              else
              {
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
              </li>";
              }
            if(!isset($_SESSION['username']))
            {
                echo "<li class='nav-item'>
                <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                </li>";
            
            }
            else
            {
              echo "<li class='nav-item'>
              <a class='nav-link' href='./user_area/user_logout.php'>Logout</a>
              </li>";
            }
            ?>
    </ul>

    </nav>

    <!-- third child -->
    <div class="bgg-lig">
      <h3 class="text-center" >Hidden Store</h3>
      <p  class ="text-center">Communication is at the heart of e-commerce and community</p>
    </div>
    <!-- fourt child  -->
    <div class="row">
      <div class="col-md-10">
        <!-- products -->
      <div class="row">     

      <?php
      card_function();
        getproducts();
        get_uniq_brand();
        get_uniq_category();
      ?>
<!-- Some quick example text to build on the card title and make up the bulk of the card's content -->


      </div>
    </div>


      <div class="col-md-2 bg-secondary p-0">
        <!-- sidenav -->
       <ul class="navbar-nav me-aurto">
          <li class="nav-item bg-info ">
            <a href="#" class="nav-link text-center text-light"><h4>Delivery Brands</h4></a>
          </li>
          <?php
          // echo getUserIpAddr();
          getbrands()
          ?>
       </ul>

       <ul class="navbar-nav me-aurto">
          <li class="nav-item bg-info ">
            <a href="#" class="nav-link text-center text-light"><h4>Categies</h4></a>
          </li>
          <?php

           getcategory()
          ?>
       </ul>

      </div>
    </div>
<!-- last child -->
      <div class="bg-info text-center p-3">
        <p>All rights reserved Designed by FashionFinds 2023  </p>
      </div>

         <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
 crossorigin="anonymous"></script>
</body>
</html>
