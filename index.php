<?php
/**
 * Created by PhpStorm.
 * User: rohit
 * Date: 22/12/14
 * Time: 5:07 AM
 */
require_once('connection.php');
$pr = 7000;
$sth = $conn->query("SELECT * FROM Records WHERE Price <=".$pr);
$records = $sth->fetchAll();
$count = count($records);
$record_js = json_encode(utf8ize($records));

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <title>VenuMonk Display</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/stylegrid.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/stylequick.css">

</head>
<body>
<div class="wrapper">
    <div id="container" class="container">

        <div id="ve"><h1>Available Venues</h1></div>
        <div id="dis">Price Filter(0-10000)</div>

        <input type="range" min="0" max="10000" value="7000" step="100"  />
        <br>
        <span id="range">7000</span>

        <hr />
        <ul id="normal" class="cd-items cd-container">
            <?php
            for($x = 0; $x < $count; $x++){
                $img = $records[$x]['image'];
                $venue = $records[$x]['venuename'];
                echo "<li class='cd-item'>
                                        <h2><font color='white'>$venue</font></h2>
                     	                <img width='200px' height='200px' id =$x src='images/$img'/>
                      			        <a href='#0' class='cd-trigger'> <h2><b>Quick View</b></h2></a>
				                 </li>";
            }
            ?></ul>
        <ul id="sort" class="cd-items cd-container">
        </ul>
        <div class="cd-quick-view">
            <div class="cd-slider-wrapper">
                <ul class="cd-slider">
                    <li id ="panel" class="selected"></li>
                </ul> <!-- cd-slider -->

                <ul class="cd-slider-navigation">
                </ul> <!-- cd-slider-navigation -->
            </div> <!-- cd-slider-wrapper -->

            <div class="cd-item-info">
                <h2 id="title"></h2>
                <br><br>
                <ul class="cd-item-action">
                    <li><a href="#0">Price</a></li>
                    <li id="price"></li>
                    <br><br>
                    <li><a href="#0">Amenities</a></li>
                    <li id="amen"></li>
                    <br><br>
                    <li><a href="#0">Capacity</a></li>
                    <li id="capacity"></li>

                </ul> <!-- cd-item-action -->
            </div> <!-- cd-item-info -->
            <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-quick-view -->
        </ul>
        <!--/#cd-items-->
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="js/modernizr.js"></script> <!-- Modernizr -->
<script src="js/velocity.min.js"></script>
<script src="js/quickview.js"></script> <!-- Resource jQuery -->

<script type="text/javascript">
    $(document).ready(function(){
        window.venues = <?php echo $record_js ?>;
        console.log(window.venues);

        $("[type=range]").change(function(){
            var newval=$(this).val();

            $("#range").text(newval);
            $.ajax({
                type: "POST",
                url: "filter.php",
                data: 'price='+newval,
                success: function(html){
                    var rec = JSON.parse(html);
                    console.log(rec)
                    window.venues=rec;
                    var html_dis ="";
                    var length = rec.length;
                    for (var i = 0; i < length; i++) {
                        html_dis+="<li class='cd-item'><h2><font color='white'>"+rec[i].venuename+"</font></h2><img width='200px' height='200px' id ="+i+ " src='images/"+rec[i].image+"'/><a href='#0' class='cd-trigger'><h2><b>Quick View</b></h2></a></li>"

                    }
                    $("#normal").html('');
                    $('#normal').fadeIn(500);
                    if(html_dis=="")
                        html_dis="No venue in this price range";
                    $("#normal").html(html_dis);

                    console.log(html_dis);

                },
                beforeSend:function()
                {
                    $('#normal').fadeOut(500);
                }
            });
        });
        /**/


    });
</script>
<div ><h1><a href="add.php">Add Venues</a></h1></div>

</body>
</html>


