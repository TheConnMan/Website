/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function updateButtons() {
    document.buttonsArea.turns.value=turnsAhead
    document.buttonsArea.ratioButton.value=Math.round(100*ratio)/100
    document.buttonsArea.win.value=winPoints
    document.buttonsArea.tie.value=tiePoints
    document.buttonsArea.loss.value=lossPoints
}

function setDefault() {
    turnsAhead = 5
    ratio = .3
    winPoints = 2.5
    tiePoints = 0
    lossPoints = -10
    updateButtons()
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
        }
        else if (CheckWin(tempCheckBoard, compPiece)) {
            alert("You lose!")
        }
    }
    else if (mode==1) {
        if (CheckWin(tempCheckBoard, ' X ')) {
            alert("X's Win!")
        }
        else if (CheckWin(tempCheckBoard, ' O ')) {
            alert("O's Win!")
        }
    }
    if (board[0][0]!=" "&&board[0][1]!=" "&&board[0][2]!=" "&&board[0][3]!=" "&&board[0][4]!=" "&&board[0][5]!=" "&&board[0][6]!=" ") {
	alert("Tie!")
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
    document.tic.sqr8.value = board[0][0]
    document.tic.sqr9.value = board[0][1]
    document.tic.sqr10.value = board[0][2]
    document.tic.sqr11.value = board[0][3]
    document.tic.sqr12.value = board[0][4]
    document.tic.sqr13.value = board[0][5]
    document.tic.sqr14.value = board[0][6]
    document.tic.sqr15.value = board[1][0]
    document.tic.sqr16.value = board[1][1]
    document.tic.sqr17.value = board[1][2]
    document.tic.sqr18.value = board[1][3]
    document.tic.sqr19.value = board[1][4]
    document.tic.sqr20.value = board[1][5]
    document.tic.sqr21.value = board[1][6]
    document.tic.sqr22.value = board[2][0]
    document.tic.sqr23.value = board[2][1]
    document.tic.sqr24.value = board[2][2]
    document.tic.sqr25.value = board[2][3]
    document.tic.sqr26.value = board[2][4]
    document.tic.sqr27.value = board[2][5]
    document.tic.sqr28.value = board[2][6]
    document.tic.sqr29.value = board[3][0]
    document.tic.sqr30.value = board[3][1]
    document.tic.sqr31.value = board[3][2]
    document.tic.sqr32.value = board[3][3]
    document.tic.sqr33.value = board[3][4]
    document.tic.sqr34.value = board[3][5]
    document.tic.sqr35.value = board[3][6]
    document.tic.sqr36.value = board[4][0]
    document.tic.sqr37.value = board[4][1]
    document.tic.sqr38.value = board[4][2]
    document.tic.sqr39.value = board[4][3]
    document.tic.sqr40.value = board[4][4]
    document.tic.sqr41.value = board[4][5]
    document.tic.sqr42.value = board[4][6]
    document.tic.sqr43.value = board[5][0]
    document.tic.sqr44.value = board[5][1]
    document.tic.sqr45.value = board[5][2]
    document.tic.sqr46.value = board[5][3]
    document.tic.sqr47.value = board[5][4]
    document.tic.sqr48.value = board[5][5]
    document.tic.sqr49.value = board[5][6]
}