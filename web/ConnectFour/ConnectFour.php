<?php $path_parts = pathinfo(__FILE__); include("../Setup/preheader.php"); ?>
<title>The Game</title>
<?php include("../Setup/header.php"); ?>
<head>
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
	<td id="rightcolumn">
	    <div id="rightcontent">
		<h1 style="text-align: center; padding-bottom: 10px">Connect Four</h1>
		<div style="text-align: center">
		    <button type="button" onclick="reset(); currentPiece=' X '; piece=' X '; compPiece=' O '">Red</button>
		    <button type="button" onclick="reset(); currentPiece=' O '; piece=' O '; compPiece=' X '">Blue</button>
		    <button type="button" onclick="reset()">Reset</button><br />
		</div>
		<script>
		    var currentPiece = " X "
		    var compPiece = " O "
		    var piece = " X "
		    var turnNum = 0
		    var mode=0
		    var turnsAhead = 5; var turnsAhead1 = 5; var turnsAhead2 = 5
		    var ratio = .3; var ratio1 = .3; var ratio2 = .3;
		    var winPoints = 2.5; var winPoints1 = 2.5; var winPoints2 = 2.5
		    var tiePoints = 0; var tiePoints1 = 0; var tiePoints2 = 0
		    var lossPoints = -10; var lossPoints1 = -10; var lossPoints2 = -10
		    var board = [[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "]]
		    var tempBoard=[[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "],
			[" "," "," "," "," "," "," "]]
		    CopyArray(board, tempBoard)
		    var move
		    var win=false
		    var turnDone=false
		    var gameOver=false
		</script>
		<div style="padding: 10px">
		    <div style="width: 308px; margin-left: auto; margin-right: auto; padding: 20px; background-color: tan; border-radius: 6px">
			<div style="text-align: center; height: 40px;">
			    <div class="piece" id="sqr8" style="float: left" onClick="buttonClicked('sqr8', 0)"></div><div class="space"></div>
			    <div class="piece" id="sqr9" style="float: left" onClick="buttonClicked('sqr9', 1)"></div><div class="space"></div>
			    <div class="piece" id="sqr10" style="float: left" onClick="buttonClicked('sqr10', 2)"></div><div class="space"></div>
			    <div class="piece" id="sqr11" style="float: left" onClick="buttonClicked('sqr11', 3)"></div><div class="space"></div>
			    <div class="piece" id="sqr12" style="float: left" onClick="buttonClicked('sqr12', 4)"></div><div class="space"></div>
			    <div class="piece" id="sqr13" style="float: left" onClick="buttonClicked('sqr13', 5)"></div><div class="space"></div>
			    <div class="piece" id="sqr14" style="float: left" onClick="buttonClicked('sqr14', 6)"></div><div class="space"></div>
			</div>
			<div style="text-align: center; height: 40px;">
			    <div class="piece" id="sqr15" style="float: left" onClick="buttonClicked('sqr15', 0)"></div><div class="space"></div>
			    <div class="piece" id="sqr16" style="float: left" onClick="buttonClicked('sqr16', 1)"></div><div class="space"></div>
			    <div class="piece" id="sqr17" style="float: left" onClick="buttonClicked('sqr17', 2)"></div><div class="space"></div>
			    <div class="piece" id="sqr18" style="float: left" onClick="buttonClicked('sqr18', 3)"></div><div class="space"></div>
			    <div class="piece" id="sqr19" style="float: left" onClick="buttonClicked('sqr19', 4)"></div><div class="space"></div>
			    <div class="piece" id="sqr20" style="float: left" onClick="buttonClicked('sqr20', 5)"></div><div class="space"></div>
			    <div class="piece" id="sqr21" style="float: left" onClick="buttonClicked('sqr21', 6)"></div><div class="space"></div>
			</div>
			<div style="text-align: center; height: 40px;">
			    <div class="piece" id="sqr22" style="float: left" onClick="buttonClicked('sqr22', 0)"></div><div class="space"></div>
			    <div class="piece" id="sqr23" style="float: left" onClick="buttonClicked('sqr23', 1)"></div><div class="space"></div>
			    <div class="piece" id="sqr24" style="float: left" onClick="buttonClicked('sqr24', 2)"></div><div class="space"></div>
			    <div class="piece" id="sqr25" style="float: left" onClick="buttonClicked('sqr25', 3)"></div><div class="space"></div>
			    <div class="piece" id="sqr26" style="float: left" onClick="buttonClicked('sqr26', 4)"></div><div class="space"></div>
			    <div class="piece" id="sqr27" style="float: left" onClick="buttonClicked('sqr27', 5)"></div><div class="space"></div>
			    <div class="piece" id="sqr28" style="float: left" onClick="buttonClicked('sqr28', 6)"></div><div class="space"></div>
			</div>
			<div style="text-align: center; height: 40px;">
			    <div class="piece" id="sqr29" style="float: left" onClick="buttonClicked('sqr29', 0)"></div><div class="space"></div>
			    <div class="piece" id="sqr30" style="float: left" onClick="buttonClicked('sqr30', 1)"></div><div class="space"></div>
			    <div class="piece" id="sqr31" style="float: left" onClick="buttonClicked('sqr31', 2)"></div><div class="space"></div>
			    <div class="piece" id="sqr32" style="float: left" onClick="buttonClicked('sqr32', 3)"></div><div class="space"></div>
			    <div class="piece" id="sqr33" style="float: left" onClick="buttonClicked('sqr33', 4)"></div><div class="space"></div>
			    <div class="piece" id="sqr34" style="float: left" onClick="buttonClicked('sqr34', 5)"></div><div class="space"></div>
			    <div class="piece" id="sqr35" style="float: left" onClick="buttonClicked('sqr35', 6)"></div><div class="space"></div>
			</div>
			<div style="text-align: center; height: 40px;">
			    <div class="piece" id="sqr36" style="float: left" onClick="buttonClicked('sqr36', 0)"></div><div class="space"></div>
			    <div class="piece" id="sqr37" style="float: left" onClick="buttonClicked('sqr37', 1)"></div><div class="space"></div>
			    <div class="piece" id="sqr38" style="float: left" onClick="buttonClicked('sqr38', 2)"></div><div class="space"></div>
			    <div class="piece" id="sqr39" style="float: left" onClick="buttonClicked('sqr39', 3)"></div><div class="space"></div>
			    <div class="piece" id="sqr40" style="float: left" onClick="buttonClicked('sqr40', 4)"></div><div class="space"></div>
			    <div class="piece" id="sqr41" style="float: left" onClick="buttonClicked('sqr41', 5)"></div><div class="space"></div>
			    <div class="piece" id="sqr42" style="float: left" onClick="buttonClicked('sqr42', 6)"></div><div class="space"></div>
			</div>
			<div style="text-align: center; height: 40px;">
			    <div class="piece" id="sqr43" style="float: left" onClick="buttonClicked('sqr43', 0)"></div><div class="space"></div>
			    <div class="piece" id="sqr44" style="float: left" onClick="buttonClicked('sqr44', 1)"></div><div class="space"></div>
			    <div class="piece" id="sqr45" style="float: left" onClick="buttonClicked('sqr45', 2)"></div><div class="space"></div>
			    <div class="piece" id="sqr46" style="float: left" onClick="buttonClicked('sqr46', 3)"></div><div class="space"></div>
			    <div class="piece" id="sqr47" style="float: left" onClick="buttonClicked('sqr47', 4)"></div><div class="space"></div>
			    <div class="piece" id="sqr48" style="float: left" onClick="buttonClicked('sqr48', 5)"></div><div class="space"></div>
			    <div class="piece" id="sqr49" style="float: left" onClick="buttonClicked('sqr49', 6)"></div><div class="space"></div>
			</div>
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
    $(document).ready(function(){
	$("#leftmenu").height($("#rightcontent").height())
	
    });
    $.resetleft=function(){
	$("#leftmenu").height($("#rightcontent").height())
    }
</script>
<script type="text/javascript" defer="defer" src="ConnectFour.js"></script>
<?php include("../Setup/footer.php"); ?>