<?php
if(isset($_GET['edit_category']))
{
    $id=$_GET['edit_category'];
    $sql="select * from `category` where category_id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $data=$row['category_title'];
    // echo $data;
}
?>
<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center" >
        <div class="form-outline mb-4">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title"
            required="required" class="form-control w-50 m-auto"  value="<?php echo $data; ?>">
            <input type="submit" value="Update category" class="mt-4 btn btn-info" name="edit_cat">
        </div>
    </form>
</div>
<?php
if(isset($_POST['edit_cat']))
{
    $id1=$_GET['edit_category'];
    $category_t=$_POST['category_title'];
    $update_data="update `category` set category_title='$category_t' where category_id=$id1";
    $result_update=mysqli_query($con,$update_data);
    if($result_update)
    {
        echo "<script>alert('category updated successfully !!')</script>";
        // echo "<script>window.open('view_category.php','_self')</script>";
    }

}
?>