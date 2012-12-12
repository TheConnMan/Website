<?php $path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php"); ?>
<head>
    <link type="text/css" rel="stylesheet" href="../Tutorials/SyntaxColors.css">
</head>

<title>Python</title>

<?php include("../Templates/Top.php"); ?>

Python
<ul>
    <li>
        <a href="#intro">Intro</a>
        <ul>
            <li><a href="#installation">Installation</a></li>
        </ul>
    </li>
    <li><a href="#firstProgram">Your First Program</a></li>
    <li>
        <a href="#basics">Basic Commands</a>
        <ul>
            <li><a href="#print">Print</a></li>
        </ul>
    </li>
</ul>

<?php include("../Templates/Middle.php"); ?>

<h1 style="text-align: center">Python</h1>
<div style="text-align: left">
    <h2 id="intro">Intro</h2>
    <p class="bodyparagraph">
        Welcome to my Python tutorial! I will try not to be too boring.
    </p>
    <h3 style="padding-top: 15px" id="installation">Installation</h3>
    <p class="bodyparagraph">
        First, we need to install IDLE. IDLE is the interface which we'll write and run our code in. 
        The download page can be found <a href="http://www.python.org/getit/releases/2.7.3/">here</a>. 
        Download the MSI Installer for Windows, a tar ball for Linux, and the OS X for Mac. Download 
        the installer for whichever bit OS you have. Use the 32 bit version if you don't know what bit 
        OS you have. Once you install IDLE you're done! You've got Python installed.
    </p>
    <h2 style="padding-top: 15px" id="firstProgram">Your First Program</h2>
    <p class="bodyparagraph">
        <a href="../Tutorials/HelloWorld.py">Here</a> is an example program to get you started. Once 
        you download it, right click on it (or do whatever you Mac people do) and open it with IDLE. 
        Once you open it in IDLE you should see the following code.
    </p><br>
    <div class="python">
        <ol>
            <li class="li1">
                <div class="de1">
                    <span class="kw1">print</span>
                    <span class="st0">&quot;Hello world!&quot;</span>
                </div>
            </li>
        </ol>
    </div><br>
    <p class="bodyparagraph">
        To run the program hit F5 or go to Run->Run Module. A Python shell should open up with the 
        words "Hello world!". Congratulations! You've just run your first Python program!
    </p>
    <h2 style="padding-top: 15px" id="basics">Basic Commands</h2>
    <p class="bodyparagraph">
        Now that we know how to run a program, lets learn a few commands. We'll start off with 
        an easy one.
    </p>
    <h3 style="padding-top: 15px" id="print">Print</h3>
    <p class="bodyparagraph">
          Printing is easy: you just type print followed by what you want to print. In the previous 
          section we printed a String. You may be asking yourself "What is a String?". Hopefully 
          you know what a string is, but in this context it means a string of characters, like a 
          word. Variable types will be discussed more in-depth later on.
    </p>
    <p class="bodyparagraph">
        
    </p>
</div>

<?php include("../Templates/Bottom.php"); ?>