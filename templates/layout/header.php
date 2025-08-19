<div class="header">
    <div class="head">
        <div class="head-bottom">
            <div class="wrap-content">
                <div class="logo">
                    <div class="effect-run ">
                        <a class="logo-head" href="">
                            <img class="lazy" onerror="this.src='<?= THUMBS ?>/145x100x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/145x100x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" alt="logo" title="logo" />
                        </a>
                    </div>
                </div>
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
                    <a class="hotline-head text-decoration-none" href="tra-cuu-bao-hanh">
                        <div class="img-hl">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="icon text-dark" data-v-deed7f39="" width="30px" height="30px" viewBox="0 0 24 24" data-v-dc707951="">
                                <path fill="currentColor" d="M9 16c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392l.604.646l2.121-2.121l-.646-.604l-1.392-1.358a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.967 6.967 0 0 0 16 9c0-3.859-3.141-7-7-7S2 5.141 2 9s3.141 7 7 7z"></path>
                            </svg>
                        </div>
                        <div class="box-hl">
                            <div class="text-hl">Tra cứu</div>
                            <div class="hotline">Bảo hành</div>
                        </div>
                    </a>
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