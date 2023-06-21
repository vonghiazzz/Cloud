<?php
include_once 'header.php';
?>
<div class="container px-4 py-5">
    <?php
    if(isset($_GET['id'])):
        $pid = $_GET['id'];
        require_once 'connect.php';
        $conn = new connect();
        $db_link = $conn->connectToPDO();
        $sql =  "SELECT * FROM product WHERE Product_id = ?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($pid));
        $re = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
        <h2><?= $re['Product_name'] ?></h2>   
        <form action="cart.php" method="GET">
            <ul style="list-style-type:none;" class="list-group">
                <img text-align="center"  src='images/<?= $re['image'] ?> 'width="500" height="400">
                <li class="list-group-item">Price: <?= $re['Price'] ?></li>
                <li class="list-group-item">Description: <?= $re['Description'] ?></li>
                <li class="list-group-item">Liên hệ hỗ trợ: 1177392</li>
            </ul>
            <div class="col-lg-9">
                <input type="hidden" name="id" value="<?= $pid ?>">
                <input type="submit" class="btn btn-primary shop-button" name="btnAdd" value="Add to cart"/>
            </div>  
        </form>
    <?php else: ?>
        <h2>Nothing to show</h2>
    <?php endif; ?>
</div>
<?php include_once 'footer.php'; ?>