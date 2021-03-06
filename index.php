﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="js/js-image-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/craftyslide.css" />
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" type="text/css" rel="stylesheet" />

    <script src="js/jquery-1.6.js" type="text/javascript" language="javascript"></script>
    <script src="js/jquery.masonry.min.js.js" type="text/javascript" language="javascript"></script>
    <script type="text/javascript" src="js/jquery.shadow.js"></script>
    <script type="text/javascript" src="js/jquery.ifixpng.js"></script>
    <script type="text/javascript" src="js/jquery.fancyzoom.js"></script>
    <script src="js/js-image-slider.js" type="text/javascript"></script>
    <script src="js/respond.js"></script>

    <title>bonVoyage</title>

</head>
<body>

<script type="text/javascript" language="javascript">
function add_like(get_pin_id) {
	
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","add_like.php?like_id="+get_pin_id,false);
	xmlhttp.send();
	
	location.href="index.php";
}

function delete_like(get_pin_id) {
	
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","delete_like.php?delete_id="+get_pin_id,false);
	xmlhttp.send();
	location.href="index.php";
}

function delete_pin(get_pin_id) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","delete_pin.php?delete_id="+get_pin_id,false);
	xmlhttp.send();
	location.href="index.php";
}

function button_appear(pin_id) {
	var like_button = "like_pin_" + pin_id;
	var unlike_button = "unlike_pin_" + pin_id;
	var delete_button = "delete_pin_" + pin_id;
	if(document.getElementById(like_button) == null) {
		document.getElementById(unlike_button).style.display = 'block';
	}
	else {
		document.getElementById(like_button).style.display = 'block';
	}
	document.getElementById(delete_button).style.display = 'block';
}

