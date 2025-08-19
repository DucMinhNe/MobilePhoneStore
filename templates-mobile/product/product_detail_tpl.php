<p class="title-pro-detail mb-2"><?= $rowDetail['name' . $lang] ?></p>
<div class="grid-pro-detail d-flex flex-wrap justify-content-between align-items-start">
    <div class="left-pro-detail">
        <a id="Zoom-1" class="MagicZoom price-photo-pro-detail" data-options="zoomMode: on; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?= UPLOAD_PRODUCT_L . $rowDetail['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">
            <?= $func->getImage(['isLazy' => false, 'sizes' => '540x540x2', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $rowDetail['photo'], 'alt' => $rowDetail['name' . $lang]]) ?>
        </a>
        <?php if ($rowDetailPhoto) {
            if (count($rowDetailPhoto) > 0) { ?>
                <div class="gallery-thumb-pro">
                    <div class="owl-page owl-carousel owl-theme owl-pro-detail" data-items="screen:0|items:5|margin:10" data-nav="1" data-navcontainer=".control-pro-detail">
                        <div>
                            <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= UPLOAD_PRODUCT_L . $rowDetail['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">
                                <img class="w-100" onerror="this.src='<?= THUMBS ?>/540x540x2/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/540x540x2/<?= UPLOAD_PRODUCT_L . $rowDetail['photo'] ?>" alt="<?= $rowDetail['name' . $lang] ?>" title="<?= $rowDetail['name' . $lang] ?>" />
                            </a>
                        </div>
                        <?php foreach ($rowDetailPhoto as $v) { ?>
                            <div>
                                <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">
                                    <img class="w-100" onerror="this.src='<?= THUMBS ?>/540x540x2/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/540x540x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $rowDetail['name' . $lang] ?>" title="<?= $rowDetail['name' . $lang] ?>" />
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="control-pro-detail control-owl transition"></div>
                </div>
        <?php }
        } ?>
        <?php if (!empty($rowDetail['link_yotube'])) { ?>
            <div class="box_video_pro_detail">
                <a class="text-decoration-none" data-fancybox="video" data-src="<?= $func->get_youtube_shorts($rowDetail['link_youtube']) ?>" title="<?= $rowDetail['name' . $lang] ?>">
                    Video review
                </a>
            </div>
        <?php } ?>
    </div>

    <div class="mid-pro-detail">
        <ul class="attr-pro-detail">
            <li class="w-clear">
                <label class="attr-label-pro-detail"><?= gia ?>:</label>
                <div class="attr-content-pro-detail">

                    <?php if (!empty($listSize)) { ?>
                        <?php if ($listSize[$rowSize[0]['id']]['sale_price']) { ?>
                            <span class="price-new-pro-detail"><?= $func->formatMoney($listSize[$rowSize[0]['id']]['sale_price']) ?></span>
                            <span class="price-old-pro-detail"><?= $func->formatMoney($listSize[$rowSize[0]['id']]['regular_price']) ?></span>
                        <?php } else { ?>
                            <span class="price-new-pro-detail"><?= ($listSize[$rowSize[0]['id']]['regular_price']) ? $func->formatMoney($listSize[$rowSize[0]['id']]['regular_price']) : lienhe ?></span>
                            <span class="price-old-pro-detail"></span>
                        <?php } ?>
                    <?php } else { ?>
                        <span class="price-new-pro-detail"><?= lienhe ?></span>
                    <?php } ?>
                </div>


            </li>
            <div class="tragop0">Trả góp 0%</div>
            <div class="social-plugin social-plugin-pro-detail w-clear">
                <?php
                $params = array();
                $params['oaid'] = $optsetting['oaidzalo'];
                echo $func->markdown('social/share', $params);
                ?>
            </div>
            <li>
                <label class="attr-label-pro-detail"><?= luotxem ?>:</label>
                <span class="number-view"><?= $rowDetail['view'] ?></span>
            </li>

            <div class="box-desc-detail">
                <div class="text-desc-detail">Thông Tin Sản Phẩm</div>
                <div class="desc-pro-detail">
                    <?= ($func->decodeHtmlChars($rowDetail['desc' . $lang])) ?>
                </div>
            </div>

            <?php if (!empty($product2) && (!empty($productItem))) { ?>
                <div class="box-prod-items">
                    <?php foreach ($product2 as $k => $v) { ?>
                        <a class="item-product-detail text-decoration-none" href=" <?= $v['slug' . $lang] ?>">
                            <span class="dungluong-detail">
                                <?= $v['dungluong' . $lang] ?>
                            </span>
                            <?php if ($v['sale_price']) { ?>
                                <strong class="regular-price-detail"><?= $func->formatMoney($v['sale_price']) ?></strong>
                            <?php } else { ?>
                                <strong class="regular-price-detail"><?= ($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe ?></strong>
                            <?php } ?>
                        </a>
                    <?php } ?>
                    <a class="item-product-detail text-decoration-none" href=" <?= $rowDetail['slug' . $lang] ?>">
                        <span class="dungluong-detail">
                            <?= $rowDetail['dungluong' . $lang] ?>
                        </span>
                        <?php if ($rowDetail['sale_price']) { ?>
                            <strong class="regular-price-detail"><?= $func->formatMoney($rowDetail['sale_price']) ?></strong>
                        <?php } else { ?>
                            <strong class="regular-price-detail"><?= ($rowDetail['regular_price']) ? $func->formatMoney($rowDetail['regular_price']) : lienhe ?></strong>
                        <?php } ?>
                    </a>
                </div>
            <?php } ?>

            <?php if (!empty($rowSize)) {
            ?>
                <li class="size-block-pro-detail w-clear">
                    <label class="attr-label-pro-detail d-block">Màu sắc:</label>
                    <div class="attr-content-pro-detail d-flex flex-wrap">
                        <?php foreach ($rowSize as $k => $v) { ?>
                            <label for="size-pro-detail-<?= $v['id'] ?>" class=" size-pro-detail size-pro-detail-cus text-decoration-none <?php if ($k == 0) echo 'active'; ?>">
                                <input data-photo_price="<?= !empty($listSize[$v['id']]['photo_price']) ? (ASSET . WATERMARK . "/product/540x540x2/" . UPLOAD_PRODUCT_L . $listSize[$v['id']]['photo_price']) : '' ?>" data-regular_price="<?= ($listSize[$v['id']]['regular_price'] > 0) ? $func->formatMoney($listSize[$v['id']]['regular_price']) : '' ?>" data-sale_price="<?= ($listSize[$v['id']]['sale_price'] > 0) ? $func->formatMoney($listSize[$v['id']]['sale_price']) : '' ?>" data-discount="<?= ($listSize[$v['id']]['discount'] > 0) ? $listSize[$v['id']]['discount'] : 0 ?>" type="radio" value="<?= $v['id'] ?>" id="size-pro-detail-<?= $v['id'] ?>" name="size-pro-detail" <?php if ($k == 0) echo 'checked="checked"'; ?>>

                                <div class="img-prod-detail"><img class="lazy" onerror="this.src='<?= THUMBS ?>/540x540x2/assets/images/noimage.png';" data-src="<?= THUMBS ?>/540x540x2/<?= UPLOAD_PRODUCT_L . $listSize[$v['id']]['photo_price'] ?>" /></div>
                            </label>
                        <?php } ?>
                    </div>
                </li>
            <?php } ?>

        </ul>

        <?php if (!empty($khuyenmailist)) {
        ?>
            <div class="box-khuyenmai">
                <div class="text-khuyenmai-detail">Ưu đãi dành cho <?= $khuyenmailist['name' . $lang] ?></div>
                <div class="khuyenmai-pro-detail">
                    <?= ($func->decodeHtmlChars($khuyenmailist['khuyenmai' . $lang])) ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="box-khuyenmai">
                <div class="text-khuyenmai-detail">Ưu đãi khi mua sản phẩm</div>
                <div class="khuyenmai-pro-detail">
                    <?= ($func->decodeHtmlChars($sanphamkhac['khuyenmai' . $lang])) ?>
                </div>
            </div>
        <?php } ?>

        <div class="cart-pro-detail d-flex flex-wrap align-items-center justify-content-between">
            <a class="transition addnow addcart text-decoration-none d-flex align-items-center justify-content-center" data-id="<?= $rowDetail['id'] ?>" data-action="addnow" data-type_opt="product_detail"><span><?= themvaogiohang ?></span></a>

            <a class="transition buynow addcart text-decoration-none d-flex align-items-center justify-content-center" data-id="<?= $rowDetail['id'] ?>" data-action="buynow" data-type_opt="product_detail"><i class="bi bi-cart2"></i><span><?= muangay ?></span></a>
        </div>

        <div class="box-muatragop">
            <div class="text-tragop" onclick="toggleImages()">
                <div class="text-tragop2">Mua trả góp 0% <i class="fa-solid fa-arrow-down"></i></div>
                <div class="congty-taichinh">qua các cty tài chính</div>
            </div>
            <div class="box-img-tragop" id="image-container" style="display: none;">
                <div class="row">
                    <?php foreach ($tragop as $k => $v) { ?>
                        <div class="col-4 mb-3">
                            <img onerror="this.src='<?= THUMBS ?>/230x100x2/assets/images/noimage.png';" src="<?= THUMBS ?>/230x100x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" />
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

    <?php if (!empty($khuyenmailist)) { ?>
        <div class="right-pro-detail">
            <div class="text-baohanh-detail">Bảo hành mở rộng</div>
            <div class="baohanh-pro-detail ">
                <?= ($func->decodeHtmlChars($khuyenmailist['baohanh' . $lang])) ?>
            </div>
            <div class="text-baohanh-detail">Bạn sẽ được hỗ trợ khi mua máy</div>
            <div class="baohanh-pro-detail ">
                <?= ($func->decodeHtmlChars($khuyenmailist['hotro' . $lang])) ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="right-pro-detail">
            <div class="text-baohanh-detail">Bảo hành mở rộng</div>
            <div class="baohanh-pro-detail ">
                <?= ($func->decodeHtmlChars($sanphamkhac['baohanh' . $lang])) ?>
            </div>
            <div class="text-baohanh-detail">Bạn sẽ được hỗ trợ khi mua máy</div>
            <div class="baohanh-pro-detail ">
                <?= ($func->decodeHtmlChars($sanphamkhac['hotro' . $lang])) ?>
            </div>
        </div>
    <?php } ?>

</div>

<?php if (empty($quickview)) { ?>
    <div class="title-main"><span>Sản Phẩm Tương Tự</span></div>
    <div class="row row-20">
        <?php if (!empty($product3)) { ?>
            <?php foreach ($product3 as $k => $v) { ?>
                <div class="col-product col-6 col-20">
                    <div class="box-product">
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
                            <?php { ?>
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
<?php } ?>

<?php if (empty($quickview)) { ?>
    <div class="box-content-detail tabs-pro-detail pb-4">
        <div class="left-content-detail ">
            <div class="tab-content " id="tabsProDetailContent">
                <div class="tab-pane fade show active" id="info-pro-detail" role="tabpanel">
                    <div class="the-service-content" id="noidung">
                        <article class="noidung">
                            <div class="content-text"><?= $func->decodeHtmlChars($rowDetail['content' . $lang]) ?></div>
                        </article>
                        <div class="hide-content">
                            <a href="javascript:;" class="btn-view-full-content text-decoration-none" data-target="#noidung">Xem thêm<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="commentfb-pro-detail" role="tabpanel">
                    <div class="fb-comments" data-href="<?= $func->getCurrentPageURL() ?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div>
                </div>
            </div>
        </div>
        <div class="right-content-detail">
            <div class="box-thongso-detail">
                <div class="the-service-content" id="thongso">
                    <article class="thongso"><?= ($func->decodeHtmlChars($rowDetail['thongso' . $lang])) ?></article>
                    <div class="hide-content">
                        <a href="javascript:;" class="btn-view-full-thongso text-decoration-none" data-target="#thongso">Xem thêm <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<script>
    function toggleImages() {
        var imageContainer = document.getElementById("image-container");
        if (imageContainer.style.display === "none") {
            imageContainer.style.display = "block";
        } else {
            imageContainer.style.display = "none";
        }
    }
</script>