<?php
include "sessionchk.php";
if($_REQUEST["process"]=="delete")
{
	//mysql_query("delete from users  where variety_id=".$_REQUEST["id"]);
	$msg = "User is deleted successfully..";
}
//Set the page size
if($_REQUEST['listperpage'])
{
	$PageSize = $_REQUEST['listperpage'];
}
else
{
$PageSize = 50;	
}

$StartRow = 0;

//Set the page no
if(empty($_GET['PageNo'])){
    if($StartRow == 0){
        $PageNo = $StartRow + 1;
    }
	
}else{
    $PageNo = $_GET['PageNo'];
    $StartRow = ($PageNo - 1) * $PageSize;
}

//Set the counter start
if($PageNo % $PageSize == 0){
    $CounterStart = $PageNo - ($PageSize - 1);
}else{
    $CounterStart = $PageNo - ($PageNo % $PageSize) + 1;
}

//Counter End
$CounterEnd = $CounterStart + ($PageSize - 1);
?>

<script language="javascript">
function deleteid(str)
{
	if(confirm("Are you sure to delete??"))
	{
		document.form1.id.value=str;
		document.form1.process.value="delete";
		document.form1.submit();
	}	
}
function approve(ids,sta)
{
	if(confirm("Are you sure change the status??"))
	{
		document.form1.id.value=ids;
		document.form1.status.value=sta;
		document.form1.process.value="approve";
		document.form1.submit();
	}	
}
function checkg()
{
		document.form1.action="index.php?pagesv=mng_varieties";
		document.form1.submit();
		return true;
		
}
function checkg2(strp)
{
		var strp;
		document.form1.action="index.php?pagesv=mng_varieties&listperpage="+strp;
		document.form1.submit();
		return true;
		
}
 
</script>

<form name="form1" method="post" action="">
<?
	 
			
			$TRecord = mysql_query("SELECT * FROM product_variety  ORDER BY variety_name asc ");
			 $result = mysql_query("SELECT * FROM product_variety  ORDER BY variety_name asc LIMIT $StartRow,$PageSize");
			
			 //Total of record
			 $RecordCount = mysql_num_rows($TRecord);
			
			 //Set Maximum Page
			 $MaxPage = $RecordCount % $PageSize;
			 if($RecordCount % $PageSize == 0){
				$MaxPage = $RecordCount / $PageSize;
			 }else{
				$MaxPage = ceil($RecordCount / $PageSize);
			 }
?>
 
