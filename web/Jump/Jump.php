<?php $path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php"); ?>
<head>
    <link type="text/css" rel="stylesheet" href="../Jump/Jump.css">
</head>
<title>The Code</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
	<td id="leftcolumn">
	    <div id="leftmenu">
		<ul style="list-style: none">
		    <li style="padding-top: 15px">
			<a>Jump Game</a>
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
                <div style="text-align: center; padding: 20px;">
                    Piece Colors
                    <table border="0" style="margin-right: auto; margin-left: auto;">
                        <tr>
                            <td><div class="piececolor" id="c1" style="background-color: red; margin: 5px;"></div></td>
                            <td><div class="piececolor" id="c2" style="background-color: slateblue; margin: 5px;"></div></td>
                            <td><div class="piececolor" id="c3" style="background-color: green; margin: 5px;"></div></td>
                            <td><div class="piececolor" id="c4" style="background-color: black; margin: 5px;"></div></td>
                        </tr>
                    </table>
                    Background Colors
                    <table border="0" style="margin-right: auto; margin-left: auto;">
                        <tr>
                            <td><div class="backcolor" id="c5" style="background-color: blue; margin: 5px;"></div></td>
                            <td><div class="backcolor" id="c6" style="background-color: tan; margin: 5px;"></div></td>
                            <td><div class="backcolor" id="c7" style="background-color: gray; margin: 5px;"></div></td>
                            <td><div class="backcolor" id="c8" style="background-color: orange; margin: 5px;"></div></td>
                        </tr>
                    </table>
                </div>
                <?php include("../Comments/commentbox.php"); ?>
	    </div>
	</td>
    </tr>
</table>
<script type="text/javascript" defer="defer" src="Jump.js"></script>
<?php include("../Setup/footer.php"); ?>