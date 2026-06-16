<?php
include "config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (!empty($_GET['perpage'])) ? (int) $_GET['perpage'] : 1;
$eShow = htmlspecialchars($_GET['eShow']);
$idList = (!empty($_GET['idList'])) ? htmlspecialchars($_GET['idList']) : 0;
$idCat = (isset($_GET['idCat']) && $_GET['idCat'] > 0) ? htmlspecialchars($_GET['idCat']) : 0;
$p = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "api/product.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";
$params = array();

/* Math url */
if ($idList == 0) {
    $motaNoibat = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('mo-ta-noi-bat'), 'fetch', 7200);
}

if ($idList > 0) {
    $tempLink .= "&idList=" . $idList;
    $where .= " and id_list = ?";
    array_push($params, $idList);
    $descHot = $cache->get("select desc$lang from #_product_list where type ='san-pham' and id = ? ", array($idList), 'fetch', 7200);
}
if ($idCat > 0) {
    $tempLink .= "&idCat=" . $idCat;
    $where .= " and id_cat = ?";
    array_push($params, $idCat);
}
$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select name$lang, slugvi, slugen, id, photo, giadukien, regular_price, sale_price, discount, gialendoi, type from #_product where type='san-pham' $where and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";

$items = $cache->get($sqlCache, $params, 'result', 7200);

/* Count all data */
$countItems = count($cache->get($sql, $params, 'result', 7200));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<?php if ($countItems) { ?>
    <div class="row row-20">
        <?php foreach ($items as $k => $v) { ?>
            <div class="col-product col-20" data-aos="fade-up" data-aos-duration="1000">
                <div class="<?= ($idList == 0) ? 'box-product' : 'box-product2' ?>">
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
                        <div class="desc-prod "><?= ($idList == 0) ? $motaNoibat['name' . $lang] : $descHot['desc' . $lang] ?></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="pagination-ajax"><?= $pagingItems ?></div>
<?php } else echo '<p class="text-center mb-0 mt-3" style="font-size:15px;color:#000;">Đang cập nhật sản phẩm</p>'; ?>