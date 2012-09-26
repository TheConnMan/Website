<?php include("header.php"); ?>
    <div class="mainContent">
      <div class="wrapper">
            <h1>Hello World!</h1>
            <button type="button" onclick="myFunction()">Try it</button>
            <button type="button" onclick="redirect()">Redirect Me</button><br />
            <button type="button" onclick="redirect2()">Check this out</button>
	    <button type="button" onclick="redirectConnectFour()">Yo, play some Connect Four</button>
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
		window.location = './ConnectFour/ConnectFour.php'
	    }
            </script>
            <div class="push"></div>
        </div>
    </div>
<?php include("footer.php"); ?>