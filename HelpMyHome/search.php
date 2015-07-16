<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

require 'core.inc.php';

if(!loggedin())
          {
            header("location: Login/index.php");
           } 
?>
<html>
    <head>

	<link href="header_n.css" rel="stylesheet" type="text/css" />
        <title>Search - User</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Rolling Rounded Menu with jQuery and CSS3" />
        <meta name="keywords" content="jquery, css3, rolling, rounded, menu, navigation"/>
        <link rel="stylesheet" href="css/csssearch.css" type="text/css" media="screen"/>
        <style>
            *{
                margin:0;
                padding:0;
            }
            .searchBox{
              position: absolute;
              top: 100px;
              left: 400px;
            }
            input:not([type=checkbox]), textarea {
            width: 250px;
            padding: 5px;
            border: 1px solid #ccc;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            }
            form {
             width: 500px;
             margin: 0 auto 0 auto;  
            }
          form fieldset {
            padding: 26px;
            border: 1px solid #b4b4b4;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
          }
          form legend {
            padding: 5px 20px 5px 20px;
            color: #030303;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border: 1px solid #b4b4b4;
          }
          form ol {
            list-style: none;
            margin-bottom: 20px;
            border: 1px solid #b4b4b4;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            padding: 10px;
          }
          form ol, form legend, form fieldset {
            background-image: -moz-linear-gradient(top, #f7f7f7, #e5e5e5); /* FF3.6 */
            background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #e5e5e5),color-stop(1, #f7f7f7)); /* Saf4+, Chrome */
          }
          form ol.buttons {
            overflow: auto;
          }
          form ol li label {
            float: left;
            width: 160px;
            font-weight: bold;
          }
          form ol.radio-buttons li {
            float:left;
          margin-bottom:0;
          width:8px;
          }
          form ol.radio-buttons li label {
            line-height:20px;
          padding-right:20px;
          width:80px;
          }
          form ol.radio-buttons li input {
          padding:0;
          width:20px;
          }
          .settings {
            /* width: 400px; */
            list-style: none;
            position: relative;
          }
          .settings p {
            display: block;
            margin-bottom: 20px;
            background: -moz-linear-gradient(50% 50% 180deg,#C91A1A, #DB2E2E, #0C990C 0%); 
            background: -webkit-gradient(linear, 50% 50%, 0% 50%, from(#C90202), to(#009C05), color-stop(0,#00AB00));
            border-radius: 8px;
            -moz-border-radius: 6px;
            border: 1px solid #555555;
            width: 36px;
            position: relative;
            height: 15px;
          }
          .check { 
            display: block;
            width: 20px;
            height: 13px;
            border-radius: 8px;
            -moz-border-radius: 6px;
            background: -moz-linear-gradient(19% 75% 90deg,#FFFFFF, #A1A1A1);
            background: #fff -webkit-gradient(linear, 0% 0%, 0% 100%, from(#A1A1A1), to(#FFFFFF));
            border: 1px solid #e5e5e5;
            position: absolute;
            top: 0px;
            left: 0px;
          }
          input[type=checkbox] {
            display: none;
          }
          @-webkit-keyframes labelON {
            0% {
              top: 0px;
                left: 0px;
            }
            
            100% { 
              top: 0px;
                left: 14px;
            }
          }
          input[type=checkbox]:checked + label.check {
            top: 0px;
            left: 14px;
            -webkit-animation-name: labelON; 
              -webkit-animation-duration: .2s; 
              -webkit-animation-iteration-count: 1;
              -webkit-animation-timing-function: ease-in;
              -webkit-box-shadow: #244766 -1px 0px 3px;
              -moz-box-shadow: #244766 -1px 0px 3px;
          }
          @-webkit-keyframes labelOFF {
            0% {
              top: 0px;
                left: 16px;
            }
            
            100% { 
              top: 0px;
                left: 0px;
            }
          }
          input[type=checkbox] + label.check {
            top: 0px;
            left: 0px;
            -webkit-animation-name: labelOFF; 
              -webkit-animation-duration: .2s; 
              -webkit-animation-iteration-count: 1;
              -webkit-animation-timing-function: ease-in;
              -webkit-box-shadow: #244766 1px 0px 3px;
              -moz-box-shadow: #244766 1px 0px 3px;
          }
          label.info {
            position: absolute;
            color: #000;
            top:0px;
            left: 50px;
            line-height: 15px;
            width: 200px;
          }
          form ol.buttons li {
            float: left;
            width: 100px;
          }
          input[type=submit] {
            width: 80px;
            color: #f3f3f3;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            background-image: -moz-linear-gradient(top, #0cb114, #07580b); /* FF3.6 */
            background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #07580b),color-stop(1, #0cb114)); /* Saf4+, Chrome */
            -webkit-box-shadow: #4b4b4b 0px 2px 5px;
            -moz-box-shadow: #4e4e4e 0px 2px 5px;
            box-shadow: #e3e3e3 0px 2px 5px;
            border: none;
          }
          input[type=reset] {
            width: 80px;
            color: #f3f3f3;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            background-image: -moz-linear-gradient(top, #d01111, #7e0c0c); /* FF3.6 */
            background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #7e0c0c),color-stop(1, #d01111)); /* Saf4+, Chrome */
            -webkit-box-shadow: #4b4b4b 0px 2px 5px;
            -moz-box-shadow: #4e4e4e 0px 2px 5px;
            box-shadow: #e3e3e3 0px 2px 5px;
            border: none;
          }
          input[type=file] {
            width: 80px;
          }
        </style>
    </head>
    <body
<?php require "header.php"; ?>
	

        <?php
    $uid=$_GET['uid'];
    $neww="search.php?uid=".$uid;
    $uuuu="userlog.php?uid=".$uid;
    $edit="Edit_Profile.php?uid=".$uid;
    ?>
        <div>
            <a class="back" href="http://tympanus.net/codrops/2010/04/30/rocking-and-rolling-rounded-menu-with-jquery/"></a>
            <div class="title"></div>
        </div>	
  
        <div class="menu" style="margin-top: 100px;">
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

        <div class="searchBox" style="margin-top: 100px;">
        <?php
          
          $uid=$_GET['uid'];
          $url="results.php?uid=".$uid;
        ?>
        <form id="form-1" action=<?php echo $url; ?> method="post">
  <fieldset>
    <legend>Search a Service Provider</legend>
    <ol>
      <li><label for="service">Enter the Service</label></li>
      <li>
    <select name="service" id="service" required>
            <option value="Plumber">Plumber</option>
            <option value="Electrician">Electrician</option>
            <option value="Carpenter">Carpenter</option>
            <option value="Technician">Technician</option>
            <option value="Computer Engineer">Computer Engineer</option>
        </select>
    </li>
   </ol>
<ol>
      <li><label for="location">Location for Service</label></li>
      <li>
    <select name="location" id="location" required>
            <option value="Virar to Bhayandar">Virar to Bhayandar</option>
            <option value="Mira Road to Borivali">Mira Road to Borivali</option>
            <option value="Kandivali to Andheri">Kandivali to Andheri</option>
            <option value="Vile Parle to Bandra">Vile Parle to Bandra</option>
            <option value="Mahim to Dadar">Mahim to Dadar</option>
            <option value="Elphistone to Churchgate">Elphistone to Churchgate</option>
        </select>
    </li>
   </ol>
<!--Price was here-->
<ol>

      <li><label for="dateS">Date of Service</label></li>
      <li><input type="text" id="datepicker" name ="dateS"/></li>
    </ol>
      <div class="settings">
          <p>
            <input type="checkbox" value="1" id="1" name="1" checked="checked"/>
            <label class="check" for="1"></label>
            <label class="info">Sort by Rating</label>
    </p>       
      </div> 

      *else sorts by price
    <ol class="buttons">
      <li><input type="submit" class="button" value="Search" /></li>
    </ol>

  </fieldset>


</form>
</div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="jquery-css-transform.js" type="text/javascript"></script>
        <script src="jquery-animate-css-rotate-scale.js" type="text/javascript"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script>
  $(function() {
    //$( "#datepicker" ).datepicker({ minDate: new Date(2007, 1 - 1, 1) });
    //var minDate = $( "#datepicker" ).datepicker( "option", "minDate" );
    //$( "#datepicker" ).datepicker( "option", "minDate", new Date(2007, 1 - 1, 1) );
    $( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+1M +10D" });
  });
  </script>
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