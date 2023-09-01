<?php
include('../includes/connect.php');
include('../functions/common_funk.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin area </title>
      <!-- bootstrap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">

         <!-- font awesom link -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
       integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
       crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style css -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- first cild  -->
    <div class ="container-fluid p-0 " >
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="constainer-fluid d-flex" >
                <img src="../images/logo.jpg" alt="" class="juice  px-1">
                <!-- <pre>                                              </pre>
                <pre>                                              </pre>
                <pre>                                              </pre> -->
                <nav class="navbar navbar-expand-lg  set ">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                       
                     </ul>
                </nav>  
            </div>
        </nav>   
         <!-- second child  -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
      
    </div> 
      <!-- third child -->
      <div class="row">
            <div class="com-md-12 bg-secondary p-1 d-flex align-items-center ">
                
                <div class="px-3 pt-2">
                    <a href="#" class="">
                        <img src="../images/juice2.jpg"  class="logo" alt="">
                    </a>
                    <p class="text-light ">Admin Name </p>
                </div>
                <div class="button text-center">
                    
                    <button class="my-3 " ><a href="insert_product.php" class="nav-link text-light bg-info my-1  ">Insert products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1 pb-2">View products</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1 pb-2">Inset categories</a></button>
                    <button><a href="index.php?view_category" class="nav-link text-light bg-info my-1 pb-2">View categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1 pb-2">Insert brand</a></button>
                    <button><a href="index.php?view_brand" class="nav-link text-light bg-info my-1 pb-2">View brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1 pb-2">All products</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 pb-2">All payments</a></button>
                    <button><a href="index.php?user_list" class="nav-link text-light bg-info my-1 pb-2">List users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 pb-2">Logout </a></button>
                </div>

            </div>
            
        </div>       
   <!-- fourth child -->
     <div class="container my-3">
        <?php
        if(isset($_GET['insert_categories']))
        {
                include('insert_categories.php');
        }
        if(isset($_GET['insert_brands']))
        {
                include('insert_brands.php');
        }
        if(isset($_GET['view_products']))
        {
                include('view_products.php');
        }
        if(isset($_GET['edit_product']))
        {
                include('edit_product.php');
        }
        if(isset($_GET['delete_product']))
        {
                include('delete_product.php');
        }
        if(isset($_GET['view_category']))
        {
                include('view_category.php');
        }
        if(isset($_GET['view_brand']))
        {
                include('view_brand.php');
        }
        if(isset($_GET['edit_category']))
        {
                include('edit_category.php');
        }
        if(isset($_GET['edit_brand']))
        {
                include('edit_brand.php');
        }
        if(isset($_GET['delete_brand']))
        {
                include('delete_brand.php');
        }
        if(isset($_GET['delete_category']))
        {
                include('delete_category.php');
        }
        if(isset($_GET['list_orders']))
        {
                include('list_orders.php');
        }
        if(isset($_GET['user_list']))
        {
                include('user_list.php');
        }
        ?>
     </div>
<!-- last child -->
<div class="bg-info text-center p-3">
        <p>All rights reserved Designed by Danish 2023  </p>
      </div>


    <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
 crossorigin="anonymous"></script>
</body>
</html>