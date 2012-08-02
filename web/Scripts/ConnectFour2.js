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