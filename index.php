<?php
include_once 'header.php';
?>

<div class="row">
  
        <div class="banner">
            <h2>Welcome to our Toy Store</h2>
        </div>
   
</div>

<div class="section_services pt-4">
    <div class="container">
        <div class="row promo-box">
            <div class="col-lg-3 md-3 col-sm-6 col-6">
                <div class="promo-item">
                    <div class="info">
                        <span> Nationwide shipping</span>
                        <br>
                        Payment on delivery
                    </div>
                </div>
            </div>
            <div class="col-lg-3 md-3 col-sm-6 col-6 ">
                <div class="promo-item">
                    <div class="info">
                        <span>Quality</span>
                        <br>
                        Product quality guarantee
                    </div>
                </div>
            </div>
            <div class="col-lg-3 md-3 col-sm-6 col-6">
                <div class="promo-item ms-1">
                    <div class="info">
                        <span>Make a payment</span>
                        <br>
                        with many methods
                    </div>
                </div>
            </div>
            <div class="col-lg-3 md-3 col-sm-6 col-6">
                <div class="promo-item">
                    <div class="info">
                        <span>Change new product</span>
                        <br>
                        If the product is defective
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="Section_hot_product pt-4">
    <div class="container">
        <div class="title_modules text-center" style="color:coral">
            <h2>
                <a>
                    <span>NEW PRODUCT</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="row">
        <?php
  
  $sql = "SELECT * FROM `product` ORDER by Product_id DESC LIMIT 4";
  //1
  $re = $dblink->query($sql);
  $re->data_seek(0);     //Lấy tại vị trí đầu tiên trong cơ sở dữ liệu 
  if ($re->num_rows > 0): //Sử dụng : thay {}
      while ($row = $re->fetch_assoc()):                     //fetch_assoc Gọi theo tên của cột trong cơ sở dữ liệu              
?>
        <div class="col-md-3 pb-3">
            <div class="card">
                <img src="./images/<?= $row['image']?>" class="card-img-top" alt=""
                    style="margin: auto; width: 300px; height: 400px;" />
                <div class="card-body" style="text-align: center; height:120px;">
                    <a href="detail.php?id=<?=$row['Product_name']?>" class="text-decoration-none">
                        <hr>
                        <h5 class="card-title text-dark">
                            <?=$row['Product_name']?>
                        </h5>
                    </a>
                    <h6 class="card-subtitle mb-2 text-muted bi bi-currency-dollar"><?=$row['Price']?></h6>
                    <a href="cart.php?id=<?=$row['Product_id']?>" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        <?php
endwhile;
else:
    
    echo "Not found";
endif;
        ?>
    </div>
</section>

<?php
include_once "footer.php";
?>