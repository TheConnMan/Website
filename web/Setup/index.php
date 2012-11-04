<?php $path_parts = pathinfo(__FILE__); include("../Setup/preheader.php"); ?>
<title>Home</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
	<td id="leftcolumn">
	    <div id="leftmenu">
		<ul style="list-style: none">
		    <h3 style="padding-top: 15px">At A Glance</h3>
		    <li style="padding-top: 15px">
			<a href="../ConnectFour/ConnectFour.php">Connect Four</a>
			<ul>
			    <li><a href="../ConnectFour/Algorithm.php">The Algorithm</a></li>
			    <li><a href="../ConnectFour/Development.php">Development</a></li>
			</ul>
		    </li>
		    <li><a href="../Comments/Bugs.php">Bugs/Features</a></li>
		    <li><a href="../Setup/about.php">About the Author</a></li>
		</ul>
	    </div>
	</td><td width="3%"></td>
	<td id="rightcolumn">
	    <div id="rightcontent">
		<h1 style="text-align: center">A Work In Progress</h1>
		<div style="text-align: left">
		    <div style="padding-top: 5px; padding-left: 5px">
			<p>
			    This site is a staging site for projects that I've put together as well as a 
			    way to learn html, php, and JavaScript. Right now there's just connect four, but there 
			    will be more to come.
			</p>
		    </div>
		    <h2 style="padding: 5px;">What To Expect</h2>
		    <p style="padding: 5px">
			Right now I have a connect four game I originally wrote in Java and a comments section for 
			bugs and features people have found or want. I've also got a mostly finished about the author 
			section, but I keep getting sidetracked.
		    </p>
		    <p style="padding: 5px">
			I keep trying to write more content for the pages and make them look better, but I'll think 
			of some new php feature (e.g. comments, expandable comments, view counts) and creating those 
			instead. There's also the fact that I'm not very creative when it comes to the llok and feel 
			of websites. So far the coolest aesthetic feature I've incluede is rounded corners. On. Everything. 
			I always thought that stuff was kinda nit-picky and not very fun to code, so I didn't bother 
			with it much. It is, however, what gives the feel and impression of your site, so it is worthwhile.
		    </p>
		    <h2 style="text-align: center; padding: 10px;">What You Can Do</h2>
		    <table border="0" id="siteChoices">
			<tr>
			    <td>
				Connect Four<br>
				<a href="../ConnectFour/ConnectFour.php">
				    <img src="../Images/ConnectFour.png" alt="Play Connect Four!" width="100%" border="0">
				</a>
			    </td>
			    <td>
				Request Features<br>
				<a href="../Comments/Bugs.php">
				    <img src="../Images/Bugs.png" alt="Report bugs!" width="95%" border="0">
				</a>
			    </td>
			    <td>
				About the Author<br>
				<a href="../Setup/about.php">
				    <img src="../Images/About.png" alt="Read aobut me!" width="95%" border="0">
				</a>
			    </td>
			</tr>
		    </table>
		</div>
	    </div>
	</td>
    </tr>
</table>
<?php include("../Setup/footer.php"); ?>