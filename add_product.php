<?PHP
    require_once("entities/product.class.php");
    require_once("/header.php");
    if(isset($_POST["btnsubmit"])){
        $productName=$_POST["txtName"];
        $cateID=$_POST["txtCateID"];
        $price = $_POST["txtprice"];
        $quantity=$_POST["txtquantity"];
        $description=$_POST["txtdesc"];
        $picture=$_POST["txtpic"];
        $newProduct=new Product($productName,$cateID,$price,$quantity,$description,$picture);
        $result=$newProduct->save();
        if(!$result)
        {
            header("Location: add_product.php?failure");
        }
        else{
            header("Location: add_product.php?inserted");
        }
    }
    ?>
<?php
    if(isset($_GET["inserted"])){
		//echo"<h2>Thêm sản phẩm thành công</h2>";
		
    ?>
	<script>
		alert("Them thanh cong")
	</script>
	<?php 
	}
	?>
<div class= "container">
    <form action="#" method="post">
        <!-- Ten sp-->
        <div >
            <label for="">Tên sản phẩm </label>
        </div>
        <div>
                <input type="text"class="form-control" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"]:""; ?>" />
        </div>
     
        <!-- Mo ta sp -->
     
            <div>
                <label for="">Mô tả sản phẩm</label>
            </div>
            <div>
                <textarea type="text" class="form-control" name="txtdesc"
                    value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"]:""; ?>"></textarea>
            </div>
      
        <!-- so luong-->
      
            <div>
                <label for="">Số lượng sản phẩm</label>
            </div>
            <div>
                <input type="number" class="form-control" name="txtquantity" min= 1 value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"]:""; ?>" />
            </div>
      

        <!-- gia ban-->
  
            <div>
                <label for="">Giá bán</label>
            </div>
            <div>
                <input type="number" class="form-control" name="txtprice" min = 100 value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"]:""; ?>" />
            </div>
  
        <!-- gia ban-->
  
            <div>
                <label for="">Loại Sản Phẩm</label>
            </div>
            <div>
                <input type="text"  class="form-control"name="txtCateID" value="<?php echo isset($_POST["txtCateID"]) ? $_POST["txtCateID"]:""; ?>" />
            </div>
    
        <!-- gia ban-->
     
            <div>
                <label for="">Ảnh Đại Diện</label>
            </div>
            <div>
                <input type="text" class="form-control" name="txtpic" value="<?php echo isset($_POST["txtpic"]) ? $_POST["txtpic"]:""; ?>" />
            </div>
  
        <!-- submit-->
      
            <div>
                <input type="submit" class=" form-control btn btn-success mt-2" name="btnsubmit" value="Thêm sản phẩm" />
            </div>
       
    </form>
</div>
<?php include_once("footer.php");?>