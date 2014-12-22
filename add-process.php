<?php
/**
 * Created by PhpStorm.
 * User: rohit
 * Date: 22/12/14
 * Time: 6:07 AM
 */
require_once('connection.php');
$fileName = $_FILES["file1"]["name"];
$fileTmpLoc = $_FILES["file1"]["tmp_name"];
$fileType = $_FILES["file1"]["type"];
$fileSize = $_FILES["file1"]["size"];
$fileErrorMsg = $_FILES["file1"]["error"];

if (!$fileTmpLoc) {
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
    // This condition is only if you wish to allow uploading of specific file types
    echo "ERROR: Your image was not .gif, .jpg, or .png.";
    unlink($fileTmpLoc);
    exit();
}

move_uploaded_file($fileTmpLoc, "images/$fileName");
$amen ="";
foreach($_POST['ame'] as $selected){
    $amen.=$selected.",";
}
$conn->insert('Records', array('venuename' => $_POST['ven'], 'image'=>$fileName,'capacity'=>$_POST['cap'],'Price'=>$_POST['pri'],'Amenities'=>$amen));

echo "Venue Details along with image uploaded successfuly.<br /><br />";
echo 'Redirecting after 3 seconds... to home Page';

header( "refresh:3;url=index.php" );


?>