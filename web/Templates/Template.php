<?php $path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>

<title>The Code</title>

<?php include("../Templates/Top.php"); ?>

<a href="#connectfourlabel">Connect Four</a>
<ul>
    <li><a href="#backstory">Backstory</a></li>
    <li><a href="#actualcode">The Actual Code</a></li>
</ul>

<?php include("../Templates/Middle.php"); ?>

<h1 style="text-align: center">The Algorithm</h1>
<div style="text-align: left">
    <h2 id="backstory">Backstory</h2>
    <p class="bodyparagraph">

    </p>
    <h2 style="padding-top: 15px" id="actualcode">The Actual Code</h2>
    <p class="bodyparagraph">
        The base algorithm is a recursive point based system. The actual code for that 
        part of the AI is only 32 lines, the rest is just the (inefficiently written) 
        rules and producing the board. 
    </p>
</div>

<?php include("../Templates/Bottom.php"); ?>