
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
    <style>
        .cart_image
        {
            width : 70px;
            /* height : 80px; */
            object-fit: contain;
        }
      
       </style>
</head>
<?php
include('../includes/connect.php');
if(isset($_GET['edit_product']))
{
    $edit_id=$_GET['edit_product'];
    $get_data="select * from `product` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $data=mysqli_fetch_assoc($result);

    $product_title=$data['product_title'];
    $product_description=$data['product_description'];
    $product_keyword=$data['product_keyword'];
    $category_id=$data['category_id'];
    $brand_id=$data['brand_id'];
    $product_image1=$data['product_image1'];
    $product_image2=$data['product_image2'];
    $product_image3=$data['product_image3'];
    $price=$data['price'];
}
?>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center">Edit Products</h1>
        <!-- form  -->
        
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label1">Product title</label>
                
                <input type="text" name="product_title" id="product_title" class="form-control" 
                placeholder="Enter product title" autocomplete="off"
                required="required" value="<?php echo $product_title ?>">
            </div>
      
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label1">Product description</label>
                <input type="text" name="description" id="description" class="form-control" 
                placeholder="Enter product description" autocomplete="off"
                required="required" value="<?php echo $product_description ?>">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label1">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords"
                 class="form-control" 
                placeholder="Enter  product keywords" autocomplete="off"
                required="required" value="<?php echo $product_keyword ?>">
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
                    <div class="d-flex">
                    <input type="file" name="product_image1" id="product_image1"
                    class="form-control w-90 m-auto" 
                    required="required" >
                    <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="cart_image px-2">
                    </div>
                    
                </div> 
             <!-- image 2 -->
                <div class="form-outline m-5  m-auto">
                    <label for="product_image2" class="form-label1 mt-4">Product image 2</label>
                    <div class="d-flex">
                    <input type="file" name="product_image2" id="product_image2"
                    class="form-control w-90 m-auto" 
                    required="required">
                    <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="cart_image px-2">
                    </div>
                    
                </div> 
             <!-- image 3 -->
                <div class="form-outline m-5  m-auto">
                    <label for="product_image3" class="form-label1 mt-4">Product image 3</label>
                    <div class="d-flex">
                    <input type="file" name="product_image3" id="product_image3"
                    class="form-control w-90 m-auto" 
                    required="required">
                    <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="cart_image px-2">
                    </div>
                    
                </div> 

             <!-- price -->
                <div class="form-outline mb-4  m-auto">
                    <label for="product_price" class="form-label1 mt-4">Product Price</label>
                    <input type="text" name="product_price" id="product_price"
                    class="form-control"  autocomplete="off"
                    required="required" value="<?php echo $price ?>">
                </div>
              <!-- price -->
                <div class="form-outline mb-4  m-auto ">
                    <input type="submit" name="edit_product" class="btn btn-info mb-3 px-3" value="Edit Products">
                </div>
        </form> 
    </div>
</body>
</html>
<?php
    // include('../includes/connect.php');
    if(isset($_POST['edit_product']))
    {
            $edit_num=$_GET['edit_product'];
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
                $get_data1="update `product` set product_title='$product_title', product_description='$description',
                product_keyword='$product_keywords',category_id=$product_categories,brand_id=$product_Brands,
                product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',
                price='$product_price'
                where product_id=$edit_num ";

                $result1=mysqli_query($con,$get_data1);
                if($result1)
                {
                    echo "<script>alert('product edit successfully !!')</script>";
                    echo "<script>window.open('./index.php','_self')</script>";
                }
         }
    }
?>