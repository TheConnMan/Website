<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
<title>Games</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
	<td id="rightcolumn">
	    <div id="rightcontent" style="width: 800px; margin-left: auto; margin-right: auto;">
		<?php
		if ($_SESSION["username"] == null) {
		    ?>
    		<h2 style="text-align: center;">Please login to play games against other players</h2>
		    <?php
		} else {
		    ?>
    		<h1 style="text-align: center; padding-bottom: 10px;">Welcome <?php echo $_SESSION["username"]; ?></h1>
    		<div style="padding: 10px;">
    		    <h2>Start New Game</h2>
    		    <form action="../Online/OnlineGame.php" method="post">
			<input type="hidden" name="opponent" value="">
    			Opponent:
    			<input type="text" name="opponent" placeholder="Random"/><br>
    			<input type="radio" name="gametype" value="Connect Four" checked> Connect Four<br>
			<input type="hidden" name="date" value="">
    			<input type="submit" value="Start"/>
    		    </form>
    		</div>
    		<div style="padding: 10px;">
    		    <h2>Your Turn</h2>
			<?php
			if (!defined('CLIENT_LONG_PASSWORD')) {
			    define('CLIENT_LONG_PASSWORD', 1);
			}
			$con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
			mysql_select_db("bcconn+Website", $con);
			$player = $_SESSION["username"];
			$temp = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM Games WHERE curplayer='$player' AND piece<>'OVER'"));
			if ($temp['counter'] == 0) {
			    ?>
			    None
			    <?php
			} else {
			    $result = mysql_query("SELECT * FROM Games WHERE curplayer='$player' AND piece<>'OVER'");
			    while ($row = mysql_fetch_array($result)) {
				?>
	    		    <div style="padding: 5px; margin: 5px; border: 1px solid black; border-radius: 5px; width: 300px;">
	    			Opponent: <?php echo $row["oppplayer"]; ?><br>
	    			Game: <?php echo $row["gametype"]; ?><br>
	    			Last Move: <?php echo date("g:i:s A n/d/y", $row['lastmove']+6*3600); ?> EST<br>
	    			<form action="../Online/OnlineGame.php" method="post">
	    			    <input type="hidden" name="date" value="<?php echo $row['lastmove']; ?>">
	    			    <input type="hidden" name="opponent" value="<?php echo $row["oppplayer"]; ?>">
				    <input type="hidden" name="gametype" value="<?php echo $row["gametype"]; ?>">
				    <input type="hidden" name="winner" value="">
	    			    <input type="submit" value="Play"/>
	    			</form>
	    		    </div>
				<?php
			    }
			}
			?>
    		</div>
    		<div style="padding: 10px;">
    		    <h2>Opponents Turn</h2>
			<?php
			$temp = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM Games WHERE oppplayer='$player' AND piece<>'OVER'"));
			if ($temp['counter'] == 0) {
			    ?>
			    None
			    <?php
			} else {
			    $result = mysql_query("SELECT * FROM Games WHERE oppplayer='$player' AND piece<>'OVER'");
			    while ($row = mysql_fetch_array($result)) {
				?>
	    		    <div style="padding: 5px; margin: 5px; border: 1px solid black; border-radius: 5px; width: 300px;">
	    			Opponent: <?php echo $row["curplayer"]; ?><br>
	    			Game: <?php echo $row["gametype"]; ?><br>
	    			Last Move: <?php echo date("g:i:s A n/d/y", $row['lastmove']+6*3600); ?> EST
	    		    </div>
				<?php
			    }
			}
			?>
    		</div>
    		<div style="padding: 10px;">
    		    <h2>Finished Games</h2>
			<?php
			if (!defined('CLIENT_LONG_PASSWORD')) {
			    define('CLIENT_LONG_PASSWORD', 1);
			}
			$con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
			mysql_select_db("bcconn+Website", $con);
			$player = $_SESSION["username"];
			$temp = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM Games WHERE curplayer='$player' AND piece='OVER'"));
			$temp2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM Games WHERE oppplayer='$player' AND piece='OVER'"));
			$counter=$temp['counter']+$temp2['counter'];
			if ($counter==0) {
			    ?>
			    None
			    <?php
			} else {
			    $result = mysql_query("SELECT * FROM Games WHERE oppplayer='$player' AND piece='OVER' LIMIT 4");
			    while ($row = mysql_fetch_array($result)) {
				?>
	    		    <div style="padding: 5px; margin: 5px; border: 1px solid black; border-radius: 5px; width: 300px;">
	    			Opponent: <?php echo $row["curplayer"]; ?><br>
	    			Game: <?php echo $row["gametype"]; ?><br>
	    			Last Move: <?php echo date("g:i:s A n/d/y", $row['lastmove']+6*3600); ?> EST<br>
				You Won<br>
	    			<form action="../Online/OnlineGame.php" method="post">
	    			    <input type="hidden" name="date" value="<?php echo $row['lastmove']; ?>">
	    			    <input type="hidden" name="opponent" value="<?php echo $row["oppplayer"]; ?>">
				    <input type="hidden" name="gametype" value="<?php echo $row["gametype"]; ?>">
				    <input type="hidden" name="winner" value="<?php echo $_SESSION["username"]; ?>">
	    			    <input type="submit" value="View"/>
	    			</form>
	    		    </div>
				<?php
			    }
				$result = mysql_query("SELECT * FROM Games WHERE curplayer='$player' AND piece='OVER' LIMIT 4");
			    while ($row = mysql_fetch_array($result)) {
				?>
	    		    <div style="padding: 5px; margin: 5px; border: 1px solid black; border-radius: 5px; width: 300px;">
	    			Opponent: <?php echo $row["oppplayer"]; ?><br>
	    			Game: <?php echo $row["gametype"]; ?><br>
	    			Last Move: <?php echo date("g:i:s A n/d/y", $row['lastmove']+6*3600); ?> EST<br>
				You Lost<br>
	    			<form action="../Online/OnlineGame.php" method="post">
	    			    <input type="hidden" name="date" value="<?php echo $row['lastmove']; ?>">
	    			    <input type="hidden" name="opponent" value="<?php echo $row["oppplayer"]; ?>">
				    <input type="hidden" name="gametype" value="<?php echo $row["gametype"]; ?>">
				    <input type="hidden" name="winner" value="<?php echo $row["oppplayer"]; ?>">
	    			    <input type="submit" value="View"/>
	    			</form>
	    		    </div>
			    <?php
			    }
			}
			?>
    		</div>
		    <?php
		}
		?>
	    </div>
	</td>
    </tr>
</table>
<?php include("../Setup/footer.php"); ?>