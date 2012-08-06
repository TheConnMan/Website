<%-- 
    Document   : index
    Created on : Jul 27, 2012, 7:23:17 PM
    Author     : Brian
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="CSS.css">
        <title>Home Page</title>
    </head>
    <body>
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
                window.location = './Web%20Page.html'
            }
            function redirect2()
            {
                window.location = './Template.html'
            }
	    function redirectConnectFour()
	    {
		window.location = './ConnectFour/ConnectFour.html'
	    }
            </script>
            <div class="push"></div>
        </div>
        <div class="footer">
            <div style="text-align: center">
                Look at this footer!
            </div>
        </div>
    </body>
</html>
