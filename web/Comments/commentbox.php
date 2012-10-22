<div id="comments">
    <h2 style="padding-top: 15px">Leave a comment</h2>
    <?php
    $page_name = $path_parts['filename'];
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];
    $currentUrl = $protocol . '://' . $host . $script;
    ?>
    <form action="../Comments/bugssubmitcomment.php" method="post">
        <input type="hidden" name="author" value="Anonymous">
        Author:
        <input type="text" name="author" placeholder="Anonymous"/>
        <input type="radio" name="type" value="Bug" checked>Bug
        <input type="radio" name="type" value="Feature">Feature<br>
        Comment:<br>
        <textarea name="comment" cols="45" rows="5"></textarea><br>
        <input type="hidden" name="page" value="<?php echo $page_name; ?>">
        <input type="hidden" name="pageurl" value="<?php echo $currentUrl; ?>">
        <input type="submit" />
    </form>
    <?php
    if (!defined('CLIENT_LONG_PASSWORD')) {
        define('CLIENT_LONG_PASSWORD', 1);
    }
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
                <table border="0">
                    <tr>
                        <td id="topcommentline">
                            <div id="commentauthor">
                                <?php
                                if ($row['author'] == "") {
                                    echo 'Anonymous';
                                } else {
                                    $preauthor = $row['author'];
                                    $author = str_replace("''", "'", $preauthor);
                                    echo $author;
                                }
                                ?>
                            </div>
                            <div id="commentdate">
    <?php echo date("g:i:s A N/d/y", $row['date']); ?> EST
                            </div>
                        </td>
                    </tr>
                </table>
                <div id="commentbody">
                    <?php $precomment = $row['comment'];
                    $comment = str_replace("''", "'", $precomment);
                    echo $comment; ?>
                </div>
                <div id="relatedcomments">
                    <?php
                    $referencedate = $row['date'];
                    $query2 = sprintf("SELECT * FROM RelatedComments WHERE page='$page_name' AND reference='$referencedate' ORDER BY date ASC");
                    $result2 = mysql_query($query2);
                    while ($row2 = mysql_fetch_array($result2)) {
                        ?>
                        <div style="padding: 5px">
                            <div id="singlerelatedcomment">
                                <table border="0">
                                    <tr>
                                        <td id="reltopcommentline">
                                            <div id="commentauthor">
                                                <?php
                                                if ($row2['author'] == "") {
                                                    echo 'Anonymous';
                                                } else {
                                                    $preauthor = $row2['author'];
                                                    $author = str_replace("''", "'", $preauthor);
                                                    echo $author;
                                                }
                                                ?>
                                            </div>
                                            <div id="commentdate">
                                    <?php echo date("g:i:s A N/d/y", $row2['date']); ?> EST
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div id="commentbody">
                        <?php $precomment = $row2['comment'];
                        $comment = str_replace("''", "'", $precomment);
                        echo $comment; ?>
                                </div>
                            </div>
                        </div>
        <?php
    }
    ?>
                </div><br>
                <div id="makerelcomment">
                    <div class="commentaction" id="comment<?php echo $row['date']; ?>" onclick="displaycomment(<?php echo $row['date']; ?>)">
                        Comment
                    </div>
                    <div id="<?php echo $row['date']; ?>" style="display: none">
                        <form action="../Comments/relatedcomment.php" method="post">
                            <input type="hidden" name="author" value="Anonymous">
                            Author:
                            <input type="text" name="author" placeholder="Anonymous"/><br>
                            Comment:<br>
                            <textarea name="comment" cols="45" rows="2"></textarea><br>
                            <input type="hidden" name="page" value="<?php echo $page_name; ?>">
                            <input type="hidden" name="pageurl" value="<?php echo $currentUrl; ?>">
                            <input type="hidden" name="reference" value="<?php echo $row['date']; ?>">
                            <input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
?>
</div>
<script>
    function displaycomment(id) {
        document.getElementById(id).style.display='block';
        document.getElementById('comment'+id).style.display='none';
    }
</script>
<?php mysql_close($con); ?>