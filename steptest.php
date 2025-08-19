<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    session_start();
    echo "1. Session started OK<br>";
    
    define('LIBRARIES', './libraries/');
    define('SOURCES', './sources/');
    define('LAYOUT', 'layout/');
    define('THUMBS', 'thumbs');
    define('WATERMARK', 'watermark');
    echo "2. Constants defined OK<br>";

    require_once LIBRARIES . "config.php";
    echo "3. Config loaded OK<br>";
    
    require_once LIBRARIES . 'autoload.php';
    echo "4. Autoload included OK<br>";
    
    new AutoLoad();
    echo "5. AutoLoad instantiated OK<br>";
    
    $injection = new AntiSQLInjection();
    echo "6. AntiSQLInjection OK<br>";
    
    $d = new PDODb($config['database']);
    echo "7. Database connection OK<br>";
    
    $flash = new Flash();
    echo "8. Flash OK<br>";
    
    $seo = new Seo($d);
    echo "9. SEO OK<br>";
    
    $emailer = new Email($d);
    echo "10. Email OK<br>";
    
    $router = new AltoRouter();
    echo "11. Router OK<br>";
    
    $cache = new Cache($d);
    echo "12. Cache OK<br>";
    
    $func = new Functions($d, $cache);
    echo "13. Functions OK<br>";
    
    echo "All classes loaded successfully!<br>";
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "<br>";
    echo "File: " . $e->getFile() . "<br>";
    echo "Line: " . $e->getLine() . "<br>";
    echo "Trace:<br><pre>" . $e->getTraceAsString() . "</pre>";
} catch (Error $e) {
    echo "FATAL ERROR: " . $e->getMessage() . "<br>";
    echo "File: " . $e->getFile() . "<br>";
    echo "Line: " . $e->getLine() . "<br>";
    echo "Trace:<br><pre>" . $e->getTraceAsString() . "</pre>";
}
?>
