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
            <li><a href="#if">If</a></li>
            <li><a href="#for">For</a></li>
            <li><a href="#while">While</a></li>
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
            <a href="../PythonTutorial/HelloWorld.py">Here</a> is an example program to get you started. Once 
            you download it, right click on it (or do whatever you Mac people do) and open it with IDLE. 
            Once you open it in IDLE you should see the following code.
        </p>
        <div class="python">
            <ol>
                <li class="li1">
                    <div class="de1">
                        <span class="kw1">print</span><span class="st0"> &quot;Hello world!&quot;</span>
                    </div>
                </li>
            </ol>
        </div>
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
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> <span class="st0">&quot;String&quot;</span>+<span class="st0">&quot; &quot;</span>+<span class="st0">&quot;power!&quot;</span>
                        </div>
                    </li>
                </ol>
            </div>
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
            </div>
            <p class="bodyparagraph">
                When printing you can add strings together to be printed on the same line. You can actually 
                add strings together whenever, but we'll cover that in variables later on. On to the next 
                example.
            </p>
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
            </div>
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
                <li>A special character is not needed to end a line, you just go onto the next line.</li>
                <li>Variables are not instantiated with a type, you just assign it a value.</li>
                <li>Single and double quotes can both be used for strings, but the same character has to be used to open and close the string.</li>
                <li>Printing variables will print them regardless of variable type.</li>
            </ol>
            <p class="bodyparagraph">
                There is, however, a conditional on the last comment. If you are just trying to 
                print a single variable, it will work fine, but what happens when you try to add 
                different data types together in-line? Why don't we give it a try?
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> <span class="st0">&quot;I'll bet you $&quot;</span>+<span class="nu0">1</span>+<span class="st0">&quot; this won't work...&quot;</span>
                        </div>
                    </li>
                </ol>
            </div>
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
            </div>
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
        <h3 style="padding-top: 15px" id="if">If</h3>
        <div>
            <p class="bodyparagraph">
                Now that we know how to print stuff, let's learn how to print stuff <i>only some of 
                    the time</i>.
            </p>
            <p class="bodyparagraph">
                If statements are pretty simple: if a boolean statement is true, the following code 
                is executed. Let's try it on for size.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">if</span> <span class="nu0">1</span>==<span class="nu0">1</span>:
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; <span class="kw1">print</span> <span class="st0">&quot;Well that's a relief.&quot;</span>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python">
                <div class="pythonOutput">
                    Well that's a relief.
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                Ok, so another list of comments is coming.
            </p>
            <ol style="margin-left: 30px">
                <li>There isn't one equals sign, there are two. Two means "is equal to". One is for assigning variables values.</li>
                <li>The if statement ends with a colon.</li>
                <li>The line after the if statement is indented.</li>
            </ol>
            <p class="bodyparagraph">
                Here we start getting into the syntax of coding. The first statement is true for almost all coding languages, but 
                the last two are specific to Python. The other boolean operators are >, <, >=, <=, and !=. These mean greater than, 
                less than, greater than or equal to, less than or equal to, and not equal to.
            </p>
            <p class="bodyparagraph">
                Let's look at some other features of the if statement.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            number=<span class="nu0">10</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">if</span> number<span class="sy0">&gt;</span><span class="nu0">10</span>:
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; <span class="kw1">print</span> <span class="st0">&quot;That doesn't seem right.&quot;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">elif</span> number<span class="sy0">&lt;</span><span class="nu0">10</span>:
                        </div>
                    </li>
                    <li class="li2">
                        <div class="de2">
                            &nbsp; &nbsp; <span class="kw1">print</span> <span class="st0">&quot;That either.&quot;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">else</span>:
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; <span class="kw1">print</span> <span class="st0">&quot;There we go.&quot;</span>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python">
                <div class="pythonOutput">
                    There we go.
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                Elif stands for "else if". The program will read the first if statement and if it is 
                not true then it will continue onto the elif statement. You can have as many elif statements 
                as you want, you just can't have any situations where multiple if and elif statements are true 
                at the same time. That just doesn't make sense. The else statement covers all situations which 
                aren't covered by the if and elif statements.
            </p>
        </div>
        <h3 style="padding-top: 15px" id="for">For</h3>
        <div>
            <p class="bodyparagraph">
                Next are for statements. Some of the syntax of if and for statements are shared, so 
                I'll further explain the syntax in this section.
            </p>
            <p class="bodyparagraph">
                For statements are for repetitive actions. Example time.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">for</span> i <span class="kw1">in</span> <span class="kw2">range</span><span class="br0">&#40;</span><span class="nu0">5</span><span class="br0">&#41;</span>:
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; <span class="kw1">print</span> i
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python">
                <div class="pythonOutput">
                    0<br>
                    1<br>
                    2<br>
                    3<br>
                    4
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                Wowza. First things first, we once again see the colon and indents. Give me a second on those, 
                geeze. What happens in a for statement is a loop for every number in the range given. Every loop 
                the variable given (i in this case) increases by 1. The example above shows this pretty clearly. 
                One catch: i starts at 0. This is something you should probably get used to. In computer language 
                numbers start at 0 plain and simple.
            </p>
            <p class="bodyparagraph">
                Now we'll tackle the colon and indent problem. With an example of course.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            number1=<span class="nu0">0</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            number2=<span class="nu0">0</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">for</span> i <span class="kw1">in</span> <span class="kw2">range</span><span class="br0">&#40;</span><span class="nu0">10</span><span class="br0">&#41;</span>:
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; number1=number1+<span class="nu0">1</span>
                        </div>
                    </li>
                    <li class="li2">
                        <div class="de2">
                            number2=number2+<span class="nu0">1</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> number1
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1"><span class="kw1">print</span> number2
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Hmm, we've got a couple possible outcomes here. First, the tab may not matter and the 
                two outputs will be the same. Second, the tab could mean something like only the tabbed 
                code could be run in the for look. Lastly, we could get an error. Something that you'll 
                find in coding is you can always get an error. Let's run it.
            </p>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python">
                <div class="pythonOutput">
                    10<br>
                    1
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                Twas the second choice. Now we know what the tabs mean.
            </p>
            <p class="bodyparagraph">
                This is one of the things I don't like about Python: relative positions matter. It's the 
                price we pay for not having brackets and semicolons everywhere. We just need to be very 
                careful about indenting, especially when we have nested for and if statements. You may begin 
                to see why I prefer not to write large scripts in Python...
            </p>
        </div>
        <h3 style="padding-top: 15px" id="while">While</h3>
        <div>
            <p class="bodyparagraph">
                To finish off the trifecta we have while statements. These do exactly what you think they do.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            i=<span class="nu0">0</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">while</span> i<span class="sy0">&lt;</span><span class="nu0">4</span>:
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; i+=<span class="nu0">1</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; <span class="kw1">print</span> i
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python">
                <div class="pythonOutput">
                    1<br>
                    2<br>
                    3<br>
                    4
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../Templates/Bottom.php"); ?>