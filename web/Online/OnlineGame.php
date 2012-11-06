<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
<title>Online Games</title>
<?php include("../Setup/header.php"); ?>
<head>
    <link type="text/css" rel="stylesheet" href="../ConnectFour/ConnectFour.css">
    <style type="text/css">
        #sidebuttons:hover {color: #2f8be8; cursor: pointer}
    </style>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
        <td id="leftcolumn">
            <div id="leftmenu">
                <ul style="list-style: none">
                    <li style="padding-top: 15px">
                        <a href="#connectfourlabel">Connect Four</a>
                        <ul>
                            <li><div id="sidebuttons" onclick="mode=0; reset(); buttons.style.display='block'; buttons2.style.display='none'; $.resetleft()">Play Computer</div></li>
                            <li><div id="sidebuttons" onclick="mode=1; reset(); buttons.style.display='none'; buttons2.style.display='none'; $.resetleft()">Play Human</div></li>
                            <li><div id="sidebuttons" onclick="mode=2; reset(); buttons.style.display='none'; buttons2.style.display='block'; $.resetleft()">Computer Trials</div></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </td><td width="3%"></td>
        <td id="rightcolumn" style="width: 1100px">
            <div id="rightcontent">
		<?php
		$gametype = $_POST["gametype"];
		if (!defined('CLIENT_LONG_PASSWORD')) {
		    define('CLIENT_LONG_PASSWORD', 1);
		}
		$con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
		mysql_select_db("bcconn+Website", $con);
		$player = $_SESSION["username"];
		$opponent = $_POST["opponent"];
		if ($opponent == "") {
		    $tempquery = mysql_query("SELECT COUNT(*) as count FROM Users WHERE username<>'$player'");
		    $query = mysql_fetch_array($tempquery);
		    $num = $query["count"];
		    $result = mysql_query("SELECT * FROM Users WHERE username<>'$player'");
		    $rand = rand(1, $num);
		    $counter = 1;
		    while ($row = mysql_fetch_array($result)) {
			if ($counter == $rand) {
			    $opponent = $row["username"];
			    break;
			}
		    }
		}
		$date = $_POST["date"];
		if ($date == "") {
		    $validuser = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS count FROM Users WHERE username='$opponent'"));
		} else {
		    $validuser = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS count FROM Users WHERE username='$player'"));
		}
		if ($validuser["count"] != 0) {
		    if ($gametype == "Connect Four") {
			if ($date != "") {
			    $result = mysql_fetch_array(mysql_query("SELECT * FROM Games WHERE curplayer='$player' AND lastmove='$date' AND gametype='$gametype'"));
			    $board = $result["board"];
			    $piece = $result["piece"];
			    ?>
	                    <script>
	                        var stri='<?php echo $board; ?>';
	                        var board = [[" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "]]
	                        for (var i=0; i<6; i++) {
	                            for (var j=0; j<7; j++) {
	                                var tempNum=2*(i*7+j);
	                                var temPiece=stri.substring(tempNum,tempNum+1);
	                                if (temPiece=="-") {
	                                    board[i][j]=" ";
	                                } else {
	                                    board[i][j]=" "+temPiece+" ";
	                                }
	                            }
	                        }
	                        var piece='<?php echo $piece; ?>';
	                    </script>
			    <?php
			} else {
			    $piece = " X ";
			    ?>
	                    <script>
	                        var board=[[" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "],
	                            [" "," "," "," "," "," "," "]];
	                        var piece='<?php echo $piece; ?>';
	                    </script>
			    <?php
			}
			if ($piece == " X ") {
			    $piece = " O ";
			} else if ($piece == " O ") {
			    $piece = " X ";
			}
			?>
	                <h1 style="text-align: center; padding-bottom: 10px">Connect Four With Friends!</h1>
	                <div style="padding: 10px">
	                    <div  style="width: 350px; margin-left: auto; margin-right: auto; padding: 20px; background-color: tan; border-radius: 6px">
	                        <table border="0">
				    <?php
				    $squareNum = 8;
				    for ($row = 0; $row < 6; $row++) {
					echo "<tr>";
					for ($col = 0; $col < 7; $col++) {
					    echo "<td style='padding-left: 5px; padding-right: 5px;'><div class='piece' id='sqr";
					    echo $squareNum;
					    echo "'></td>";
					    $squareNum++;
					}
					echo "</tr>";
				    }
				    ?>
	                        </table>
	                    </div>
	                </div>
			<?php
		    }
		} else {
		    ?>
                    <h2 style="text-align: center;">Not A Valid User</h2>
		    <?php
		}
		?>
                <div id="submit" style="display: none; text-align: center;">
                    <form action="../Online/SubmitMove.php" method="post">
                        <input id="hiddenBoard" type="hidden" name="board" value="">
                        <input type="hidden" name="player" value="<?php echo $player; ?>">
                        <input type="hidden" name="opponent" value="<?php echo $opponent; ?>">
                        <input id="hiddenPiece" type="hidden" name="piece" value="<?php echo $piece; ?>">
                        <input type="hidden" name="date" value="<?php echo $date; ?>">
                        <input type="hidden" name="gametype" value="<?php echo $gametype; ?>">
                        <input type="submit" />
                    </form>
                </div>
            </div>
        </td>
    </tr>
</table>
<script>
    $(document).ready(function () {
	update();
    });
<?php if ($piece != 'OVER') {
    ?>
    	    $(".piece").click(function () {
    		var idName=$(this).attr("id");
    		var num=(parseInt(idName.substring(3))-8)%7;
    		previewMove(idName,num);
    	    });
<?php } ?>
</script>
<script type="text/javascript" defer="defer" src="ConnectFour.js"></script>
<?php include("../Setup/footer.php"); ?>