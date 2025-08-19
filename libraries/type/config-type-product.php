<?php
/* Sản phẩm */
$nametype = "san-pham";
$config['product'][$nametype]['title_main'] = "Sản Phẩm";
$config['product'][$nametype]['dropdown'] = true;
$config['product'][$nametype]['list'] = true;
$config['product'][$nametype]['cat'] = true;
$config['product'][$nametype]['item'] = true;
$config['product'][$nametype]['sub'] = false;
$config['product'][$nametype]['brand'] = false;
$config['product'][$nametype]['color'] = false;
$config['product'][$nametype]['size'] = true;
$config['product'][$nametype]['tags'] = false;
$config['product'][$nametype]['import'] = false;
$config['product'][$nametype]['export'] = false;
$config['product'][$nametype]['view'] = true;
$config['product'][$nametype]['link_youtube'] = true;
$config['product'][$nametype]['copy'] = true;
$config['product'][$nametype]['copy_image'] = true;
$config['product'][$nametype]['comment'] = false;
$config['product'][$nametype]['slug'] = true;
$config['product'][$nametype]['check'] = array("hotsale" => "Hot sale","keothom" => "Kèo thơm", "linew" => "Like new", "noibat" => "Nổi bật", "hienthi" => "Hiển thị");
$config['product'][$nametype]['images'] = true;
$config['product'][$nametype]['show_images'] = true;
$config['product'][$nametype]['gallery'] = array(
    $nametype => array(
        "title_main_photo" => "Hình ảnh sản phẩm",
        "title_sub_photo" => "Hình ảnh",
        "check_photo" => array("hienthi" => "Hiển thị"),
        "number_photo" => 1,
        "images_photo" => true,
        "cart_photo" => false,
        "avatar_photo" => true,
        "name_photo" => true,
        "width_photo" => 540,
        "height_photo" => 540,
        "thumb_photo" => '100x100x1',
        "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif'
    )
);
$config['product'][$nametype]['code'] = false;
$config['product'][$nametype]['regular_price'] = true;
$config['product'][$nametype]['sale_price'] = true;
$config['product'][$nametype]['gialendoi'] = true;
$config['product'][$nametype]['giadukien'] = true;
$config['product'][$nametype]['discount'] = true;
$config['product'][$nametype]['dungluong'] = true;
$config['product'][$nametype]['tietkiem'] = true;
$config['product'][$nametype]['desc'] = true;
$config['product'][$nametype]['desc_cke'] = true;
$config['product'][$nametype]['thongso'] = true;
$config['product'][$nametype]['thongso_cke'] = true;
$config['product'][$nametype]['content'] = true;
$config['product'][$nametype]['content_cke'] = true;
$config['product'][$nametype]['schema'] = true;
$config['product'][$nametype]['seo'] = true;
$config['product'][$nametype]['width'] = 620;
$config['product'][$nametype]['height'] = 680;
$config['product'][$nametype]['thumb'] = '100x100x1';
$config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif';

/* Sản phẩm (Color) */
$config['product'][$nametype]['check_color'] = array("hienthi" => "Hiển thị");
$config['product'][$nametype]['color_images'] = true;
$config['product'][$nametype]['color_code'] = true;
$config['product'][$nametype]['color_type'] = true;
$config['product'][$nametype]['width_color'] = 30;
$config['product'][$nametype]['height_color'] = 30;
$config['product'][$nametype]['thumb_color'] = '100x100x1';
$config['product'][$nametype]['img_type_color'] = '.jpg|.gif|.png|.jpeg|.gif';

/* Sản phẩm (List) */
$config['product'][$nametype]['title_main_list'] = "Sản phẩm cấp 1";
$config['product'][$nametype]['images_list'] = true;
$config['product'][$nametype]['show_images_list'] = true;
$config['product'][$nametype]['slug_list'] = true;
$config['product'][$nametype]['check_list'] = array("noibat" => "Nổi bật", "hienthi" => "Hiển thị");
$config['product'][$nametype]['gallery_list'] = array();
$config['product'][$nametype]['desc_list'] = true;
$config['product'][$nametype]['khuyenmai_list'] = true;
$config['product'][$nametype]['khuyenmai_cke_list'] = true;
$config['product'][$nametype]['baohanh_list'] = true;
$config['product'][$nametype]['baohanh_cke_list'] = true;
$config['product'][$nametype]['hotro_list'] = true;
$config['product'][$nametype]['hotro_cke_list'] = true;
$config['product'][$nametype]['seo_list'] = true;
$config['product'][$nametype]['width_list'] = 20;
$config['product'][$nametype]['height_list'] = 20;
$config['product'][$nametype]['thumb_list'] = '20x20x2';
$config['product'][$nametype]['img_type_list'] = '.jpg|.gif|.png|.jpeg|.gif';

/* Sản phẩm (Cat) */
$config['product'][$nametype]['title_main_cat'] = "Sản phẩm cấp 2";
$config['product'][$nametype]['images_cat'] = false;
$config['product'][$nametype]['show_images_cat'] = false;
$config['product'][$nametype]['slug_cat'] = true;
$config['product'][$nametype]['check_cat'] = array("noibat" => "Nổi bật", "hienthi" => "Hiển thị");
$config['product'][$nametype]['desc_cat'] = false;
$config['product'][$nametype]['seo_cat'] = true;
$config['product'][$nametype]['width_cat'] = 300;
$config['product'][$nametype]['height_cat'] = 200;
$config['product'][$nametype]['thumb_cat'] = '100x100x1';
$config['product'][$nametype]['img_type_cat'] = '.jpg|.gif|.png|.jpeg|.gif';

/* Sản phẩm (Item) */
$config['product'][$nametype]['title_main_item'] = "Sản phẩm cấp 3";
$config['product'][$nametype]['images_item'] = false;
$config['product'][$nametype]['show_images_item'] = false;
$config['product'][$nametype]['slug_item'] = true;
$config['product'][$nametype]['check_item'] = array("noibat" => "Nổi bật", "hienthi" => "Hiển thị");
$config['product'][$nametype]['desc_item'] = false;
$config['product'][$nametype]['seo_item'] = true;
$config['product'][$nametype]['width_item'] = 300;
$config['product'][$nametype]['height_item'] = 200;
$config['product'][$nametype]['thumb_item'] = '100x100x1';
$config['product'][$nametype]['img_type_item'] = '.jpg|.gif|.png|.jpeg|.gif';

/* Thư viện ảnh */
$nametype = "thu-vien-anh";
$config['product'][$nametype]['title_main'] = "Thư viện ảnh";
$config['product'][$nametype]['check'] = array("hienthi" => "Hiển thị");
$config['product'][$nametype]['view'] = false;
$config['product'][$nametype]['copy'] = false;
$config['product'][$nametype]['slug'] = false;
$config['product'][$nametype]['images'] = true;
$config['product'][$nametype]['show_images'] = true;
$config['product'][$nametype]['gallery'] = array();
$config['product'][$nametype]['seo'] = true;
$config['product'][$nametype]['width'] = 380;
$config['product'][$nametype]['height'] = 446;
$config['product'][$nametype]['thumb'] = '100x100x1';
$config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif';
