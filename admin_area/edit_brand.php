<?php
if(isset($_GET['edit_brand']))
{
    $id=$_GET['edit_brand'];
    $sql="select * from `brands` where brand_id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $data=$row['brand_title'];
    // echo $data;
}
?>
<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center" >
        <div class="form-outline mb-4">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title"
            required="required" class="form-control w-50 m-auto"  value="<?php echo $data; ?>">
            <input type="submit" value="Update category" class="mt-4 btn btn-info" name="edit_ban">
        </div>
    </form>
</div>
<?php
if(isset($_POST['edit_ban']))
{
    $id1=$_GET['edit_brand'];
    $brand_t=$_POST['brand_title'];
    $update_data="update `brands` set brand_title='$brand_t' where brand_id=$id1";
    $result_update=mysqli_query($con,$update_data);
    if($result_update)
    {
        echo "<script>alert('Brand updated successfully !!')</script>";
        // echo "<script>window.open('view_category.php','_self')</script>";
    }

}
?>