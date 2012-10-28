<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
<title>Stratego</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link type="text/css" rel="stylesheet" href="../Stratego/Stratego.css">
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
		<h1 style="text-align: center">Stratego</h1>
		<table border="1" id="gameBoard">
		    <?php
		    for ($i = 0; $i < 10; $i++) {
			echo "<tr>";
			for ($j = 0; $j < 10; $j++) {
			    echo "<td><div class='space' id='";
			    echo $i;
			    echo $j;
			    echo "'></div></td>";
			}
			echo "</tr>";
		    }
		    ?>
		</table>
		<div id="availablePieces">
		    <button type="button" onclick="finishedPlacing()">Finished Placing Pieces</button>
		    <table style="margin-left: auto; margin-right: auto;">
			<tr>
			    <td><div class="piecesLeft" id="piecesLeft1">1</div><div class="space2">1</div></td>
			    <td><div class="piecesLeft" id="piecesLeft2">1</div><div class="space2">2</div></td>
			    <td><div class="piecesLeft" id="piecesLeft3">2</div><div class="space2">3</div></td>
			    <td><div class="piecesLeft" id="piecesLeft4">3</div><div class="space2">4</div></td>
			    <td><div class="piecesLeft" id="piecesLeft5">4</div><div class="space2">5</div></td>
			    <td><div class="piecesLeft" id="piecesLeft6">4</div><div class="space2">6</div></td>
			    <td><div class="piecesLeft" id="piecesLeft7">4</div><div class="space2">7</div></td>
			    <td><div class="piecesLeft" id="piecesLeft8">5</div><div class="space2">8</div></td>
			    <td><div class="piecesLeft" id="piecesLeft9">8</div><div class="space2">9</div></td>
			    <td><div class="piecesLeft" id="piecesLeftS">1</div><div class="space2">S</div></td>
			    <td><div class="piecesLeft" id="piecesLeftB">6</div><div class="space2">B</div></td>
			    <td><div class="piecesLeft" id="piecesLeftF">1</div><div class="space2">F</div></td>
			</tr>
		    </table>
		</div>
	    </div>
	</td>
    </tr>
</table>
<script>
    var lakeColor="brown";
    var placementColor="blue";
    var backgroundColor="lightgreen";
    var playerColor="lightblue";
<?php
for ($i = 0; $i < 6; $i++) {
    for ($j = 0; $j < 10; $j++) {
	echo "$('#";
	echo $i;
	echo $j;
	echo "').css('background-color',backgroundColor);";
    };
};
?>
    $("#42").css("background-color",lakeColor);
    $("#43").css("background-color",lakeColor);
    $("#52").css("background-color",lakeColor);
    $("#53").css("background-color",lakeColor);
    $("#46").css("background-color",lakeColor);
    $("#47").css("background-color",lakeColor);
    $("#56").css("background-color",lakeColor);
    $("#57").css("background-color",lakeColor);
<?php
for ($i = 6; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
	echo "$('#";
	echo $i;
	echo $j;
	echo "').css('background-color',placementColor);";
    };
};
?>
    var selectedPiece="";
    $(".space2").click(function () {
	selectedPiece=$(this).text();
    });
    var gameStage=0;
    function finishedPlacing() {
	var done=true;
	for (var i=6; i<10; i++) {
	    for (var j=0; j<10; j++) {
		if (getColor("#"+String(i)+String(j))==placementColor) {
		    done=false;
		    break;
		}
	    }
	    if (!done) {
		break;
	    }
	}
	if (done) {
	    gameStage=1;
	    $("#availiblePieces").css("display","none");
	}
    }
    function getColor(idName) {
	var element=document.getElementById(idName);
	var style=window.getComputedStyle(element,"");
	var x=style.getPropertyValue("background-color");
	return hexc(x)
    }
    function hexc(colorval) {
	var color='';
	var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	delete(parts[0]);
	for (var i = 1; i <= 3; ++i) {
	    parts[i] = parseInt(parts[i]).toString(16);
	    if (parts[i].length == 1) parts[i] = '0' + parts[i];
	}
	color = '#' + parts.join('');
	return color
    }
</script>
<?php include("../Setup/footer.php"); ?>