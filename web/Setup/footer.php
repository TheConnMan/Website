		    </div>
		</div>
	    </div>
	    <?php $count=0; include("../Setup/PageCounter.php"); ?>
	    <div id="footer">
		<div style="text-align: center; font-size: small">
		    Written by Brian Conn &nbsp;&nbsp; Page views=<?php echo $count; ?>
		</div>
		<div style="text-align: center; font-size: smaller">
		     Because he hasn't found a real hobby yet
		</div>
	    </div>
	</div>
	<script>
	    function resetPage() {
		var rightCon=$("#rightcontent").height()
		if (rightCon<maxHeight) {
		    $("#rightcontent").height(maxHeight)
	        } else {
		    $("#leftmenu").height(rightCon)
		}
	    }
	    $(document).ready(function() {
		maxHeight=Math.max($("#rightcontent").height(), $("#leftmenu").height());
		resetPage();
	    });
	</script>
    </body>
</html>