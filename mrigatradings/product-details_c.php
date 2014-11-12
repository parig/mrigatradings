<?php require 'config.php';
$variety_id=$_REQUEST['variety_id'];
function productdetails($product_id)
{
	
	$sql_reso=mysql_query("select * from products where product_id='".$product_id."'") or die(mysql_error());
	$rs_reso=mysql_fetch_array($sql_reso) or die(mysql_error());
	$rs_product_cname=$rs_reso['product_name'];
	return $rs_product_cname;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Products | Mriga Tradings</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    
        <link href="ticker/assets/css/main.css" rel="stylesheet">
    
   
    <link href="ticker/assets/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="css/jquery.treeview.css" /> 
</head><!--/head-->

<body>
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
	
	 <br/><br />
	
	<section>
		<div class="container">
			<div class="row">
            <h2 class="title text-center">Products</h2>
				<div class="col-sm-3">
					<div class="left-sidebar">
						 
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							<?php include "productmenu.php";?>
							
						</div><!--/category-productsr-->
					
 	
					 
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						
       
       <ul class="breadcrumb">
			<li><a href="index.php">Home</a></li><li></li>
		    <?php $sql_list1=mysql_query("select * from product_variety where variety_id='".$variety_id."'") or die(mysql_error()); 
					$rs1=mysql_fetch_array($sql_list1);
					echo '<li><a href="javascript:void(0)">'.$rs1['variety_name'].'</a></li>';
			?>
		</ul> 
						<?php 						
							 							
							$sql_list=mysql_query("select * from product_variety where variety_id='".$variety_id."'") or die(mysql_error());					 
							 
							while($rs=mysql_fetch_array($sql_list)){
						?>
                        <div class="col-sm-12">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/products/<?php echo $rs['variety_image'];?>" alt="<?php echo $rs['variety_name'];?>" />
										</div>
								</div>
								<div class="choose">
                                <?php if($rs['varieties']){?>
									<ul class="nav nav-pills nav-justified" style="padding-bottom:20px;">
										
                                        