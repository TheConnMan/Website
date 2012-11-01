<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
<title>Stratego</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link type="text/css" rel="stylesheet" href="../Stratego/Stratego.css">
<table border="0">
    <tr>
        <td id="leftcolumn">
            <div id="leftmenu">
                <ul style="list-style: none">
                    <li style="padding-top: 15px">
                        <a href="#connectfourlabel">Connect Four</a>
                        <ul>
                            <li><a href="#backstory">Backstory</a></li>
                            <li><a href="#actualcode">The Actual Code</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </td><td width="3%"></td>
        <td id="rightcolumn">
            <div id="rightcontent">
                <h1 style="text-align: center">Stratego</h1>
                <table border="1" id="gameBoard">
		    <?php
		    for ($i = 0; $i < 10; $i++) {
			echo "<tr>";
			for ($j = 0; $j < 10; $j++) {
			    echo "<td><div class='space' id='";
			    echo $i;
			    echo $j;
			    echo "'></div></td>";
			}
			echo "</tr>";
		    }
		    ?>
                </table>
                <div id="availablePieces">
                    <button type="button" onclick="finishedPlacing()">Finished Placing Pieces</button>
		    <button type="button" onclick="randomlyPlace(true)">Randomly Place</button>
                    <table style="margin-left: auto; margin-right: auto;">
                        <tr>
                            <td><div class="piecesLeft" id="piecesLeft1">1</div><div class="space2">1</div></td>
                            <td><div class="piecesLeft" id="piecesLeft2">1</div><div class="space2">2</div></td>
                            <td><div class="piecesLeft" id="piecesLeft3">2</div><div class="space2">3</div></td>
                            <td><div class="piecesLeft" id="piecesLeft4">3</div><div class="space2">4</div></td>
                            <td><div class="piecesLeft" id="piecesLeft5">4</div><div class="space2">5</div></td>
                            <td><div class="piecesLeft" id="piecesLeft6">4</div><div class="space2">6</div></td>
                            <td><div class="piecesLeft" id="piecesLeft7">4</div><div class="space2">7</div></td>
                            <td><div class="piecesLeft" id="piecesLeft8">5</div><div class="space2">8</div></td>
                            <td><div class="piecesLeft" id="piecesLeft9">8</div><div class="space2">9</div></td>
                            <td><div class="piecesLeft" id="piecesLeftS">1</div><div class="space2">S</div></td>
                            <td><div class="piecesLeft" id="piecesLeftB">6</div><div class="space2">B</div></td>
                            <td><div class="piecesLeft" id="piecesLeftF">1</div><div class="space2">F</div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </td>
    </tr>
</table>
<script>
    var lakeColor="#a52a2a";
    var placementColor="#0000ff";
    var backgroundColor="#90ee90";
    var placedColor="#add8e6";
    var pieceSelectedColor="#ffffff";
    var opponentColor="#f64d54";
<?php
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 10; $j++) {
	echo "$('#";
	echo $i;
	echo $j;
	echo "').css('background-color',opponentColor);";
    };
};
?>
<?php
for ($i = 4; $i < 6; $i++) {
    for ($j = 0; $j < 10; $j++) {
	echo "$('#";
	echo $i;
	echo $j;
	echo "').css('background-color',backgroundColor);";
    };
};
?>
    $("#42").css("background-color",lakeColor);
    $("#43").css("background-color",lakeColor);
    $("#52").css("background-color",lakeColor);
    $("#53").css("background-color",lakeColor);
    $("#46").css("background-color",lakeColor);
    $("#47").css("background-color",lakeColor);
    $("#56").css("background-color",lakeColor);
    $("#57").css("background-color",lakeColor);
<?php
for ($i = 6; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
	echo "$('#";
	echo $i;
	echo $j;
	echo "').css('background-color',placementColor);";
    };
};
?>
    var selectedPiece="9";
    $(".space2").click(function () {
        selectedPiece=$(this).text();
    });
    var gameStage=0;
    var board = [[" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "]];
    $(".space").click(function() {
        var id=$(this).attr("id");
        if (gameStage==0) {
            if (getColor(id)==placementColor) {
                placePieces(id);
            } else if (getColor(id)==placedColor) {
                removePieces(id);
            }
        } else if (gameStage==1) {
            if (getColor(id)==placedColor) {
                pieceSelected(id);
            } else if (getColor(id)==backgroundColor) {
                if (squareAdjacent(id)) {
                    movePiece(id);
                } else {
                    alert("Square not adjacent.");
                }
            } else if (getColor(id)==opponentColor) {
                if (squareAdjacent(id)) {
                    takePiece(id);
                } else {
                    alert("Square not adjacent.");
                }
            }
        }
    });
    function pieceSelected(idName) {
        if (getColor(selectedPiece)==pieceSelectedColor) {
            $("#"+selectedPiece).css("background-color",placedColor);
        }
        selectedPiece=idName;
        $("#"+idName).css("background-color",pieceSelectedColor)
    }
    function squareAdjacent(idName) {
        if (Math.abs(parseInt(idName.substring(0,1))-parseInt(selectedPiece.substring(0,1)))==1 && Math.abs(parseInt(idName.substring(1))-parseInt(selectedPiece.substring(1)))==0) {
            return true;
        } else if (Math.abs(parseInt(idName.substring(0,1))-parseInt(selectedPiece.substring(0,1)))==0 && Math.abs(parseInt(idName.substring(1))-parseInt(selectedPiece.substring(1)))==1) {
            return true;
        } else {
            return false;
        }
    }
    function movePiece(idName) {
	if ($("#"+selectedPiece).text()!="B"&&$("#"+selectedPiece).text()!="F") {
	    $("#"+idName).text($("#"+selectedPiece).text());
	    $("#"+selectedPiece).text("");
	    $("#"+idName).css("background-color",placedColor);
	    $("#"+selectedPiece).css("background-color",backgroundColor);
	    board[parseInt(idName.substring(0,1))][parseInt(idName.substring(1))]=board[parseInt(selectedPiece.substring(0,1))][parseInt(selectedPiece.substring(1))];
	    board[parseInt(selectedPiece.substring(0,1))][parseInt(selectedPiece.substring(1))]="";
	} else {
	    alert("Not a movable piece.");
	}
        
    }
    $(document).ready(function() {
	randomlyPlace(false);
    });
</script>
<script type="text/javascript" defer="defer" src="Stratego.js"></script>
<?php include("../Setup/footer.php"); ?>