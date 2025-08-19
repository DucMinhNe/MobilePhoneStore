<?php
include "config.php";

$regular_price = (!empty($_POST['regular_price'])) ? htmlspecialchars($_POST['regular_price']) : '';
$sale_price = (!empty($_POST['sale_price'])) ? htmlspecialchars($_POST['sale_price']) : '';
$discount = (!empty($_POST['discount'])) ? htmlspecialchars($_POST['discount']) : 0;

?>

<?php if ($discount > 0) { ?>
    <span class="price-old"><?= $regular_price ?></span>
    <span class="price-new"><?= $sale_price ?></span>
    <span class="price-per"><?= '-' . $discount . '%' ?></span>
<?php } else { ?>
    <span class="price-new"><?= $regular_price ?></span>
<?php } ?>