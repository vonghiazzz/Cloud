<?php
 include_once 'header.php';
?>

</div>
<h2>All product</h2>
<div class="row">
    <?php
        include_once 'connect.php';
        $c = new connect();
        $dblink = $c->connectToPDO();
        $nameP = $_GET['search'];
        $sql = "SELECT * FROM Product WHERE Product_name LIKE ?";
      
        $re = $dblink->prepare($sql);

       
        $re->execute(array("%$nameP%"));
        $row1 = $re->fetchALL(PDO::FETCH_BOTH);
            foreach($row1 as $r):
     
        ?>
    <div class="col-md-4 pb-3">
        <div class="card">
            <img src="./images/<?=$r['image']?>" class="card-img-top" alt="Product1>"
                style="margin: auto; width: 300px;"/>
            <div class="card-body">
                <a href="detail.php?id=<?=$r['Product_id']?>" class="text-decoration-none">
                    <h5 class="card-title"><?=$r['Product_name']?></h5>
                </a>
                <h6 class="card-subtitle mb-2 text-muted"><?=$r['Price']?><span>&#8363;</span></h6>
                <a href="cart.php" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>
    <?php
        endforeach;
       
        ?>
</div>
</div>
<?php
include_once 'footer.php';
?>