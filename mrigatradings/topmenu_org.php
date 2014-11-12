<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row" style="border-bottom:1px solid #f5f5f5; margin:0px;background-color:#9ECB6E;">
					<div class="col-sm-9">
                    
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php"  >Home</a></li>                                
                                <li class="dropdown"><a href="javascript:void(0)">Company</a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="our-history.php" >Our History</a></li>                                       										 										<li><a href="core-values.php">Core Values</a></li> 
                                    </ul>
                                </li>                                  	
                                <li><a href="services.php">Services</a></li>
                                
								<li class="dropdown"><a href="javascript:void(0)">Products<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li class="dropdown dropdown-submenu"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Fruits</a>
                                            <ul class="dropdown-menu">
            	<?php $sql_p=mysql_query("select * from products where product_cat_id='1' order by product_name asc") or die(mysql_error());
					while($rs_p=mysql_fetch_array($sql_p)){?>
                <li><a href="products.php?productids=<?php echo $rs_p['product_id'];?>">&nbsp;<?php echo $rs_p['product_name'];?></a></li> 
                <?php }?>
                                            </ul>
                                        </li>   
                                        <li class="dropdown dropdown-submenu"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Vegetables</a>
                                            <ul class="dropdown-menu">
            	<?php $sql_p=mysql_query("select * from products where product_cat_id='2' order by product_name asc") or die(mysql_error());
					while($rs_p=mysql_fetch_array($sql_p)){?>
                <li><a href="products.php?productids=<?php echo $rs_p['product_id'];?>"> &nbsp;<?php echo $rs_p['product_name'];?></a></li> 
                <?php }?>
                                            </ul>
                                        </li>                                         
                                                                             
                                    </ul>  
                                 </li>  
                                <li><a href="buying-request.php">Buyer</a></li>  
                                <li class="dropdown"><a href="javascript:void(0)">Supplier</a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="supplier-quotation.php">Supplier Quotation</a></li> 
                                    </ul>
                                </li>   
                                
                                <li class="dropdown"><a href="javascript:void(0)">Facility</a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="transport.php">Transport</a></li> 
                                    </ul>
                                </li>                                  
                                 
                                <li><a href="locator.php">Locator Map</a></li>
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
 					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form  action="search.php" method="post" name="frmsearch">
                            <input type="text" placeholder="Search" name="inputsearch" value="<?php $_POST['inputsearch'];?>"/></form>
						</div>
					</div> 
				</div>
			</div>
		</div><!--/header-bottom-->