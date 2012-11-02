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
        <td id="rightcolumn" style="width: 1100px">
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
                <div style="text-align: center; padding: 5px;">
                    <button type="button" onclick="reset()">Reset</button>
                </div>
                <div id="availablePieces">
                    <button type="button" onclick="finishedPlacing()">Finished Placing Pieces</button>
		    <button type="button" onclick="randomlyPlace(true)">Randomly Place</button>
                    <table style="margin-left: auto; margin-right: auto;">
                        <tr>
                            <?php
                            $pieces=["1","2","3","4","5","6","7","8","9","S","B","F"];
                            $pieceNums=[1,1,2,3,4,4,4,5,8,1,6,1];
                            for ($i=0; $i<12; $i++) {
                                echo "<td><div class='piecesLeft' id='piecesLeft";
                                echo $pieces[$i];
                                echo "'>";
                                echo $pieceNums[$i];
                                echo "</div><div class='space2'>";
                                echo $pieces[$i];
                                echo "</div></td>";
                            }
                            ?>
                        </tr>
                    </table>
                </div>
                <?php include("../Comments/commentbox.php"); ?>
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
        var pieces=["1","2","3","4","5","6","7","8","9","S","B","F"];
        var pieceNums=[1,1,2,3,4,4,4,5,8,1,6,1];
    function reset() {
        board = [[" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "," "," "," "]];
        gameStage=0;
        randomlyPlace(false);
        $("#availablePieces").show();
        $("#leftmenu").height($("#rightcontent").height());
        for (var i=6; i<10; i++) {
	    for (var j=0; j<10; j++) {
		$("#"+String(i)+String(j)).css("background-color",placementColor);
                $("#"+String(i)+String(j)).text("");
	    }
	}
        for (var i=0; i<4; i++) {
	    for (var j=0; j<10; j++) {
		$("#"+String(i)+String(j)).css("background-color",opponentColor);
                $("#"+String(i)+String(j)).text("");
	    }
	}
        for (var i=4; i<6; i++) {
	    for (var j=0; j<10; j++) {
		$("#"+String(i)+String(j)).css("background-color",backgroundColor);
                $("#"+String(i)+String(j)).text("");
	    }
	}
        for (var i=0; i<12; i++) {
            $("#piecesLeft"+pieces[i]).text(pieceNums[i]);
        }
        $("#42").css("background-color",lakeColor);
        $("#43").css("background-color",lakeColor);
        $("#52").css("background-color",lakeColor);
        $("#53").css("background-color",lakeColor);
        $("#46").css("background-color",lakeColor);
        $("#47").css("background-color",lakeColor);
        $("#56").css("background-color",lakeColor);
        $("#57").css("background-color",lakeColor);
    }
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
            } else if (getColor(id)==backgroundColor||getColor(id)==opponentColor) {
                if (squareAdjacent(id)) {
                    movePiece(id);
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
            if ($("#"+idName).text()==""&&board[parseInt(idName.substring(0,1))][parseInt(idName.substring(1))]==" ") {
                $("#"+idName).text($("#"+selectedPiece).text());
                $("#"+idName).css("background-color",placedColor);
                board[parseInt(idName.substring(0,1))][parseInt(idName.substring(1))]=board[parseInt(selectedPiece.substring(0,1))][parseInt(selectedPiece.substring(1))];
            } else if ($("#"+idName).text()==""&&board[parseInt(idName.substring(0,1))][parseInt(idName.substring(1))]!=" ") {
                var attacker=board[parseInt(selectedPiece.substring(0,1))][parseInt(selectedPiece.substring(1))];
                var defender=board[parseInt(idName.substring(0,1))][parseInt(idName.substring(1))];
                alert("Attacker is "+attacker+". Defender is "+defender+".");
                var result=attackPiece(attacker,defender);
                if (result=="attacker") {
                } else if (result=="defender") {
                    $("#"+idName).css("background-color",placedColor);
                    $("#"+idName).text($("#"+selectedPiece).text());
                    board[parseInt(idName.substring(0,1))][parseInt(idName.substring(1))]=board[parseInt(selectedPiece.substring(0,1))][parseInt(selectedPiece.substring(1))];
                } else if (result=="both") {
                    board[parseInt(idName.substring(0,1))][parseInt(idName.substring(1))]=" ";
                    $("#"+idName).text("");
                    $("#"+idName).css("background-color",backgroundColor);
                } else if (result=="over") {
                    $("#"+idName).css("background-color",placedColor);
                    $("#"+idName).text($("#"+selectedPiece).text());
                    board[parseInt(idName.substring(0,1))][parseInt(idName.substring(1))]=board[parseInt(selectedPiece.substring(0,1))][parseInt(selectedPiece.substring(1))];
                    gameStage=2;
                    displayAll();
                }
            }
            $("#"+selectedPiece).text("");
            board[parseInt(selectedPiece.substring(0,1))][parseInt(selectedPiece.substring(1))]=" ";
            $("#"+selectedPiece).css("background-color",backgroundColor);
	} else {
	    alert("Not a movable piece.");
	}
        
    }
    $(document).ready(function() {
	randomlyPlace(false);
    });
    function displayAll() {
        for (var i=0; i<10; i++) {
            for (var j=0; j<10; j++) {
                $("#"+String(i)+String(j)).text(board[i][j]);
            }
        }
    }
</script>
<script type="text/javascript" defer="defer" src="Stratego.js"></script>
<?php include("../Setup/footer.php"); ?>