<?php include("../Setup/preheader.php"); ?>
<title>Connect Four</title>
<?php include("../Setup/header.php"); ?>
<h1>No chess yet</h1>
<!-- begin htmlcommentbox.com -->
<!--<div id="HCB_comment_box" style="text-align: left">
    <a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...
</div>
<link rel="stylesheet" type="text/css" href="http://www.htmlcommentbox.com/static/skins/default/skin.css" />
<script type="text/javascript" language="javascript" id="hcb">
    /*<!--*/ if(!window.hcb_user){hcb_user={  };}
    (function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((window.hcb_user && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&opts=470&num=10");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})();
</script>-->
<!--<div>
    <?php
	$con = mysql_connect('localhost', 'root', 'lambda30panda') or die(mysql_error());
	mysql_select_db("comments", $con);
	$time=getdate();
	$query = "SELECT * FROM test_comments WHERE comment_num=1 LIMIT 1";
	$results = mysql_query($query) or die(mysql_error());
	print_r($results);
	echo $results[author];
    ?>-->
</div>
<!-- end htmlcommentbox.com -->
<?php $path_parts = pathinfo(__FILE__); include("../Setup/footer.php"); ?>