<!-- Js Config -->
<script type="text/javascript">
    var PHP_VERSION = parseFloat('<?= phpversion() ?>'.replaceAll('.', ','));
    var CONFIG_BASE = '<?= $configBase ?>';
    var TOKEN = '<?= TOKEN ?>';
    var ADMIN = '<?= ADMIN ?>';
    var ASSET = '<?= ASSET ?>';
    var LINK_FILTER = '<?= (!empty($linkFilter)) ? $linkFilter : '' ?>';
    var ID = <?= (!empty($id)) ? $id : 0 ?>;
    var COM = '<?= (!empty($com)) ? $com : '' ?>';
    var ACT = '<?= (!empty($act)) ? $act : '' ?>';
    var TYPE = '<?= (!empty($type)) ? $type : '' ?>';
    var HASH = '<?= $func->generateHash() ?>';
    var ACTIVE_GALLERY = <?= (!empty($flagGallery) && !empty($gallery)) ? 'true' : 'false' ?>;
    var BASE64_QUERY_STRING = '<?= base64_encode($_SERVER['QUERY_STRING']) ?>';
    var LOGIN_PAGE = <?= (empty($_SESSION[$loginAdmin]['active'])) ? 'true' : 'false' ?>;
    var MAX_DATE = '<?= date("Y/m/d", time()) ?>';
    var CHARTS = <?= (!empty($charts)) ? json_encode($charts) : '{}' ?>;
    var ADD_OR_EDIT_PERMISSIONS = <?= (!empty($com) && $com == 'user' && !empty($act) && in_array($act, array('add_permission_group', 'edit_permission_group'))) ? 'true' : 'false' ?>;
    var IMPORT_IMAGE_EXCELL = <?= (!empty($com) && $com == 'import' && !empty($config['import']['images'])) ? 'true' : 'false' ?>;
    var ORDER_ADVANCED_SEARCH = <?= (!empty($com) && $com == 'order' && !empty($config['order']['search'])) ? 'true' : 'false' ?>;
    var ORDER_MIN_TOTAL = <?= (!empty($minTotal)) ? $minTotal : 1 ?>;
    var ORDER_MAX_TOTAL = <?= (!empty($maxTotal)) ? $maxTotal : 1 ?>;
    var ORDER_PRICE_FROM = <?= (!empty($price_from)) ? $price_from : 1 ?>;
    var ORDER_PRICE_TO = <?= (!empty($price_to)) ? $price_to : ((!empty($maxTotal)) ? $maxTotal : 1) ?>;
</script>

<!-- Js Files -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/confirm/confirm.js"></script>
<script src="assets/select2/select2.full.js"></script>
<script src="assets/sumoselect/jquery.sumoselect.js"></script>
<script src="assets/datetimepicker/php-date-formatter.min.js"></script>
<script src="assets/datetimepicker/jquery.mousewheel.js"></script>
<script src="assets/datetimepicker/jquery.datetimepicker.js"></script>
<script src="assets/daterangepicker/daterangepicker.js"></script>
<script src="assets/rangeSlider/ion.rangeSlider.js"></script>
<script src="assets/js/priceFormat.js"></script>
<script src="assets/jscolor/jscolor.js"></script>
<script src="assets/filer/jquery.filer.js"></script>
<script src="assets/holdon/HoldOn.js"></script>
<script src="assets/sortable/Sortable.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/adminlte.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="assets/apexcharts/apexcharts.min.js"></script>
<script src="assets/simplenotify/simple-notify.js"></script>
<script src="assets/comment/comment.js"></script>
<script src="assets/js/apps.js"></script>

<script type="text/javascript">
    function roundNumber(rnum, rlength) {
        return Math.round(rnum * Math.pow(10, rlength)) / Math.pow(10, rlength);
    }

    $(document).ready(function() {
        if ($('.multiselect-size').length) {
            $('.multiselect-size').change(function() {
                var id = $(this).val();
                var id_product = <?= ($_GET['act'] == 'edit') ? $_GET['id'] : 0 ?>;
                var type = 'san-pham';
                $.ajax({
                    type: "POST",
                    url: "api/ajax_size.php",
                    data: {
                        id: id,
                        id_product: id_product,
                        type: type
                    },
                    success: function(data) {
                        $(".group-sizes").html(data);
                        $(".format-price").priceFormat({
                            limit: 13,
                            prefix: '',
                            centsLimit: 0
                        });
                    }
                });
            });

            $(".group-sizes").on("keyup", ".price-origin-size, .price-new-size", function() {
                $parent = $(this).parents('.form-group');
                $price_origin = $parent.find('.price-origin-size');
                $price_new = $parent.find('.price-new-size');
                $price_promotion = $parent.find('.price-promotion-size');
                var price_origin_value = $price_origin.val();
                var price_new_value = $price_new.val();
                var price_promotion_value = 0;

                if (price_origin_value != '' && price_origin_value != 0 && price_new_value != '' && price_new_value != 0) {
                    price_origin_value = price_origin_value.replace(/,/g, "");
                    price_new_value = price_new_value.replace(/,/g, "");
                    price_origin_value = parseInt(price_origin_value);
                    price_new_value = parseInt(price_new_value);

                    if (price_new_value < price_origin_value) {
                        price_promotion_value = 100 - ((price_new_value * 100) / price_origin_value);
                        price_promotion_value = roundNumber(price_promotion_value, 0);
                    } else {
                        price_promotion_value = 0;
                        $price_new.val(0);
                    }
                }

                $price_promotion.val(price_promotion_value);
            });
        }
    });
</script>