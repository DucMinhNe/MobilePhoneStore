<?php
if (!defined('SOURCES')) die("Error");

/* static */
$copyright = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('copyright'), 'fetch', 7200);
$favicon = $cache->get("select photo from #_photo where type = ? and act = ? and find_in_set('hienthi',status) limit 0,1", array('favicon', 'photo_static'), 'fetch', 7200);
$logo = $cache->get("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('logo', 'photo_static'), 'fetch', 7200);
$logofooter = $cache->get("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('logo-footer', 'photo_static'), 'fetch', 7200);
$banner = $cache->get("select photo from #_photo where type = ? and act = ? limit 0,1", array('banner', 'photo_static'), 'fetch', 7200);
$slogan = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('slogan'), 'fetch', 7200);
$footer = $cache->get("select name$lang, content$lang from #_static where type = ? limit 0,1", array('footer'), 'fetch', 7200);
$tiktok = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('ten-tiktok'), 'fetch', 7200);


/* multi */
$policy = $cache->get("select name$lang, slugvi, slugen, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('chinh-sach'), 'result', 7200);
$social = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('social'), 'result', 7200);
$productListMenu = $cache->get("select name$lang, photo, slugvi, slugen, id from #_product_list where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'), 'result', 7200);
$suachuaMenu = $cache->get("select name$lang, slugvi, slugen, id from #_news_list where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('sua-chua'), 'result', 7200);
$BlogsMenu = $cache->get("select name$lang, slugvi, slugen, id from #_news_list where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('blogs'), 'result', 7200);
$keothom = $cache->get("select id, name$lang, slugvi, slugen, photo, regular_price, sale_price, discount from #_product where type = ? and find_in_set('keothom',status) and find_in_set('hienthi',status)", array('san-pham'), 'result', 7200);

/* Get statistic */
$counter = $statistic->getCounter();
$online = $statistic->getOnline();

/* Newsletter */
if (!empty($_POST['submit-newsletter'])) {
    $responseCaptcha = $_POST['recaptcha_response_newsletter'];
    $resultCaptcha = $func->checkRecaptcha($responseCaptcha);
    $scoreCaptcha = (!empty($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
    $actionCaptcha = (!empty($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
    $testCaptcha = (!empty($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;
    $dataNewsletter = (!empty($_POST['dataNewsletter'])) ? $_POST['dataNewsletter'] : null;

    /* Valid data */
    if (empty($dataNewsletter['email'])) {
        $flash->set('error', emailkhongduoctrong);
    }

    if (!empty($dataNewsletter['email']) && !$func->isEmail($dataNewsletter['email'])) {
        $flash->set('error', emailkhonghople);
    }

    $error = $flash->get('error');

    if (!empty($error)) {
        $func->transfer($error, $configBase, false);
    }

    /* Save data */
    if (($scoreCaptcha >= 0.5 && $actionCaptcha == 'Newsletter') || $testCaptcha == true) {
        foreach ($dataNewsletter as $column => $value) {
            $dataNewsletter[$column] = htmlspecialchars($value);
        }

        if ($d->insert('newsletter', $dataNewsletter)) {
            $func->transfer(dangkynhantinthanhcong, $configBase);
        } else {
            $func->transfer(dangkynhantinthatbai, $configBase, false);
        }
    } else {
        $func->transfer(dangkynhantinthatbai, $configBase, false);
    }
    
}
