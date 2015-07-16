<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
<link href="header.css" rel="stylesheet" type="text/css">

        <title>SP Profile - User</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Rolling Rounded Menu with jQuery and CSS3" />
        <meta name="keywords" content="jquery, css3, rolling, rounded, menu, navigation"/>
        <link rel="stylesheet" href="css/cssspprof.css" type="text/css" media="screen"/>
        <style>

        #header
{
    width:100%;
    height:93px;
    margin:0px;
    background-color:#4a96ad;
    z-index:100;
}
#logo
{
    display:inline-block;
    float:left;
    z-index:100;
    
}

body
{
height: 100%;
background-image: url("back.jpg");
background-repeat:no-repeat;
background-size:200% 200%;
padding:20px;
margin:0px;
z-index:1000000000;
}

            *{
                margin:0;
                padding:0;
            
            }
            
            .box {
                 margin:10px;
                 padding:5px;
                 position: relative;
                 top: 100px
            }
            
            .rightC{
                width: 1050px;
                
            }
            .inside{
                width: 550px;
                border: 1px white;
                position: inherit;
                float:left;
            }
            .inside2{
                width: 450px;
        	height: auto;
                border: 1px white;
                float: right;
            }
            .rating{
                margin:10px;
                padding:5px;
                border: 1px white;
            }
            .SPname, .type {
                width:inherit;
                display: block;
                clear: both;
                float: left;
            }
            .desc {
                width : auto;
                vertical-align: top;
            }
            .area, .address{
                width: auto;
                border: 1px solid gray;
            }
        </style>
        
    </head>
    <body>
    <?php require "header.php"; ?>
        <?php
        require 'core.inc.php';
    if(!loggedin())
          {//background-image:url(images/winter.jpg);
            header("location: Login/index.php");
           }
    $uid=$_GET['uid'];
    $neww="search.php?uid=".$uid;
    $uuuu="userlog.php?uid=".$uid;
    $edit="Edit_Profile.php?uid=".$uid;
    ?>
            
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
        <div class="box" style="text-align:center">
            
                    <?php
                    
                    $id=$_GET['id'];
                    $dateS=$_GET['dateS'];
                    $service=$_GET['service'];
                    $uid=$_GET['uid'];
                    $db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
                    mysql_select_db('project');
                    $sql = "SELECT * FROM servicep where id='".$id."'";
                    $result = mysqli_query($db,$sql);
                    $row = mysqli_fetch_array($result); 
                    
                    ?>
                    
               
            <div class="rightC">
                <div class="SPname">
                    <h1>
                    <?php        
                    echo '<p style="text-align:center">'.$row['name'].'</p>' ;
                     ?>
                    </h1>
                </div>
                <div class="type">
                    <h3 style="text-align:center">
                        Type of Service: 
                        <?php
                            echo $row['type1'];
                            if($row['type2']!=null)
                            {
                                echo $row['type2'];
                            }
                            if($row['type3']!=null)
                            {
                                echo $row['type3'];
                            }
                        ?>
                    </h3>
                </div>
                <div class="inside">
                    <div class="rating">
                        Rating:
                        <?php
                        echo $row['rating'] ;
                        ?>
                    </div>
                    <div class="rating">
                        Price per hour:
                        <?php
                        echo $row['price'];
                        ?>
                    </div>
                    <div class="rating">
                        <p>
                            <?php echo $row['descr'];
                            $url="makereq.php?id=".$id."&dateS=".$dateS."&service=".$service."&uid=".$uid;
                            $curl="disContact.php?id=".$id;
                            $surl="viewsch.php?id=".$id."&dateS=".$dateS;
                            ?>
                           </p>
                    </div>
		<div class="rating">
                    <h4>Address</h4>
                    <p>
                    <?php
                    
                    $id=$_GET['id'];
                    $dateS=$_GET['dateS'];
                    $service=$_GET['service'];
                    $uid=$_GET['uid'];
                    $db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
                    mysql_select_db('project');
                    $sql = "SELECT * FROM servicep where id='".$id."'";
                    $result = mysqli_query($db,$sql);
                    $row = mysqli_fetch_array($result); 
                    echo $row['address'];
                    ?>
                    </p>
                </div>
                <div class="rating">
                    <h4> Areas of Operation: </h4>
                    <?php
                    echo $row['area'];
                    ?>
                </div>


                </div>
                <div class="inside2">
                <div class="ringMenu">
                    <ul>
                     <li class="main"><a href="#main">Options</a></li>
                     <li class="top"><a href=<?php echo "$curl"; ?>>View Contact</a></li>
                     <li class="right"><a href=<?php echo "$url"; ?>>Book Slot</a></li>
                     <li class="bottom"><a href=<?php echo "$surl"; ?>>View Schedule</a></li>
                     <li class="left">Choose</li>
                    </ul>
                </div>
                </div>
            </div>
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