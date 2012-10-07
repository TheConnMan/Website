<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script language="JavaScript" src="../jsunit/app/jsUnitCore.js"></script>
	<script language="JavaScript" src="../Boggle/Boggle.js"></script>
    </head>
    <body>
    <script>
	function testCalculatePoints() {
	    assertEquals(1, calculatePoints('here'));
	    assertEquals(3, calculatePoints('jwidjt'));
	    assertEquals(0, calculatePoints('to'));
	}
    </script>
    </body>
</html>
