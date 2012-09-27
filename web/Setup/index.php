<?php include("header.php"); ?>
<head>
    <title>Connect Four</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link type="text/css" rel="stylesheet" href="./CSS.css">
</head>
<div id="content">
    <h1>Hello World!</h1>
    <button type="button" onclick="myFunction()">Try it</button>
    <button type="button" onclick="redirect()">Redirect Me</button><br />
    <button type="button" onclick="redirect2()">Check this out</button>
    <button type="button" onclick="redirectConnectFour()">Yo, play some Connect Four</button>
</div>
<script type="text/javascript">
    function myFunction()
    {
	document.getElementById("demo").innerHTML="My First JavaScript Function";
    }
    function redirect()
    {
	window.location = './Web%20Page.php'
    }
    function redirect2()
    {
	window.location = './Template.php'
    }
    function redirectConnectFour()
    {
	window.location = '../ConnectFour/ConnectFour.php'
    }
</script>
<?php include("footer.php"); ?>