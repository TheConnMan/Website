<ul id="menu">
    <li><a href="../Setup/index.php">Home</a></li>
    <li>
        <a href="../ConnectFour/ConnectFour.php">Connect Four</a>
        <ul>
            <li><a href="../ConnectFour/Algorithm.php">The Algorithm</a></li>
            <li><a href="../ConnectFour/Development.php">Development</a></li>
        </ul>
    </li>
    <li><a href="../Jump/Jump.php">Jump</a></li>
    <li><a href="../Online/Games.php">Online</a></li>
    <li><a href="../Comments/Bugs.php">Bugs/Features</a></li>
    <li><a href="../Setup/about.php">About</a></li>
    <li style="float: right;">
        <?php
        if ($_SESSION["username"] == "") {
            ?>
            <a href="../Login/Login.php">Login</a>
            <?php
        } else {
            ?>
            <a>Welcome, 
                <?php
                echo $_SESSION["username"];
            }
            ?></a>
        <?php
        if ($_SESSION["username"] != "") {
            ?>
            <ul>
                <li><a href="../Login/Logout.php">Logout</a></li>
            </ul>
            <?php
        }
        ?>
    </li>
    <?php
        if (!defined('CLIENT_LONG_PASSWORD')) {
            define('CLIENT_LONG_PASSWORD', 1);
        }
        $con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
        mysql_select_db("bcconn+Website", $con);
        $player = $_SESSION["username"];
        $temp = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM Games WHERE curplayer='$player' AND piece<>'OVER'"));
        $counter = $temp['counter']; ?>
    <li style="float: right; <?php if($counter!=0) {echo 'background-color: red;';} ?>"><a href="../Online/Games.php"><?php echo $counter; if ($counter==1) {echo ' Game';} else {echo ' Games';} ?></a>
        <ul>
            <?php
            $result = mysql_query("SELECT * FROM Games WHERE curplayer='$player' AND piece<>'OVER'");
            while ($row = mysql_fetch_array($result)) {
                ?>
                <form action="../Online/OnlineGame.php" method="post">
                    <li>
                        <a class="gameNotification" onClick="document.forms[0].submit();">
                            <?php echo $row["oppplayer"]; ?>
                        </a>
                    </li>
                    <input type="hidden" name="date" value="<?php echo $row['lastmove']; ?>">
                    <input type="hidden" name="opponent" value="<?php echo $row["oppplayer"]; ?>">
                    <input type="hidden" name="gametype" value="<?php echo $row["gametype"]; ?>">
                    <input type="hidden" name="winner" value="">
                </form>
            <?php } ?>
        </ul>
    </li>
</ul>