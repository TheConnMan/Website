/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function vari()
{
    board = [[document.tic.sqr1.value,document.tic.sqr2.value,document.tic.sqr3.value,document.tic.sqr4.value,document.tic.sqr5.value,document.tic.sqr6.value,document.tic.sqr7.value],
            [document.tic.sqr8.value,document.tic.sqr9.value,document.tic.sqr10.value,document.tic.sqr11.value,document.tic.sqr12.value,document.tic.sqr13.value,document.tic.sqr14.value],
            [document.tic.sqr15.value,document.tic.sqr16.value,document.tic.sqr17.value,document.tic.sqr18.value,document.tic.sqr19.value,document.tic.sqr20.value,document.tic.sqr21.value],
            [document.tic.sqr22.value,document.tic.sqr23.value,document.tic.sqr24.value,document.tic.sqr25.value,document.tic.sqr26.value,document.tic.sqr27.value,document.tic.sqr28.value],
            [document.tic.sqr29.value,document.tic.sqr30.value,document.tic.sqr31.value,document.tic.sqr32.value,document.tic.sqr33.value,document.tic.sqr34.value,document.tic.sqr35.value],
            [document.tic.sqr36.value,document.tic.sqr37.value,document.tic.sqr38.value,document.tic.sqr39.value,document.tic.sqr40.value,document.tic.sqr41.value,document.tic.sqr42.value]]
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
                var NewPiece=" ";
                if (turn=="X") {
                    NewPiece="+";
                }
                else {
                    NewPiece="@";
                }
                for (var h=0; h<4; h++) {
                    Board[j][i+h]=NewPiece;
                }
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
                    var NewPiece=" ";
                    if (turn=="X") {
                        NewPiece="+";
                    }
                    else {
                        NewPiece="@";
                    }
                    for (var h=0; h<4; h++) {
                        Board[j-h][i]=NewPiece;
                    }
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
                    var NewPiece=" ";
                    if (turn=="X") {
                        NewPiece="+";
                    }
                    else {
                        NewPiece="@";
                    }
                    for (var h=0; h<4; h++) {
                        Board[j+h][i-h]=NewPiece;
                    }
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
                    var NewPiece=" ";
                    if (turn=="X") {
                        NewPiece="+";
                    }
                    else {
                        NewPiece="@";
                    }
                    for (var h=0; h<4; h++) {
                        Board[j+h][i+h]=NewPiece;
                    }
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
        var TempBoard=Board.slice()
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
    var TempBoard=Board.slice()
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
    var TempBoard=Board.slice()
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
  document.tic.sqr1.value = "     "; document.tic.sqr2.value = "     "; document.tic.sqr3.value = "     "; document.tic.sqr4.value = "     "; document.tic.sqr5.value = "     "; document.tic.sqr6.value = "     ";  document.tic.sqr7.value = "     "; document.tic.sqr8.value = "     "; document.tic.sqr9.value = "     "
  document.tic.sqr11.value = "     "; document.tic.sqr12.value = "     "; document.tic.sqr13.value = "     "; document.tic.sqr14.value = "     "; document.tic.sqr15.value = "     "; document.tic.sqr16.value = "     ";  document.tic.sqr17.value = "     "; document.tic.sqr18.value = "     "; document.tic.sqr19.value = "     "
  document.tic.sqr21.value = "     "; document.tic.sqr22.value = "     "; document.tic.sqr23.value = "     "; document.tic.sqr24.value = "     "; document.tic.sqr25.value = "     "; document.tic.sqr26.value = "     ";  document.tic.sqr27.value = "     "; document.tic.sqr28.value = "     "; document.tic.sqr29.value = "     "
  document.tic.sqr31.value = "     "; document.tic.sqr32.value = "     "; document.tic.sqr33.value = "     "; document.tic.sqr34.value = "     "; document.tic.sqr35.value = "     "; document.tic.sqr36.value = "     ";  document.tic.sqr37.value = "     "; document.tic.sqr38.value = "     "; document.tic.sqr39.value = "     "
  document.tic.sqr41.value = "     "; document.tic.sqr42.value = "     "
  sqr1T = 0; sqr2T = 0; sqr3T = 0; sqr4T = 0; sqr5T = 0; sqr6T = 0; sqr7T = 0; sqr8T = 0; sqr9T = 0
  sqr11T = 0; sqr12T = 0; sqr13T = 0; sqr14T = 0; sqr15T = 0; sqr16T = 0; sqr17T = 0; sqr18T = 0; sqr19T = 0
  sqr21T = 0; sqr22T = 0; sqr23T = 0; sqr24T = 0; sqr25T = 0; sqr26T = 0; sqr27T = 0; sqr28T = 0; sqr29T = 0
  sqr31T = 0; sqr32T = 0; sqr33T = 0; sqr34T = 0; sqr35T = 0; sqr36T = 0; sqr37T = 0; sqr38T = 0; sqr39T = 0
  sqr41T = 0; sqr42T = 0
  vari()
  turn = 0
  moveCount = 0
}

