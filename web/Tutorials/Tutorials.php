<?php $path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php"); ?>
<title>Tutorials</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
	<td id="rightcolumn">
	    <div id="rightcontent">
		<h1 style="text-align: center">Tutorials</h1>
		<div style="text-align: left">
		    <div class="bodyparagraph">
			<p>
			    There are some programming languages that I have learned which I haven't found 
                            very good tutorials for. Some have been way too basic, some spend too much time 
                            on useless things, and some are just too confusing to follow. My goal here is 
                            provide a few guides of what I think is helpful when learning a language (depending 
                            on the language of course). Here's a layout of what I use different languages for:
			</p>
		    </div>
                    <table>
                        <tr>
                            <td id="python" style="width: 50%; padding: 10px; vertical-align: top;">
                                <h3><a href="../PythonTutorial/Python.php">Python</a></h3>
                                <p>
                                    Python is a good language to learn how to program the basics. Syntax is 
                                    very intuitive so you don't have to learn two things at the same time. 
                                    It's also very quick to write programs in, so I use it to quickly generate 
                                    basic data or to parse files. As easy as Python is to use, I don't 
                                    recommend it as a primary language. Python isn't used in many big 
                                    application because it is somewhat slow and does not scale well. Python 
                                    can create function libraries, but I don't use Python for anything more 
                                    then a few hundred lines.
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
                        <tr>
                            <td id="LaTeX" style="width: 50%; padding: 10px; vertical-align: top;">
                                <h3><a href="../LaTeXTutorial/LaTeX.php">LaTeX</a></h3>
                                <p>
                                    LaTeX is a formatting language used to make very nice looking PDFs. It is 
                                    often used for resumes, research papers, white papers, etc.
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