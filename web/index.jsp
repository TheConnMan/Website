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
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hello World!</h1>
        <h2 id="demo">Hello2</h2>
        <button type="button" onclick="myFunction()">Try it</button>
        <button type="button" onclick="redirect()">Redirect Me</button>
        <script type="text/javascript">
        function myFunction()
        {
            document.getElementById("demo").innerHTML="My First JavaScript Function";
        }
        function redirect()
            {
                window.location = './Web%20Page.html'
            }
        </script>
    </body>
</html>
