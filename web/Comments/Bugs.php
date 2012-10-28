<?php $path_parts = pathinfo(__FILE__); include("../Setup/preheader.php"); ?>
<title>Bugs/Features</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
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
		<h1 style="text-align: center">Bugs and New Features</h1>
		<div style="text-align: left">
		    <div class="bodyparagraph">
                        <h2>Finding bugs</h2>
			<p>
			    I'm always looking for help with this site, so if you find bugs or want 
                            any new features, please leave a comment below and I'll do my best to add 
                            it.
			</p>
		    </div>
		    <?php include("../Comments/commentbox.php"); ?>
		</div>
	    </div>
	</td>
    </tr>
</table>
<?php include("../Setup/footer.php"); ?>