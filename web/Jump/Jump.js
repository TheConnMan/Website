var selectedPiece="";
var move="";
var pieceColor="#6a5acd";
var backgroundColor="#d2b48c";
var selectedColor="#33ffff";
var moves=0;
var lastSelected="";
var lastMove="";
$(".space").click(function () {
    if (getColor($(this).attr("id"))==pieceColor) {
        if (selectedPiece!="") {
            $("#"+selectedPiece).css("background-color", pieceColor);
        }
        selectedPiece=$(this).attr("id");
        $("#"+selectedPiece).css("background-color", selectedColor);
    } else if (selectedPiece!="" && getColor($(this).attr("id"))==backgroundColor) {
        var selectedRow=parseInt(selectedPiece.substring(0,1));
        var selectedCol=parseInt(selectedPiece.substring(1));
        var curRow=parseInt($(this).attr("id").substring(0,1));
        var curCol=parseInt($(this).attr("id").substring(1));
        if (Math.abs(selectedRow-curRow)==2 && Math.abs(selectedCol-curCol)==2 && getColor($("#"+(Math.min(selectedRow,curRow)+1).toString()+(Math.min(selectedCol,curCol)+1).toString()).attr("id"))==pieceColor) {
            $("#"+(Math.min(selectedRow,curRow)+1).toString()+(Math.min(selectedCol,curCol)+1).toString()).css("background-color",backgroundColor);
            $("#"+selectedPiece).css("background-color",backgroundColor);
            $("#"+curRow.toString()+curCol.toString()).css("background-color",pieceColor);
            lastSelected=selectedPiece;
            lastMove=$(this).attr("id");
            selectedPiece="";
            moves++;
        } else if (Math.abs(selectedRow-curRow)==0 && Math.abs(selectedCol-curCol)==2 && getColor($("#"+selectedRow.toString()+(Math.min(selectedCol,curCol)+1).toString()).attr("id"))==pieceColor) {
            $("#"+selectedRow.toString()+(Math.min(selectedCol,curCol)+1).toString()).css("background-color",backgroundColor);
            $("#"+selectedPiece).css("background-color",backgroundColor);
            $("#"+curRow.toString()+curCol.toString()).css("background-color",pieceColor);
            lastSelected=selectedPiece;
            lastMove=$(this).attr("id");
            selectedPiece="";
            moves++;
        } else if (Math.abs(selectedRow-curRow)==2 && Math.abs(selectedCol-curCol)==0 && getColor($("#"+(Math.min(selectedRow,curRow)+1).toString()+selectedCol.toString()).attr("id"))==pieceColor) {
            $("#"+(Math.min(selectedRow,curRow)+1).toString()+selectedCol.toString()).css("background-color",backgroundColor);
            $("#"+selectedPiece).css("background-color",backgroundColor);
            $("#"+curRow.toString()+curCol.toString()).css("background-color",pieceColor);
            lastSelected=selectedPiece;
            lastMove=$(this).attr("id");
            selectedPiece="";
            moves++;
        }
    }
    if (moves==13) {
        alert("You Win!");
    }
});
function undo() {
    if (lastMove!="") {
        var selectedRow=parseInt(lastSelected.substring(0,1));
        var selectedCol=parseInt(lastSelected.substring(1));
        var curRow=parseInt(lastMove.substring(0,1));
        var curCol=parseInt(lastMove.substring(1));
        if (Math.abs(selectedRow-curRow)==2 && Math.abs(selectedCol-curCol)==2) {
            $("#"+(Math.min(selectedRow,curRow)+1).toString()+(Math.min(selectedCol,curCol)+1).toString()).css("background-color",pieceColor);
            $("#"+lastSelected).css("background-color",selectedColor);
            $("#"+curRow.toString()+curCol.toString()).css("background-color",backgroundColor);
            selectedPiece=lastSelected;
            lastSelected="";
            lastMove="";
            moves--;
        } else if (Math.abs(selectedRow-curRow)==0 && Math.abs(selectedCol-curCol)==2) {
            $("#"+selectedRow.toString()+(Math.min(selectedCol,curCol)+1).toString()).css("background-color",pieceColor);
            $("#"+lastSelected).css("background-color",selectedColor);
            $("#"+curRow.toString()+curCol.toString()).css("background-color",backgroundColor);
            selectedPiece=lastSelected;
            lastSelected="";
            lastMove="";
            moves--;
        } else if (Math.abs(selectedRow-curRow)==2 && Math.abs(selectedCol-curCol)==0) {
            $("#"+(Math.min(selectedRow,curRow)+1).toString()+selectedCol.toString()).css("background-color",pieceColor);
            $("#"+lastSelected).css("background-color",selectedColor);
            $("#"+curRow.toString()+curCol.toString()).css("background-color",backgroundColor);
            selectedPiece=lastSelected;
            lastSelected="";
            lastMove="";
            moves--;
        }
    }
}
$(".backcolor").click(function () {
    var color=getColor($(this).attr("id"));
    for (var i=1; i<6; i++) {
        for (var j=1; j<=i; j++) {
            if (getColor($("#"+i.toString()+j.toString()).attr("id"))==backgroundColor) {
                $("#"+i.toString()+j.toString()).css("background-color",color);
            }
        }
    }
    backgroundColor=color;
});
$(".piececolor").click(function () {
    var color=getColor($(this).attr("id"));
    for (var i=1; i<6; i++) {
        for (var j=1; j<=i; j++) {
            if (getColor($("#"+i.toString()+j.toString()).attr("id"))==pieceColor) {
                $("#"+i.toString()+j.toString()).css("background-color",color);
            }
        }
    }
    pieceColor=color;
});
$(document).ready(function() {
    reset();
});
function getColor(idNameColor) {
    var element=document.getElementById(idNameColor);
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
function reset() {
    for (var i=1; i<6; i++) {
        for (var j=1; j<=i; j++) {
            $("#"+i.toString()+j.toString()).css("background-color",pieceColor);
        }
    }
    $("#11").css("background-color",backgroundColor);
    moves=0;
    selectedPiece="";
    move="";
}