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