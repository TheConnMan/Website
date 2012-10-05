<?php include("../Setup/preheader.php"); ?>
<title>The Code</title>
<?php include("../Setup/header.php"); ?>
<head>
    <style type="text/css">
	#sidebuttons:hover {color: #2f8be8; cursor: pointer}
    </style>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table width="970" border="0">
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
		    var ratio = .3; var ratio1 = .3; var ratio2 = .3
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
		<div style="width: 280px; margin-left: auto; margin-right: auto; padding: 20px; background-color: tan">
		    <div style="text-align: center; height: 40px;">
			<div class="piece" id="sqr8" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr8')=='#ffffff') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr9" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr9')=='#ffffff') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr10" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr10')=='#ffffff') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr11" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr11')=='#ffffff') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr12" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr12')=='#ffffff') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr13" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr13')=='#ffffff') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr14" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr14')=='#ffffff') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
		    </div>
		    <div style="text-align: center; height: 40px;">
			<div class="piece" id="sqr15" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr8')=='#ffffff') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr16" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr9')=='#ffffff') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr17" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr10')=='#ffffff') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr18" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr11')=='#ffffff') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr19" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr12')=='#ffffff') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr20" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr13')=='#ffffff') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr21" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr14')=='#ffffff') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
		    </div>
		    <div style="text-align: center; height: 40px;">
			<div class="piece" id="sqr22" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr8')=='#ffffff') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr23" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr9')=='#ffffff') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr24" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr10')=='#ffffff') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr25" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr11')=='#ffffff') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr26" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr12')=='#ffffff') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr27" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr13')=='#ffffff') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr28" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr14')=='#ffffff') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
		    </div>
		    <div style="text-align: center; height: 40px;">
			<div class="piece" id="sqr29" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr8')=='#ffffff') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr30" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr9')=='#ffffff') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr31" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr10')=='#ffffff') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr32" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr11')=='#ffffff') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr33" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr12')=='#ffffff') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr34" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr13')=='#ffffff') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr35" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr14')=='#ffffff') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
		    </div>
		    <div style="text-align: center; height: 40px;">
			<div class="piece" id="sqr36" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr8')=='#ffffff') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr37" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr9')=='#ffffff') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr38" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr10')=='#ffffff') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr39" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr11')=='#ffffff') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr40" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr12')=='#ffffff') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr41" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr13')=='#ffffff') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr42" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr14')=='#ffffff') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
		    </div>
		    <div style="text-align: center; height: 40px;">
			<div class="piece" id="sqr43" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr8')=='#ffffff') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr44" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr9')=='#ffffff') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr45" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr10')=='#ffffff') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr46" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr11')=='#ffffff') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr47" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr12')=='#ffffff') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr48" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr13')=='#ffffff') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
			<div class="piece" id="sqr49" style="float: left" onClick="if (!gameOver) {move=-1; if (getColor('sqr14')=='#ffffff') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"></div>
		    </div>
		</div>
		<form name="buttonsArea" id="buttons" style="text-align: center">
		    <br />
		    <button class="settings" type="button" onclick="setDefault()">Reset Values</button><br />
		    <button class="settings" type="button">Turns Ahead</button>
		    <button class="settings" type="button">Ratio</button>
		    <button class="settings" type="button">Win Points</button>
		    <button class="settings" type="button">Tie Points</button>
		    <button class="settings" type="button">Loss Points</button><br />
		    <button class="settings" type="button" onclick="if (turnsAhead<7) {turnsAhead+=1; updateButtons()}">+</button>
		    <button class="settings" type="button" onclick="ratio+=.05; updateButtons()">+</button>
		    <button class="settings" type="button" onclick="winPoints+=.5; updateButtons()">+</button>
		    <button class="settings" type="button" onclick="tiePoints+=.5; updateButtons()">+</button>
		    <button class="settings" type="button" onclick="lossPoints+=.5; updateButtons()">+</button><br />
		    <INPUT TYPE="button" NAME="turns" class="settings" value=5>
		    <INPUT TYPE="button" NAME="ratioButton" class="settings" value=0.3>
		    <INPUT TYPE="button" NAME="win" class="settings" value=2.5>
		    <INPUT TYPE="button" NAME="tie" class="settings" value=0>
		    <INPUT TYPE="button" NAME="loss" class="settings" value=-10><br />
		    <button class="settings" type="button" onclick="if (turnsAhead>0) {turnsAhead-=1; updateButtons()}">-</button>
		    <button class="settings" type="button" onclick="if (ratio>0.01) {ratio-=.05; updateButtons()}">-</button>
		    <button class="settings" type="button" onclick="winPoints-=.5; updateButtons()">-</button>
		    <button class="settings" type="button" onclick="tiePoints-=.5; updateButtons()">-</button>
		    <button class="settings" type="button" onclick="lossPoints-=.5; updateButtons()">-</button>
		</form>
		<form name="buttonsAreaTrials" id="buttons2" style="text-align: center; display: none">
		    <br />
		    <button class="settings" type="button" onclick="setDefault()">Reset Values</button>
		    <button class="settings" type="button" onclick="runTrials()">Next Round</button><br /><br />
		    <button class="settings" type="button">Red</button><br />
		    <button class="settings" type="button">Turns Ahead</button>
		    <button class="settings" type="button">Ratio</button>
		    <button class="settings" type="button">Win Points</button>
		    <button class="settings" type="button">Tie Points</button>
		    <button class="settings" type="button">Loss Points</button><br />
		    <button class="settings" type="button" onclick="if (turnsAhead1<7) {turnsAhead1+=1; updateButtons()}">+</button>
		    <button class="settings" type="button" onclick="ratio1+=.05; updateButtons()">+</button>
		    <button class="settings" type="button" onclick="winPoints1+=.5; updateButtons()">+</button>
		    <button class="settings" type="button" onclick="tiePoints1+=.5; updateButtons()">+</button>
		    <button class="settings" type="button" onclick="lossPoints1+=.5; updateButtons()">+</button><br />
		    <INPUT TYPE="button" NAME="turns1" class="settings" value=5>
		    <INPUT TYPE="button" NAME="ratioButton1" class="settings" value=0.3>
		    <INPUT TYPE="button" NAME="win1" class="settings" value=2.5>
		    <INPUT TYPE="button" NAME="tie1" class="settings" value=0>
		    <INPUT TYPE="button" NAME="loss1" class="settings" value=-10><br />
		    <button class="settings" type="button" onclick="if (turnsAhead1>0) {turnsAhead1-=1; updateButtons()}">-</button>
		    <button class="settings" type="button" onclick="if (ratio1>0.01) {ratio1-=.05; updateButtons()}">-</button>
		    <button class="settings" type="button" onclick="winPoints1-=.5; updateButtons()">-</button>
		    <button class="settings" type="button" onclick="tiePoints1-=.5; updateButtons()">-</button>
		    <button class="settings" type="button" onclick="lossPoints1-=.5; updateButtons()">-</button><br /><br />
		    <button class="settings" type="button">Blue</button><br />
		    <button class="settings" type="button">Turns Ahead</button>
		    <button class="settings" type="button">Ratio</button>
		    <button class="settings" type="button">Win Points</button>
		    <button class="settings" type="button">Tie Points</button>
		    <button class="settings" type="button">Loss Points</button><br />
		    <button class="settings" type="button" onclick="if (turnsAhead2<7) {turnsAhead2+=1; updateButtons()}">+</button>
		    <button class="settings" type="button" onclick="ratio2+=.05; updateButtons()">+</button>
		    <button class="settings" type="button" onclick="winPoints2+=.5; updateButtons()">+</button>
		    <button class="settings" type="button" onclick="tiePoints2+=.5; updateButtons()">+</button>
		    <button class="settings" type="button" onclick="lossPoints2+=.5; updateButtons()">+</button><br />
		    <INPUT TYPE="button" NAME="turns2" class="settings" value=5>
		    <INPUT TYPE="button" NAME="ratioButton2" class="settings" value=0.3>
		    <INPUT TYPE="button" NAME="win2" class="settings" value=2.5>
		    <INPUT TYPE="button" NAME="tie2" class="settings" value=0>
		    <INPUT TYPE="button" NAME="loss2" class="settings" value=-10><br />
		    <button class="settings" type="button" onclick="if (turnsAhead2>0) {turnsAhead2-=1; updateButtons()}">-</button>
		    <button class="settings" type="button" onclick="if (ratio2>0.01) {ratio2-=.05; updateButtons()}">-</button>
		    <button class="settings" type="button" onclick="winPoints2-=.5; updateButtons()">-</button>
		    <button class="settings" type="button" onclick="tiePoints2-=.5; updateButtons()">-</button>
		    <button class="settings" type="button" onclick="lossPoints2-=.5; updateButtons()">-</button>
		</form>
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
    var color = '';
    function getColor(idName) {
	var element=document.getElementById(idName);
	var style=window.getComputedStyle(element,"");
	var x=style.getPropertyValue("background-color");
	hexc(x);
	return color
    }

    function hexc(colorval) {
	var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	delete(parts[0]);
	for (var i = 1; i <= 3; ++i) {
	    parts[i] = parseInt(parts[i]).toString(16);
	    if (parts[i].length == 1) parts[i] = '0' + parts[i];
	}
	color = '#' + parts.join('');
    }
</script>
<script type="text/javascript" defer="defer" src="ConnectFour.js"></script>
<?php include("../Setup/footer.php"); ?>