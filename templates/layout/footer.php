<div class="footer">
    <div class="footer-article">
        <div class="wrap-content padding-top-bottom d-flex flex-wrap justify-content-between ">
            <div class="footer-news">
                <a class="logo-head" href="">
                    <img class="lazy" onerror="this.src='<?= THUMBS ?>/229x229x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/229x229x1/<?= UPLOAD_PHOTO_L . $logofooter['photo'] ?>" alt="logo" title="logo" />
                </a>

                <ul class="social social-footer list-unstyled d-flex align-items-center justify-content-center ">
                    <?php foreach ($social as $k => $v) { ?>
                        <li class="d-inline-block align-top">
                            <a href="<?= $v['link'] ?>" target="_blank" class="me-2">
                                <img class="lazy" data-src="<?= THUMBS ?>/18x18x1/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>">
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="footer-news">
                <p class="name-company"><?= $footer['name' . $lang] ?></p>
                <div class="footer-info"><?= $func->decodeHtmlChars($footer['content' . $lang]) ?></div>

            </div>
            <div class="footer-news">
                <p class="footer-title">Chính Sách</p>
                <ul class="footer-ul d-flex flex-wrap justify-content-between">
                    <?php foreach ($policy as $v) { ?>
                        <li><a class=" text-decoration-none " href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="footer-news">
                <p class="footer-title">Tiktok</p>
                <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@<?= $tiktok['name' . $lang] ?>" data-unique-id="<?= $tiktok['name' . $lang] ?>" data-embed-from="embed_page" data-embed-type="creator" style="max-width: 780px; min-width: 283px;">
                    <section> <a target="_blank" href="https://www.tiktok.com/@<?= $tiktok['name' . $lang] ?>?refer=creator_embed"><?= $tiktok['name' . $lang] ?></a> </section>
                </blockquote>
                <script async src="https://www.tiktok.com/embed.js"></script>

            </div>
        </div>
    </div>

    <div class="footer-powered">
        <div class="wrap-content">
            <div class="row">
                <div class="footer-copyright col-md-6">Copyright © 2023 <?= $copyright['name' . $lang] ?>. Designed by <a href="https://nina.vn" class=" text-decoration-none" title="Nina.vn">Nina.vn</a></div>
                <div class="footer-statistic col-md-6">
                    <span><?= dangonline ?>: <?= $online ?></span>
                    <span><?= homnay ?>: <?= $counter['today'] ?></span>
                    <span><?= trongthang ?>: <?= $counter['month'] ?></span>
                    <span><?= tongtruycap ?>: <?= $counter['total'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($com != 'gio-hang') { ?>
    <div>
        <a class="cart-fixed text-decoration-none" href="gio-hang" title="Giỏ hàng">
            <i class="fa-solid fa-cart-plus"></i>
            <span class="count-cart"><?= (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0 ?></span>
        </a>
    </div>
<?php } ?>

<?php if (!$func->isGoogleSpeed()) { ?>
    <a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="https://zalo.me/<?= preg_replace('/[^0-9]/', '', $optsetting['zalo']); ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><?= $func->getImage(['size-error' => '35x35x2', 'upload' => 'assets/images/', 'image' => 'zl.png', 'alt' => 'Zalo']) ?></i>
    </a>

    <a class="btn-phone btn-frame text-decoration-none" href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><?= $func->getImage(['size-error' => '35x35x2', 'upload' => 'assets/images/', 'image' => 'hl.png', 'alt' => 'Hotline']) ?></i>
    </a>

    <a class="btn-map btn-frame text-decoration-none" target="_blank" href="<?= $optsetting['link_googlemaps']; ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><?= $func->getImage(['size-error' => '35x35x2', 'upload' => 'assets/images/', 'image' => 'location.png', 'alt' => 'Map']) ?></i>
    </a>

    <a class="btn-tiktok btn-frame text-decoration-none" target="_blank" href="<?= $optsetting['tiktok']; ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><?= $func->getImage(['size-error' => '35x35x2', 'upload' => 'assets/images/', 'image' => 'tiktok.png', 'alt' => 'Map']) ?></i>
    </a>

<?php } ?>