var move="";
function previewMove(sqr, col) {
    if (getColor(sqr)=='#ffffff') {
	if (move!="") {
	    board[move][previousCol]=" ";
	}
	var otherPiece;
	if (piece==" X ") {
	    otherPiece=" O ";
	} else {
	    otherPiece=" X ";
	}
	move=MakeMove(board, col)
	previousCol=col;
	board[move][col]=piece;
	var str=createString(board);
	$("#hiddenBoard").val(str);
	update();
        $("#submit").show();
        $("#leftmenu").height($("#rightcontent").height());
	if (CheckWin(board, piece)) {
	    $("#hiddenPiece").val("OVER");
	} else {
	    $("#hiddenPiece").val(otherPiece);
	}
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
	    var temPiece=str.substring(num,num+1);
	    if (temPiece=="-") {
                tempBoard[i][j]=" ";
            } else {
                tempBoard[i][j]=" "+temPiece+" ";
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