function makeMoveJavaScript(column, compPiece)
{
    var rowNum=0;
    for (var i=6; i>0; i--) {
	if (boardT[column,i]==0) {
	    rowNum=i
	    break
	}
    }
    alert(column)
    turn = 0
    boardT[column, rowNum]=1
    var varNum=(column+1)*7+rowNum+1
    if (varNum==1) {
	document.tic.sqr1.value = compPiece
    }
    else if (varNum==2) {
	document.tic.sqr2.value = compPiece
    }
    else if (varNum==3) {
	document.tic.sqr3.value = compPiece
    }
    else if (varNum==4) {
	document.tic.sqr4.value = compPiece
    }
    else if (varNum==5) {
	document.tic.sqr5.value = compPiece
    }
    else if (varNum==6) {
	document.tic.sqr6.value = compPiece
    }
    else if (varNum==7) {
	document.tic.qr7.value = compPiece
    }
    else if (varNum==8) {
	document.tic.sqr8.value = compPiece
    }
    else if (varNum==9) {
	document.tic.sqr9.value = compPiece
    }
    else if (varNum==10) {
	document.tic.sqr10.value = compPiece
    }
    else if (varNum==11) {
	document.tic.sqr11.value = compPiece
    }
    else if (varNum==12) {
	document.tic.sqr12.value = compPiece
    }
    else if (varNum==13) {
	document.tic.sqr13.value = compPiece
    }
    else if (varNum==14) {
	document.tic.sqr14.value = compPiece
    }
    else if (varNum==15) {
	document.tic.sqr15.value = compPiece
    }
    else if (varNum==16) {
	document.tic.sqr16.value = compPiece
    }
    else if (varNum==17) {
	document.tic.sqr17.value = compPiece
    }
    else if (varNum==18) {
	document.tic.sqr18.value = compPiece
    }
    else if (varNum==19) {
	document.tic.sqr19.value = compPiece
    }
    else if (varNum==20) {
	document.tic.sqr20.value = compPiece
    }
    else if (varNum==21) {
	document.tic.sqr21.value = compPiece
    }
    else if (varNum==22) {
	document.tic.sqr22.value = compPiece
    }
    else if (varNum==23) {
	document.tic.sqr23.value = compPiece
    }
    else if (varNum==24) {
	document.tic.sqr24.value = compPiece
    }
    else if (varNum==25) {
	document.tic.sqr25.value = compPiece
    }
    else if (varNum==26) {
	document.tic.sqr26.value = compPiece
    }
    else if (varNum==27) {
	document.tic.sqr27.value = compPiece
    }
    else if (varNum==28) {
	document.tic.sqr28.value = compPiece
    }
    else if (varNum==29) {
	document.tic.sqr29.value = compPiece
    }
    else if (varNum==30) {
	document.tic.sqr30.value = compPiece
    }
    else if (varNum==31) {
	document.tic.sqr31.value = compPiece
    }
    else if (varNum==32) {
	document.tic.sqr32.value = compPiece
    }
    else if (varNum==33) {
	document.tic.sqr33.value = compPiece
    }
    else if (varNum==34) {
	document.tic.sqr34.value = compPiece
    }
    else if (varNum==35) {
	document.tic.sqr35.value = compPiece
    }
    else if (varNum==36) {
	document.tic.sqr36.value = compPiece
    }
    else if (varNum==37) {
	document.tic.sqr37.value = compPiece
    }
    else if (varNum==38) {
	document.tic.sqr38.value = compPiece
    }
    else if (varNum==39) {
	document.tic.sqr39.value = compPiece
    }
    else if (varNum==40) {
	document.tic.sqr40.value = compPiece
    }
    else if (varNum==41) {
	document.tic.sqr41.value = compPiece
    }
    else {
	document.tic.sqr42.value = compPiece
    }
}

function check()
{
    if (CheckWin(board, piece)) {
	alert("You win!")
    }
    else {
	makeMoveJavaScript(CompMoveFinal(board, compPiece, piece, 2, .3, 2.5, -10, 0)-1, compPiece)
	if (CheckWin(board, compPiece)) {
	    alert("You lose!")
	}
    }
}

function MakeMove(Board, column) {
    var row=-1;
    for (var i=5; i>=0; i--) {
	if (Board[i][column]=="") {
	    row=i;
	    break;
	}
    }
    return row;
}