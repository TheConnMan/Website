<ul id="menu">
    <li><a href="../Setup/index.php">Home</a></li>
    <li>
        <a href="../ConnectFour/ConnectFour.php">Connect Four</a>
        <ul>
            <li><a href="../ConnectFour/Algorithm.php">The Algorithm</a></li>
            <li><a href="../ConnectFour/Development.php">Development</a></li>
        </ul>
    </li>
    <li><a href="../Jump/Jump.php">Jump</a></li>
    <li><a href="../Comments/Bugs.php">Bugs/Features</a></li>
    <li><a href="../Setup/about.php">About</a></li>
    <li style="float: right;">
	<?php
	if ($_SESSION["username"] == null) {
	    ?>
    	<a href="../Login/Login.php">Login</a>
	    <?php
	} else {
	    ?>
	<a>Welcome, 
	    <?php
	    echo $_SESSION["username"];
	}
	?></a>
	<?php
	if ($_SESSION["username"]!=null) {
	?>
	<ul>
	    <li><a href="../Login/Logout.php">Logout</a></li>
	</ul>
	<?php
	}
	?>
    </li>
</ul>