<?php

//  include('./includes/connect.php');

 function getproducts()
 {
    global $con;
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
     {
        
   
        $sql="select * from `product` order by rand() limit 0,4";
        $result=mysqli_query($con,$sql);
        while($data=mysqli_fetch_assoc($result))
        {
            $product_id=$data['product_id'];
        $product_title=$data['product_title'];
        $product_description=$data['product_description'];
        $product_image1=$data['product_image1'];
        $product_price=$data['price'];
        echo "<div class='col-md-4 mb-2'>
                <div class='card' >
                    <img src='./admin_area/product_images/$product_image1'  alt='' class='xyz'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p > price: $product_price/. </p>
                        <a href='index.php?add_to_card=$product_id' class='btn btn-info'>Add to cart</a>
                        <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                    </div> 
                </div>";

        }
     }
    }


   
   
 }
 function get_all_products()
 {
    global $con;
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
     {
        
   
        $sql="select * from `product` order by rand() limit 0,13";
        $result=mysqli_query($con,$sql);
        while($data=mysqli_fetch_assoc($result))
        {
            $product_id=$data['product_id'];
        $product_title=$data['product_title'];
        $product_description=$data['product_description'];
        $product_image1=$data['product_image1'];
        $product_price=$data['price'];
        echo "<div class='col-md-4 mb-2'>
                <div class='card' >
                    <img src='./admin_area/product_images/$product_image1'  alt='' class='xyz'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p > price: $product_price/. </p>
                        <a href='index.php?add_to_card=$product_id' class='btn btn-info'>Add to card</a>
                        <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                    </div> 
                </div>";

        }
     }
    }


   
   
 }
 function get_uniq_brand()
 {
    global $con;
    if(isset($_GET['brand']))
    {
        $cat=$_GET['brand'];
        $sql="select * from `product` where brand_id=$cat order by rand() limit 0,9";
        $result=mysqli_query($con,$sql);
        $row=mysqli_num_rows($result);
        if($row==0)
        {
            echo "<h2 class='text-center text-danger' >  This brand is not available now</h2>";
        }
        while($data=mysqli_fetch_assoc($result))
        {
            $product_id=$data['product_id'];
        $product_title=$data['product_title'];
        $product_description=$data['product_description'];
        $product_image1=$data['product_image1'];
        $product_price=$data['price'];
        echo "<div class='col-md-4 mb-2'>
                <div class='card' >
                    <img src='./admin_area/product_images/$product_image1'  alt='' class='xyz'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p > price: $product_price/. </p>
                        <a href='index.php?add_to_card=$product_id' class='btn btn-info'>Add to card</a>
                        <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                    </div> 
                </div>";

        }
    }


 }
 function get_uniq_category()
 {
    global $con;
    if(isset($_GET['category']))
    {
        $cat=$_GET['category'];
        $sql="select * from `product` where category_id=$cat order by rand() limit 0,9";
        $result=mysqli_query($con,$sql);
        $row=mysqli_num_rows($result);
        if($row==0)
        {
            echo "<h2 class='text-center text-danger' > No stock for this category</h2>";
        }
        while($data=mysqli_fetch_assoc($result))
        {
            $product_id=$data['product_id'];
        $product_title=$data['product_title'];
        $product_description=$data['product_description'];
        $product_image1=$data['product_image1'];
        $product_price=$data['price'];
        echo "<div class='col-md-4 mb-2'>
                <div class='card' >
                    <img src='./admin_area/product_images/$product_image1'  alt='' class='xyz'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p > price: $product_price/. </p>
                        <a href='index.php?add_to_card=$product_id' class='btn btn-info'>Add to card</a>
                        <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                    </div> 
                </div>";

        }
    }
 }
 function getbrands()
 {
    global $con;
    
    $sql="select * from `brands`";
          $result=mysqli_query($con,$sql);
          while($data=mysqli_fetch_assoc($result))
          {
            $data_id=$data['brand_id'];
            $data1=$data['brand_title'];
            echo "<li class='nav-item  '>
            <a href='index.php?brand=$data_id'class='nav-link text-center text-light'  >$data1</a>
          </li>";
          }
 }
 function getcategory()
 {
    global $con;
    $sql1="select * from `category`";
    $result1=mysqli_query($con,$sql1);
    while($data=mysqli_fetch_assoc($result1))
    {
      $data_id=$data['category_id'];
      $data1=$data['category_title'];
      echo "<li class='nav-item  '>
      <a href='index.php?category=$data_id'class='nav-link text-center text-light'  >$data1</a>
    </li>";
    }
 }
 function search_data_funk()
 {
    global $con;
    if(isset($_GET['search_data_product']))
    {
        // echo" Wellcome";
        $seach_data_products=$_GET['search_data'];
        $sql="select * from `product` where product_keyword like '%$seach_data_products%'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_num_rows($result);
        if($row==0)
        {
            echo "<h2 class='text-center text-danger' > No result match. No product found on this category !!</h2>";
        }
        while($data=mysqli_fetch_assoc($result))
        {
            $product_id=$data['product_id'];
        $product_title=$data['product_title'];
        $product_description=$data['product_description'];
        $product_image1=$data['product_image1'];
        $product_price=$data['price'];
        echo "<div class='col-md-4 mb-2'>
                <div class='card' >
                    <img src='./admin_area/product_images/$product_image1'  alt='' class='xyz'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p > price: $product_price/. </p>
                        <a href='index.php?add_to_card=$product_id' class='btn btn-info'>Add to card</a>
                        <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                    </div> 
                </div>";

        }
    }
 }
 function getproduct_detail()
 {
    global $con;
    if(isset($_GET['product_id']))
    {
        $product_id=$_GET['product_id'];
        $sql="select * from `product` where product_id=$product_id";
        $result=mysqli_query($con,$sql);
        while($data=mysqli_fetch_assoc($result))
        {
            $product_id=$data['product_id'];
            $product_title=$data['product_title'];
            $product_description=$data['product_description'];
            $product_image1=$data['product_image1'];
            $product_price=$data['price'];
            $product_image3=$data['product_image3'];
            $product_image2=$data['product_image2'];
                echo "<div class='col-md-4'>
                    <div class=''card' >
                        <img src='./admin_area/product_images/$product_image1'   class='xyz'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p > price: $product_price/. </p>
                            <a  href='index.php?add_to_card=$product_id' class='btn btn-info p-3'>Add to Cart</a>
                            <a href='index.php' class='btn btn-secondary p-3'>Go home</a>
                        </div>
                        </div>
                        </div>
                        <div class='col-md-8'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Related product</h4>
                            </div>
                            <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image2'  class='xyz'>
                            </div>
                            <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image3'  alt='' class='xyz'>
                            </div>
                        </div>
                    </div>";
        }
    }
 }
 function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function card_function()
{
    global $con;
    if(isset($_GET['add_to_card']))
    {
        $product_id=$_GET['add_to_card'];
        $ip=getUserIpAddr();
        $sql="select * from `product` where product_id=$product_id";
        $result=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($result);
        $price=$data['price'];

        $check="select * from `cart_detail` where product_id=$product_id and ip_address='$ip'";
        $result2=mysqli_query($con,$check);
        $data1=mysqli_num_rows($result2);
        if($data1==0)
        {
            $sql1="insert into `cart_detail` (product_id,ip_address,quantity,price)
            values ($product_id,'$ip',0,'$price')";
            $result1=mysqli_query($con,$sql1);
            // echo "<script>alert('Item is added int the cart ')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else 
        {
            
            echo "<script>alert('Already present in your cart ')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        

    }
}
function cart_item()
{
    global $con;
    if(isset($_GET['add_to_card']))
    {
        $ip=getUserIpAddr();
        $check="select * from `cart_detail` where ip_address='$ip'";
        $result2=mysqli_query($con,$check);
        $data1=mysqli_num_rows($result2);
        echo $data1;

    }
    else 
    {
        $ip=getUserIpAddr();
        $check="select * from `cart_detail` where ip_address='$ip'";
        $result2=mysqli_query($con,$check);
        $data1=mysqli_num_rows($result2);
        echo $data1;

    }
}
function total_cart_price()
{
    global $con;
    // $ip=getUserIpAddr();
    //     $check="select * from `cart_detail` where ip_address='$ip'";
    //     $result2=mysqli_query($con,$check);
    //     $total=0;
    //     while($row=mysqli_fetch_assoc($result2))
    //     {
    //         $totalsum=array($row['price']);
    //         $sum=array_sum($totalsum);
    //         $total+=$sum;
    //     }
    //     echo $total;

    $ip=getUserIpAddr();
    $check="select * from `cart_detail` where ip_address='$ip'";
    $result2=mysqli_query($con,$check);
    $total=0;
    while($row=mysqli_fetch_assoc($result2))
    {
        $product_id=$row['product_id'];
        $sql="select * from `product` where product_id=$product_id";
        $result=mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($result))
        {
            $totalsum=array($row['price']);
            $sum=array_sum($totalsum);
            $total+=$sum;
        }
        // $image=$data['product_image1'];
        // $product_title=$data['product_tit
        // $price=$data['price'];le'];
    }  
    echo $total;

}
?>
