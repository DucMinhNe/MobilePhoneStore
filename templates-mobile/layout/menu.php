<div class="w-menu">
    <div class="menu">
        <div class="wrap-menu">
            <ul class="menu-main ulmn">
                <?php if (count($productListMenu)) { ?>
                    <?php foreach ($productListMenu as $klist => $vlist) {
                        $productCatMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                        <li>
                            <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><span class="img-lv1"><img onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_PRODUCT_L . $vlist['photo'] ?>" alt="<?= $vlist['name' . $lang] ?>" title="<?= $vlist['name' . $lang] ?>" /></span><?= $vlist['name' . $lang] ?></a>
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
                    <a class=" <?php if ($com == 'sua-chua') echo 'active'; ?> transition" href="javascript:void(0)" title="Sửa chữa"><span class="img-lv1"><img src="assets/images/icon-suachua.png" alt=""></span> Sửa chữa</a>
                    <?php if (count($suachuaMenu)) { ?>
                        <ul>
                            <?php foreach ($suachuaMenu as $klist => $vlist) {
                                $newsCatMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                                <li>
                                    <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
                <li><a class="<?php if ($com == 'keo-thom') echo 'active'; ?> transition" href="keo-thom" title="Kèo thơm"><span class="img-lv1"><img src="assets/images/icon-keothom.png" alt=""></span> Kèo thơm</a></li>
                <li><a class="<?php if ($com == 'tin-tuc') echo 'active'; ?> transition" href="tin-tuc" title="Tin tức"><span class="img-lv1"><img src="assets/images/icon-tintuc.png" alt=""></span> Tin tức</a></li>
            </ul>
        </div>
    </div>
    <?php include TEMPLATE . LAYOUT . "mmenu.php"; ?>
</div>