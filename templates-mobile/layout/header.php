<div class="header">
    <div class="head">
        <div class="head-bottom">
            <div class="wrap-content">
                <a class="logo-head" href="">
                    <img class="lazy" onerror="this.src='<?= THUMBS ?>/145x100x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/145x100x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" alt="logo" title="logo" />
                </a>
                
                <div class="search search-head w-clear">
                    <input type="text" id="keyword" placeholder="Bạn cần tìm gì?" onkeypress="doEnter(event,'keyword');" value="<?= (!empty($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" />
                    <p onclick="onSearch('keyword');"><i class="bi bi-search"></i></p>
                </div>
                <div class="hotline__cart">
                    <div class="hotline-head">
                        <div class="img-hl vibration-icon ">
                            <img src="assets/images/icon-hotline.png" alt="">
                        </div>
                        <div class="box-hl">
                            <div class="text-hl">Hotline 24/7</div>
                            <div class="hotline"><?= $func->formatPhone($optsetting['hotline']) ?> </div>
                        </div>
                    </div>
                    <div class="cart-head">
                        <div class="img-hl">
                            <img src="assets/images/icon-giohang.png" alt="">
                        </div>
                        <div class="box-hl">
                            <div class="text-hl">Giỏ hàng</div>
                            <a class="cart-head hotline text-decoration-none" href="gio-hang" title="Giỏ hàng">
                                (<span class="count-cart"><?= (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0 ?></span>) Sản phẩm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>