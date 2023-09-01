<?php
if(isset($_GET['delete_category']))
{
    $delete_id=$_GET['delete_category'];
    // echo $delete_id;
    $sql="Delete from `category` where category_id=$delete_id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('Category deleted successfully !!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>