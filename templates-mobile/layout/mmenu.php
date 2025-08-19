<div class="menu-res">
    <div class="menu-bar-res d-flex align-items-center justify-content-between flex-wrap">
        <div class="logo me-auto">
            <div class="effect-run ">
                <a class="logo-mmenu" href="">
                    <img class="lazy" onerror="this.src='<?= THUMBS ?>/145x100x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/145x100x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" alt="logo" title="logo" />
                </a>
            </div>
        </div>
        <div class="address-res">
            <a id="chiduong" class="text-decoration-none" href="<?= $optsetting['link_googlemaps'] ?>" title="title">
                <img data-src="assets/images/pin.png" alt="Chỉ đường" class="lazy"><br>
                <span><?= chiduong ?></span>
            </a>
        </div>
        <div>
            <a href="gio-hang" class="header-cart">
                <div class="about__box-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.95 35.07" width="25" height="25">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none;
                                    stroke: #fff;
                                    stroke-linecap: round;
                                    stroke-linejoin: round;
                                    stroke-width: 1.8px;
                                }
                            </style>
                        </defs>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <path d="M10,10.54V5.35A4.44,4.44,0,0,1,14.47.9h0a4.45,4.45,0,0,1,4.45,4.45v5.19" class="cls-1"></path>
                                <path d="M23.47,34.17h-18A4.58,4.58,0,0,1,.91,29.24L2.5,8.78A1.44,1.44,0,0,1,3.94,7.46H25a1.43,1.43,0,0,1,1.43,1.32L28,29.24A4.57,4.57,0,0,1,23.47,34.17Z" class="cls-1"></path>
                            </g>
                        </g>
                    </svg></div>
                <div class="about__box-content">
                    <p class="title mt-1 mb-0">Giỏ hàng <span class="count-cart"><?= (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0 ?></span>
                </div>
            </a>
        </div>
        <div class="search w-clear w-100">
            <input type="text" id="keyword-res" placeholder="Bạn cần tìm gì?" onkeypress="doEnter(event,'keyword-res');" value="<?= (!empty($_GET['keyword-res'])) ? $_GET['keyword-res'] : '' ?>" />
            <p onclick="onSearch('keyword-res');"><i class="bi bi-search"></i></p>
        </div>
    </div>
    <nav id="menu">
        <ul>
            <?php if (count($productListMenu)) { ?>
                <?php foreach ($productListMenu as $klist => $vlist) {
                    $productCatMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                    <li>
                        <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><span class="img-lv1 img-lv1-index"><img onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_PRODUCT_L . $vlist['photo'] ?>" alt="<?= $vlist['name' . $lang] ?>" title="<?= $vlist['name' . $lang] ?>" /></span><?= $vlist['name' . $lang] ?></a>
                        <?php if (!empty($productCatMenu)) { ?>
                            <ul>
                                <?php foreach ($productCatMenu as $kcat => $vcat) {
                                    $productItemMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc", array($vcat['id'])); ?>
                                    <li>
                                        <a class="has-child transition" title="<?= $vcat['name' . $lang] ?>" href="<?= $vcat[$sluglang] ?>"><?= $vcat['name' . $lang] ?></a>
                                        <?php if (!empty($productItemMenu)) { ?>
                                            <ul>
                                                <?php foreach ($productItemMenu as $kitem => $vitem) {
                                                    $productSubMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_sub where id_item = ? and find_in_set('hienthi',status) order by numb,id desc", array($vitem['id'])); ?>
                                                    <li>
                                                        <a class="has-child transition" title="<?= $vitem['name' . $lang] ?>" href="<?= $vitem[$sluglang] ?>"><?= $vitem['name' . $lang] ?></a>
                                                        <?php if (!empty($productSubMenu)) { ?>
                                                            <ul>
                                                                <?php foreach ($productSubMenu as $ksub => $vsub) { ?>
                                                                    <li>
                                                                        <a class="transition" title="<?= $vsub['name' . $lang] ?>" href="<?= $vsub[$sluglang] ?>"><?= $vsub['name' . $lang] ?></a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        <?php } ?>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            <?php } ?>
            <li>
                <a class=" <?php if ($com == 'sua-chua') echo 'active'; ?> transition" href="sua-chua" title="Sửa chữa"><span class="img-lv1 img-lv1-index"><img src="assets/images/icon-suachua.png" alt=""></span> Sửa chữa</a>
                <?php if (count($suachuaMenu)) { ?>
                    <ul>
                        <?php foreach ($suachuaMenu as $klist => $vlist) {
                            $newsCatMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                            <li>
                                <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                                <?php if (!empty($newsCatMenu)) { ?>
                                    <ul>
                                        <?php foreach ($newsCatMenu as $kcat => $vcat) {
                                            $newsItemMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc", array($vcat['id'])); ?>
                                            <li>
                                                <a class="has-child transition" title="<?= $vcat['name' . $lang] ?>" href="<?= $vcat[$sluglang] ?>"><?= $vcat['name' . $lang] ?></a>
                                                <?php if (!empty($newsItemMenu)) { ?>
                                                    <ul>
                                                        <?php foreach ($newsItemMenu as $kitem => $vitem) {
                                                            $newsSubMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_sub where id_item = ? and find_in_set('hienthi',status) order by numb,id desc", array($vitem['id'])); ?>
                                                            <li>
                                                                <a class="has-child transition" title="<?= $vitem['name' . $lang] ?>" href="<?= $vitem[$sluglang] ?>"><?= $vitem['name' . $lang] ?></a>
                                                                <?php if (!empty($newsSubMenu)) { ?>
                                                                    <ul>
                                                                        <?php foreach ($newsSubMenu as $ksub => $vsub) { ?>
                                                                            <li>
                                                                                <a class="transition" title="<?= $vsub['name' . $lang] ?>" href="<?= $vsub[$sluglang] ?>"><?= $vsub['name' . $lang] ?></a>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                <?php } ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </li>
            <li><a class="<?php if ($com == 'keo-thom') echo 'active'; ?> transition" href="keo-thom" title="Kèo thơm"><span class="img-lv1 img-lv1-index"><img src="assets/images/icon-keothom.png" alt=""></span> Kèo thơm</a></li>

            <li><a class="<?php if ($com == 'blogs') echo 'active'; ?> transition" href="blogs" title="Blogs"><span class="img-lv1 img-lv1-index"><img src="assets/images/icon-tintuc.png" alt=""></span> Blogs</a>
                <?php if (count($BlogsMenu)) { ?>
                    <ul>
                        <?php foreach ($BlogsMenu as $klist => $vlist) {
                            $newsCatMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                            <li>
                                <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </li>

            <li><a class="<?php if ($com == 'lien-he') echo 'active'; ?> transition" href="lien-he" title="Liên hệ"><span class="img-lv1 img-lv1-index"><img src="assets/images/contact.png" alt=""></span> Liên hệ</a></li>
        </ul>
    </nav>
</div>