<?php require 'config.php';  session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Latest news | Mriga Tradings</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link href="includes/dynamic_1005_styles.css" rel="stylesheet" type="text/css">
    
<link href="css/global.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all" />


   <script src="js/jquery-1.8.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    
    	<script type="text/javascript" src="js/jquery.easing.js"></script>

	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="js/jquery.jqzoom.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
    <script>
	$(function(){
    $("img").mousedown(function(){
    return false;
});
			   });
	
	$(document).ready(function(){
    $(document).bind("contextmenu",function(e){
        return false;
    });
});
    </script>

</head><!--/head-->

<body >
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
 <li><i class="fa"></i> Registration No: 53270385E</li> 
                               <li style=" padding:0px; margin-left:-11px;"><i class="fa" ></i> <img src="images/home/singapore-flag.png" width="24" height="24"/></li>           
							</ul>                             
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="index.php" style="padding-top:1px;"><i class="fa fa-facebook"><img src="images/home/home.png"/></i></a></li>
								<li><a href="https://www.facebook.com/pages/Mriga-tradings/862240903786977?ref=br_tf" target="_blank"><i class="fa fa-facebook"><img src="images/home/facebook.png" /></i></a></li>
								<li><a href="https://twitter.com/mrigatradings" target="_blank"><i class="fa fa-twitter"><img src="images/home/twitter.png" /></i></a></li>
								<li><a href="javascript:void(0)"><i class="fa fa-linkedin"><img src="images/home/linkedin.png" /></i></a></li>								 
								<li><a href="skype:mrigatradings.com.sg?call"><i class="fa fa-google-plus"><img src="images/home/skype.png" /></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="myfont" align="center">
						<div class="logo">
							<img src='images/home/mriga-tradings.png' alt='Mriga-tradings' />
						</div>
					<div class="col-sm-3" style="float:right;">
						<div class="address" style="margin-top:-100px;">
							<img alt="" src="images/home/map.png">
							
						</div>
					</div>				
				  </div>
					
				</div>
			</div>
		</div><!--/header-middle-->
	
		<?php include 'topmenu.php';?>
	</header><!--/header-->
	 
    <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"></h2>    			    				    				
					
				</div>			 		
			</div>    	
    		  
            
<div class="col-sm-12" style="min-height:215px;">    			   			
					<h2 class="title text-center">Latest news</h2>  
 <?php if(!empty($_REQUEST['news_id'])) {
$sql_news=mysql_query("select * from news where news_id='".$_REQUEST['news_id']."'") or die(mysql_error()); while($rs_news=mysql_fetch_array($sql_news)){                                                
												?>
  
  <div style="text-align:justify; float:right;  <?php if($_REQUEST['news_id']==1){?> width:70%; <?php } else { echo 'width:60%;'; }?>"><?php echo $rs_news['news_desc'];?></div>
  
  <?php } }?>                      			    				    				
					 
     <?php if($_REQUEST['news_id']==2){?> 
     <div style="float:left;width:35%;padding-bottom:20px;"> 
     <img   alt="images/globallogistics.jpg" class="" src="images/globallogistics.jpg">
     </div>
     <?php } ?>
     
					 
     <?php if($_REQUEST['news_id']==3){?> 
     <div style="float:left;width:35%;padding-bottom:20px;"> 
     <img   alt="images/warehouse.jpg" class="" src="images/warehouse.jpg">
     </div>
     <?php } ?>     
     
<?php if($_REQUEST['news_id']==1){?>                  
<div id="pb-right-column" style="float:left; padding-bottom:20px;"> 
			<!-- product img--> 
			<div class="bordercolor" id="image-block">
				<img width="304" height="304" id="bigpic" alt="news/1-thickbox_default.jpg"  src="news/1-large_default.jpg" style="border:1px solid #CCC; padding:10px;">
			</div>

			<!-- thumbnails -->
			<div id="views_block" class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">
				<div id="thumbs_list">
					<div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;"><ul id="thumbs_list_frame" class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 652px;">
						<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" id="thumbnail_1" style="float: left; list-style: outside none none;" jcarouselindex="1">
							<a title="" class="thickbox bordercolor" href="news/1-thickbox_default.jpg">
								<img width="80" height="80" alt="" src="news/1-medium_default.jpg" id="thumb_1">
							</a>
						</li>
						
						<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal" id="thumbnail_2" style="float: left; list-style: outside none none;" jcarouselindex="2">
							<a title="" class="thickbox bordercolor" href="news/2-thickbox_default.jpg">
								<img width="80" height="80" alt="" src="news/2-medium_default.jpg" id="thumb_2">
							</a>
						</li>
						
						<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal" id="thumbnail_3" style="float: left; list-style: outside none none;" jcarouselindex="3">
							<a title="" class="thickbox bordercolor" href="news/3-thickbox_default.jpg">
								<img width="80" height="80" alt="" src="news/3-medium_default.jpg" id="thumb_3">
							</a>
						</li>
						<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal" id="thumbnail_4" style="float: left; list-style: outside none none;" jcarouselindex="4">
							<a title="" class="thickbox bordercolor" href="news/4-thickbox_default.jpg">
								<img width="80" height="80" alt="" src="news/4-medium_default.jpg" id="thumb_4">
							</a>
						</li>
						<!--<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal" id="thumbnail_5" style="float: left; list-style: outside none none;" jcarouselindex="5">
							<a title="" class="thickbox bordercolor" href="news/5-thickbox_default.jpg">
								<img width="80" height="80" alt="" src="news/5-medium_default.jpg" id="thumb_5">
							</a>
						</li>
						<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal" id="thumbnail_6" style="float: left; list-style: outside none none;" jcarouselindex="6">
							<a title="" class="thickbox bordercolor" href="news/6-thickbox_default.jpg">
								<img width="80" height="80" alt="" src="news/6-medium_default.jpg" id="thumb_6">
							</a>
						</li>-->
					</ul></div>
				</div>
			<div class="jcarousel-prev jcarousel-prev-horizontal" style="display: block;"></div><div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div></div>
			
	 
	  </div>           
   <?php }?>      
                
 
 <br>
<br>

				</div>            
            
    	</div>	
    </div> 
	
	<?php include('footer.php');?><!--/Footer-->
	

 



</body>
</html>