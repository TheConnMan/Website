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
function placePieces(idName) {
    var numLeft=parseInt($("#piecesLeft"+selectedPiece).text())
    if (numLeft>0) {
	$("#piecesLeft"+selectedPiece).text(numLeft-1);
	$("#"+idName).text(selectedPiece);
	$("#"+idName).css("background-color",placedColor);
    }
}
function removePieces(idName) {
    var text=$("#"+idName).text();
    var num=parseInt($("#piecesLeft"+text).text())+1;
    $("#piecesLeft"+text).text(String(num));
    $("#"+idName).css("background-color",placementColor);
    $("#"+idName).text("");
}
function finishedPlacing() {
    var done=true;
    for (var i=6; i<10; i++) {
	for (var j=0; j<10; j++) {
	    if (getColor(String(i)+String(j))==placementColor) {
		done=false;
		break;
	    }
	}
	if (!done) {
	    break;
	}
    }
    if (done) {
	gameStage=1;
	$("#availablePieces").hide();
	selectedPiece="99";
	for (var i=6; i<10; i++) {
	    for (var j=0; j<10; j++) {
		board[i][j]=$("#"+String(i)+String(j)).text()
	    }
	}
        $("#leftmenu").height($("#rightcontent").height());
    } else {
	alert("Not all pieces have been placed.");
    }
}
function randomlyPlace(player) {
    var pieces=["1","2","3","4","5","6","7","8","9","S","B","F"];
    var num=["1","1","2","3","4","4","4","5","8","1","6","1"]
    if (player) {
	for (var i=0; i<12; i++) {
	    selectedPiece=pieces[i];
	    for (var j=0; j<parseInt($("#piecesLeft"+selectedPiece).text()); j++) {
		var valid=false;
		while (!valid) {
		    var col=Math.floor(Math.random()*10)
		    var row=Math.floor(Math.random()*4)+6
		    var id=String(row)+String(col)
		    if ($("#"+id).text()=="") {
			$("#"+id).text(selectedPiece);
			$("#"+id).css("background-color",placedColor);
			valid=true;
		    }
		}
	    }
	}
	for (var i=0; i<12; i++) {
	    $("#piecesLeft"+pieces[i]).text(0)
	}
    } else {
	for (var i=0; i<12; i++) {
	    selectedPiece=pieces[i];
	    for (var j=0; j<num[i]; j++) {
		var valid=false;
		while (!valid) {
		    var col=Math.floor(Math.random()*10)
		    var row=Math.floor(Math.random()*4)
		    var id=String(row)+String(col)
		    if (board[row][col]==" ") {
			board[row][col]=selectedPiece;
			valid=true;
		    }
		}
	    }
	}
    }
}