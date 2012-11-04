<?php $path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php"); ?>
<head>
    <link type="text/css" rel="stylesheet" href="../Jump/Jump.css">
</head>
<title>The Code</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table border="0">
    <tr>
	<td id="leftcolumn">
	    <div id="leftmenu">
		<ul style="list-style: none">
		    <li style="padding-top: 15px">
			<a href="#connectfourlabel">Connect Four</a>
			<ul>
			    <li><a href="#backstory">Backstory</a></li>
			    <li><a href="#actualcode">The Actual Code</a></li>
			</ul>
		    </li>
		</ul>
	    </div>
	</td><td width="3%"></td>
	<td id="rightcolumn">
	    <div id="rightcontent">
		<h1 style="text-align: center">Jump Game</h1>
		<div style="text-align: left">
                    <table>
		    <?php 
                        for ($i=1; $i<6; $i++) {
                            echo "<table style='margin-left: auto; margin-right: auto;'><tr>";
                            for ($j=1; $j<=$i; $j++) {
                                echo "<td><div class='space' id='";
                                echo $i;
                                echo $j;
                                echo "'></td>";
                            }
                            echo "</tr></table>";
                        }
                    ?>
		</div>
	    </div>
	</td>
    </tr>
</table>
<script type="text/javascript" defer="defer" src="Jump.js"></script>
<?php include("../Setup/footer.php"); ?>