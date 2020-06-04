<?php
require_once("entities/product.class.php");
?>
<?php
    include_once("header.php");
    foreach ($prods as item){
        echo "<p>Ten san pham".$item["ProductName"]."</p>";
    }
    include_once("footer.php");
?>