<?php include_once("header.php"); 
require_once("entities/product.class.php");
?>

<div class="container">
<table class="table table-hover">
    <thead class="thead-primary">
        <tr>
            <th scope="col">#</th>
            <th scope='col'></th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        $lstProduct = Product::list_product();
        if (is_array($lstProduct)) {
        foreach ($lstProduct as $product)
        {
            ?>
        <tr>
            <th scope="row"><?= (++$i) ?></th>
            <td><img src="<?= $product["Picture"] ?>" width="200px" height="100px" /></td>
            <td>

                <?= $product["ProductName"] ?>

            </td>
            <td><?= $product["CateID"] ?></td>
            <td><?= number_format( $product["Price"] , 0 , '.' , ',' ); ?></td>
            <td><?= $product["Quantity"] ?></td>
        </tr>
        <?php
        }
        }

    ?>
    </tbody>

</table>
</div>
<?php include_once("footer.php") ?>