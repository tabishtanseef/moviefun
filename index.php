<?php
include("includes/db.php");
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dr Right</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="camera-css"  href="css/camera.css" type="text/css" media="all">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/skins/tango/skin.css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="js/google-code-prettify/prettify.css" rel="stylesheet">
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->  

</head>
<body>
	<!--header-->
    <div class="header">
    	<div class="wrap">
        	<div class="navbar navbar_ clearfix">
            	<div class="container">
                    <div class="row">
                        <div class="span2">
                        	<div class="logo"><a href="index.php"><img  width="90%"src="img/drlogo.png" alt="" /></a></div>
						</div>
						<div class="span1"></div>
						<div class="span3">
							
                        	<div class="widget">
                                	<form class="form-search" action="result.php" method="get" enctype="multipart/form-data">
                                        <br>
                                        <br>
										<input type="text" class="input-medium search-query" placeholder="Search Your Movie" name="city">
										&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search" class='btn send_btn' value="search" />
                                    </form>
                                </div>
                        </div>
                        <div class="span6">
                        	<div class="follow_us">
                                <ul>
                                    <li><a href="#" class="facebook">Facebook</a></li>
                                 
                                    <li><a href="#" class="twitter">Twitter</a></li>
                                    
                                </ul>
                            </div>
                            <nav id="main_menu">
                                <div class="menu_wrap">
                                    <ul class="nav sf-menu">
                                      <li class=""><a href="home.php">Home</a></li>
                                      
                                       <li class="sub-menu"><a href="javascript:{}">Movies</a>
                                          <ul>
												<?php
												   
												   $get_cats = "select * from categories";
												   $run_cats = mysqli_query($con, $get_cats);
												   while($row_cats = mysqli_fetch_array($run_cats))
												   {   
												   $cat_id= $row_cats['cat_id']; 
												   $cat_title=$row_cats['cat_title'];
												   echo "<li> <a href='movies.php?cat=$cat_id'>$cat_title</a></li>";
												   
												   }
												   
												?>
                                          </ul>                                          
                                      </li>
                                      <li><a href="#latest">New Movies</a></li> 
                                      
                                      <li><a href="contacts.html">Suggestions</a></li>
                                    </ul>
                                </div>
                             </nav>                            
                        </div>
                    </div>                
                </div>
             </div>
        </div>    
    </div>
    <!--//header-->    
     
    <!--page_container-->
    <div class="page_container">
        <!--slider-->
        <div id="main_slider">
            <div class="camera_wrap" id="camera_wrap_1">
                <div data-src="img/slider/5.jpg"></div>
                <div data-src="img/slider/7.jpg"></div>
                <div data-src="img/slider/6.jpg"></div>
                <div data-src="img/slider/8.jpg"></div>				
            </div><!-- #camera_wrap_1 -->
            <div class="clear"></div>	
        </div>        
        <!--//slider-->
		<!--featured works-->
        <div class="wrap block carousel_block">
            <div class="container">
            	<h2 class="upper">All Movies</h2>
            	<div class="row">
                    <div class="span12">
					<ul id='mycarousel2' class='jcarousel-skin-tango'>
					<?php 
					
			    $get_posts ="select * from movie order by rand()";
				$run_posts= mysqli_query($con, $get_posts);
				 
				while($row_posts=mysqli_fetch_array($run_posts))
				{
					$m_id = $row_posts['movie_id'];
					$name = $row_posts['movie_title'];
					$link = $row_posts['link'];
					$pic  = $row_posts['image'];
					$cat = $row_posts['cat'];
					$gen = $row_posts['gen'];		
					$desc = $row_posts['movie_desc'];		
				
							
                         echo "
						
                            <li>
                            	<div class='post_carousel'>
                                	<img src='adminarea/product_images/$pic' width='70%' height='100px' />
                                	<div class='title_t'><a href='profile.php?uid=$m_id'>$name</a></div>
                                    <div>
                                		 <a href='cat.php?cat=$cat'>$cat</a> In <a href='gen.php?gen=$gen'>$gen</a>
                                    </div>
									 <div >
                                		 <a href='#'>$desc</a>  <a href='$link'>Download</a>
                                    </div>
										
                            </li>";  } ?> </ul>                     
                    </div>                
                </div>                
            </div>
        </div>             
        <!--//featured works-->
		 <!--latest posts-->
        <div class="wrap block carousel_block" id="latest">
            <div class="container">
            	<h2 class="upper">New Movies</h2>
            	<div class="row">
                    <div class="span12">
					<ul id='mycarousel2' class='jcarousel-skin-tango'>
					<?php 
					
			    $get_posts ="select * from movie order by movie_id desc";
				$run_posts= mysqli_query($con, $get_posts);
				 
				while($row_posts=mysqli_fetch_array($run_posts))
				{
					$m_id = $row_posts['movie_id'];
					$name = $row_posts['movie_title'];
					$link = $row_posts['link'];
					$pic  = $row_posts['image'];
					$cat = $row_posts['cat'];
					$gen = $row_posts['gen'];		
					$desc = $row_posts['movie_desc'];		
				
							
                         echo "
						
                            <li>
                            	<div class='post_carousel'>
                                	<img src='adminarea/product_images/$pic' width='70%' height='100px' />
                                	<div class='title_t'><a href='profile.php?uid=$m_id'>$name</a></div>
                                    <div>
                                		 <a href='cat.php?cat=$cat'>$cat</a> In <a href='gen.php?gen=$gen'>$gen</a>
                                    </div>
									 <div >
                                		 <a href='#'>$desc</a>  <a href='$link'>Download</a>
                                    </div>
										
                            </li>";  } ?> </ul>                     
                    </div>                
                </div>                
            </div>
        </div>        
        <!--//latest posts--> 
        
        <div class="footer_bottom">
            <div class="wrap">
            	<div class="container">
                	<div class="row">
                		<div class="span5">
                        	<div class="foot_logo"><a href="index.html"><img height="20%" width="40%"src="img/drlogo.png" alt="" /></a></div>    
                        	<div class="copyright">&copy; 2017 Dr. Right, Know Your Doctor </br>All Rights Reserved.</div>                        
                        </div>
                        <div class="span7">
                        	<div class="foot_right_block">
                            	<div class="fright">
                                	<form action="#" method="post">
                                        <input class="inp_search" name="name" type="text" value="Search the Site" onfocus="if (this.value == 'Search the Site') this.value = '';" onblur="if (this.value == '') this.value = 'Search the Site';" />                                        
                                        <button type="submit" class="btn dark_btn">Search</button>
									</form>
                                </div>
                                <div class="follow_us">
                                	<ul>
                                        <li><a rel="tooltip" href="#" title="Facebook" class="facebook">Facebook</a></li>
                                        <li><a rel="tooltip" href="#" title="Twitter" class="twitter">Twitter</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            
                            	<div class="clear"></div>
                            	<div class="foot_menu">
                            		<ul>
                                        <li><a href="index.html" class="current">Home</a></li>
                           
                                        <li><a href="signup.php">Join Us</a></li>
                                        <li><a href="aboutus.php">About Us</a></li>
                                        <li><a href="contacts.html">Contact Us</a></li>
                                    </ul>
                            	</div>
                            </div>                            
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>
    <!--//footer-->    

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/camera.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){	
			//Slider
			$('#camera_wrap_1').camera();
			
			//Featured works & latest posts
			$('#mycarousel, #mycarousel2, #newscarousel').jcarousel();													
		});		
	</script>
</body>
</html>

