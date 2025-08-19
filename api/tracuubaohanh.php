<?php
include "config.php";
$kiotViet = new KiotViet($d);

$phone = (!empty($_POST['phone'])) ? htmlspecialchars($_POST['phone']) : 0;
$code = (!empty($_POST['code'])) ? htmlspecialchars($_POST['code']) : '';
$codeUP = strtoupper($code);
$tracuu = $cache->get("select name$lang, content$lang from #_static where type = ? limit 0,1", array('tra-cuu-bao-hanh2'), 'fetch', 7200);
$tracuusc = $cache->get("select name$lang, content$lang from #_static where type = ? limit 0,1", array('tra-cuu-bao-hanh3'), 'fetch', 7200);

if ($code) {
    if ((empty($_SESSION['kiot']['code']) || $_SESSION['kiot']['code'] != $code) || (empty($_SESSION['kiot']['phone']) || $_SESSION['kiot']['phone'] != $phone)) {
        $_SESSION['kiot'] = array();
        $_SESSION['kiot']['code'] = $code;
        $invoice = $kiotViet->getInvoiceByCode($code);
        if (!empty($invoice) && empty($invoice->responseStatus->errorCode)) {
            if ($phone) {
                $_SESSION['kiot']['phone'] = $phone;
                $customer = $kiotViet->getCustomerByPhone($phone);
                if (!empty($customer)) {
                    $customer = reset($customer);
                    if ($invoice->customerId == $customer->id) {
                        $_SESSION['kiot']['info']['createdDate'] = strtotime($invoice->createdDate);
                        $_SESSION['kiot']['info']['customer'] = $customer->code . " - " . $customer->name;
                        if (!empty($invoice->invoiceDetails)) {
                            $_SESSION['kiot']['products'] = array();
                            foreach ($invoice->invoiceDetails as $v) {
                                $product = $kiotViet->getProductById($v->productId);
                                if (!empty($_SESSION['kiot']['products'])) {
                                    $max = count($_SESSION['kiot']['products']);
                                    $_SESSION['kiot']['products'][$max]['code'] = $v->productCode;
                                    $_SESSION['kiot']['products'][$max]['name'] = $v->productName;
                                    $_SESSION['kiot']['products'][$max]['qty'] = $v->quantity;
                                    $_SESSION['kiot']['products'][$max]['price'] = $v->price;
                                    $_SESSION['kiot']['products'][$max]['discount'] = $v->discount;
                                    $_SESSION['kiot']['products'][$max]['subTotal'] = $v->subTotal;
                                    if (!empty($product->productWarranties)) {
                                        $warranty = reset($product->productWarranties);
                                        $_SESSION['kiot']['products'][$max]['warrantyTime'] = !empty($warranty->numberTime) ? $warranty->numberTime : 0;
                                        $_SESSION['kiot']['products'][$max]['warrantyDate'] = strtotime('+' . $_SESSION['kiot']['products'][$max]['warrantyTime'] . ' month', $_SESSION['kiot']['info']['createdDate']);
                                    } else {
                                        $_SESSION['kiot']['products'][$max]['warrantyTime'] = "";
                                        $_SESSION['kiot']['products'][$max]['warrantyDate'] = "";
                                    }
                                } else {
                                    $_SESSION['kiot']['products'][0]['code'] = $v->productCode;
                                    $_SESSION['kiot']['products'][0]['name'] = $v->productName;
                                    $_SESSION['kiot']['products'][0]['qty'] = $v->quantity;
                                    $_SESSION['kiot']['products'][0]['price'] = $v->price;
                                    $_SESSION['kiot']['products'][0]['discount'] = $v->discount;
                                    $_SESSION['kiot']['products'][0]['subTotal'] = $v->subTotal;
                                    if (!empty($product->productWarranties)) {
                                        $warranty = reset($product->productWarranties);
                                        $_SESSION['kiot']['products'][0]['warrantyTime'] = !empty($warranty->numberTime) ? $warranty->numberTime : 0;
                                        $_SESSION['kiot']['products'][0]['warrantyDate'] = strtotime('+' . $_SESSION['kiot']['products'][0]['warrantyTime'] . ' month', $_SESSION['kiot']['info']['createdDate']);
                                    } else {
                                        $_SESSION['kiot']['products'][0]['warrantyTime'] = "";
                                        $_SESSION['kiot']['products'][0]['warrantyDate'] = "";
                                    }
                                }
                            }
                        }
                    } else {
                        $_SESSION['kiot']['error'] = "Thông tin số điện thoại và mã hóa đơn không trùng khớp";
                    }
                } else {
                    $_SESSION['kiot']['error'] = "Số điện thoại không có trong dữ liệu";
                }
            }
        } else {
            $_SESSION['kiot']['error'] = "Mã đơn hàng không tồn tại";
        }
    }
?>
    <div class="tra-cuu__result">
        <p class="title">Kết quả tra cứu bảo hành</p>
        <?php if (empty($_SESSION['kiot']['error'])) { ?>
            <div class="main">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <div class="row gx-3 gy-2">
                                <div class="col-auto"><span class="fw-bold">Mã hóa đơn:</span></div>
                                <div class="col"><?= $codeUP ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <div class="row gx-3 gy-2">
                                <div class="col-auto"><span class="fw-bold">Khách hàng:</span></div>
                                <div class="col"><?= @$_SESSION['kiot']['info']['customer'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <div class="row gx-3 gy-2">
                                <div class="col-auto"><span class="fw-bold">Thời gian:</span></div>
                                <div class="col"><?= (!empty($_SESSION['kiot']['info']['createdDate'])) ? date("d/m/Y H:m", $_SESSION['kiot']['info']['createdDate']) : '' ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($_SESSION['kiot']['products'])) { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-fixed">
                            <thead>
                                <tr class="bg-warning">
                                    <th scope="col" class="text-center">Mã hàng</th>
                                    <th scope="col" class="text-center" style="min-width: 160px"><?= (strpos($codeUP, 'HDSC') !== false) ? "Nội dung sửa chữa & thay thế" : "Sản phẩm" ?></th>
                                    <th scope="col" class="text-center">Số lượng</th>
                                    <th scope="col" class="text-center">Giá bán</th>
                                    <th scope="col" class="text-center">Thành tiền</th>
                                    <th scope="col" class="text-center">Thời hạn bảo hành</th>
                                    <th scope="col" class="text-center">Ngày hết hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['kiot']['products'] as $k => $v) { ?>
                                    <tr class="align-middle">
                                        <th scope="row" class="text-center"><?= $v['code'] ?></th>
                                        <td class="text-center"><?= $v['name'] ?></td>
                                        <td class="text-center"><?= $v['qty'] ?></td>
                                        <td class="text-center"><?= $func->formatMoney($v['subTotal']) ?: 0 ?></td>
                                        <td class="text-center"><?= $func->formatMoney($v['subTotal'] * $v['qty']) ?: 0 ?></td>
                                        <td class="text-center"><?= (!empty($v['warrantyTime'])) ? $v['warrantyTime'] . ' tháng' : "" ?></td>
                                        <td class="text-center"><?= (!empty($v['warrantyDate'])) ? date("d/m/Y", $v['warrantyDate']) : "" ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning w-100" role="alert">
                        <strong>Không tìm thấy sản phẩm</strong>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning w-100" role="alert">
                <strong><?= $_SESSION['kiot']['error'] ?></strong>
            </div>
        <?php } ?>
    </div>
    <?php
    if (empty($_SESSION['kiot']['error'])) {
        if (strpos($codeUP, 'HDSC') !== false) {
            if (!empty($tracuusc['content' . $lang])) { ?>
                <div class="content-main content-text w-clear mt-5"><?= htmlspecialchars_decode($tracuusc['content' . $lang]) ?></div>
            <?php }
        } else {
            if (!empty($tracuu['content' . $lang])) { ?>
                <div class="content-main content-text w-clear mt-5"><?= htmlspecialchars_decode($tracuu['content' . $lang]) ?></div>
    <?php }
        }
    }
    ?>
<?php } ?>