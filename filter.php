<?php
/**
 * Created by PhpStorm.
 * User: rohit
 * Date: 22/12/14
 * Time: 4:07 AM
 */
require_once('connection.php');

$range = $_POST['price'];
$sth = $conn->query("SELECT * FROM Records WHERE Price <=". $range);
$records = $sth->fetchAll();
$record_js = json_encode(utf8ize($records));
print_r($record_js);

?>