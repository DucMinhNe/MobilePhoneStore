<div class="title-main"><span><?= (!empty($titleCate)) ? $titleCate : @$titleMain ?></span></div>
<?php if ($com == 'tim-kiem') { ?>
    <div class="div_kq_search mb-4"><?= $titleMain ?> (<?= $total ?>): <span>"<?php echo $tukhoa_show; ?>"</span></div>
<?php } ?>
<div class="row row-20">
    <?php if (!empty($product)) {
    ?>
        <?php foreach ($product as $k => $v) {
            
        ?>
            <div class="col-product col-6 col-20" data-aos="fade-up" data-aos-duration="1000">
                <div class="<?= (!empty($productList)) ? 'box-product' : 'box-product3' ?>">
                    <div class="pic-product">
                        <a class="text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                            <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/404x456x2/assets/images/noimage.png';" data-src="<?= WATERMARK ?>/product/404x456x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
                        </a>
                    </div>
                    <div class="info-prod">
                        <h3 class="mb-0"><a class="text-decoration-none text-split2 name-product" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a></h3>
                        <div class="price-product">
                            <?php if ($v['discount']) { ?>
                                <span class="price-new"><?= $func->formatMoney($v['sale_price']) ?></span>
                                <span class="price-old2"><?= $func->formatMoney($v['regular_price']) ?></span>
                                <span class="price-per"><?= '-' . $v['discount'] . '%' ?></span>
                            <?php } elseif ($v['giadukien']) { ?>
                                <p class="giadukien">Giá dự kiến: </p>
                                <span class="price-new"><?= $func->formatMoney($v['giadukien']) ?></span>
                            <?php } else { ?>
                                <span class="price-new">
                                    <?php
                                    if ($v['regular_price']) {
                                        echo $func->formatMoney($v['regular_price']);
                                    } else {
                                        echo 'Liên hệ';
                                    }
                                    ?>
                                </span>
                            <?php } ?>
                        </div>
                        <?php if ($v['gialendoi']) { ?>
                            <p class="price-product">
                                <span class="text-gialendoi">Giá lên đời: </span>
                                <span class="price-new"><?= $func->formatMoney($v['gialendoi']) ?></span>
                            </p>
                        <?php } ?>
                        <?php if (!empty($productList)) { ?>
                            <div class="desc-prod "><?= $productList['desc' . $lang] ?></div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="col-12">
            <div class="alert alert-warning w-100" role="alert">
                <strong><?= khongtimthayketqua ?></strong>
            </div>
        </div>
    <?php } ?>

    <div class="col-12">
        <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>
    </div>
</div>