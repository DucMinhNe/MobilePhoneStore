<?php /* if (count($hotsale)) { ?>
    <div class="wrap-product wrap-content">
        <div class="title-main title-hotsale">
            <img src="assets/images/icon-hotsale.png" alt="">
        </div>
        <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:5|margin:7" data-rewind="1" data-autoplay="1" data-loop="1" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="1" data-nav="0" data-navcontainer="">
            <?php foreach ($hotsale as $k => $v) { ?>
                <div class="box-hotsale">
                    <div class="pic-product">
                        <a class="text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                            <img class="lazy" onerror="this.src='<?= THUMBS ?>/404x456x2/assets/images/noimage.png';" data-src="<?= WATERMARK ?>/product/404x456x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
                        </a>
                    </div>
                    <div class="info-prod">
                        <h3 class="mb-0"><a class="text-decoration-none text-split2 name-product" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a></h3>
                        <p class="price-product">
                            <?php if ($v['discount']) { ?>
                                <span class="price-new"><?= $func->formatMoney($v['sale_price']) ?></span>
                                <span class="price-old2"><?= $func->formatMoney($v['regular_price']) ?></span>
                                <span class="price-per"><?= '-' . $v['discount'] . '%' ?></span>
                            <?php } else { ?>
                                <span class="price-new"><?= ($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe ?></span>
                            <?php } ?>
                        </p>

                        <?php if ($v['gialendoi']) { ?>
                            <p class="price-product">
                                <span class="text-gialendoi">Giá lên đời: </span>
                                <span class="price-new"><?= $func->formatMoney($v['gialendoi']) ?></span>
                            </p>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } */ ?>

<?php if (count($hotsale)) { ?>
    <div class="wrap-product wrap-content">
        <div class="title-main title-hotsale">
            <img src="assets/images/icon-hotsale.png" alt="">
        </div>
        <div class="paging-product-hotsale"></div>
    </div>
<?php } ?>


