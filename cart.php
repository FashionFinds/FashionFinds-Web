<?php
include('includes/connect.php');
include('functions/common_funk.php');
@session_start();
?>
 <!-- css -->
 <!-- <link rel="stylesheet" href="style.css"> -->
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
        .cart_image
        {
            width : 80px;
            height : 80px;
            object-fit: contain;
        }
       </style>
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
    <div class="container">
        <div class="row">
            <form action="" method="post">

            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th >Remove</th>
                        <th calspan="2">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- phhp code  -->
                    <?php
                       $ip=getUserIpAddr();
                       $check="select * from `cart_detail` where ip_address='$ip'";
                       $result2=mysqli_query($con,$check);
                       $total=0;
                       while($row=mysqli_fetch_assoc($result2))
                       {
                           $product_id=$row['product_id'];
                          //  echo $product_id;
                           $sql="select * from `product` where product_id=$product_id";
                           $result=mysqli_query($con,$sql);
                           while($data=mysqli_fetch_array($result))
                           {
                               $price=$data['price'];
                               $image=$data['product_image1'];
                               $product_title=$data['product_title'];
                               echo $product_title;
                               $totalsum=array($row['price']);
                               $sum=array_sum($totalsum);
                               $total+=$sum;
                          
                            ?>
                            <?php
                                if(isset($_POST['update_cart']))
                                {
                                    $qtn=$_POST['quantity'];
                                    // echo " hii ";
                                    // echo $qtn ;
                        

                                     $check1="update `cart_detail` set quantity=$'qtn' where ip_address='$ip'";
                                    $result_a=mysqli_query($con,$check1);
                                    $total = $total * (int)$qtn;
                                    
                                }
                                
                            ?>
                        <tr>
                            <td><?php echo $product_title ?> </td>
                            <td><img src="./images/<?php echo $image?>"  class="cart_image"></td>
                            <td><input type="text" name="quantity"></td>
                            <td><?php echo $price ?> </td>
			    <td><input type="checkbox"name='remove[]' value='
				<?php echo $product_id ?>'
></td>
                            <td>
                                <input type="submit" Value="Update cart" class="bg-info  mx-2 border-0 text-light" name="update_cart" >
                                <input type="submit" Value="Remove cart" class="bg-info  mx-2 border-0 text-light" name="remove_cart" >
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                    
                </tbody>
                
            </table>
            <!-- subtotal  -->
            <div class="d-flex mb-3">
                    <h4 class="px-3 ">Subtotal: <strong class="text-info"><?php echo $total ?>/-</strong></h4>
                    <a href="index.php"><button type="button" class="bg-info p-2 border-0">Continue shopping</button></a>
                    <!-- <h4 class="px-3">Subtotal: <strong class="text-info">500/-</strong></h4> -->
                    <a href="./user_area/checkout.php"><button type="button" class="bg-secondary p-2 mx-3 border-0 text-light">Checkout</button></a>
                
                </div>
             </form>   
        </div>
    </div>

<?php 
  function remove_item(){
    global $con;
    if(isset($_POST['remove_cart']))
    {
      foreach($_POST['remove'] as $removeid)
      {
        echo $removeid;
        $q = "Delete from `cart_detail` where product_id=$removeid";
        $r = mysqli_query($con, $q);
        if($r)
        {
          echo "<script>window.open('cart.php', '_self')</script>";
        }
      }
    }
  }

  remove_item();
?>



<!-- last child -->
      

         <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
 crossorigin="anonymous"></script>
</body>
</html>
