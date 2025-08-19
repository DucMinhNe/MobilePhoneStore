<?php
if (!defined('SOURCES')) die("Error");
/* static */
$banner_seo_home = $cache->get("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('banner-seo-home', 'photo_static'), 'fetch', 7200);
$popup = $cache->get("select name$lang, photo, link from #_photo where type = ? and act = ? and find_in_set('hienthi',status) limit 0,1", array('popup', 'photo_static'), 'fetch', 7200);
$banner_qc1 = $cache->get("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('banner-quang-cao-1', 'photo_static'), 'fetch', 7200);
$banner_qc2 = $cache->get("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('banner-quang-cao-2', 'photo_static'), 'fetch', 7200);
$motaNoibat = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('mo-ta-noi-bat'), 'fetch', 7200);

/* multi */
$slider = $cache->get("select name$lang, desc$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('slide'), 'result', 7200);
$productHot = $cache->get("select id, name$lang, slugvi, slugen, photo, regular_price, sale_price, discount, gialendoi from #_product where type = ? and find_in_set('linew',status) and find_in_set('hienthi',status)", array('san-pham'), 'result', 7200);
$hotsale = $cache->get("select id, name$lang, slugvi, slugen, photo, regular_price, discount, sale_price, gialendoi from #_product where type = ? and find_in_set('hotsale',status) and find_in_set('hienthi',status)", array('san-pham'), 'result', 7200);
$proListHot = $cache->get("select name$lang, slugvi, slugen, photo, id from #_product_list where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'), 'result', 7200);
$newsHot = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc", array('blogs'), 'result', 7200);
$videoHot = $cache->get("select id,name$lang, photo, link_video from #_photo where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status)", array('video'), 'result', 7200);
$linkfb = $cache->get("select name$lang, link$lang, id from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('fanpage-fb'), 'result', 7200);
$thuvien = $cache->get("select name$lang, slug$lang, id, photo, type from #_product where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('thu-vien-anh'), 'result', 7200);

/* SEO */
$seoDB = $seo->getOnDB(0, 'setting', 'update', 'setting');
if (!empty($seoDB['title' . $seolang])) $seo->set('h1', $seoDB['title' . $seolang]);
if (!empty($seoDB['title' . $seolang])) $seo->set('title', $seoDB['title' . $seolang]);
if (!empty($seoDB['keywords' . $seolang])) $seo->set('keywords', $seoDB['keywords' . $seolang]);
if (!empty($seoDB['description' . $seolang])) $seo->set('description', $seoDB['description' . $seolang]);
$seo->set('url', $func->getPageURL());
$imgJson = (!empty($banner_seo_home['options'])) ? json_decode($banner_seo_home['options'], true) : null;
if (empty($imgJson) || ($imgJson['p'] != $banner_seo_home['photo'])) {
    $imgJson = $func->getImgSize($banner_seo_home['photo'], UPLOAD_PHOTO_L . $banner_seo_home['photo']);
    $seo->updateSeoDB(json_encode($imgJson), 'photo', $banner_seo_home['id']);
}
if (!empty($imgJson)) {
    $seo->set('photo', $configBase . THUMBS . '/' . $imgJson['w'] . 'x' . $imgJson['h'] . 'x2/' . UPLOAD_PHOTO_L . $banner_seo_home['photo']);
    $seo->set('photo:width', $imgJson['w']);
    $seo->set('photo:height', $imgJson['h']);
    $seo->set('photo:type', $imgJson['m']);
}