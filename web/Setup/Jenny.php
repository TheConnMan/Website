<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
<title>Jenny!</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="maintable" border="0">
    <tr>
        <td id="rightcolumn">
            <div id="rightcontent" style="width: 800px; margin-left: auto; margin-right: auto; margin-bottom: 30px;">
                <h1 style="text-align: center">Time Until I See Jenny!</h1>
                <div id="cntdwn" style="text-align: center; font-size: 30px; padding: 15px;"></div>
            </div>
        </td>
    </tr>
</table>
<script language="JavaScript">
    TargetDate = "5/10/2013 12:30 AM";
    BackColor = "mintcream";
    ForeColor = "black";
    CountActive = true;
    CountStepper = -1;
    LeadingZero = true;
    DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
    FinishMessage = "It is finally here!";
</script>
<script language="JavaScript" src="../Setup/countdown.js"></script>
<?php include("../Setup/footer.php"); ?>