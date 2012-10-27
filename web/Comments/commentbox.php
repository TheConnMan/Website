<div id="comments">
    <h2 style="padding-top: 15px">Leave a comment</h2>
    <?php
    $page_name = $path_parts['filename'];
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];
    $currentUrl = $protocol . '://' . $host . $script;
    ?>
    <form action="../Comments/submitcomment.php" method="post">
        <input type="hidden" name="author" value="Anonymous">
        Author:
        <input type="text" name="author" placeholder="Anonymous"/>
	<?php if ($page_name == 'Bugs') {
	    ?>
        <input type="radio" name="type" value="Bug" checked>Bug
        <input type="radio" name="type" value="Feature">Feature<br>
	    <?php
	}
	?>
        Comment:<br>
        <textarea name="comment" cols="45" rows="5"></textarea><br>
        <input type="hidden" name="page" value="<?php echo $page_name; ?>">
        <input type="hidden" name="pageurl" value="<?php echo $currentUrl; ?>">
        <input type="hidden" name="commenttype" value="first">
        <input type="submit" />
    </form>
    <?php
    if (!defined('CLIENT_LONG_PASSWORD')) {
	define('CLIENT_LONG_PASSWORD', 1);
    }
    $query = sprintf("SELECT * FROM Comments WHERE page='$page_name' AND reference IS NULL ORDER BY date DESC");
    $con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
    mysql_select_db("bcconn+Website", $con);
    $result = mysql_query($query);
    $temp = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM Comments WHERE page='$page_name' AND reference IS NULL"));
    $numOfComments = $temp["counter"];
    ?>
</div>

<div id="previouscomments">
    <?php
    $commentsPerPage = 5;
    $commentNum = 0;
    while ($row = mysql_fetch_array($result)) {
        $commentNum++;
        if ($commentNum % $commentsPerPage == 1) {
            $displayType;
            if ($commentNum==1) {
                $displayType='block';
            } else {
                $displayType='none';
            }
            ?>
    <div id="commentPage<?php echo (int) ($commentNum / $commentsPerPage)+1; ?>" style="display: <?php echo $displayType ?>">
                <?php
            }
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
                                    <?php echo date("g:i:s A n/d/y", $row['date']); ?> EST
                            </div>
                        </td>
                            <?php
                            if ($page_name == 'Bugs') {
                                ?>
                        <td style="padding-left: 10px; padding-right: 10px">
                            <div id="typeline">
                                        <?php echo $row['type']; ?>
                            </div>
                        </td>
                                <?php
                            }
                            ?>
                    </tr>
                </table>
                <div id="commentbody">
                        <?php
                        $precomment = $row['comment'];
                        $comment = str_replace("''", "'", $precomment);
                        echo $comment;
                        ?>
                </div>
                    <?php
                    $referencedate = $row['date'];
                    $query2 = sprintf("SELECT COUNT(*) AS count FROM Comments WHERE page='$page_name' AND reference='$referencedate'");
                        $result3 = mysql_query($query2);
                        $countRel = mysql_fetch_array($result3);
                        if ((int)$countRel['count']!=0) {
                            ?>
                <div id="expandcomments<?php echo $row['date']; ?>" class="commentaction" onclick="displaycomments(<?php echo $row['date']; ?>)">
                    +<?php
                    echo $countRel['count'];
                        ?> comments
                </div>
                    <?php } ?>
                <div id="relatedcomments<?php echo $row['date']; ?>" class="relatedcomments">
                        <?php
                        $query2 = sprintf("SELECT * FROM Comments WHERE page='$page_name' AND reference='$referencedate' ORDER BY date ASC");
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
                                                    <?php echo date("g:i:s A n/d/y", $row2['date']); ?> EST
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div id="commentbody">
                                        <?php
                                        $precomment = $row2['comment'];
                                        $comment = str_replace("''", "'", $precomment);
                                        echo $comment;
                                        ?>
                            </div>
                        </div>
                    </div>
                            <?php
                        }
                        ?>
                    <div id="minimizecomments" class="commentaction" onclick="minimizecomments(<?php echo $row['date']; ?>)" style="margin-left: 40px; padding: 10px;">
                        -<?php echo $countRel['count']; ?> comments
                    </div>
                </div>
                <div id="makerelcomment">
                    <button type="button" id="comment<?php echo $row['date']; ?>" onclick="displaycommenter(<?php echo $row['date']; ?>)">Comment</button>
                    <div id="<?php echo $row['date']; ?>" style="display: none">
                        <form action="../Comments/submitcomment.php" method="post">
                            <input type="hidden" name="author" value="Anonymous">
                            Author:
                            <input type="text" name="author" placeholder="Anonymous"/><br>
                            Comment:<br>
                            <textarea name="comment" cols="45" rows="2"></textarea><br>
                            <input type="hidden" name="page" value="<?php echo $page_name; ?>">
                            <input type="hidden" name="pageurl" value="<?php echo $currentUrl; ?>">
                            <input type="hidden" name="commenttype" value="related">
                            <input type="hidden" name="reference" value="<?php echo $row['date']; ?>">
                            <input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <?php
            if ($commentNum % $commentsPerPage == 0 || $commentNum == $numOfComments) {
                ?>
    </div>
            <?php
        }
    }
    if ($numOfComments > $commentsPerPage) {
        ?>
    <div id="pageButtons">
            <?php
            for ($pageNum = 1; $pageNum <= (int) (($numOfComments-1) / $commentsPerPage)+1; $pageNum++) {
                ?>
        <div id="page<?php echo $pageNum; ?>" class="pageNumber"><?php echo $pageNum; ?></div>
                <?php
            }
            ?>
        <script>
            var numberOfPages=parseInt(<?php echo (int) (($numOfComments-1) / $commentsPerPage); ?>)+1;
        </script>
    </div>
	<?php
    }
    ?>
</div>
<script>
    function displaycommenter(id) {
        document.getElementById(id).style.display='block';
        document.getElementById('comment'+id).style.display='none';
        var top = $('#pageButtons').offset().top;
        $("#rightContent").height(top+100);
        resetPage();
    }
    function displaycomments(id) {
        document.getElementById('expandcomments'+id).style.display='none';
        document.getElementById('relatedcomments'+id).style.display='block';
        var top = $('#pageButtons').offset().top;
        $("#rightContent").height(top+100);
        resetPage();
    }
    function minimizecomments(id) {
        document.getElementById('expandcomments'+id).style.display='block';
        document.getElementById('relatedcomments'+id).style.display='none';
        var top = $('#pageButtons').offset().top;
        $("#rightContent").height(top+100);
        resetPage();
    }
    $(".pageNumber").click(function() {
        var displayedPage=parseInt($(this).attr("id").substring(4));
        for (var i=1; i<=numberOfPages; i++) {
            if (i==displayedPage) {
                document.getElementById("commentPage"+i).style.display='block';
            } else {
                document.getElementById("commentPage"+i).style.display='none';
            }
        };
        resetPage();
    });
</script>
<?php mysql_close($con); ?>
