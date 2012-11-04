var currentPiece = " X "
var compPiece = " O "
var piece = " X "
var turnNum = 0
var mode=0
var moveYet=false
var turnsAhead = 5;
var turnsAhead1 = 5;
var turnsAhead2 = 5
var ratio = .3;
var ratio1 = .3;
var ratio2 = .3;
var winPoints = 2.5;
var winPoints1 = 2.5;
var winPoints2 = 2.5
var tiePoints = 0;
var tiePoints1 = 0;
var tiePoints2 = 0
var lossPoints = -10;
var lossPoints1 = -10;
var lossPoints2 = -10
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
var move="";
var win=false
var turnDone=false
var gameOver=false
var previousCol;
function computerMoveFirst(movedYet) {
    if (!moveYet) {
	compColumn=Math.floor(Math.random()*7)
	compRow=MakeMove(board, compColumn)
	switchPiece();
	board[compRow][compColumn]=currentPiece
	turnDone=false;
	moveYet=true
	turnNum--;
	endOfTurn()
    }
}
function buttonClicked(sqr, col) {
    if (!gameOver && mode!=2) {
	move=-1
	if (getColor(sqr)=='#ffffff') {
	    move=MakeMove(board, col)
	}
	if (move!=-1) {
	    board[move][col]=currentPiece
	    turnDone=true
	    endOfTurn()
	}
	if (mode==0 && !win && turnDone) {
	    compColumn=CompMoveFinal(tempBoard, compPiece, piece, turnsAhead, ratio, winPoints, lossPoints, tiePoints)
	    compRow=MakeMove(board, compColumn)
	    board[compRow][compColumn]=currentPiece
	    turnDone=false;
	    endOfTurn()
	}
    }
}
function previewMove(sqr, col) {
    if (getColor(sqr)=='#ffffff') {
	if (move!="") {
	    board[move][previousCol]=" ";
	}
	move=MakeMove(board, col)
	previousCol=col;
	board[move][col]=" X ";
	var str=createString(board);
	$("#hiddenMove").val(str);
	update();
        $("#submit").show();
        $("#leftmenu").height($("#rightcontent").height());
    }
    
}
function createString(board) {
    var str="";
    for (var i=0; i<6; i++) {
	for (var j=0; j<7; j++) {
	    var space=board[i][j];
	    if (space==" ") {
		str+="-";
	    } else {
		str+=space.substring(1,2);
	    }
	    str+=",";
        }
    }
    return str;
}
function breakString(str) {
    var tempBoard = [[" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "]]
    for (var i=0; i<6; i++) {
	for (var j=0; j<7; j++) {
            var num=2*(i*7+j);
	    var piece=str.substring(num,num+1);
	    if (piece=="-") {
                tempBoard[i][j]=" ";
            } else {
                tempBoard[i][j]=" "+piece+" ";
            }
        }
    }
    return tempBoard;
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
function updateButtons() {
    if (mode==0) {
        document.buttonsArea.turns.value=turnsAhead
        document.buttonsArea.ratioButton.value=Math.round(100*ratio)/100
        document.buttonsArea.win.value=winPoints
        document.buttonsArea.tie.value=tiePoints
        document.buttonsArea.loss.value=lossPoints
    }
    else if (mode==2) {
        document.buttonsAreaTrials.turns1.value=turnsAhead1
        document.buttonsAreaTrials.ratioButton1.value=Math.round(100*ratio1)/100
        document.buttonsAreaTrials.win1.value=winPoints1
        document.buttonsAreaTrials.tie1.value=tiePoints1
        document.buttonsAreaTrials.loss1.value=lossPoints1
        document.buttonsAreaTrials.turns2.value=turnsAhead2
        document.buttonsAreaTrials.ratioButton2.value=Math.round(100*ratio2)/100
        document.buttonsAreaTrials.win2.value=winPoints2
        document.buttonsAreaTrials.tie2.value=tiePoints2
        document.buttonsAreaTrials.loss2.value=lossPoints2
    }
    
}
function runTrials() {
    if (turnNum<1) {
	var firstMove=Math.floor(Math.random()*7)
	compRow=MakeMove(board, firstMove)
	board[compRow][firstMove]=' X '
	endOfTurn()
	firstMove=Math.floor(Math.random()*7)
	compRow=MakeMove(board, firstMove)
	board[compRow][firstMove]=' O '
	endOfTurn()
	turnNum++
    }
    else {
	compColumn=CompMoveFinal(tempBoard, ' X ', ' O ', turnsAhead1, ratio1, winPoints1, lossPoints1, tiePoints1)
	compRow=MakeMove(board, compColumn)
	board[compRow][compColumn]=' X '
	endOfTurn()
	if (!win) {
	    compColumn=CompMoveFinal(tempBoard, ' O ', ' X ', turnsAhead2, ratio2, winPoints2, lossPoints2, tiePoints2)
	    compRow=MakeMove(board, compColumn)
	    board[compRow][compColumn]=' O '
	    endOfTurn()
	}
	turnNum++
    }
}
function setDefault() {
    turnsAhead = 5
    ratio = .3
    winPoints = 2.5
    tiePoints = 0
    lossPoints = -10
    $('#turns-ahead').text(turnsAhead)
    $('#ratio').text(ratio)
    $('#win-points').text(winPoints)
    $('#tie-points').text(tiePoints)
    $('#loss-points').text(lossPoints)
}
function setAllDefault() {
    turnsAhead1 = 5
    ratio1 = .3
    winPoints1 = 2.5
    tiePoints1 = 0
    lossPoints1 = -10
    $('#turns-ahead1').text(turnsAhead1)
    $('#ratio1').text(ratio1)
    $('#win-points1').text(winPoints1)
    $('#tie-points1').text(tiePoints1)
    $('#loss-points1').text(lossPoints1)
    turnsAhead2 = 5
    ratio2 = .3
    winPoints2 = 2.5
    tiePoints2 = 0
    lossPoints2 = -10
    $('#turns-ahead2').text(turnsAhead2)
    $('#ratio2').text(ratio2)
    $('#win-points2').text(winPoints2)
    $('#tie-points2').text(tiePoints2)
    $('#loss-points2').text(lossPoints2)
}
function CheckWin(Board, turn) {
    var maxHeight=0;
    for (var i=0; i<7; i++) {
	var TempHeight=CheckHeight(Board,i);
	if (TempHeight>maxHeight) {
	    maxHeight=CheckHeight(Board, i);
	}
    }
    if (CheckHo(Board, maxHeight, turn)) {
	return true;
    }
    if (CheckVert(Board, maxHeight, turn)) {
	return true;
    }
    if (CheckDiagRight(Board, maxHeight, turn)) {
	return true;
    }
    if (CheckDiagLeft(Board, maxHeight, turn)) {
	return true;
    }
    else {
	return false;
    }
}
function CheckHo(Board, maxHeight, turn) {
    var win=false;
    for (var i=0; i<4; i++) {
	for (var j=5; j>=6-maxHeight; j--) {
	    win=RecursiveCheck(Board, j, i, 0, turn, 1);
	    if (win) {
		break;
	    }
	}
	if (win) {
	    break;
	}
    }
    return win;
}
function CheckVert(Board, maxHeight, turn) {
    var win=false;
    for (var i=0; i<7; i++) {
	var height=CheckHeight(Board, i);
	if (height>=4) {
	    for (var j=5; j>=9-height; j--) {
		win=RecursiveCheck(Board, j, i, 0, turn, 2);
		if (win) {
		    break;
		}
	    }
	    if (win) {
					
		break;
	    }
	}
    }
    return win;
}
function CheckDiagRight(Board, maxHeight, turn) {
    var win=false;
    if (maxHeight>=4) {
	for (var i=3; i<7; i++) {
	    for (var j=2; j>=6-maxHeight; j--) {
		win=RecursiveCheck(Board, j, i, 0, turn, 3);
		if (win) {
		    break;
		}
	    }
	    if (win) {
		break;
	    }
	}
    }
    return win;
}
function CheckDiagLeft(Board, maxHeight, turn) {
    var win=false;
    if (maxHeight>=4) {
	for (var i=0; i<4; i++) {
	    for (var j=2; j>=6-maxHeight; j--) {
		win=RecursiveCheck(Board, j, i, 0, turn, 4);
		if (win) {
		    break;
		}
	    }
	    if (win) {
		break;
	    }
	}
    }
    return win;
}
function CheckHeight(Board, column) {
    var height=0;
    for (var i=0; i<6; i++) {
	if (Board[i][column]!=" ") {
	    height++;
	}
    }
    return height;
}
function RecursiveCheck(Board, nextR, nextC, num, turn, type) {
    if (num==4) {
	return true;
    }
    else if (Board[nextR][nextC]==turn) {
	if (type==1) {
	    return RecursiveCheck(Board, nextR, nextC+1, num+1, turn, type);
	}
	else if (type==2) {
	    return RecursiveCheck(Board, nextR-1, nextC, num+1, turn, type);
	}
	else if (type==3) {
	    return RecursiveCheck(Board, nextR+1, nextC-1, num+1, turn, type);
	}
	else {
	    return RecursiveCheck(Board, nextR+1, nextC+1, num+1, turn, type);
	}
    }
    else {
	return false;
    }
}
function WinNextMove(Board, turn) {
    var move=-1;
    for (var i=0; i<7; i++) {
	var TempBoard=[[" "," "," "," "," "," "," "],
	[" "," "," "," "," "," "," "],
	[" "," "," "," "," "," "," "],
	[" "," "," "," "," "," "," "],
	[" "," "," "," "," "," "," "],
	[" "," "," "," "," "," "," "]]
	CopyArray(Board, TempBoard)
	var TempMove=MakeMove(TempBoard, i);
	if (TempMove!=-1) {
	    TempBoard[TempMove][i]=turn;
	    if (CheckWin(TempBoard, turn)) {
		move=i;
		break;
	    }
	}
    }
    return move;
}
function CompMoveRec(Board, Comp, Player, ratio, win, loss, tie, turns, count, move) {
    var WhosTurn=count%2;
    var TempBoard=[[" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "]]
    CopyArray(Board, TempBoard)
    var TempMove=MakeMove(TempBoard, move);
    if (TempMove!=-1) {
	if (WhosTurn==0) {
	    TempBoard[TempMove][move]=Comp;
	}
	else {
	    TempBoard[TempMove][move]=Player;
	}
	if (CheckWin(TempBoard, Comp)) {
	    return win;
	}
	else if (CheckWin(TempBoard, Player)) {
	    return loss;
	}
	else {
	    if (turns==count) {
		return tie;
	    }
	    else {
		count++;
		return ratio*(CompMoveRec(TempBoard, Comp, Player, ratio, win, loss, tie, turns, count, 0)+CompMoveRec(TempBoard, Comp, Player, ratio, win, loss, tie, turns, count, 1)+CompMoveRec(TempBoard, Comp, Player, ratio, win, loss, tie, turns, count, 2)+CompMoveRec(TempBoard, Comp, Player, ratio, win, loss, tie, turns, count, 3)+CompMoveRec(TempBoard, Comp, Player, ratio, win, loss, tie, turns, count, 4)+CompMoveRec(TempBoard, Comp, Player, ratio, win, loss, tie, turns, count, 5)+CompMoveRec(TempBoard, Comp, Player, ratio, win, loss, tie, turns, count, 6));
	    }
	}
    }
    else {
	return 0;
    }
}
function CompMoveFinal(Board, Comp, Player, turns, ratio, win, loss, tie) {
    var TempBoard=[[" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "]]
    CopyArray(Board, TempBoard)
    var move=WinNextMove(TempBoard, Comp);
    if (move==-1) {
	move=WinNextMove(TempBoard, Player);
	if (move==-1) {
	    var CompMoveVal=-10000;
	    for (var i=0; i<7; i++) {
		var NewVal;
		if (MakeMove(TempBoard, i)!=-1) {
		    NewVal=CompMoveRec(TempBoard, Comp, Player, ratio, win, loss, tie, turns, 0, i);
		    if (NewVal>CompMoveVal) {
			CompMoveVal=NewVal;
			move=i;
		    }
		}
	    }
	}
    }
    return move;
}
function reset()
{
    board = [[" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "]]
    update()
    win=false
    turnNum=0
    currentPiece=piece;
    gameOver=false
    moveYet=false
}
function check()
{
    var tempCheckBoard=[[" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "],
    [" "," "," "," "," "," "," "]]
    CopyArray(board, tempCheckBoard)
    if (mode==0) {
	if (CheckWin(tempCheckBoard, piece)) {
	    alert("You win!")
	    win=true
	    gameOver=true
	}
	else if (CheckWin(tempCheckBoard, compPiece)) {
	    alert("You lose!")
	    gameOver=true
	}
    }
    else if (mode==1||mode==2) {
	if (CheckWin(tempCheckBoard, ' X ')) {
	    alert("Red's Win!")
	    gameOver=true
	    win=true
	}
	else if (CheckWin(tempCheckBoard, ' O ')) {
	    alert("Blue's Win!")
	    gameOver=true
	    win=true
	}
    }
    if (board[0][0]!=" "&&board[0][1]!=" "&&board[0][2]!=" "&&board[0][3]!=" "&&board[0][4]!=" "&&board[0][5]!=" "&&board[0][6]!=" ") {
	alert("Tie!")
	gameOver=true
    }
}
function MakeMove(Board, column) {
    var row=-1;
    for (var i=5; i>=0; i--) {
	if (Board[i][column]==" ") {
	    row=i;
	    break;
	}
    }
    return row;
}
function switchPiece() {
    if (currentPiece==" X ") {
	currentPiece=" O "
    }
    else {
	currentPiece=" X "
    }
}
function endOfTurn() {
    update()
    switchPiece()
    check()
    CopyArray(board, tempBoard)
}
function CopyArray(Board, TempBoard) {
    for (var i=0; i<7; i++) {
	for (var j=0; j<6; j++) {
	    TempBoard[j][i]=Board[j][i];
	}
    }
}
function update() {
    document.getElementById('sqr8').style.backgroundColor = colorScheme(board[0][0])
    document.getElementById('sqr9').style.backgroundColor = colorScheme(board[0][1])
    document.getElementById('sqr10').style.backgroundColor = colorScheme(board[0][2])
    document.getElementById('sqr11').style.backgroundColor = colorScheme(board[0][3])
    document.getElementById('sqr12').style.backgroundColor = colorScheme(board[0][4])
    document.getElementById('sqr13').style.backgroundColor = colorScheme(board[0][5])
    document.getElementById('sqr14').style.backgroundColor = colorScheme(board[0][6])
    document.getElementById('sqr15').style.backgroundColor = colorScheme(board[1][0])
    document.getElementById('sqr16').style.backgroundColor = colorScheme(board[1][1])
    document.getElementById('sqr17').style.backgroundColor = colorScheme(board[1][2])
    document.getElementById('sqr18').style.backgroundColor = colorScheme(board[1][3])
    document.getElementById('sqr19').style.backgroundColor = colorScheme(board[1][4])
    document.getElementById('sqr20').style.backgroundColor = colorScheme(board[1][5])
    document.getElementById('sqr21').style.backgroundColor = colorScheme(board[1][6])
    document.getElementById('sqr22').style.backgroundColor = colorScheme(board[2][0])
    document.getElementById('sqr23').style.backgroundColor = colorScheme(board[2][1])
    document.getElementById('sqr24').style.backgroundColor = colorScheme(board[2][2])
    document.getElementById('sqr25').style.backgroundColor = colorScheme(board[2][3])
    document.getElementById('sqr26').style.backgroundColor = colorScheme(board[2][4])
    document.getElementById('sqr27').style.backgroundColor = colorScheme(board[2][5])
    document.getElementById('sqr28').style.backgroundColor = colorScheme(board[2][6])
    document.getElementById('sqr29').style.backgroundColor = colorScheme(board[3][0])
    document.getElementById('sqr30').style.backgroundColor = colorScheme(board[3][1])
    document.getElementById('sqr31').style.backgroundColor = colorScheme(board[3][2])
    document.getElementById('sqr32').style.backgroundColor = colorScheme(board[3][3])
    document.getElementById('sqr33').style.backgroundColor = colorScheme(board[3][4])
    document.getElementById('sqr34').style.backgroundColor = colorScheme(board[3][5])
    document.getElementById('sqr35').style.backgroundColor = colorScheme(board[3][6])
    document.getElementById('sqr36').style.backgroundColor = colorScheme(board[4][0])
    document.getElementById('sqr37').style.backgroundColor = colorScheme(board[4][1])
    document.getElementById('sqr38').style.backgroundColor = colorScheme(board[4][2])
    document.getElementById('sqr39').style.backgroundColor = colorScheme(board[4][3])
    document.getElementById('sqr40').style.backgroundColor = colorScheme(board[4][4])
    document.getElementById('sqr41').style.backgroundColor = colorScheme(board[4][5])
    document.getElementById('sqr42').style.backgroundColor = colorScheme(board[4][6])
    document.getElementById('sqr43').style.backgroundColor = colorScheme(board[5][0])
    document.getElementById('sqr44').style.backgroundColor = colorScheme(board[5][1])
    document.getElementById('sqr45').style.backgroundColor = colorScheme(board[5][2])
    document.getElementById('sqr46').style.backgroundColor = colorScheme(board[5][3])
    document.getElementById('sqr47').style.backgroundColor = colorScheme(board[5][4])
    document.getElementById('sqr48').style.backgroundColor = colorScheme(board[5][5])
    document.getElementById('sqr49').style.backgroundColor = colorScheme(board[5][6])
}
function colorScheme(piece) {
    if (piece==' X ') {
	return 'red'
    }
    else if (piece==' O ') {
	return 'blue'
    }
    else {
	return 'white'
    }
}