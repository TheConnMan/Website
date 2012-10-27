<?php $path_parts = pathinfo(__FILE__); include("../Setup/preheader.php"); ?>
<title>Home</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table border="0">
    <tr>
	<td id="leftcolumn">
	    <div id="leftmenu">
		<ul style="list-style: none">
		    <h3 style="padding-top: 15px">At A Glance</h3>
		    <li style="padding-top: 15px">
			<a href="../ConnectFour/ConnectFour.php">Connect Four</a>
			<ul>
			    <li><a href="../ConnectFour/Algorithm.php#backstory">Backstory</a></li>
			    <li><a href="../ConnectFour/Algorithm.php#actualcode">The Actual Code</a></li>
			</ul>
		    </li>
		</ul>
	    </div>
	</td><td width="3%"></td>
	<td id="rightcolumn">
	    <div id="rightcontent">
		<h1 style="text-align: center">Welcome to my website!</h1>
		<div style="text-align: left">
		    <div style="padding-top: 5px; padding-left: 5px">
			<p>
			    This site is a staging site for projects that I've put together as well as a 
			    way to learn html, php, and JavaScript. Right now there's just connect four, but there 
			    will be more to come.
			</p>
		    </div>
		</div>
	    </div>
	</td>
    </tr>
</table>
<?php include("../Setup/footer.php"); ?>