function button_disappear(pin_id) {
	var like_button = "like_pin_" + pin_id;
	var unlike_button = "unlike_pin_" + pin_id;
	var delete_button = "delete_pin_" + pin_id;
	if(document.getElementById(like_button) == null) {
		document.getElementById(unlike_button).style.display = 'none';
	}
	else {
		document.getElementById(like_button).style.display = 'none';
	}
	document.getElementById(delete_button).style.display = 'none';
}
</script>

	<div id="wrapper">
    	
        <div id="header">
        	<?php
            error_reporting(0);
            include('header.php'); ?>
        </div><!--end #header-->
        <?php
			
			if(isset($_POST['comment_submit'])&&$_POST['comment_submit']){
				$comment_pin_id = $_POST['comment_pin_id'];
				$comment_text = $_POST['comment_text'];
				
				$current_user_id =  $_SESSION['user'][0];
				
				$sql="insert into comment (comment_id, pin_id, user_id, content, comment_time) values (null,'".$comment_pin_id."','".$current_user_id."','".$comment_text."',now())";
				mysql_query($sql) or die("Comment error!");
				Header("Location:index.php");
			}
		?>


        <div id="main">
        	<!--
            <div id="nav">
            	<ul>
                <?php
					if(isset($_SESSION['user'][0])){
				?>
                	<li><a href="follow_pins.php"><b>Pinners you follow</b></a></li>

                <?php
					}
					else {
				?>
                	<li><a href="register.php"><b>Join in Pinterest</b></a></li>
                <?php
					}
				?>

                    <li>·</li>
                	<li id="kind_menu" class="sec_menu">
                    	<a href="index.php">Everything <img class="triangle" src="./image/triangle.png" /></a>
                    	<ul>
                        	<li><a href="category.php?cat=art">Art</a></li>
                            <li><a href="category.php?cat=architecture">Architecture</a></li>
                            <li><a href="category.php?cat=car">Car</a></li>
                            <li><a href="category.php?cat=design">Design</a></li>
                            <li><a href="category.php?cat=diy">DIY</a></li>
                            <li><a href="category.php?cat=entertainment">Entertainment</a></li>
                            <li><a href="category.php?cat=food">Food</a></li>
                            <li><a href="category.php?cat=life">Life</a></li>
                            <li><a href="category.php?cat=products">Products</a></li>
                            <li><a href="category.php?cat=sports">Sports</a></li>
                            <li><a href="category.php?cat=other">Other</a></li>
                        </ul>
                    </li>
                    <li>·</li>
                    <li><a href="popular.php">Popular</a></li>
                </ul>
            </div>

            <div id="nav_stay">
            	<ul>
                	<li><a href="follow_pins.php"><b>Pinners you follow</b></a></li>
                    <li>·</li>
                	<li id="kind_menu" class="sec_menu">
                    	<a href="index.hp">Everything<img class="triangle" src="./image/triangle.png" /></a>
                    	<ul>
                        	<li><a href="category.php?cat=art">Art</a></li>
                            <li><a href="category.php?cat=architecture">Architecture</a></li>
                            <li><a href="category.php?cat=car">Car</a></li>
                            <li><a href="category.php?cat=design">Design</a></li>
                            <li><a href="category.php?cat=diy">DIY</a></li>
                            <li><a href="category.php?cat=entertainment">Entertainment</a></li>
                            <li><a href="category.php?cat=food">Food</a></li>
                            <li><a href="category.php?cat=life">Life</a></li>
                            <li><a href="category.php?cat=products">Products</a></li>
                            <li><a href="category.php?cat=sports">Sports</a></li>
                            <li><a href="category.php?cat=other">Other</a></li>
                        </ul>
                    </li>
                    <li>·</li>
                    <li><a href="popular.php">Popular</a></li>
                </ul>
            </div>


            <script type="text/javascript">

				var div_nav = document.getElementById('nav');
				var div_nav_stay = document.getElementById('nav_stay');

				var div_top = div_nav.offsetTop;

				window.onscroll= function (){
					var scroll_top =$(document).scrollTop();
					/*if(document.documentElement.scrollTop) {
						scroll_top = document.documentElement.scrollTop;
					}

					else if(document.body.scrollTop) {
						scroll_top = document.body.scrollTop;
					}
					else {
						scroll_top = 0;
					}*/

					if(scroll_top <= div_top) {
						div_nav_stay.style.display= 'none';
					}
					else {
						div_nav_stay.style.display = 'block';
					}
				}

				function check_comment(){
					if(comment_form.comment_text.value==""){
						alert("Comment can not be empty!");
						return false;
					}
				}

				</script>
            -->



            <div id="content">
                <br>


                <div id="slideshow">
                    <ul>

                        <li>
                            <img src="image/first.jpg" style="width:400px; height:500px "   />
                        </li>
                        <li>
                            <img src="image/four1.jpg"  style="width:400px; height:500px "  />
                        </li>
                        <li>
                            <img src="image/two.jpg" style="width:400px; height:500px "   />
                        </li>
                        <li>
                            <img src="image/three.jpg" style="width:400px; height:500px "   />
                        </li>

                    </ul>
                </div>

                <!-- jQuery Library -->
<script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>

