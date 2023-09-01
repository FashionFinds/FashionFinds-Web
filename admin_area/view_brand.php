
<h3 class="text-center text-success">All Brands </h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info ">
        <tr class="text-center">
            <th>SI No</th>
            <th>Category Title</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
        $sql="select * from `brands`";
        $result=mysqli_query($con,$sql);
        $num=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $brand_title=$row['brand_title'];
            $brand_id=$row['brand_id'];
            $num++;
    
    ?>
        <tr class="text-center">
            <td><?php echo $num; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-pen-to-square '></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>