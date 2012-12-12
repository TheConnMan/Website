<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
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
    <div>
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
    </div>
    <h2 style="padding-top: 15px" id="firstProgram">Your First Program</h2>
    <div>
        <p class="bodyparagraph">
            <a href="../Tutorials/HelloWorld.py">Here</a> is an example program to get you started. Once 
            you download it, right click on it (or do whatever you Mac people do) and open it with IDLE. 
            Once you open it in IDLE you should see the following code.
        </p><br>
        <div class="python">
            <ol>
                <li class="li1">
                    <div class="de1">
                        <span class="kw1">print</span><span class="st0">&quot;Hello world!&quot;</span>
                    </div>
                </li>
            </ol>
        </div><br>
        <p class="bodyparagraph">
            Output:
        </p>
        <div class="python">
            <div class="pythonOutput">
                Hello world!
                <div class="pythonEnd">
                    >>>
                </div>
            </div>
        </div>
        <p class="bodyparagraph">
            To run the program hit F5 or go to Run->Run Module. A Python shell should open up with the 
            words "Hello world!". Congratulations! You've just run your first Python program!
        </p>
    </div>
    <h2 style="padding-top: 15px" id="basics">Basic Commands</h2>
    <div>
        <p class="bodyparagraph">
            Now that we know how to run a program, lets learn a few commands. We'll start off with 
            an easy one.
        </p>
        <h3 style="padding-top: 15px" id="print">Print</h3>
        <div>
            <p class="bodyparagraph">
                Printing is easy: you just type print followed by what you want to print. In the previous 
                section we printed a String. You may be asking yourself "What is a String?". Hopefully 
                you know what a string is, but in this context it means a string of characters, like a 
                word. Variable types will be discussed more in-depth later on.
            </p>
            <p class="bodyparagraph">
                Let's try two more examples of printing:
            </p><br>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> <span class="st0">&quot;String&quot;</span>+<span class="st0">&quot; &quot;</span>+<span class="st0">&quot;power!&quot;</span>
                        </div>
                    </li>
                </ol>
            </div><br>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python">
                <div class="pythonOutput">
                    String power!
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div><br>
            <p class="bodyparagraph">
                When printing you can add strings together to be printed on the same line. You can actually 
                add strings together whenever, but we'll cover that in variables later on. On to the next 
                example.
            </p><br>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            one=<span class="st0">'1'</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> one
                        </div>
                    </li>
                </ol>
            </div><br>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python">
                <div class="pythonOutput">
                    1
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                Wow. Now that was exciting. A few things to note from that example:
            </p>
            <ol style="margin-left: 30px;">
                <li>A special character is not needed to end a line, you just go onto the next line</li>
                <li>Variables are not instantiated with a type, you just assign it a value</li>
                <li>Single and double quotes can both be used for strings, but the same character has to be used to open and close the string</li>
                <li>Printing variables will print them regardless of variable type</li>
            </ol>
            <p class="bodyparagraph">
                There is, however, a conditional on the last comment. If you are just trying to 
                print a single variable, it will work fine, but what happens when you try to add 
                different data types together in-line? Why don't we give it a try?
            </p><br>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> <span class="st0">&quot;I'll bet you $&quot;</span>+<span class="nu0">1</span>+<span class="st0">&quot; this won't work...&quot;</span>
                        </div>
                    </li>
                </ol>
            </div><br>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python">
                <div class="pythonError">
                    Traceback (most recent call last):<br>
                    &nbsp;&nbsp;File "C:\Users\Brian\Desktop\test.py", line 1, in &lt;module&gt;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;print "I'll bet you $"+1+" this won't work..."<br>
                    TypeError: cannot concatenate 'str' and 'int' objects
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div><br>
            <p class="bodyparagraph">
                Schwoops. See what happened there? We tried to add a string (str) and an integer (int), 
                which kinda doesn't work. Pro tip: that never works. Make sure whenever you're adding 
                variables you don't do the same thing. Not having to instantiate variables is a double-
                edged sword (pun not intended...sorta) because although we don't have to worry about labeling 
                our variables with types, we have to remember what they are so things like this don't happen.
            </p>
            <p class="bodyparagraph">
                So we can't add strings and integers, but how would we make the previous example work? Hint: 
                strings add with other strings, so maybe we could turn the 1 into a string.
            </p>
            <p class="bodyparagraph">
                If you guessed exactly what the hint was, you're correct! There are two ways to do this. The 
                easy way is to put quotes around the 1. Rerun it and it will work (though my bet no longer 
                stands). The other way is something called <a href="#typeCasting">type casting</a>. We'll 
                discuss this later.
            </p>

        </div>
        <h3 style="padding-top: 15px" id="if">If Statements</h3>
        <div>
            <p class="bodyparagraph">
                Now that we know how to print stuff, let's learn how to print stuff <i>only some of 
                the time</i>.
            </p>
            <p class="bodyparagraph">
                
            </p>
        </div>
    </div>
</div>

<?php include("../Templates/Bottom.php"); ?>