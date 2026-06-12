<?php
if (!defined('LIBRARIES')) die("Error");

/*
 * Sample config — copy to libraries/config.php and fill in your real values:
 *   cp libraries/config.sample.php libraries/config.php
 * libraries/config.php is git-ignored and must never be committed.
 */

/* Timezone */
date_default_timezone_set('Asia/Ho_Chi_Minh');

/* Cấu hình coder */
define('NN_CONTRACT', 'YOUR_CONTRACT_CODE');
define('NN_AUTHOR', 'anhphi2k2.nina@gmail.com');

/* Cấu hình KiotViet API (dùng trong libraries/class/class.KiotViet.php) */
define('KIOTVIET_CLIENT_ID', 'YOUR_KIOTVIET_CLIENT_ID');
define('KIOTVIET_CLIENT_SECRET', 'YOUR_KIOTVIET_CLIENT_SECRET');
define('KIOTVIET_RETAILER', 'YOUR_KIOTVIET_RETAILER');

/* Cấu hình chung */
$config = array(
    'author' => array(
        'name' => 'Nguyễn Anh Phi',
        'email' => 'anhphi2k2.nina@gmail.com',
        'timefinish' => '2023'
    ),
    'arrayDomainSSL' => array(),
    'database' => array(
        'server-name' => $_SERVER["SERVER_NAME"],
        'url' => '/IpadStore/',
        'type' => 'mysql',
        'host' => 'localhost',
        'username' => 'YOUR_DB_USERNAME',
        'password' => 'YOUR_DB_PASSWORD',
        'dbname' => 'khang_store',
        'port' => 3306,
        'prefix' => 'table_',
        'charset' => 'utf8mb4'
    ),
    'website' => array(
        'error-reporting' => true,
        'secret' => 'YOUR_PASSWORD_SECRET', /* dùng để băm mật khẩu — đổi giá trị sẽ làm mất hiệu lực mật khẩu cũ */
        'salt' => 'YOUR_PASSWORD_SALT',
        'debug-developer' => true,
        'debug-css' => true,
        'debug-js' => true,
        'index' => false,
        'image' => array(),
        'video' => array(
            'extension' => array('mp4', 'mkv'),
            'poster' => array(
                'width' => 700,
                'height' => 610,
                'extension' => '.jpg|.png|.jpeg'
            ),
            'allow-size' => '100Mb',
            'max-size' => 100 * 1024 * 1024
        ),
        'upload' => array(
            'max-width' => 1600,
            'max-height' => 1600
        ),
        'lang' => array(
            'vi' => 'Tiếng Việt',
            // 'en' => 'Tiếng Anh'
        ),
        'lang-doc' => 'vi|en',
        'slug' => array(
            'vi' => 'Tiếng Việt',
            // 'en' => 'Tiếng Anh'
        ),
        'seo' => array(
            'vi' => 'Tiếng Việt',
            // 'en' => 'Tiếng Anh'
        ),
        'comlang' => array(
            "gioi-thieu" => array("vi" => "gioi-thieu", "en" => "about-us"),
            "san-pham" => array("vi" => "san-pham", "en" => "product"),
            "tin-tuc" => array("vi" => "tin-tuc", "en" => "news"),
            "tuyen-dung" => array("vi" => "tuyen-dung", "en" => "recruitment"),
            "thu-vien-anh" => array("vi" => "thu-vien-anh", "en" => "gallery"),
            "video" => array("vi" => "video", "en" => "video"),
            "lien-he" => array("vi" => "lien-he", "en" => "contact")
        )
    ),
    'order' => array(
        'ship' => false
    ),
    'login' => array(
        'admin' => 'LoginAdmin' . NN_CONTRACT,
        'member' => 'LoginMember' . NN_CONTRACT,
        'attempt' => 5,
        'delay' => 15
    ),
    'googleAPI' => array(
        'recaptcha' => array(
            'active' => true,
            'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
            'sitekey' => 'YOUR_RECAPTCHA_SITEKEY',
            'secretkey' => 'YOUR_RECAPTCHA_SECRET'
        )
    ),
    'oneSignal' => array(
        'active' => false,
        'id' => 'YOUR_ONESIGNAL_APP_ID',
        'restId' => 'YOUR_ONESIGNAL_REST_API_KEY'
    ),
    'license' => array(
        'version' => "8.2.4",/*Update: 26-6-2023 */
        'powered' => "dinhminhthanh.nina@gmail.com"
    )
);

/* Error reporting */
error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);

/* Cấu hình http */
if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $http = 'https://';
} else {
    $http = 'http://';
}

/* Redirect http/https */
if (!count($config['arrayDomainSSL']) && $http == 'https://') {
    $host = $_SERVER['HTTP_HOST'];
    $request_uri = $_SERVER['REQUEST_URI'];
    $good_url = "http://" . $host . $request_uri;
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $good_url");
    exit;
}

/* CheckSSL */
if (count($config['arrayDomainSSL'])) {
    include LIBRARIES . "checkSSL.php";
}

/* Cấu hình base */
$configUrl = $config['database']['server-name'] . $config['database']['url'];
$configBase = $http . $configUrl;

/* Token */
define('TOKEN', md5(NN_CONTRACT . $config['database']['url']));

/* Path */
define('ROOT', str_replace(basename(__DIR__), '', __DIR__));
define('ASSET', $http . $configUrl);
define('ADMIN', 'admin');

/* Cấu hình login */
$loginAdmin = $config['login']['admin'];
$loginMember = $config['login']['member'];

/* Cấu hình upload */
require_once LIBRARIES . "constant.php";
