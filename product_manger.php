<?php
    include_once("header.php");
    
?>
<script languge="javascrip">
    function deleteConfirm(){
    if(confirm("Are you sure to delete")){
        return true;
    }else{
        return false;
    }
}
</script>
<div id="main" class="container">
    <div className="page-heading pb-2 mt-4 mb-2 ">
        <h1>Product Management</h1>
    </div>
        <form name="frm" method="post" action="">
        <p>
            <a href="add_product.php" class="text-decoration-none"> Add</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Category ID</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>
             <tbody>
    <?php
        $No=1 ;
        $result = mysqli_query($conn, "SELECT `Product_id`, `Product_name`, `image`, `Price`,  `Quantity`, `Category_name` FROM product a, category b
        WHERE a.Category_id = b.Category_id ORDER BY 'Product_name' DESC");

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)):
    ?>
    <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $row['Product_id']?></td>
        <td><?php echo $row['Product_name']?></td>
        <td><?php echo $row['Price']?></td>
        <td><?php echo $row['Quantity']?></td>  
        <td><?php echo $row['Category_name']?></td>
        <td text-align="center" class="cotNutChucNang">
            <img src='./images/<?php echo $row['image']?>'  width="50" height="50"/>
        </td>
        <td style='text-align:center'><a href="update_product.php?pid=<?=$row['Product_id']?>" class="text-decoration-none"> Edit</a></td>
        <td style='text-align:center'><a href="delete_product.php?pid=<?=$row['Product_id']?>" class="text-decoration-none" onclick="return deleteConfirm()"> Delete</a></td>
    </tr>
    <?php
    $No++;
    endwhile;
    ?>
</tbody>
        </table>
        </form>
</div>
<?php


   include_once("footer.php");

    
?>
