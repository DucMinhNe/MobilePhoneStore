<!-- <div class="toolbar">
    <ul>
        <li>
            <a id="goidien" class="text-decoration-none" href="tel:<?= $func->parsePhone($optsetting['hotline']) ?>" title="title">
                <img data-src="assets/images/telephone.png" alt="Phone" class="lazy"><br>
                <span><?= goingay ?></span>
            </a>
        </li>
        <?php /*
        <li>
            <a id="nhantin" href="sms:<?= $func->parsePhone($optsetting['hotline']) ?>" title="title">
                <img data-src="assets/images/icon-t2.png" alt="Message" class="lazy"><br>
                <span><?= nhantin ?></span>
            </a>
        </li>
        */ ?>
        <li>
            <a id="chatzalo" class="text-decoration-none" href="https://zalo.me/<?= $func->parsePhone($optsetting['zalo']) ?>" title="title">
                <img data-src="assets/images/zl.png" alt="Zalo" class="lazy"><br>
                <span><?= zalochat ?></span>
            </a>
        </li>
        <li>
            <a id="chatfb" class="text-decoration-none" href="<?= $optsetting['fanpage'] ?>" title="title">
                <img data-src="assets/images/messenger.png" alt="Facebook" class="lazy"><br>
                <span><?= facebookchat ?></span>
            </a>
        </li>
        <li>
            <a id="chiduong" class="text-decoration-none" href="<?= $optsetting['link_googlemaps'] ?>" title="title">
                <img data-src="assets/images/pin.png" alt="Chỉ đường" class="lazy"><br>
                <span><?= chiduong ?></span>
            </a>
        </li>
    </ul>
</div> -->

<?php /*
<div class="fixbar">
    <ul class="w-clear">
        <li>
            <a href="">
                <span class="icon-home-new"><i class="fa fa-home" aria-hidden="true"></i></span><span class="text-link-toolbar"><?= trangchu ?></span>
            </a>
        </li>
        <li>
            <a href="tel:<?= $func->parsePhone($optsetting['hotline']) ?> ">
                <span class="icon-cart-new"><i class="fa fa-phone-square" aria-hidden="true"></i></span><span class="text-link-toolbar"><?= $func->parsePhone($optsetting['hotline']) ?></span>
            </a>
        </li>
        <li>
            <a href="lien-he">
                <span class="icon-hotdeal-new"><i class="fa fa-map-marker" aria-hidden="true"></i></span><span class="text-link-toolbar"><?= lienhe ?></span>
            </a>
        </li>
        <li>
            <a href="gio-hang">
                <span class="icon-cart-mobile">
                    <span id="cart-total" class="cart-total-header cart-total-header-mobile">
                        <span class="count-cart"><?= (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0 ?></span>
                    </span>
                </span>
                <span class="text-link-toolbar"><?= giohang ?></span>
            </a>
        </li>
    </ul>
</div>

<div class="plugbar">
    <ul>
        <li>
            <a href="">
                <i class="fas fa-home"></i>
            </a>
        </li>
        <li>
            <a href="lien-he">
                <i class="fas fa-map-marker-alt"></i>
            </a>
        </li>
        <li>
            <a href="//m.me/<?= $optsetting['fanpage'] ?>" target="_blank">
                <span>
                    <img data-src="assets/images/MessengerIcon.png" alt="Messenger" class="lazy w-100"><br>
                </span>
            </a>
        </li>
        <li>
            <a href="tel:<?= $func->parsePhone($optsetting['hotline']) ?>">
                <i class="fas fa-phone-alt"></i>
            </a>
        </li>
        <li>
            <a class="back-to-top" href="javascript:;">
                <i class="fas fa-arrow-alt-circle-up"></i>
            </a>
        </li>
    </ul>
</div>

<div class="support-online">
    <div class="support-content" style="display: block;">
        <a target="_blank" href="tel:<?= $func->parsePhone($optsetting['hotline']) ?>" class="not-loading call-now" rel="nofollow">
            <i class="fab fa-whatsapp"></i>
            <div class="animated infinite zoomIn kenit-alo-circle"></div>
            <div class="animated infinite pulse kenit-alo-circle-fill"></div>
            <span>Hotline: <?= $func->parsePhone($optsetting['hotline']) ?></span>
        </a>
        <a class="mes not-loading" target="_blank" href="lien-he">
            <i class="fa fa-map-marker"></i>
            <span><?= chiduong ?></span>
        </a>
        <a class="mes not-loading" target="_blank" href="//zalo.me/<?= $func->parsePhone($optsetting['zalo']) ?>">
            <img data-src="assets/images/zalo-combo.png" alt="Zalo" class="lazy w-100"><br>
            <span>Zalo</span>
        </a>
        <a class="sms not-loading" target="_blank" href="sms:<?= $func->parsePhone($optsetting['hotline']) ?>">
            <i class="fab fa-weixin"></i>
            <span>SMS: <?= $func->parsePhone($optsetting['hotline']) ?></span>
        </a>
    </div>
    <a class="btn-support not-loading">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i class="fa fa-user-circle"></i>
    </a>
</div>

<div class="widget-mobile">
    <div id="my-phone-circle">
        <div class="wcircle-icon"><i class="fa fa-bell shake-anim"></i></div>
        <div class="wcircle-menu">
            <div class="wcircle-menu-item">
                <a href="tel:<?= $func->parsePhone($optsetting['hotline']) ?>"><i class="fa fa-phone"></i></a>
            </div>
            <div class="wcircle-menu-item">
                <a href="sms:<?= $func->parsePhone($optsetting['hotline']) ?>"><i class="fa fa-comments"></i></a>
            </div>
            <div class="wcircle-menu-item">
                <a href="lien-he" target="_blankl"><i class="fa fa-map"></i></a>
            </div>
            <div class="wcircle-menu-item">
                <a href="<?= $optsetting['fanpage'] ?>"><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="wcircle-menu-item">
                <a href="//zalo.me/<?= $func->parsePhone($optsetting['zalo']) ?>" target="_blank"><?= $func->getImage(['class' => 'lazy w-100', 'size-error' => '30x30x2', 'upload' => 'assets/images/', 'image' => 'zalo-mb.png', 'alt' => 'Zalo']) ?><br></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/js/jQuery.WCircleMenu-min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
        $('#my-phone-circle').WCircleMenu({
            angle_start: -Math.PI,
            delay: 50,
            distance: 70,
            angle_interval: Math.PI / 4,
            easingFuncShow: "easeOutBack",
            easingFuncHide: "easeInBack",
            step: 5,
            openCallback: false,
            closeCallback: false,
        });

        
        $('.support-content').hide();
        $('a.btn-support').click(function(e) {
            e.stopPropagation();
            $('.support-content').slideToggle();
        });
        $('.support-content').click(function(e) {
            e.stopPropagation();
        });
        $(document).click(function() {
            $('.support-content').slideUp();
        });
    })
</script>
*/ ?>