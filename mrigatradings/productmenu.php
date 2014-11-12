<div style="margin-left:20px;">
<form action="products.php" method="post">
     <ul id="tree">
        <li><a class="left_link" href="JavaScript:void(0);"><strong>Fresh Fruits</strong></a>
            <ul>
            	<?php $sql_p=mysql_query("select * from products where product_cat_id='1' order by product_name asc") or die(mysql_error());
					while($rs_p=mysql_fetch_array($sql_p)){?>
                <li><a href="products.php"></a><input name="productids[]" <?php if($_POST['productids']) { if (in_array($rs_p['product_id'], $_POST['productids'])) { echo "checked"; } }?> type="checkbox" value="<?=$rs_p['product_id']?>" onchange="submit();">&nbsp;<?php echo $rs_p['product_name'];?></li> 
                <?php }?>
            </ul>
		</li>
        
        <li><a class="left_link" href="JavaScript:void(0);"><strong>Fresh Vegetables</strong></a>
            <ul>
            	<?php $sql_p=mysql_query("select * from products where product_cat_id='2' order by product_name asc") or die(mysql_error());
					while($rs_p=mysql_fetch_array($sql_p)){?>
                <li><a href="products.php"></a><input name="productids[]"  type="checkbox" value="<?=$rs_p['product_id']?>" <?php if($_POST['productids']) { if (in_array($rs_p['product_id'], $_POST['productids'])) { echo "checked"; } }?> onchange="submit();">&nbsp;<?php echo $rs_p['product_name'];?></li> 
                <?php }?>
            </ul>
		</li>           
                                    
     </ul>
     </form>
    </div>