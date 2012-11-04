<?php $path_parts = pathinfo(__FILE__); include("../Setup/preheader.php"); ?>
<title>The Game</title>
<?php include("../Setup/header.php"); ?>
<head>
    <link type="text/css" rel="stylesheet" href="../ConnectFour/ConnectFour.css">
    <style type="text/css">
	#sidebuttons:hover {color: #2f8be8; cursor: pointer}
    </style>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table border="0">
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
		<h1 style="text-align: center; padding-bottom: 10px">Connect Four</h1>
		<div style="text-align: center">
		    <button type="button" onclick="reset(); currentPiece=' X '; piece=' X '; compPiece=' O '">Red</button>
		    <button type="button" onclick="reset(); currentPiece=' O '; piece=' O '; compPiece=' X '">Blue</button>
		    <button type="button" onclick="computerMoveFirst(moveYet)">Computer First</button>
		    <button type="button" onclick="reset()">Reset</button><br />
		</div>
		<div style="padding: 10px">
		    <div  style="width: 350px; margin-left: auto; margin-right: auto; padding: 20px; background-color: tan; border-radius: 6px">
		    <table border="0">
			<?php 
			$squareNum=8;
			for ($row=0; $row<6; $row++) {
			    echo "<tr>";
			    for ($col=0; $col<7; $col++) {
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
		<div id="buttons" style="text-align:center">
		    <table width="500" border="0" cellspacing="10" style="margin-left: auto; margin-right: auto; table-layout:fixed">
			<col width=100><col width=100><col width=100><col width=100><col width=100>
			<tr>
			    <td></td><td></td>
			    <td><div class="clickable" onclick="setDefault()">Reset Values</div></td>
			    <td></td><td></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div class="buttonNames">Turns Ahead</div></td>
			    <td style="padding: 3px"><div class="buttonNames">Ratio</div></td>
			    <td style="padding: 3px"><div class="buttonNames">Win Points</div></td>
			    <td style="padding: 3x"><div class="buttonNames">Tie Points</div></td>
			    <td style="padding: 3px"><div class="buttonNames">Loss Points</div></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div class="arrow-up" onclick="if (turnsAhead<6) {turnsAhead+=1; $('#turns-ahead').text(turnsAhead)}"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="ratio+=.05; $('#ratio').text(ratio.toFixed(2))"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="winPoints+=.5; $('#win-points').text(winPoints)"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="tiePoints+=.5; $('#tie-points').text(tiePoints)"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="lossPoints+=.5; $('#loss-points').text(lossPoints)"></div></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div id="turns-ahead" style="text-align: center">5</div></td>
			    <td style="padding: 3px"><div id="ratio" style="text-align: center">0.3</div></td>
			    <td style="padding: 3px"><div id="win-points" style="text-align: center">2.5</div></td>
			    <td style="padding: 3px"><div id="tie-points" style="text-align: center">0</div></td>
			    <td style="padding: 3px"><div id="loss-points" style="text-align: center">-10</div></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div class="arrow-down" onclick="if (turnsAhead>1) {turnsAhead-=1; $('#turns-ahead').text(turnsAhead)}"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="if (ratio>.1) {ratio-=.05; $('#ratio').text(ratio.toFixed(2))}"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="winPoints-=.5; $('#win-points').text(winPoints)"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="tiePoints-=.5; $('#tie-points').text(tiePoints)"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="lossPoints-=.5; $('#loss-points').text(lossPoints)"></div></td>
			</tr>
		    </table>
		</div>
		<div id="buttons2" style="text-align:center; display: none">
		    <table width="500" border="0" cellspacing="10" style="margin-left: auto; margin-right: auto; table-layout:fixed">
			<col width=100><col width=100><col width=100><col width=100><col width=100>
			<tr>
			    <td></td>
			    <td><div class="clickable" onclick="setAllDefault()">Reset Values</div></td>
			    <td></td>
			    <td><div class="clickable" onclick="runTrials()">Next Round</div></td>
			    <td></td>
			</tr>
			<tr>
			    <td></td><td></td>
			    <td><div style="text-align: center">Red</div></td>
			    <td></td><td></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div class="buttonNames">Turns Ahead</div></td>
			    <td style="padding: 3px"><div class="buttonNames">Ratio</div></td>
			    <td style="padding: 3px"><div class="buttonNames">Win Points</div></td>
			    <td style="padding: 3x"><div class="buttonNames">Tie Points</div></td>
			    <td style="padding: 3px"><div class="buttonNames">Loss Points</div></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div class="arrow-up" onclick="if (turnsAhead1<6) {turnsAhead1+=1; $('#turns-ahead1').text(turnsAhead1)}"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="ratio1+=.05; $('#ratio1').text(ratio1.toFixed(2))"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="winPoints1+=.5; $('#win-points1').text(winPoints1)"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="tiePoints1+=.5; $('#tie-points1').text(tiePoints1)"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="lossPoints1+=.5; $('#loss-points1').text(lossPoints1)"></div></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div id="turns-ahead1" style="text-align: center">5</div></td>
			    <td style="padding: 3px"><div id="ratio1" style="text-align: center">0.3</div></td>
			    <td style="padding: 3px"><div id="win-points1" style="text-align: center">2.5</div></td>
			    <td style="padding: 3px"><div id="tie-points1" style="text-align: center">0</div></td>
			    <td style="padding: 3px"><div id="loss-points1" style="text-align: center">-10</div></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div class="arrow-down" onclick="if (turnsAhead1>1) {turnsAhead1-=1; $('#turns-ahead1').text(turnsAhead1)}"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="if (ratio1>.1) {ratio1-=.05; $('#ratio1').text(ratio1.toFixed(2))}"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="winPoints1-=.5; $('#win-points1').text(winPoints1)"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="tiePoints1-=.5; $('#tie-points1').text(tiePoints1)"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="lossPoints1-=.5; $('#loss-points1').text(lossPoints1)"></div></td>
			</tr>
			<tr>
			    <td></td><td></td>
			    <td style="padding:3px"><div style="text-align: center">Blue</div></td>
			    <td></td><td></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div class="buttonNames">Turns Ahead</div></td>
			    <td style="padding: 3px"><div class="buttonNames">Ratio</div></td>
			    <td style="padding: 3px"><div class="buttonNames">Win Points</div></td>
			    <td style="padding: 3x"><div class="buttonNames">Tie Points</div></td>
			    <td style="padding: 3px"><div class="buttonNames">Loss Points</div></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div class="arrow-up" onclick="if (turnsAhead2<6) {turnsAhead2+=1; $('#turns-ahead2').text(turnsAhead2)}"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="ratio2+=.05; $('#ratio2').text(ratio2.toFixed(2))"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="winPoints2+=.5; $('#win-points2').text(winPoints2)"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="tiePoints2+=.5; $('#tie-points2').text(tiePoints2)"></div></td>
			    <td style="padding: 3px"><div class="arrow-up" onclick="lossPoints2+=.5; $('#loss-points2').text(lossPoints2)"></div></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div id="turns-ahead2" style="text-align: center">5</div></td>
			    <td style="padding: 3px"><div id="ratio2" style="text-align: center">0.3</div></td>
			    <td style="padding: 3px"><div id="win-points2" style="text-align: center">2.5</div></td>
			    <td style="padding: 3px"><div id="tie-points2" style="text-align: center">0</div></td>
			    <td style="padding: 3px"><div id="loss-points2" style="text-align: center">-10</div></td>
			</tr>
			<tr>
			    <td style="padding: 3px"><div class="arrow-down" onclick="if (turnsAhead2>1) {turnsAhead2-=1; $('#turns-ahead2').text(turnsAhead2)}"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="if (ratio2>.1) {ratio2-=.05; $('#ratio2').text(ratio2.toFixed(2))}"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="winPoints2-=.5; $('#win-points2').text(winPoints2)"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="tiePoints2-=.5; $('#tie-points2').text(tiePoints2)"></div></td>
			    <td style="padding: 3px"><div class="arrow-down" onclick="lossPoints2-=.5; $('#loss-points2').text(lossPoints2)"></div></td>
			</tr>
		    </table>
		</div>
		<?php include("../Comments/commentbox.php"); ?>
	    </div>
	</td>
    </tr>
</table>
<script>
    $(".piece").click(function () {
	var idName=$(this).attr("id");
	var num=(parseInt(idName.substring(3))-8)%7;
	buttonClicked(idName,num);
    });
</script>
<script type="text/javascript" defer="defer" src="ConnectFour.js"></script>
<?php include("../Setup/footer.php"); ?>