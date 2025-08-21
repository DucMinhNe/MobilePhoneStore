<?php
include "config.php";
require_once LIBRARIES . "config-type.php";
$arrIdSize = (!empty($_POST["id"])) ? $_POST["id"] : null;
$id_product = (!empty($_POST["id_product"])) ? htmlspecialchars($_POST["id_product"]) : 0;
$type = (!empty($_POST["type"])) ? htmlspecialchars($_POST["type"]) : '';
$rowProductDetail = $func->getInfoDetail('option_size', 'product', $id_product);
$row = (!empty($rowProductDetail['option_size'])) ? json_decode($rowProductDetail['option_size'], true) : null;
//$arrSize = (!empty($row)) ? $row['id_size'] : null; 
//$func->dump($arrSize);
// $func->dump($arrIdSize);
//$func->dump($row[]);
$arrSize = array();
if (!empty($row)) {
    foreach ($row as $k => $v) {
        $arrSize[] = $row[$k]['id_size'];
    }
}
?>
<?php if (!empty($arrIdSize)) { ?>
<?php if ($id_product == 0) { ?>
<?php foreach ($arrIdSize as $k => $v) {
            $rowSizeDeail = $func->getInfoDetail('namevi', 'size', $v);
        ?>
        
<div class="form-group col-xl-12 col-lg-4 col-md-4 col-sm-6">
    <label class=" d-block"> Phân loại <?= $rowSizeDeail['namevi'] ?></label>
    <label class=" d-block">Hình ảnh : </label>
    <div class=" text-center">
        <img class="irounded mb-2 m-auto "
            src="<?= ASSET . "thumbs/250x250x1/" . UPLOAD_PRODUCT_L . (!empty($rowSizeDeail['photo']) ? $rowSizeDeail['photo'] : 'noimage.png') ?>" alt="">
    </div>
    <div class="input-group mb-2">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="photo_price[<?= $v ?>]">
            <label class="custom-file-label">
                Choose file</label>
        </div>
    </div>
    <label>Giá :</span></label>
    <div class="input-group mb-2">
        <input type="text" class="form-control format-price price-origin-size"
            name="dataSizePrice[<?= $v ?>][regular_price]" placeholder="Giá bán" value="">
        <div class="input-group-append">
            <div class="input-group-text"><strong>VNĐ</strong></div>
        </div>
    </div>
    <div class="input-group mb-2">
        <input type="text" class="form-control format-price price-new-size" name="dataSizePrice[<?= $v ?>][sale_price]"
            placeholder="Giá mới" value="">
        <div class="input-group-append">
            <div class="input-group-text"><strong>VNĐ</strong></div>
        </div>
    </div>
    <div class="input-group">
        <input type="text" class="form-control price-promotion-size" name="dataSizePrice[<?= $v ?>][discount]"
            placeholder="Chiết khấu" value="" readonly="">
        <div class="input-group-append">
            <div class="input-group-text"><strong>%</strong></div>
        </div>
    </div>
    <input type="hidden" name="dataSizePrice[<?= $v ?>][id_size]" value="<?= $v ?>">

</div>
<?php } ?>
<?php } else { ?>
<?php if (!empty($row)) {
            //$func->dump($row);
        ?>
<?php foreach ($row as $k => $v) {
                if (in_array($v['id_size'], $arrIdSize)) {
                    $rowSizeDeail = $func->getInfoDetail('namevi', 'size', $v['id_size']);
                    /* size da ton tai */
            ?>
<div class="form-group col-xl-12 col-lg-4 col-md-4 col-sm-6">
    <label class=" d-block"> Phân loại <?= $rowSizeDeail['namevi'] ?></label>
    <label>Hình ảnh : </label>
    <div class="text-center mb-3 d-block">
        <img class="irounded mb-2 m-auto "
            src="<?= ASSET . "thumbs/250x250x1/" . UPLOAD_PRODUCT_L . $v['photo_price'] ?>" alt="">
    </div>
    <div class="input-group mb-2">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="photo_price[<?= $v['id_size'] ?>]">
            <label class="custom-file-label">
                Choose file</label>
        </div>
    </div>
    <label>Giá :</label>
    <div class="input-group mb-2">
        <input type="text" class="form-control format-price price-origin-size"
            name="dataSizePrice[<?= $v['id_size'] ?>][regular_price]" placeholder="Giá bán"
            value="<?= $v['regular_price'] ?>">
        <div class="input-group-append">
            <div class="input-group-text"><strong>VNĐ</strong></div>
        </div>
    </div>
    <div class="input-group mb-2">
        <input type="text" class="form-control format-price price-new-size"
            name="dataSizePrice[<?= $v['id_size'] ?>][sale_price]" placeholder="Giá mới"
            value="<?= $v['sale_price'] ?>">
        <div class="input-group-append">
            <div class="input-group-text"><strong>VNĐ</strong></div>
        </div>
    </div>
    <div class="input-group">
        <input type="text" class="form-control price-promotion-size"
            name="dataSizePrice[<?= $v['id_size'] ?>][discount]" placeholder="Chiết khấu" value="<?= $v['discount'] ?>"
            readonly="">
        <div class="input-group-append">
            <div class="input-group-text"><strong>%</strong></div>
        </div>
    </div>
    <input type="hidden" name="dataSizePrice[<?= $v['id_size'] ?>][id_size]" value="<?= $v['id_size'] ?>">
</div>
<?php } ?>
<?php } ?>
<?php } ?>
<?php foreach ($arrIdSize as $k => $v) {
            if (!in_array("$v", $arrSize)) {
                /* them size cho chinh sua san pham */
                $rowSizeDeail = $func->getInfoDetail('namevi', 'size', $v);
                //$func->dump($rowSizeDeail);
        ?>
<div class="form-group col-xl-12 col-lg-4 col-md-4 col-sm-6">
    <label class=" d-block"> Phân loại <?= $rowSizeDeail['namevi'] ?></label>

    <label>Hình ảnh : </label>
    <img class="irounded mb-2 m-auto d-block "
        src="<?= ASSET . "thumbs/250x250x1/" . UPLOAD_PRODUCT_L . (!empty($rowSizeDeail['photo']) ? $rowSizeDeail['photo'] : 'noimage.png') ?>" alt="">

    <div class="input-group mb-2">
        <div class="custom-file">

            <input type="file" class="custom-file-input" name="photo_price[<?= $v ?>]">
            <label class="custom-file-label">
                Choose file </label>
        </div>
    </div>
    <label>Giá : </label>
    <div class="input-group mb-2">
        <input type="text" class="form-control format-price price-origin-size"
            name="dataSizePrice[<?= $v ?>][regular_price]" placeholder="Giá bán" value="">
        <div class="input-group-append">
            <div class="input-group-text"><strong>VNĐ</strong></div>
        </div>
    </div>
    <div class="input-group mb-2">
        <input type="text" class="form-control format-price price-new-size" name="dataSizePrice[<?= $v ?>][sale_price]"
            placeholder="Giá mới" value="">
        <div class="input-group-append">
            <div class="input-group-text"><strong>VNĐ</strong></div>
        </div>
    </div>
    <div class="input-group">
        <input type="text" class="form-control price-promotion-size" name="dataSizePrice[<?= $v ?>][discount]"
            placeholder="Chiết khấu" value="" readonly="">
        <div class="input-group-append">
            <div class="input-group-text"><strong>%</strong></div>
        </div>
    </div>
    <input type="hidden" name="dataSizePrice[<?= $v ?>][id_size]" value="<?= $v ?>">
</div>


<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>