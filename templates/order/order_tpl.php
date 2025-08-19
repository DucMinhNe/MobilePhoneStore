<form class="form-cart validation-cart" novalidate method="post" action="" enctype="multipart/form-data">
    <div class="wrap-cart">
        <?= $flash->getMessages("frontend") ?>
        <div class="row">
            <?php if (!empty($_SESSION['cart'])) { ?>
                <div class="top-cart col-12 col-lg-7">
                    <p class="title-cart"><?= giohangcuaban ?>:</p>
                    <div class="list-procart">
                        <div class="procart procart-label">
                            <div class="row">
                                <div class="pic-procart col-3 col-md-2"><?= hinhanh ?></div>
                                <div class="info-procart col-6 col-md-5"><?= tensanpham ?></div>
                                <div class="quantity-procart col-3 col-md-2">
                                    <p><?= soluong ?></p>
                                    <p><?= thanhtien ?></p>
                                </div>
                                <div class="price-procart col-3 col-md-3"><?= thanhtien ?></div>
                            </div>
                        </div>
                        <?php $max = count($_SESSION['cart']);
                        for ($i = 0; $i < $max; $i++) {
                            $pid = $_SESSION['cart'][$i]['productid'];
                            $quantity = $_SESSION['cart'][$i]['qty'];
                            $color = ($_SESSION['cart'][$i]['color']) ? $_SESSION['cart'][$i]['color'] : 0;
                            $size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
                            $code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
                            $proinfo = $cart->getProductInfo($pid);
                            if ($color > 0) {
                                $colorInfo = $cart->getProductColor($color);
                            }
                            $arrSize = (!empty($proinfo['option_size'])) ? json_decode($proinfo['option_size'], true) : null;
                            $pictureItems = $proinfo['photo'];
                            $linkPictureItems = UPLOAD_PRODUCT_L;

                            $pro_price = $arrSize[$size]['regular_price'];
                            $pro_price_new = $arrSize[$size]['sale_price'];
                            $pro_price_qty = $pro_price * $quantity;
                            $pro_price_new_qty = $pro_price_new * $quantity; ?>

                            <div class="procart procart-<?= $code ?>">
                                <div class="row">
                                    <div class="pic-procart col-3 col-md-2">
                                        <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['name' . $lang] ?>">
                                            <img class="lazy" onerror="this.src='<?= THUMBS ?>/85x85x2/assets/images/noimage.png';" data-src="<?= THUMBS ?>/85x85x2/<?= UPLOAD_PRODUCT_L . $arrSize[$size]['photo_price'] ?>" />
                                        </a>

                                    </div>
                                    <div class="info-procart col-6 col-md-5">
                                        <h3 class="name-procart"><a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['name' . $lang] ?>"><?= $proinfo['name' . $lang] ?></a></h3>
                                        <div class="properties-procart">
                                            <?php if ($color) {
                                                $color_detail = $d->rawQueryOne("select name$lang from #_option where type = ? and id = ? limit 0,1", array('mau-sac', $color)); ?>
                                                <p>Màu: <strong><?= $color_detail['name' . $lang] ?></strong></p>
                                            <?php } ?>
                                            <?php if ($size) {
                                                $size_detail = $d->rawQueryOne("select name$lang from #_size where type = ? and id = ? limit 0,1", array($proinfo['type'], $size)); ?>
                                                <p>Màu: <strong><?= $size_detail['name' . $lang] ?></strong></p>
                                            <?php } ?>
                                        </div>
                                        <div class=" d-flex align-items-center d-opt-card">
                                            <a class="del-procart text-decoration-none mr-2" data-code="<?= $code ?>">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" title="<?= $proinfo['name' . $lang] ?>">
                                                <i class="bi bi-gear-fill"></i>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="quantity-procart col-3 col-md-2">
                                        <div class="price-procart price-procart-rp">
                                            <?php if ($arrSize[$size]['sale_price']) { ?>
                                                <p class="price-new-cart load-price-new-<?= $code ?>">
                                                    <?= $func->formatMoney($pro_price_new_qty) ?>
                                                </p>
                                                <p class="price-old-cart load-price-<?= $code ?>">
                                                    <?= $func->formatMoney($pro_price_qty) ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="price-new-cart load-price-<?= $code ?>">
                                                    <?= $func->formatMoney($pro_price_qty) ?>
                                                </p>
                                            <?php } ?>
                                        </div>
                                        <div class="quantity-counter-procart quantity-counter-procart-<?= $code ?> d-flex align-items-stretch justify-content-between">
                                            <span class="counter-procart-minus counter-procart">-</span>
                                            <input type="number" class="quantity-procart" min="1" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
                                            <span class="counter-procart-plus counter-procart">+</span>
                                        </div>
                                    </div>
                                    <div class="price-procart col-3 col-md-3">
                                        <?php if ($arrSize[$size]['sale_price']) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->formatMoney($pro_price_new_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->formatMoney($pro_price_qty) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart load-price-<?= $code ?>">
                                                <?= $func->formatMoney($pro_price_qty) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="money-procart">
                        <?php if ($config['order']['ship']) { ?>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= tamtinh ?>:</p>
                                <p class="total-price load-price-temp"><?= $func->formatMoney($cart->getOrderTotal()) ?></p>
                            </div>
                        <?php } ?>
                        <?php if ($config['order']['ship']) { ?>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= phivanchuyen ?>:</p>
                                <p class="total-price load-price-ship">0đ</p>
                            </div>
                        <?php } ?>
                        <div class="total-procart d-flex align-items-center justify-content-between">
                            <p><?= tongtien ?>:</p>
                            <p class="total-price load-price-total"><?= $func->formatMoney($cart->getOrderTotal()) ?></p>
                        </div>
                    </div>
                </div>
                <div class="bottom-cart col-12 col-lg-5">
                    <div class="section-cart">
                        <p class="title-cart"><?= hinhthucthanhtoan ?>:</p>
                        <div class="information-cart">
                            <?php $flashPayment = $flash->get('payments'); ?>
                            <?php foreach ($payments_info as $key => $value) { ?>
                                <div class="payments-cart custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payments-<?= $value['id'] ?>" name="dataOrder[payments]" value="<?= $value['id'] ?>" <?= (!empty($flashPayment) && $flashPayment == $value['id']) ? 'checked' : '' ?> required>
                                    <label class="payments-label custom-control-label" for="payments-<?= $value['id'] ?>" data-payments="<?= $value['id'] ?>"><?= $value['name' . $lang] ?></label>
                                    <div class="payments-info payments-info-<?= $value['id'] ?> transition">
                                        <?= str_replace("\n", "<br>", $value['desc' . $lang]) ?></div>
                                </div>
                            <?php } ?>
                        </div>
                        <p class="title-cart"><?= thongtingiaohang ?>:</p>
                        <div class="information-cart">
                            <div class="row">
                                <div class="input-cart col-md-6">
                                    <input type="text" class="form-control text-sm" id="fullname" name="dataOrder[fullname]" placeholder="<?= hoten ?>" value="<?= (!empty($flash->has('fullname'))) ? $flash->get('fullname') : '' ?>" required />
                                    <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                                </div>
                                <div class="input-cart col-md-6">
                                    <input type="number" class="form-control text-sm" id="phone" name="dataOrder[phone]" placeholder="<?= sodienthoai ?>" value="<?= (!empty($flash->has('phone'))) ? $flash->get('phone') : '' ?>" required />
                                    <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                                </div>
                            </div>
                            <div class="input-cart">
                                <input type="email" class="form-control text-sm" id="email" name="dataOrder[email]" placeholder="Email" value="<?= (!empty($flash->has('email'))) ? $flash->get('email') : '' ?>" required />
                                <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                            </div>
                            <div class="row">
                                <div class="input-cart col-md-4">
                                    <select class="select-city-cart custom-select text-sm" required id="city" name="dataOrder[city]">
                                        <option value=""><?= tinhthanh ?></option>
                                        <?php foreach ($city as $k => $v) { ?>
                                            <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback"><?= vuilongchontinhthanh ?></div>
                                </div>
                                <div class="input-cart col-md-4">
                                    <select class="select-district-cart select-district custom-select text-sm" required id="district" name="dataOrder[district]">
                                        <option value=""><?= quanhuyen ?></option>
                                    </select>
                                    <div class="invalid-feedback"><?= vuilongchonquanhuyen ?></div>
                                </div>
                                <div class="input-cart col-md-4">
                                    <select class="select-ward-cart select-ward custom-select text-sm" required id="ward" name="dataOrder[ward]">
                                        <option value=""><?= phuongxa ?></option>
                                    </select>
                                    <div class="invalid-feedback"><?= vuilongchonphuongxa ?></div>
                                </div>
                            </div>
                            <div class="input-cart">
                                <input type="text" class="form-control text-sm" id="address" name="dataOrder[address]" placeholder="<?= diachi ?>" value="<?= (!empty($flash->has('address'))) ? $flash->get('address') : '' ?>" required />
                                <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
                            </div>
                            <div class="input-cart">
                                <textarea class="form-control text-sm" id="requirements" name="dataOrder[requirements]" placeholder="<?= yeucaukhac ?>" /><?= (!empty($flash->has('requirements'))) ? $flash->get('requirements') : '' ?></textarea>
                            </div>
                        </div>
                        <input type="submit" class="btn-cart btn btn-primary btn-lg btn-block" name="thanhtoan" value="<?= thanhtoan ?>" disabled />
                    </div>
                </div>
            <?php } else { ?>
                <a href="" class="empty-cart text-decoration-none w-100">
                    <i class="fa fa-cart-arrow-down"></i>
                    <p><?= khongtontaisanphamtronggiohang ?></p>
                    <span><?= vetrangchu ?></span>
                </a>
            <?php } ?>
        </div>
    </div>
</form>