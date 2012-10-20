<div id="comments">
    <?php
    $page_name = $path_parts['filename'];
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];
    $currentUrl = $protocol . '://' . $host . $script;
    ?>
    <form action="../Comments/submitcomment.php" method="post">
	Author:
	<input type="text" name="author" /><br>
	Comment:<br>
	<textarea name="comment" cols="45" rows="5">
	</textarea><br>
	<input type="hidden" name="page" value="<?php echo $page_name; ?>">
	<input type="hidden" name="pageurl" value="<?php echo $currentUrl; ?>">
	<input type="submit" />
    </form>
    <?php
    define('CLIENT_LONG_PASSWORD', 1);
    $query = sprintf("SELECT * FROM Comments WHERE page='$page_name' ORDER BY date DESC");
    $con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
    mysql_select_db("bcconn+Website", $con);
    $result = mysql_query($query);
    ?>
</div>

<div id="previouscomments">
    <?php
    while ($row = mysql_fetch_array($result)) {
	?>
        <div style="padding-bottom: 10px; padding-top: 10px;">
            <div id="singlecomment">
    	    <div id="topcommentline">
    		<div id="commentauthor">
			<?php echo $row['author']; ?>
    		</div>
    		<div id="commentdate">
			<?php echo date("D M d Y g:i:s A", $row['date']); ?>
    		</div>
    	    </div>
    	    <div id="commentbody">
		    <?php echo $row['comment']; ?>
    	    </div>
            </div>
        </div>
	<?php
    }
    ?>
</div>
<?php mysql_close($con); ?>