<?php if (count($thuvien)) { ?>
    <div class="album">
        <div class="wrap-content">
            <div class="slogan-album">Hơn 10000 khách hàng đã tin tưởng Phu An Khang! </div>
            <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:1|margin:10,screen:425|items:1|margin:20,screen:575|items:1|margin:10,screen:767|items:2|margin:20,screen:991|items:3|margin:30,screen:1199|items:6|margin:6" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="0" data-nav="0" data-navcontainer=".control-news">
                <?php foreach ($thuvien as $k => $v) { ?>
                    <div class="album_item ">
                        <a class="scale-img" data-fancybox="gallery" data-src="<?= ASSET . UPLOAD_PRODUCT_L . $v['photo'] ?>" data-caption="" rel="album-<?= $v['id'] ?>" title="<?= $v['name' . $lang] ?>">
                            <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/300x300x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/300x300x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- <div class="banner-quangcao">
    <div class="wrap-content">
        <div>
            <img class="w-100" onerror="this.src='<?= THUMBS ?>/1188x318x1/assets/images/noimage.png';" src="<?= THUMBS ?>/1188x318x1/<?= UPLOAD_PHOTO_L . $banner_qc2['photo'] ?>" alt="<?= $setting['name' . $lang] ?>" title="<?= $setting['name' . $lang] ?>" />
        </div>
    </div>
</div> -->

<?php if (count($productHot)) { ?>
    <div class="product__hot">
        <div class="wrap-content">
            <div class="paging-product"></div>
        </div>
    </div>
<?php } ?>

<?php /* if (count($productHot)) {
    $product_chunk = array_chunk($productHot, 2) ?>
    <div class="product__hot wrap-content">
        <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:5|margin:3" data-rewind="1" data-autoplay="1" data-loop="1" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="1" data-nav="0" data-navcontainer="">
            <?php foreach ($product_chunk as $chunk) { ?>
                <div class="productList-col">
                    <?php foreach ($chunk as $k => $v) { ?>
                        <div class="box-product">
                            <div class="pic-product">
                                <a class="text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                                    <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/404x456x2/assets/images/noimage.png';" data-src="<?= WATERMARK ?>/product/404x456x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
                                </a>
                            </div>
                            <div class="info-prod">
                                <h3 class="mb-0"><a class="text-decoration-none text-split2 name-product" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a></h3>
                                <p class="price-product">
                                    <?php if ($v['discount']) { ?>
                                        <span class="price-new"><?= $func->formatMoney($v['sale_price']) ?></span>
                                        <span class="price-old2"><?= $func->formatMoney($v['regular_price']) ?></span>
                                        <span class="price-per"><?= '-' . $v['discount'] . '%' ?></span>
                                    <?php } else { ?>
                                        <span class="price-new"><?= ($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe ?></span>
                                    <?php } ?>
                                </p>
                                <?php if ($v['gialendoi']) { ?>
                                    <p class="price-product">
                                        <span class="text-gialendoi">Giá lên đời: </span>
                                        <span class="price-new"><?= $func->formatMoney($v['gialendoi']) ?></span>
                                    </p>
                                <?php } ?>
                                <div class="desc-prod "><?= $motaNoibat['name' . $lang] ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } */ ?>

<?php if (isset($proListHot) && count($proListHot) > 0) { ?>
    <?php foreach ($proListHot as $k => $v) {
        $proCatHot = $cache->get("select name$lang,photo , slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('noibat',status)  and find_in_set('hienthi',status) order by numb,id desc", array($v['id']), 'result', 7200);
    ?>
        <div class="section-product pad-bottom">
            <div class="wrap-content">
                <div class="box_main_product_list">
                    <div class="d-flex align-center justify-content-between flex-wrap d-title-choose-list ">
                        <div class="title-product">
                            <span class="img-lv1 img-lv1-index"><img onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" /></span>
                            <h2><?= $v['name' . $lang] ?></h2>
                        </div>
                        <div class="d-flex align-items-center flex-wrap d-title-choose-cat">
                            <div class="choose_list">
                                <?php foreach ($proCatHot as $kc => $vc) { ?>
                                    <span class="choosed2 <?php if ($kc == 0) echo 'choosed' ?>" data-list="<?= $v['id'] ?>" data-cat="<?= $vc['id'] ?>"><?= $vc['name' . $lang] ?></span>
                                <?php } ?>
                            </div>
                            <div class="btn_sp">
                                <a class="text-decoration-none" href="<?= $v[$sluglang] ?>">Xem Tất Cả</a>
                            </div>
                        </div>
                    </div>
                    <div class="wp_sp_index">
                        <div class="show_padding show_padding<?= $v['id'] ?>" data-list="<?= $v['id'] ?>" data-cat=""></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<div class="wrap-intro">
    <div class="wrap-content">
        <div class="title-main title-index"><span>Video clip</span></div>
        <div class="row">
            <div class="col-12">
                <div class="div_hiden">
                    <div class="owl-page owl-carousel owl-theme owl-video" data-items="screen:0|items:3|margin:20" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="0" data-nav="1" data-navcontainer=".control-video">
                        <?php foreach ($videoHot as $k => $v) { ?>
                            <div>
                                <a class="item-video2 pic-video-2 scale-img text-decoration-none" data-fancybox="video" data-src="<?= $v['link_video'] ?>" title="<?= $v['name' . $lang] ?>">
                                    <img class="" onerror="this.src='<?= THUMBS ?>/384x284x1/assets/images/noimage.png';" src="<?= THUMBS ?>/384x284x1/<?= UPLOAD_PHOTO_L . $v['photo'] ?>">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (count($newsHot)) { ?>
    <div class="wrap-newsnb padding-top-bottom">
        <div class="wrap-content">
            <p class="title-main title-index"><span>Tin Tức Cập Nhật</span></p>
            <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:4|margin:20" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="0" data-nav="0" data-navcontainer=".control-news">
                <?php foreach ($newsHot as $k => $v) { ?>
                    <div class="item-newsnb">
                        <p class="pic-newsnb">
                            <a class="scale-img" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                                <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/280x210x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/280x210x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
                            </a>
                        </p>
                        <div class="info-newsnb">
                            <p class="time-newshome"><i class="fa-light fa-calendar"></i> <?= date("d", $v['date_created']) ?> tháng<?= date(" m, Y", $v['date_created']) ?>
                                <i class="fa-light fa-arrow-right"></i>
                            </p>
                            <h3 class="mb-0">
                                <a class="name-newsnb text-split text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a>
                            </h3>
                            <p class="desc-newsnb text-split"><?= $v['desc' . $lang] ?></p>
                            <div class="btn-xemchitiet">
                                <a class="text-xemchitiet text-decoration-none" href="<?= $v['slug' . $lang] ?>">Xem chi tiết</a>
                                <i class="fa-light fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="control-news control-owl transition"></div>
        </div>
    </div>
<?php } ?>

<div class="wrap-intro">
    <div class="wrap-content">
        <div class="title-main title-index">
            <span>Fanpage Phu An Khang</span>
        </div>
        <div class="row">
            <div class="col-5">
                <?= $addons->set('fanpage-facebook', 'fanpage-facebook', 2); ?>
            </div>
            <div class="col-7">
                <?php $fb_chunk = array_chunk($linkfb, 2) ?>
                <div class="owl-product">
                    <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:2|margin:5" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="0" data-nav="0" data-navcontainer=".control-product">
                        <?php foreach ($fb_chunk as $chunk) { ?>
                            <div class="productList-col">
                                <?php foreach ($chunk as $k => $v) { ?>
                                    <div class="fb-page" data-href="<?= $v['name' . $lang] ?>" data-tabs="timeline" data-width="330" data-height="217" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                        <blockquote cite="<?= $v['name' . $lang] ?>" class="fb-xfbml-parse-ignore">
                                            <a href="<?= $v['name' . $lang] ?>">Facebook</a>
                                        </blockquote>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>