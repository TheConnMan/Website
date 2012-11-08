<?php $path_parts = pathinfo(__FILE__); include("../Setup/preheader.php"); ?>
<title>Bugs/Features</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
	<td id="rightcolumn">
	    <div id="rightcontent" style="width: 800px; margin-left: auto; margin-right: auto;">
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