<?php $path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php"); ?>
<title>The Game</title>
<?php include("../Setup/header.php"); ?>
<head>
    <link type="text/css" rel="stylesheet" href="../ConnectFour/ConnectFour.css">
    <style type="text/css">
	#sidebuttons:hover {color: #2f8be8; cursor: pointer}
    </style>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
	<td id="leftcolumn">
	    <div id="leftmenu">
		<ul style="list-style: none">
		    <li style="padding-top: 15px">
			<a href="#connectfourlabel">Connect Four</a>
			<ul>
			    <li><div id="sidebuttons" onclick="mode=0; reset(); buttons.style.display='block'; buttons2.style.display='none'; $.resetleft()">Play Computer</div></li>
			    <li><div id="sidebuttons" onclick="mode=1; reset(); buttons.style.display='none'; buttons2.style.display='none'; $.resetleft()">Play Human</div></li>
			    <li><div id="sidebuttons" onclick="mode=2; reset(); buttons.style.display='none'; buttons2.style.display='block'; $.resetleft()">Computer Trials</div></li>
			</ul>
		    </li>
		</ul>
	    </div>
	</td><td width="3%"></td>
	<td id="rightcolumn" style="width: 1100px">
	    <div id="rightcontent">
		<h1 style="text-align: center; padding-bottom: 10px">Connect Four With Friends!</h1>
		<div style="padding: 10px">
		    <div  style="width: 350px; margin-left: auto; margin-right: auto; padding: 20px; background-color: tan; border-radius: 6px">
			<table border="0">
			    <?php
			    $squareNum = 8;
			    for ($row = 0; $row < 6; $row++) {
				echo "<tr>";
				for ($col = 0; $col < 7; $col++) {
				    echo "<td style='padding-left: 5px; padding-right: 5px;'><div class='piece' id='sqr";
				    echo $squareNum;
				    echo "'></td>";
				    $squareNum++;
                    }
                    echo "</tr>";
                }
                ?>
			</table>
		    </div>
		</div>
                <div id="submit" style="display: none; text-align: center;">
                    <form action="../ConnectFour/SubmitMove.php" method="post">
                        <input id="hiddenMove" type="hidden" name="move" value="">
                        <input type="submit" />
                    </form>
                </div>
	    </div>
	</td>
    </tr>
</table>
<script>
    $(".piece").click(function () {
	var idName=$(this).attr("id");
	var num=(parseInt(idName.substring(3))-8)%7;
	previewMove(idName,num);
    });
</script>
<script type="text/javascript" defer="defer" src="ConnectFour.js"></script>
<?php include("../Setup/footer.php"); ?>