<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product']))
    {
       
            $product_title=$_POST['product_title'];
            $description=$_POST['description'];
            $product_keywords=$_POST['product_keywords'];
            $product_categories=$_POST['product_categories'];
            $product_Brands=$_POST['product_Brands'];
            $product_price=$_POST['product_price'];
            // accessing image
            $product_image1=$_FILES['product_image1']['name'];
            $product_image2=$_FILES['product_image2']['name'];
            $product_image3=$_FILES['product_image3']['name'];
            // accessing image as temp
            $temp_image1=$_FILES['product_image1']['tmp_name'];
            $temp_image2=$_FILES['product_image2']['tmp_name'];
            $temp_image3=$_FILES['product_image3']['tmp_name'];
            
            if($product_title=='' or  $description=='' or $product_keywords=='' or 
            $product_categories=='' or $product_Brands=='' or $product_price=='' or $product_image1==''
            or $product_image2=='' or $product_image3=='' )
            {
                echo "<script>alert('form is not completely fild !!')</script>";
                exit();
            }
            else 
            {
                move_uploaded_file($temp_image1,"./product_images/$product_image1");
                move_uploaded_file($temp_image2,"./product_images/$product_image2");
                move_uploaded_file($temp_image3,"./product_images/$product_image3");
                $sql1="insert into `product` (product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,price)
                values ('$product_title','$description','$product_keywords','$product_categories','$product_Brands','$product_image1','$product_image2','$product_image3','$product_price')";
                $result=mysqli_query($con,$sql1);
                if($result)
                {
                    echo "<script>alert('product added successfully !!')</script>";
                }
         }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product</title>
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
<body class="bg-light">
    <div class="container">
        <h1 class="text-center">Insert Products</h1>
        <!-- form  -->
        
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label1">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" 
                placeholder="Enter product title" autocomplete="off"
                required="required">
            </div>
      
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label1">Product description</label>
                <input type="text" name="description" id="description" class="form-control" 
                placeholder="Enter product description" autocomplete="off"
                required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label1">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords"
                 class="form-control" 
                placeholder="Enter  product keywords" autocomplete="off"
                required="required">
            </div>
             <!-- categories -->
             <div class="form-outline mb-4 w-50 m-auto">
               
                <select name="product_categories" id="" class="form-select">
                <!-- <option > -->
                <option value="">Select product category</option>
                <?php
                 $sql1="select * from `category` ";
                 $result1=mysqli_query($con,$sql1);
                 while($data=mysqli_fetch_assoc($result1))
                   {
                    
                    $category_title=$data['category_title'];
                    $category_id=$data['category_id'];
                     echo "<option value='$category_id'>$category_title</option>";
                   }
                ?>                   
                </select>
             </div>
            <!-- brand  -->
            <div class="form-outline m-5 w-50 m-auto">
               
                <select name="product_Brands" id="" class="form-select">
                <!-- <option > -->
                    <option value="">Select product brand</option>
                <?php
                 $sql1="select * from `brands` ";
                 $result1=mysqli_query($con,$sql1);
                 while($data=mysqli_fetch_assoc($result1))
                   {
                    $brand_title=$data['brand_title'];
                    $brand_id=$data['brand_id'];
                     echo "<option value='$brand_id'>$brand_title</option>";
                   }
                ?>
                </select>
                <!-- image 1 -->
                <div class="form-outline m-5  m-auto">
                    <label for="product_image1" class="form-label1 mt-4">Product image 1</label>
                    <input type="file" name="product_image1" id="product_image1"
                    class="form-control" 
                    required="required">
                </div> 
             <!-- image 2 -->
                <div class="form-outline m-5  m-auto">
                    <label for="product_image2" class="form-label1 mt-4">Product image 2</label>
                    <input type="file" name="product_image2" id="product_image2"
                    class="form-control" 
                    required="required">
                </div> 
             <!-- image 3 -->
                <div class="form-outline m-5  m-auto">
                    <label for="product_image3" class="form-label1 mt-4">Product image 3</label>
                    <input type="file" name="product_image3" id="product_image3"
                    class="form-control" 
                    required="required">
                </div> 

             <!-- price -->
                <div class="form-outline mb-4  m-auto">
                    <label for="product_price" class="form-label1 mt-4">Product Price</label>
                    <input type="text" name="product_price" id="product_price"
                    class="form-control" 
                    placeholder="Enter  product price" autocomplete="off"
                    required="required">
                </div>
              <!-- price -->
                <div class="form-outline mb-4  m-auto ">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert products">
                </div>
        </form> 
    </div>
</body>
</html>
