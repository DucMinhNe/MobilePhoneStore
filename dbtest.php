<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('LIBRARIES', './libraries/');
require_once LIBRARIES . "config.php";
require_once LIBRARIES . 'autoload.php';
new AutoLoad();

try {
    $d = new PDODb($config['database']);
    echo "Database connected successfully!<br><br>";
    
    // Kiểm tra các bảng quan trọng
    $tables = ['setting', 'static', 'photo', 'product', 'news'];
    
    foreach ($tables as $table) {
        $fullTableName = $config['database']['prefix'] . $table;
        $result = $d->rawQuery("SHOW TABLES LIKE ?", [$fullTableName]);
        if ($result) {
            echo "✓ Table $fullTableName exists<br>";
            
            // Đếm số records
            $count = $d->rawQueryOne("SELECT COUNT(*) as count FROM $fullTableName");
            echo "&nbsp;&nbsp;→ Records: " . $count['count'] . "<br>";
        } else {
            echo "✗ Table $fullTableName missing<br>";
        }
    }
    
    echo "<br>--- Testing specific queries ---<br>";
    
    // Test query setting
    $cache = new Cache($d);
    $setting = $cache->get("select * from #_setting", null, 'fetch', 1);
    if ($setting) {
        echo "✓ Setting data found<br>";
    } else {
        echo "✗ No setting data<br>";
    }
    
    // Test static query
    $copyright = $cache->get("select namevi from #_static where type = ? limit 0,1", array('copyright'), 'fetch', 1);
    if ($copyright) {
        echo "✓ Static/copyright data found<br>";
    } else {
        echo "✗ No static/copyright data<br>";
    }
    
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "<br>";
    echo "File: " . $e->getFile() . "<br>";
    echo "Line: " . $e->getLine() . "<br>";
}
?>
