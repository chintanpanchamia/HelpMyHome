<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Search Results</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Rolling Rounded Menu with jQuery and CSS3" />
        <meta name="keywords" content="jquery, css3, rolling, rounded, menu, navigation"/>
         <link rel="stylesheet" href="css/cssspprof.css" type="text/css" media="screen"/>
         <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link href="header_n.css" rel="stylesheet" type="text/css">
   <style>
body 
{
background-image:url('Homeback.jpg');
background-color:#000000;
}
</style>     
    </head>
    <body backgroud="Homeback.jpg">
<?php require "header.php"; ?>
    <?php
    $uid=$_GET['uid'];
    $neww="search.php?uid=".$uid;
    $uuuu="userlog.php?uid=".$uid;
    ?>
        <div>
            <a class="back" href="http://tympanus.net/codrops/2010/04/30/rocking-and-rolling-rounded-menu-with-jquery/"></a>
            <div class="title"></div>
        </div>
        <div class="menu">
            <div class="item">
                <a class="link icon_mail"></a>
                <div class="item_content">
                    <h2>Contact us</h2>
                    <p>
                        <a href="mailto:nevatiaritika@gmail.com">eMail</a>
                        <a href="http://www.twitter.com/beingritika/">Twitter</a>
                        <a href="http://www.facebook.com/nevatiaritika">Facebook</a>
                    </p>
                </div>
            </div>
            <div class="item">
                <a class="link icon_help"></a>
                <div class="item_content">
                    <h2><a href="logout.php">Logout</a></h2>
                </div>
            </div>
            <div class="item">
                <a class="link icon_find"></a>
                <div class="item_content">
                    <h4><a href=<?php echo "'$neww'"; ?>>Search</a></h4>
                </div>
            </div>
            <div class="item">
                <a class="link icon_photos"></a>
                <div class="item_content">
                    <h4><a href=<?php echo "'$uuuu'"; ?>>User Log</a></h4>
                </div>
            </div>
            
        </div>
        <div class="results">
            <font color="white">
            Showing search results for:
            <br>
            <?php
            require 'core.inc.php';
    if(!loggedin())
          {
            header("location: Login/index.php");
           }
                $service = $_POST['service'];
                $location = $_POST['location'];
                $dateS = $_POST['dateS'];
                $rateSort = $_POST['1'];
                
                echo "Type of service: ";
                echo $service;
                echo "<br>";
                echo "Location for service: ";
                echo $location;
                echo"<br>";
                echo "Date for service: ";
                echo $dateS;
                echo "<br>";
                ?>
            </font>
                <?php
                $db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
                    mysql_select_db('project');
                    if ($rateSort=='1')
                {
                    $sql = "SELECT * FROM servicep WHERE area='$location' AND (type1='$service' OR type2='$service' OR type3='$service') ORDER BY rating DESC";
                }
                else
                {
                    $sql = "SELECT * FROM servicep WHERE type1='$service' OR type2='$service' OR type3='$service' AND area='$location' ORDER BY price";
                }
                    $result = mysqli_query($db,$sql);
                    echo "<table border=1 id='box-table-a'>"; // start a table tag in the HTML
                    echo "<th>Name</th><th>Price</th><th>Rating</th><th>Area</th><th>View Profile</th>";
                    if(!$result)
                    {
                        echo "No such results found";
                    }
                    else
                    {
                    while($row = mysqli_fetch_array($result))
                    {   //Creates a loop to loop through results
                    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>" . $row['rating'] . "</td><td>" . $row['area'] . "</td>";  //$row['index'] the index here is a field name
                    $url="spprof.php?id=".$row['id']."&dateS=".$dateS."&service=".$service."&uid=".$uid;
                    echo "<td><a href=$url>" .$row['id']."</a></td></tr>";

                }
            }
                echo "</table>";
            ?>
        </div>                
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="jquery-css-transform.js" type="text/javascript"></script>
        <script src="jquery-animate-css-rotate-scale.js" type="text/javascript"></script>
        <script>
            $('.item').hover(
                function(){
                    var $this = $(this);
                    expand($this);
                },
                function(){
                    var $this = $(this);
                    collapse($this);
                }
            );
            function expand($elem){
                var angle = 0;
                var t = setInterval(function () {
                    if(angle == 1440){
                        clearInterval(t);
                        return;
                    }
                    angle += 40;
                    $('.link',$elem).stop().animate({rotate: '+=-40deg'}, 0);
                },10);
                $elem.stop().animate({width:'268px'}, 1000)
                .find('.item_content').fadeIn(400,function(){
                    $(this).find('p').stop(true,true).fadeIn(600);
                });
            }
            function collapse($elem){
                var angle = 1440;
                var t = setInterval(function () {
                    if(angle == 0){
                        clearInterval(t);
                        return;
                    }
                    angle -= 40;
                    $('.link',$elem).stop().animate({rotate: '+=40deg'}, 0);
                },10);
                $elem.stop().animate({width:'52px'}, 1000)
                .find('.item_content').stop(true,true).fadeOut().find('p').stop(true,true).fadeOut();
            }
        </script>
    </body>
</html>