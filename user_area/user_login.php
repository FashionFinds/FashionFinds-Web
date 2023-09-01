<?php
include('../includes/connect.php');
include('../functions/common_funk.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">User Login </h1>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                    <form action="" method="post" >
                        <!-- user field  -->
                    <div class="form-online mb-4 ">
                        <label for="user_name" class="form-label1" >Username </label>
                        <input type="text" id="user_name" class="form-control" placeholder="Enter username" 
                        autocomplete="off" required="required" name="user_name">
                    </div>
                     <!-- user password  -->
                     <div class="form-online mb-4">
                        <label for="user_password" class="form-label1" >Password </label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" 
                        autocomplete="off" required="required" name="user_password">
                    </div>
                    <div >
                        <input type="submit" value="Log in" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-2 mb-5">Don't have an account ? <a href="user_register.php" class="text-danger">Register</a></p>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['user_login']))
{
    $username=$_POST['user_name'];
    $password=$_POST['user_password'];
    $sql="select * from `user_table` where username='$username' and user_password='$password'";
    $result=mysqli_query($con,$sql);
    $data=mysqli_num_rows($result);
    $ip=getUserIpAddr();

    // cart item 
    $select_item="select * from `cart_detail` where ip_address='$ip'";
    $result1=mysqli_query($con,$select_item);
    $data1=mysqli_num_rows($result1);

    if($data==1)
    {
        $_SESSION['username']=$username;
        if($data1>0)
        {
            echo "<script>alert('Login successfull')</script>";
            echo "<script>window.open('payment.php','_self')</script>";

        }
        else 
        {
            echo "<script>alert('Login successfull')</script>";
            echo "<script>window.open('profile.php','_self')</script>";

        }
        
    }
    else 
    {
        echo "<script>alert('Invalid credential')</script>";
    }
}
?>
