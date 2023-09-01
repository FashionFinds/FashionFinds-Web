<?php
include('../includes/connect.php');
// include('../functions/common_funk.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- font awesom link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
       integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
       crossorigin="anonymous" referrerpolicy="no-referrer" />
       <style>
        .cart_image
        {
            width : 70px;
            /* height : 80px; */
            object-fit: contain;
        }
      
       </style>
       
</head>
<body>
    <h3 class="text-center text-successs">All product</h3>
    <table class="table table-bordered mt-3">
    <thead class="bg-info">
        <tr>
            <th>Product Id</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th> 
            <th>Status</th>
            <th>Edit </th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $sql="select * from `product` ";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image1=$row['product_image1']; 
            $product_price=$row['price'];
            $product_status=$row['status'];

            echo"<tr>
            <td>$product_id</td>
            <td>$product_title</td>
            <td><img src='./product_images/$product_image1' class='cart_image'></td>
            <td>$product_price</td>
            <td>1</td>
            <td>$product_status</td>
            <td><a href='index.php?edit_product=$product_id' class='text-light'><i class='fa-solid fa-pen-to-square '></i></a></td>
            <td><a href='index.php?delete_product=$product_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
        }
        ?>
    </tbody>
    </table>
</body>
</html>