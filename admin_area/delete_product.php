<?php
if(isset($_GET['delete_product']))
{
    $delete_id=$_GET['delete_product'];
    $sql="Delete from `product` where product_id=$delete_id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('product deleted successfully !!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>