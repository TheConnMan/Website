<?php include("../Setup/preheader.php"); ?>
<title>The Code</title>
<?php include("../Setup/header.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<h1>The Algorithm</h1>
<h4>(Bum bum bummmmm)</h4>
<div style="text-align: left">
    <h2>Connect Four</h2>
    <div style="width: 50%; padding: 10px">
        <h3>Backstory</h3>
        <div style="padding-top: 5px; padding-left: 5px">
            Enter the Winter of '11:
            In the bitter, mild cold of Michigan I toiled away trying to find things to do. 
            My time away from school had taken a toll on my workload and I was stranded in 
            the unforgiving land of boredom. My friend, a student on break from school in 
            our nation's capital, had not yet taken his finals and so was studying for much 
            of his winter break. Following in the footsteps of the old American proverb 
            "Misery loves warm mochas" I staved off the cold and having to spend more than
            three consecutive hours with my family by joining him in the quite confines of 
            a local cafe.<br>
            There I began explore <alt id="pun" onMouseOver="Change()"></alt>. I learned
        </div>
    </div>
</div>
<script>
    $('#pun').html("Java");
    var counter=0
    function Change() {
        if (counter%2==0) {
            message="Java"
        }
        else {
            message="IT'S A PUN!!"
        }
        $('#pun').html(message);
        counter++
        return true;
    }
</script>
<?php include("../Setup/footer.php"); ?>