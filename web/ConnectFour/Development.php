<?php $path_parts = pathinfo(__FILE__); include("../Setup/preheader.php"); ?>
<title>The Code</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
	<td id="leftcolumn">
	    <div id="leftmenu">
		<ul style="list-style: none">
		    <li style="padding-top: 15px">
			<a>Connect Four</a>
			<ul>
			    <li><a href="#development">Development</a></li>
			    <li>
				<a href="#playstyle">Play Style</a>
				<ul>
				    <li><a href="#obvious">The Obvious Move</a></li>
				    <li><a href="#theblock">The Block</a></li>
				</ul>
			    </li>
			</ul>
		    </li>
		</ul>
	    </div>
	</td><td width="3%"></td>
	<td id="rightcolumn">
	    <div id="rightcontent">
		<h1 style="text-align: center">Development</h1>
		<div style="text-align: left">
		    <h2 id="development">Backstory</h2>
		    <div class="bodyparagraph">
			<p>
			    Enter the Winter of '11:
			    In the bitter, mild cold of Michigan I toiled away trying to find things to do. 
			    My time away from school had taken a toll on my workload and I was stranded in 
			    the unforgiving land of boredom. My friend, a student on break from school in 
			    our nation's capital, had not yet taken his finals and so was studying for much 
			    of his winter break. Following in the footsteps of the old American proverb 
			    "Misery loves warm mochas" I staved off the cold and having to spend more than
			    three consecutive hours with my family by joining him in the quite confines of 
			    a local cafe.<br>
			    There I began explore <alt id="pun" onMouseOver="Change()"></alt> I learned
			</p>
		    </div>
		    <h2 style="padding-top: 15px" id="actualcode">The Actual Code</h2>
		    <div class="bodyparagraph">
			<p>
			    The base algorithm is a recursive point based system. The actual code for that 
			    part of the AI is only 32 lines, the rest is just the (inefficiently written) 
			    rules and producing the board. The final function which computes which column 
			    to move to can be found <a href="../ConnectFour/CompMoveRec.js">here</a>. There 
			    are five important inputs to the function: turns, ratio, win, tie, and loss.<br><br>
			    The algorithm creates a decision tree where each new level is generated by the next 
			    player moving in all of the available columns. 
			    At each node the board is checked for a winner and if there isn't then all available 
			    moves are made to branch into the next level. If the current player won then the 
			    value of the node is equal to "win" and if the current player lost then the value
			    is equal to "loss". In both cases the node is given a value and the tree does not 
			    go any deeper. Once the tree has reached a depth equal to "turns" nodes that have 
			    no winner are assigned a value equal to "tie".<br><br>
			    Once all leaf nodes are assigned values the branch node values are calculated. 
			    A branch node value is calculated by summing its child node values and multiplying 
			    by the value of "ratio". The values are propagated up to the first branches and the 
			    node with the highest value is chosen as the move.
			</p>
		    </div>
		    <h2 style="padding-top: 15px" id="playstyle">Play Style</h2>
		    <div class="bodyparagraph">
			<p>
			    After playing against my own AI a fair amount of time (I know, sad) and have picked 
			    up its playing style, which is a direct consequence of its programming.
			</p>
			<h3 style="padding-top: 15px" id="obvious">The Obvious Move</h3>
			<div class="bodyparagraph">
			    Before the AI runs its recursive algorithm it looks for a move that would cause it 
			    to win and goes there, so there's no use hoping it will miss that obvious move.
			</div>
			<h3 style="padding-top: 15px" id="theblock">The Block</h3>
			<div class="bodyparagraph">
			    If the computer can't win, it sure isn't going to let you. After searching for winning 
			    move it will look to block you. The only way to beat it is to set a trap for it.
			</div>
		    </div>
		</div>
	    </div>
	</td>
    </tr>
</table>
<?php include("../Setup/footer.php"); ?>