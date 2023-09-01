<?php
// include('../includes/connect.php');
// include('../functions/common_funk.php');
if(isset($_POST['insert_brands']))
{
  
  $category_title=$_POST['brand_title'];
  $sql1="select * from `brands` where brand_title='$category_title'";
  $result1=mysqli_query($con,$sql1);
  $num=mysqli_num_rows($result1);
  if($num>0)
  {
    echo "<script>alert(' this brand is present in database ') </script>";
  }
  else 
  {
    $sql="insert into `brands` (brand_title) values ('$category_title')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
      echo "<script>alert('brand added successfully') </script>";
    }
  }
}
?>
<h4 class="text-center my-1">Insert Brands</h4 >
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt "></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands " aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
<input type="submit" class="bg-info border-0 p-2 my-3 " name="insert_brands"
   value="Insert brands" >
   <!-- <button class="bg-info p-2 border-0">Insert Brands</button> -->

</div>
</form>