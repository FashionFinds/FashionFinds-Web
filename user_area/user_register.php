<?php
include('../includes/connect.php');
// include('./functions/common_funk.php');
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
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FasionFinds</title>
<link rel="icon" href="../../shopping-cart.png">
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid py-5 bg-dark text-light">
        <h1 class="text-center">New User Registration</h1>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- user field  -->
                    <div class="form-online mb-3 ">
                        <label for="user_name" class="form-label1" >Username </label>
                        <input type="text" id="user_name" class="form-control" placeholder="Enter username" 
                        autocomplete="off" required="required" name="user_name">
                    </div>
                     <!-- user email  -->
                     <div class="form-online mb-3">
                        <label for="user_mail" class="form-label1" >User Email </label>
                        <input type="text" id="user_mail" class="form-control" placeholder="Enter your Email" 
                        autocomplete="off" required="required" name="user_mail">
                    </div>
                    
                     <!-- user password  -->
                     <div class="form-online mb-3">
                        <label for="user_password" class="form-label1" >Password </label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" 
                        autocomplete="off" required="required" name="user_password">
                    </div>
                     <!-- confirm password  -->
                     <div class="form-online mb-3">
                        <label for="user_password" class="form-label1" >Confirm Password </label>
                        <input type="password" id="user_password" class="form-control" placeholder="Confirm Password" 
                        autocomplete="off" required="required" name="confirm_password">
                    </div>
                      <!-- address field  -->
                      <div class="form-online mb-3 ">
                        <label for="user_address" class="form-label1" >Address </label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter address" 
                        autocomplete="off" required="required" name="user_address">
                    </div>
                     <!-- mobile  field  -->
                     <div class="form-online mb-3 ">
                        <label for="user_mobile" class="form-label1" >Mobile </label>
                        <input type="text" id="user_mobile" class="form-control" placeholder="Enter mobile Number" 
                        autocomplete="off" required="required" name="user_mobile">
                    </div>
                       
                    <div >
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0 btn btn-primary text-dark" name="user_register">
                        <p class="small fw-bold mt-2 pt-2 mb-5">Allready have an account ? <a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code  -->
<?php
if(isset($_POST['user_register']))
{
    $username=$_POST['user_name'];
    $user_mail=$_POST['user_mail'];
    $user_password=$_POST['user_password'];
    $user_address=$_POST['user_address'];
    $confirm_password=$_POST['confirm_password'];
    $user_mobile=$_POST['user_mobile'];
    $user_image=$_FILES['user_image']['name'];
    $temp_image=$_FILES['user_image']['tmp_name'];
    $ip=getUserIpAddr();
    $check="select * from `user_table` where username='$username' or user_email='$user_mail'";
    $result1=mysqli_query($con,$check);
    $data=mysqli_num_rows($result1);
    
    if($data!=0)
    {
       
        echo "<script> alert('User or Email name already exist')</script>";
    }
    else if( $confirm_password !=$user_password)
    {
        echo "<script> alert('Password do not match')</script>";
    }
    else 
    {
        move_uploaded_file($temp_image,"./user_images/$user_image");
        $sql="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values 
        ('$username','$user_mail','$user_password','$user_image','$ip','$user_address','$user_mobile')";
        $result=mysqli_query($con,$sql);
    }
//    select cart item 
   $select_item="select * from `cart_detail` where ip_address='$ip'";
   $result=mysqli_query($con,$select_item);
   $data=mysqli_num_rows($result);
   if($data >0)
   {
    $_SESSION['username']=$username;
    echo "<script> alert('You have item in your cart')</script>";
    echo "<script> window.open('checkout.php','_self')/script>";

   }
   else 
   {
    echo "<script> window.open('index.php','_self')/script>";

   }

}
?>