<!-- Craftyslide Plugin -->
<script src="js/craftyslide.js"></script>

      <script>
        $("#slideshow").craftyslide({
  'width': 1200,
  'height': 500,
  'pagination': false,
  'fadetime': 500,
  'delay': 4000
});
      </script>
                <h2>

                </h2>
                <h2 align="center">
                    OUR RECENT COLLECTIONS
                </h2>
            </div>

            <div >

                <div class="col-lg-1">
                </div>

                <div class="col-lg-10">


                <div id="pin_dinplay" class="pin">
                    <ul>
                        <!--<li id="recent">
                        	<h3>Recent Activity</h3>
                        </li>-->
                        <?php

            				$PIN_SQL="SELECT * FROM `pin` order by pin_id desc";
  							$pin_query=mysql_query($PIN_SQL);
  							while($pin_row=mysql_fetch_array($pin_query)){
								$pin_id = $pin_row['pin_id'];
								$board_id = $pin_row['board_id'];
								$pin_user_id = $pin_row['user_id'];
								$delete_button = "delete_pin_".$pin_id;

								$BOARD_SQL="SELECT * FROM `board` where board_id = '$board_id'";
								$board_query=mysql_query($BOARD_SQL);
								while($board_row=mysql_fetch_array($board_query)){
									$cur_board_name = $board_row['board_name'];
									$cur_board_id = $board_row['board_id'];
								}

	  					?>


                        <li id="pin_<?php echo $pin_id; ?>" class="small_pin" onmouseover="button_appear('<?php echo $pin_row['pin_id']; ?>')" onmouseout="button_disappear('<?php echo $pin_row['pin_id']; ?>')">

                        <?php
							if(isset($_SESSION['user'][0])){
								$login_user_id = $_SESSION['user'][0];

								$if_like = false;
								$LIKE_SQL="SELECT * FROM `like_pin` where pin_id = '$pin_id' and user_id = '$login_user_id'";
								$like_query=mysql_query($LIKE_SQL);
								$like_query=mysql_query($LIKE_SQL);
								$like_row = mysql_fetch_array($like_query);

								$unlike_button = "unlike_pin_".$pin_id;
								$like_button = "like_pin_".$pin_id;
								if(empty($like_row)) {
									$if_like = true;
								}

								if($if_like) {
						?>

									<a id="<?php echo $like_button; ?>" class="like_button" href="javascript:void(0);" onclick="add_like(<?php echo $pin_row['pin_id']; ?>)"><span class="glyphicon glyphicon-thumbs-up"></a>

                        <?php
								}
								else {
                        ?>

                            <a id="<?php echo $unlike_button; ?>" class="unlike_button" href="javascript:void(0);" onclick="delete_like(<?php echo $pin_row['pin_id']; ?>)"><span class="glyphicon glyphicon-thumbs-down"></a>
                        <?php
								}
								if($_SESSION['user'][0] == $pin_user_id) {
						?>
                            <a id="<?php echo $delete_button; ?>" class="delete_button" href="javascript:void(0);" onclick="delete_pin(<?php echo $pin_row['pin_id']; ?>)"><span class="glyphicon glyphicon-remove"></a>
						<?php 	}
							}
						?>
                            <a href="./pins/<?php echo $pin_row['image_name']; ?>"><img src="./pins/<?php echo $pin_row['image_name'];?>"/></a>

                            <p class="pin_text"><?php echo $pin_row['description']; ?></p></a>

                        <?php

								$USER_SQL="SELECT * FROM `user` where user_id = '$pin_user_id'";
								$user_query=mysql_query($USER_SQL);
								while($user_row=mysql_fetch_array($user_query)){

						?>

                            <div class="pin_info">
                            	<div class="pin_user_info">
                                    <a href="pins.php?user_id=<?php echo $user_row['user_id']; ?>"><img class="user_head" src="./head_pics/<?php echo $user_row['head_pic'];?>" /></a>
                                    <p class="comment_text"> <b><a class="user_name_link" href="pins.php?user_id=<?php echo $user_row['user_id']; ?>"><?php echo $user_row['user_name'];?></a> </b>pin onto <b><a class="user_name_link" href="board_display.php?user_id=<?php echo $pin_user_id; ?>&board_id=<?php echo $cur_board_id;?>"><?php echo $cur_board_name;?></a></b> board</p>
                                </div>
                            <?php
                                       	//}
									}
                            ?>

                            </div>

                        </li>

                        <?php
								}
						?>

                    </ul>
                 </div>

                    <div class="col-lg-1">
                    </div>
            </div><!--end #content-->
</div>
        </div>
        </div><!--end #main-->

    </div><!--end #wrapper-->

<script type="text/javascript">

$(function() {
	$.fn.fancyzoom.defaultsOptions.imgDir='./pins/';

	$('#gallery a').fancyzoom(); 

	$('a.tozoom').fancyzoom({Speed:1000});
	$('a').fancyzoom({overlay:0.8});
	$('img.fancyzoom').fancyzoom();
});


$(document).ready(function(){
	$('#about_menu ul li').mouseover(function() {
		$('#about_menu').css('background','#DDDDDD');
	});
	$('#about_menu ul li').mouseout(function() {
		$('#about_menu').css('background','none');
	});
	
	$('#profile_menu ul li').mouseover(function() {
		$('#profile_menu').css('background','#DDDDDD');
	});
	$('#profile_menu ul li').mouseout(function() {
		$('#profile_menu').css('background','none');
	});

});

var $main= $('#pin_dinplay ul');
$main.imagesLoaded(function(){
  $main.masonry({
    itemSelector : '.small_pin',
    columnWidth : 240
  });
});

</script>

</body>
</html>