
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style> 
.cart_image
{
    width : 50px;
    height : 50px;
    object-fit: contain;
}

</style>
</head>
<body>
    
</body>
</html>
<h3 class="text-center text-success">All Users </h3>
<table class="table table-bordered mt-3">
 <thead class="bg-info">
    <?php
     $sql="select * from `user_table`";
     $result=mysqli_query($con,$sql);
     $count_row=mysqli_num_rows($result);
     if($count_row==0)
     {
        echo "<h2 class='text-center text-danger mt-4'>No Users yet</h2>";
     }
     else 
     {
        echo"<tr>
        <th>SI no</th>
        <th>Username</th>
        <th>User Email</th>
        <th>User Image</th>
        <th>User address</th>
        <th>User Mobile</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";
        $number=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $user_id=$row['user_id'];
            $username=$row['username'];
            $user_email=$row['user_email'];
            $user_image=$row['user_image'];
            $user_address=$row['user_address'];
            $user_mobile=$row['user_mobile'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img src='../user_area/user_images/$user_image' alt='$username' class='cart_image'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>

        </tr>";
        }
     }
     
     
     
    ?>
</tbody>
</table>
