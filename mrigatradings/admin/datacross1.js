// JavaScript Document

var blankImage="images/blank.gif";
var isHorizontal=1;
var menuWidth="190";
var absolutePos=0;
var posX=0;
var posY=0;
var floatable=0;
var floatIterations=0;

var movable=0;
var moveCursor="default";
var moveImage="";

var moveWidth=0;
var moveHeight=0;
var fontStyle="bold 12px arial";
var fontColor=["#ffffff","#ffffff"];
var fontDecoration=["none","none"];

var itemBackColor=["",""];
var itemBorderWidth=0;
var itemAlign="left";
var itemBorderColor=["#DBDFE8","#333333"];
var itemBorderStyle=["solid","solid"];
var itemBackImage=["images/menu1bg.gif","images/menu1abg.gif"];
var itemSpacing=0;
var itemPadding=5;

var itemCursor="hand";
var itemTarget="_self";

var iconTopWidth=0;
var iconTopHeight=0;
var iconWidth=0;
var iconHeight=0;
var menuBackImage="";
var menuBackColor="#000000";
var menuBorderColor="#ffffff";
var menuBorderStyle=[""];
var menuBorderWidth=0;
var subMenuAlign="left";



var transparency=100;
var transition=26;
var transDuration=10;
var shadowColor="#606060";
var shadowLen=0;
var arrowImageMain=["",""];
var arrowImageSub=["images/blank.gif","img/arrow1_o.gif"];
var arrowWidth=7;
var arrowHeight=7;


var separatorImage="images/blank.gif";
var separatorWidth="100%";
var separatorHeight="1";
var separatorAlignment="";
var separatorVImage="";
var separatorVWidth="0";
var separatorVHeight="100%";
var statusString="link";
var pressedItem=-2;

var itemStyles = [
   ["fontStyle=bold 10px Tahoma","itemBackImage=images/blank.gif,images/menubgstrip.gif",],
   ["itemBackColor=#DBDFE8,#81A4E3","itemBorderColor=#ffffff,#ffffff","menuBorderColor=#ffffff"],
   ["itemBackColor=#BAFF17,#FF962D",],
   
];

var menuStyles = [
				   ["menuBorderColor=#25AD12",],
  
   
  
   
];

var menuItems = [
  /* ["&nbsp;&nbsp;Home&nbsp;&nbsp;","index.php","","","Home",,,],*/
   ["&nbsp;&nbsp;User Manager&nbsp;&nbsp;","","","","User Manager",,,],
   ["|Admin User&nbsp;","index.php?pagesv=mng_users",,,,],
  /* ["|Registerd User&nbsp;","index.php?pagesv=mng_pregister",,,,],
   ["&nbsp;&nbsp;Manage Place(s)&nbsp;&nbsp;","","","","Manage place(s)",,,],
   ["|Manage Country(s)&nbsp;","index.php?pagesv=mng_country",,,,],
   ["|Manage State(s)&nbsp;","index.php?pagesv=mng_state",,,,],
   ["|Manage City(s)&nbsp;","index.php?pagesv=mng_city",,,,],  */
 
   
   /*["&nbsp;&nbsp;Property&nbsp;&nbsp;","","","","Property",,,],
   ["|Manage Property Type&nbsp;","index.php?pagesv=mng_ptype",,,,],
   ["|Registed Inidividual Property&nbsp;","index.php?pagesv=mng_property",,,,,],
   ["|Registed Multi Property&nbsp;","index.php?pagesv=mng_mproperty",,,,,],
   ["|Property Photo(s)&nbsp;","index.php?pagesv=mng_pphotos",,,,,],
   ["|Property Video(s)&nbsp;","index.php?pagesv=mng_pvideos",,,,,],
   ["|Theme(s)","index.php?pagesv=mng_theme",,,,,], */  
   
   /*["&nbsp;&nbsp;VDC&nbsp;&nbsp;","","","","Virtual Development Center",,,],
   ["|Full&nbsp;time&nbsp;developer","outs_fulltimedev.html",,,,,],
   ["|Full&nbsp;time&nbsp;web&nbsp;desinger","outs_fulltimeweb.html",,,,,],
   ["|Full&nbsp;time&nbsp;SEO","outs_fulltimeseo.html",,,,,],
   ["&nbsp;&nbsp;Training&nbsp;&nbsp;","training.html","","","Training",,,],   
   ["&nbsp;&nbsp;Careers&nbsp;&nbsp;","careers.html","","","Careers",,,],
   ["&nbsp;&nbsp;Clients&nbsp;","clients.html","","","Clients",,,],*/
   /*["&nbsp;&nbsp;CMS&nbsp;","","","","CMS",,,],
    ["|Manage Events Calendar&nbsp;","index.php?pagesv=view_events",,,,],
	["|Manage Property Booking&nbsp;","index.php?pagesv=mng_booking",,,,],*/
   ["&nbsp;&nbsp;Log Out&nbsp;","logout.php","","","Logout",,,],
   
	  
	

 //  ["&nbsp;&nbsp;Coming Soon&nbsp;&nbsp;","coming_soon.html","","","Coming Soon",,,],
  ];


//apy_initFrame("fset",0,1,0);
apy_init();
