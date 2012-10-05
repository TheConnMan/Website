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
		    <button type="button" onclick="reset(); currentPiece=' X '; piece=' X '; compPiece=' O '">X</button>
		    <button type="button" onclick="reset(); currentPiece=' O '; piece=' O '; compPiece=' X '">O</button>
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
		<FORM NAME="tic" style="text-align: center"><br />
		    <INPUT TYPE="button" NAME="sqr8" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr9" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr10" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr11" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr12" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr13" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr14" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"><br />
		    <INPUT TYPE="button" NAME="sqr15" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr16" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr17" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr18" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr19" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr20" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr21" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"><br />
		    <INPUT TYPE="button" NAME="sqr22" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr23" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr24" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr25" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr26" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr27" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr28" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"><br />
		    <INPUT TYPE="button" NAME="sqr29" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr30" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr31" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr32" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr33" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr34" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr35" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"><br />
		    <INPUT TYPE="button" NAME="sqr36" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr37" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr38" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr39" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr40" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr41" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr42" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}"><br />
		    <INPUT TYPE="button" NAME="sqr43" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 0)}; if (move!=-1) {board[move][0]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr44" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 1)}; if (move!=-1) {board[move][1]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr45" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 2)}; if (move!=-1) {board[move][2]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr46" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 3)}; if (move!=-1) {board[move][3]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr47" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 4)}; if (move!=-1) {board[move][4]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr48" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 5)}; if (move!=-1) {board[move][5]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		    <INPUT TYPE="button" NAME="sqr49" class="connectfour" value=" " onClick="if (!gameOver) {move=-1; if (value==' ') {move=MakeMove(board, 6)}; if (move!=-1) {board[move][6]=currentPiece; turnDone=true; endOfTurn()}; if (mode==0 && !win && turnDone) {compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints); compRow=MakeMove(board, compColumn); board[compRow][compColumn]=currentPiece; turnDone=false; endOfTurn()}}">
		</form>
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
		    <button class="settings" type="button">X</button><br />
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
		    <button class="settings" type="button">O</button><br />
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
</script>
<script type="text/javascript" defer="defer" src="ConnectFourButtons.js"></script>
<?php include("../Setup/footer.php"); ?>