<?php
/**
 * Created by PhpStorm.
 * User: rohit
 * Date: 22/12/14
 * Time: 3:30 AM
 */


use Doctrine\Common\ClassLoader;
require_once('Doctrine/Common/ClassLoader.php');
$classLoader = new ClassLoader('Doctrine','/var/www/venuemonk');
$classLoader->register();
$config = new Doctrine\DBAL\Configuration();
$connectionParams = array(
    'dbname' => 'venumonk',
    'host'=>'localhost',
    'user' => 'root',
    'password' => 'rohit',
    'driver' => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
/*$conn->insert('userinfo', array('band_id' => 12345678901, 'name'=>'Rohit','username'=>'ro','token'=>'1234556','fb_id'=>'12345','gender'=>'male','email' => 'bob@example.com'));*/

$sth = $conn->query("SELECT * FROM Records");
$records = $sth->fetchAll();
function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}
?>
