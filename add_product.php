<?php 
    include_once("header.php");
?>
<div id="main" class="container">
    <div class="page-heading pb-2 mt-4 mb-2">
    <h1>Product Management</h1>
    </div>
    <?php
        include_once("connect.php");
       function bind_category_list($conn){
        $sqlstring = "SELECT Category_id, Category_name FROM category";
        $result = mysqli_query($conn, $sqlstring);
        echo "<select name='categorylist' class='form-control'>
            <option value='0'>Choose category</option>";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo "<option value='".$row['Category_id']."'>".$row['Category_name']."</option>";
            }
            echo "</select>";
       }

       if(isset($_POST["btnAdd"])){
            $id = $_POST["txtID"];
            $proname = $_POST['txtName'];
            $category = $_POST['categorylist'];
            $price = $_POST['txtPrice'];
            $quantity = $_POST['txtQuantity'];
            $pic = $_FILES['txtImage'];
            
            $err ="";
            if(trim($id=="")){
                $err.="<li>Enter Product ID, please </li>";
            }
            if(trim($proname=="")){
                $err.="<li>Enter Product Name, please </li>";
            }
            if($category=="0"){
                $err.="<li>Enter Product Name, please </li>";
            }
            if(!is_numeric($price)){
                $err.="<li> Product price must be number </li>";
            }
            if(!is_numeric($quantity)){
                $err.="<li> Product Quantity must be number </li>";
            }
            if($err !=""){
                echo "<ul>$err</ul>";
            }else{
                echo $pic['type'] ;
                if($pic['type']=="image/jpg"||$pic['type']=="image/jpeg"||$pic['type']=="image/png"||$pic['type']=="image/gif"){
                    if($pic['size'] <= 614400){
                        $sq = "SELECT * FROM product WHERE Product_id = '$id' or Product_name='$proname'";
                        $result = mysqli_query($conn, $sq);
                        if(mysqli_num_rows($result)==0){
                            copy($pic['tmp_name'], "image/".$pic['name']);
                            $filepic = $pic['name'];    
                            $sqlstring = "INSERT INTO `product`(`Product_id`, `Product_name`,`image`, `Price`, `Quantity`, `Category_id`) 
                                            VALUES ('$id','$proname','$filepic','$price','$quantity', '$category')";
                            mysqli_query($conn, $sqlstring);
                            echo '<meta http-equiv="refresh" content="0;URL=product_manger.php"/>';
                        }
                        else{   
                            echo "<li>Duplicate product ID or Name</li>";
                        }
                    }
                    else{
                        echo "Size of images too big";
                    }   
                }
                else{
                    echo "Images format is not correct";
                }
            }
       }
       
    ?>
    <form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" 
								  placeholder="Product ID"  value='<?php echo isset($_POST['Product_id'])?($_POST['Product_id']):"";?>'/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" 
								  placeholder="Product Name" value='<?php echo isset($_POST['Product_name'])?($_POST['Product_name']):"";  ?>'/>
							</div>
                </div>   
                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
							      <?php bind_category_list($conn);  ?>
							</div>
                </div>  
                          
                <div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='<?php  echo isset($_POST['Price'])?($_POST['Price']):"";  ?>'/>
							</div>
                 </div>       
               
                            
            	<div class="form-group">  
                    <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="txtQuantity" id="txtQuantity" class="form-control" placeholder="Quantity" value="<?php echo isset($_POST['Quantity'])?($_POST['Quantity']):""; ?>"/>
							</div>
                </div>
 
				<div class="form-group">  
	                <label for="sphinhanh" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
							<img />
                            
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""  >
							</div>
                </div>
                        
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='product_manger.php'" />
                              	
						</div>
				</div>
			</form>
    
</div>

<?php
    include_once("footer.php");
?>