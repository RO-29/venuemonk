<?php
/**
 * Created by PhpStorm.
 * User: rohit
 * Date: 22/12/14
 * Time: 6:10 AM
 */
?>
<html>
<head>
    <title>Add Details Of Venue</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/stylegrid.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/stylequick.css">
</head>
<body>

<form enctype="multipart/form-data" method="post" action="add-process.php">
    <div class="wrapper">
        <div id="container" class="container">
            <div><font color="yellow">VenueName</font></div>
             <input type="text" id="ven" name="ven" >
            <br><br>
            <div><font color="yellow">Capacity</font></div>
            <input type="text" id="cap" name="cap" >
            <br><br>
            <div><font color="yellow">Price</font></div>
            <input type="text" id="pri" name="pri" >
            <br><br>
            <div><font color="yellow">Amenities(Check Available Amenities)</font></div>
            <input type="checkbox" name="ame[]" value="DJ"><label><font color="#ff8c00">DJ</font></label><br/>
            <input type="checkbox" name="ame[]" value="Internet"><label><font color="#ff8c00">Internet</label><br/>
            <input type="checkbox" name="ame[]" value="Projector"><label>Projector</label><br/>
            <input type="checkbox" name="ame[]" value="Table"><label>Table</label><br/>
            <input type="checkbox" name="ame[]" value="Chair"><label>Chair</label>
            <br><br>
            <div><font color="yellow">Choose your Image File here:</font></div>
            <input name="file1" type="file" /><br /><br />

            <input type="submit" value="Add To Database" />

        </div>
</div>
</form>

</body>
</html>