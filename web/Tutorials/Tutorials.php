<?php $path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php"); ?>
<title>Tutorials</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
	<td id="leftcolumn">
	    <div id="leftmenu">
		<ul style="list-style: none">
		    <li style="padding-top: 15px">
			Tutorials
			<ul>
			    <li><a href="#python">Python</a></li>
			    <li><a href="#java">Java</a></li>
			</ul>
		    </li>
		</ul>
	    </div>
	</td><td width="3%"></td>
	<td id="rightcolumn">
	    <div id="rightcontent">
		<h1 style="text-align: center">Tutorials</h1>
		<div style="text-align: left">
		    <div class="bodyparagraph">
			<p>
			    There are some programming languages that I have learned which I haven't found 
                            very good tutorials for. Some have been way too basic, some spend too much time 
                            on useless things, and some are just too confusing to follow. My goal here is 
                            provide a few guides of what I think is helpful when learning a language (
                            depending on the language of course). Here's a layout of what I use different 
                            languages for:
			</p>
		    </div>
                    <table>
                        <tr>
                            <td id="python" style="width: 50%; padding: 10px; vertical-align: top;">
                                <h3><a href="../Tutorials/Python.php">Python</a></h3>
                                <p>
                                    Python is a good language to learn how to program the basics.
                                </p>
                            </td>
                            <td id="java" style="width: 50%; padding: 10px; vertical-align: top;">
                                <h3>Java</h3>
                                <p>
                                    Java is a good all around language.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td id="html" style="width: 50%; padding: 10px; vertical-align: top;">
                                <h3>HTML</h3>
                                <p>
                                    HTML is an easy web development language.
                                </p>
                            </td>
                            <td id="PHP" style="width: 50%; padding: 10px; vertical-align: top;">
                                <h3>PHP</h3>
                                <p>
                                    PHP is not as easy as HTML.
                                </p>
                            </td>
                        </tr>
                    </table>
		</div>
	    </div>
	</td>
    </tr>
</table>
<?php include("../Setup/footer.php"); ?>