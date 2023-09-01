
<h3 class="text-center text-success">All Categories </h3>
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
        $sql="select * from `category`";
        $result=mysqli_query($con,$sql);
        $num=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $category_title=$row['category_title'];
            $category_id=$row['category_id'];
            $num++;
        
    
    ?>
        <tr class="text-center">
            <td><?php echo $num; ?></td>
            <td><?php echo $category_title; ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-pen-to-square '></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>