<?php $path_parts = pathinfo(__FILE__); include("../Setup/preheader.php"); ?>
<title>About The Author</title>
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
		<h1 style="text-align: center">The Author</h1>
		<div style="text-align: left">
		    <h2 id="connectfourlabel">Brian Conn</h2>
		    <div style="padding-top: 5px; padding-left: 5px">
			<p>
			    Enter the Winter of '11:
			    In the bitter, mild cold of Michigan I toiled away trying to find things to do. 
			    My time away from school had taken a toll on my workload and I was stranded in 
			    the unforgiving land of boredom. My friend, a student on break from school in 
			    our nation's capital, had not yet taken his finals and so was studying for much 
			    of his winter break. Following in the footsteps of the old American proverb 
			    "Misery loves warm mochas" I staved off the cold and having to spend more than
			    three consecutive hours with my family by joining him in the quite confines of 
			    a local cafe.
			</p>
		    </div>
		</div>
	    </div>
	</td>
    </tr>
</table>
<script>
    $(document).ready(function(){
	$("#leftmenu").height($("#rightcontent").height())
	
    });
</script>
<?php include("../Setup/footer.php"); ?>