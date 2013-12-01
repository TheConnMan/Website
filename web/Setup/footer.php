		    </div>
		</div>
	    </div>
	    <div id="footer">
		<div style="text-align: center; font-size: small">
		    Written by <a href="mailto:bcconn2112@gmail.com" style="color: beige;">Brian Conn</a>
		</div>
		<div style="text-align: center; font-size: smaller">
		     Because he hasn't found a real hobby yet
		</div>
	    </div>
	</div>
	<script>
	    function resetPage(maxHeight) {
		var rightCon=$("#rightcontent").height()
		if (rightCon<maxHeight) {
		    $("#rightcontent").height(maxHeight)
	        } else {
		    $("#leftmenu").height(rightCon)
		}
	    };
            function resetPage() {
                $("#leftmenu").height($("#rightcontent").height())
            };
	    $(window).load(function(){
		resetPage(Math.max($("#rightcontent").height(), $("#leftmenu").height()));
	    });
	</script>
    </body>
</html>