<table width="93%"  border="0" align="center" cellpadding="3" cellspacing="0" bordercolor="#EAEAEA" class="page-head-black" >
          <tr>
            <td width="5%" align="left"><strong><img src="otherimages/user.png" width="48" height="48"></strong></td>
            <td width="14%" align="left"><strong>Varieties List</strong></td>
            <td width="65%" align="center">
              <?=$msg?>
            </td>
            <td width="16%" align="right"> 
              <input name="status" type="hidden" id="status">
              <input name="id" type="hidden" id="id">
              <input name="process" type="hidden" id="process">
            </td>
          </tr>
  </table>
        <br>
        <table width="93%"  border="0" align="center" cellpadding="3" cellspacing="2" bordercolor="#F7F7F7" class="tbtxt"  >
          <tr align="right">
            <td colspan="6"><?php print "<strong>$RecordCount</strong> record(s) founds - You are at page <strong>$PageNo</strong>  of <strong>$MaxPage</strong>" ?></td>
          </tr>
          <tr align="right">
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr align="right">
            <td colspan="6"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="48%" align="left"><a href="index.php?pagesv=varieties&action=add"><img src="otherimages/new.png" alt="Add New" width="32" height="32" border="0"></a></td>
                <td width="52%"><div align="right">
                  
                  List Per page<select name="listperpage" onchange="checkg2(this.value);">
                    <option value="">--</option>                  
                  <option value="25" <?php if($_REQUEST['listperpage']=='25'){ echo "selected"; }?>>25</option>
                  <option value="75" <?php if($_REQUEST['listperpage']=='75'){ echo "selected"; }?>>50</option>
                  <option value="100" <?php if($_REQUEST['listperpage']=='100'){ echo "selected"; }?>>100</option>
                  <option value="150" <?php if($_REQUEST['listperpage']=='150'){ echo "selected"; }?>>150</option>
                  <option value="200" <?php if($_REQUEST['listperpage']=='200'){ echo "selected"; }?>>200</option>
                  </select>
                </div></td>
              </tr>
            </table>
              </td>
          </tr>
          <tr align="left" bgcolor="#205594" class="style2">
            <td width="6%" ><strong>S.No</strong></td>
            <td width="13%" ><strong>Category</strong></td>
            <td width="13%" bgcolor="#205594" ><strong>Product</strong></td>
            <td width="7%" ><strong>Location</strong></td>
            <td width="13%" ><strong>Variety name</strong></td>
            <td width="22%" align="center" ><strong>Action</strong></td>
          </tr>
       <?php
		$i = 1;
		  
		while ($row = mysql_fetch_array($result)) {
			$bil = $i + ($PageNo-1)*$PageSize;
		?>
          <tr align="left" bgcolor="#EDFEE2">
            <td valign="top"><?php echo $i;?></td>
            <td valign="top"><?php echo catdetails($row['product_cat_id']);?></td>
            <td valign="top" bgcolor="#EDFEE2"><?php echo productdetails($row['product_id']);?></td>
            <td valign="top"><?php echo citydetails($row['cityID']);  ?></td>
            <td valign="top"><?php echo $row['variety_name'];?></td>
            <td align="center" valign="top">
                      
            <a class="style1" href="index.php?pagesv=varieties&action=edit&variety_id=<?=$row['variety_id'];?>"><img src="otherimages/edit.gif" alt="Edit" width="15" height="15" border="0"></a> 
			
			&nbsp;|&nbsp;<a href="#"  onClick="deleteid('<?=$row['variety_id'];?>')" class="ved11px"><img src="otherimages/b_drop.png" alt="Delete" width="16" height="16" border="0"></a></td>
          </tr>
           <?php
			  $i++;
			}?>
          <tr bgcolor="#205594" >
            <td colspan="6" ><div align="center" class="style2">
      
      <?php
        //Print First & Previous Link is necessary
        if($CounterStart != 1){
            $PrevStart = $CounterStart - 1;
            print "<a href=index.php?listperpage=".$_REQUEST['listperpage']."&selectg=".$vs."&pagesv=mng_varieties&PageNo=1>First</a>&nbsp;";
            print "<a href=index.php?listperpage=".$_REQUEST['listperpage']."&selectg=".$vs."&pagesv=mng_varieties&PageNo=$PrevStart>Previous</a>";
        }
        print " [ ";
        $c = 0;

        //Print Page No
        for($c=$CounterStart;$c<=$CounterEnd;$c++){
            if($c < $MaxPage){
                if($c == $PageNo){
                    if($c % $PageSize == 0){
                        print "$c ";
                    }else{
                        print "$c | ";
                    }
                }elseif($c % $PageSize == 0){
                    echo "<a href=index.php?listperpage=".$_REQUEST['listperpage']."&selectg=".$vs."&pagesv=mng_varieties&PageNo=$c>$c</a> ";
                }else{
                    echo "<a href=index.php?listperpage=".$_REQUEST['listperpage']."&selectg=".$vs."&pagesv=mng_varieties&PageNo=$c>$c</a> | ";
                }//END IF
            }else{
                if($PageNo == $MaxPage){
                    print "$c ";
                    break;
                }else{
                    echo "<a href=index.php?listperpage=".$_REQUEST['listperpage']."&selectg=".$vs."&pagesv=mng_varieties&PageNo=$c>$c</a> ";
                    break;
                }//END IF
            }//END IF
       }//NEXT

      echo "] ";

      if($CounterEnd < $MaxPage){
          $NextPage = $CounterEnd + 1;
          echo "<a href=index.php?listperpage=".$_REQUEST['listperpage']."&selectg=".$vs."&pagesv=mng_varieties&PageNo=$NextPage>Next</a>";
      }
      
      //Print Last link if necessary
      if($CounterEnd < $MaxPage){
       $LastRec = $RecordCount % $PageSize;
        if($LastRec == 0){
            $LastStartRecord = $RecordCount - $PageSize;
        }
        else{
            $LastStartRecord = $RecordCount - $LastRec;
        }

        print " ";
        echo "<a href=index.php?listperpage=".$_REQUEST['listperpage']."&selectg=".$vs."&pagesv=mng_varieties&PageNo=$MaxPage>Last</a>";
        }
      ?>
            </div>
            </td>
          </tr>
  </table>
   
</form>