<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
<head>
    <link type="text/css" rel="stylesheet" href="../Tutorials/SyntaxColors.css">
</head>

<title>Python</title>

<?php include("../Templates/Top.php"); ?>

<div>
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
            <li><a href="#basicExample">Example</a></li>
        </ul>
    </li>
    <li>
        <a href="#types">Variable Types</a>
        <ul>
            <li><a href="#strings">Strings</a></li>
            <li><a href="#numbers">Numbers</a></li>
            <li><a href="#arrays">Arrays</a></li>
            <li><a href="#typeCasting">Type Casting</a></li>
        </ul>
    </li>
    <li>
        <a href="#functions">Functions</a>
        <ul>
            <li><a href="#import">Import</a></li>
        </ul>
    </li>
</ul>
</div>

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
        <div class="python2">
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
            Now that we know how to run a program, let's learn a few commands. We'll start off with 
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
            <div class="python2">
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
            <div class="python2">
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
            <div class="python2"">
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
                variables you don't do the same thing. Not having to define variable types is a <i>double</i>-edged 
                sword (pun not intended...sorta) because although we don't have to worry about labeling 
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
            <div class="python2">
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
                the last two are specific to Python. The other boolean operators are >, <, >=, <=, and "not". These mean greater than, 
                less than, greater than or equal to, less than or equal to, and not equal to. For the "not" you would put "if not 1==2".
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
            <div class="python2">
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
            <div class="python2">
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
                Wowza. First thing's first, we once again see the colon and indents. Give me a second on those, 
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
            <div class="python2">
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
            <div class="python2">
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
            <p class="bodyparagraph">
                That was pretty simple. While the boolean statement is true the while loop will continue running. 
                Also, I used a new operator: +=. This is just shorthand for "i=i+1". Coders are very lazy.
                While loops are very similar in syntax to if and for statements, so there's not much use going over 
                them anymore. Instead, let's see how these functions can all work together.
            </p>
        </div>
        <h3 style="padding-top: 15px" id="basicExample">Example</h3>
        <div>
            <p class="bodyparagraph">
                Ok, so now that we've learned four basic commands (and a little syntax) let's try an example that uses 
                all of them. The basis for this example is <a href="http://en.wikipedia.org/wiki/Collatz_conjecture">Collatz conjecture</a>. 
                This conjecture says that for every natural number divide it by 2 if it's even, multiply it by 3 and add 
                1 if it's odd, and repeat. If you do this enough times you will always get 1. There's some fancy math behind the 
                pattern of how many repetitions each number takes, but let's just check that the conjecture is correct. Buckle up.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">for</span> num <span class="kw1">in</span> <span class="kw2">range</span><span class="br0">&#40;</span><span class="nu0">1</span>,<span class="nu0">10</span><span class="br0">&#41;</span>:
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; n=num
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; i=<span class="nu0">0</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; <span class="kw1">while</span> <span class="kw1">not</span> n==<span class="nu0">1</span>:
                        </div>
                    </li>
                    <li class="li2">
                        <div class="de2">
                            &nbsp; &nbsp; &nbsp; &nbsp; <span class="kw1">if</span> n<span class="sy0">%</span>2==<span class="nu0">1</span>:
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; n=<span class="nu0">3</span><span class="sy0">*</span>n+<span class="nu0">1</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; &nbsp; &nbsp; <span class="kw1">else</span>:
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; n=n/<span class="nu0">2</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            &nbsp; &nbsp; &nbsp; &nbsp; i+=<span class="nu0">1</span>
                        </div>
                    </li>
                    <li class="li2">
                        <div class="de2">
                            &nbsp; &nbsp; <span class="kw1">print</span> <span class="kw2">str</span><span class="br0">&#40;</span>num<span class="br0">&#41;</span>+<span class="st0">&quot; took &quot;</span>+<span class="kw2">str</span><span class="br0">&#40;</span>i<span class="br0">&#41;</span>+<span class="st0">&quot; iterations.&quot;</span>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python2">
                <div class="pythonOutput">
                    1 took 0 iterations.<br>
                    2 took 1 iterations.<br>
                    3 took 7 iterations.<br>
                    4 took 2 iterations.<br>
                    5 took 5 iterations.<br>
                    6 took 8 iterations.<br>
                    7 took 16 iterations.<br>
                    8 took 3 iterations.<br>
                    9 took 19 iterations.
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                To answer our question the conjecture is correct. The fact that the program 
                finished running means each number reduced to 1 in a finite number of iterations.
                Try increasing the upper bound in the for loop to see how many iterations larger 
                numbers take.
            </p>
            <p class="bodyparagraph">
                Take a look at the code above and try to walk yourself through what the computer 
                actually executes. I've found that when I write code I can easily get caught up 
                thinking about the program as a whole, resulting in little errors which are hard 
                to find later. Walking myself through sections of code helps me figure out what 
                the program is actually doing. Computers do exactly what you tell them to do so 
                you have to be smarter than them.
            </p>
            <p class="bodyparagraph">
                While walking yourself through the program you'll probably find the walk through 
                almost identical to my explanation of the Collatz conjecture above. This is no 
                coincidence. For many programs if you're able to verbally explain what the program 
                does then you've already solved the problem. There are obviously exceptions to this, 
                but detailed, logical explanations can be translated into code fairly easily.
            </p>
            <p class="bodyparagraph">
                When creating any program I would recommend working through this type of explanation 
                before writing code. Programmers often use something called "pseudocode" as a way to 
                formulate this explanation with the same basic structure as code but without having to 
                worry about syntax. By following good programming practices while you are learning to 
                code you'll develop good habits which will make learning other languages easier down the 
                road.
            </p>
        </div>
        
    </div>
    <h2 style="padding-top: 15px" id="types">Variable Types</h2>
    <div>
        <p class="bodyparagraph">
            Now that we've learned some basic commands and syntax we're going to switch gears 
            a little bit and talk about variable types. So far a few of the examples have used 
            variables, but it hasn't yet been explained how variables can be used and what form 
            they can take.
        </p>
        <h3 style="padding-top: 15px" id="strings">Strings</h3>
        <div>
            <p class="bodyparagraph">
                Strings are strings of characters. Anything within quotes counts as a string 
                including numbers, symbols, and letters. Adding strings together with a "+" 
                symbol just appends the second string onto the first. Let's look at an example 
                for a few other things we can do with strings.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            word=<span class="st0">&quot;this is an awesome string.&quot;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            otherWord=<span class="st0">&quot;really, &quot;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> otherWord+word
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> otherWord+word<span class="br0">&#91;</span><span class="nu0">11</span>:<span class="nu0">18</span><span class="br0">&#93;</span>
                        </div>
                    </li>
                    <li class="li2">
                        <div class="de2">
                            <span class="kw1">print</span> word<span class="br0">&#91;</span><span class="nu0">0</span>:<span class="nu0">4</span><span class="br0">&#93;</span>+otherWord<span class="br0">&#91;</span><span class="nu0">6</span><span class="br0">&#93;</span>+word<span class="br0">&#91;</span><span class="nu0">4</span>:<span class="br0">&#93;</span>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python2">
                <div class="pythonOutput">
                    really, this is an awesome string.<br>
                    really, awesome<br>
                    this, is an awesome string.
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                After defining two strings we print three lines. The first is just addition of 
                two strings. Simple. The second is the addition of a string with a substring. The 
                addition works the same way, but the second string is only part of the variable. The 
                tricky part is the input for the substring is the index of the first character (starting 
                from zero of course) and the second is the index of he last character <i>plus 1</i>. 
                A bit confusing, I know, but you'll get used to it. Two questions you may be asking are "What if I only want one character?" 
                and "What if want the substring of a character to the end?". These are both covered in the 
                third line. For a single character just input the index of the character (as if the string 
                was an array, which we'll get to in a bit) and to select a character to the end just leave 
                the second input blank. Selecting from the beginning to a specific character is the same 
                but with the first input blank.
            </p>
        </div>
        <h3 style="padding-top: 15px" id="numbers">Numbers</h3>
        <div>
            <p class="bodyparagraph">
                Python is simple in that it treats numbers as numbers. You don't have to worry about 
                if it's a double or an int, maybe a float or a short int. Python takes care of all 
                of that for you, but that doens't mean we're completely off the hook. Here's on example.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            number1=<span class="nu0">11</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            number2=<span class="nu0">5</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> number1/number2
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python2">
                <div class="pythonOutput">
                    2
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                Umm, what? The answer should be 2.2, but it just gives us 2. Try making 11 into 11.0 
                and rerun the program. Now it should give us 2.2, so what happened?
            </p>
            <p class="bodyparagraph">
                The answer is integer division. Not quite as exciting as you may have hoped, but it's 
                the answer nonetheless. Because both numbers are integers the output of division is 
                also an integer. This means that the output is rounded down to the nearest integer. 
                This may not seem useful now, but it is down the line. The easy fix is if you ever 
                want a number to not be treated as an integer, just add a ".0" onto the end of it.
                Multiplication, division, subtraction, and addition will all carry the decimal points 
                so you won't have to worry about it anymore.
            </p>
            <p class="bodyparagraph">
                Other than watching out for integer division, numbers are pretty much numbers. You might 
                run into problems if you make very large or very small numbers, but Python makes it easy 
                for everything else.
            </p>
        </div>
        <h3 style="padding-top: 15px" id="arrays">Arrays</h3>
        <div>
            <p class="bodyparagraph">
                Arrays aren't a variable type per se, but they can be assigned to variable names so I'm 
                covering them in this section. Arrays are constructs which hold multiple values. They can 
                also be multi-dimensional. In Python the label "array" and "list" have the same meaning, 
                but don't get used to this. Most other languages separate the two.
            </p>
            <p class="bodyparagraph">
                There are many uses for arrays, but there are a few basic things you can do with them: 
                initialize, append, insert, call, and remove. Let's see how we can use these.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw3">array</span>=<span class="br0">&#91;</span><span class="nu0">1</span>,<span class="nu0">2</span>,<span class="nu0">3</span>,<span class="nu0">4</span>,<span class="nu0">5</span><span class="br0">&#93;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> <span class="kw3">array</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw3">array</span>.<span class="me1">append</span><span class="br0">&#40;</span><span class="nu0">6</span><span class="br0">&#41;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> <span class="kw3">array</span>
                        </div>
                    </li>
                    <li class="li2">
                        <div class="de2">
                            <span class="kw3">array</span>.<span class="me1">remove</span><span class="br0">&#40;</span><span class="nu0">2</span><span class="br0">&#41;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> <span class="kw3">array</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw3">array</span>.<span class="me1">insert</span><span class="br0">&#40;</span><span class="nu0">2</span>,<span class="nu0">3.5</span><span class="br0">&#41;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> <span class="kw3">array</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw3">array</span><span class="br0">&#91;</span><span class="nu0">4</span><span class="br0">&#93;</span>+=<span class="nu0">3</span>
                        </div>
                    </li>
                    <li class="li2">
                        <div class="de2">
                            <span class="kw1">print</span> <span class="kw3">array</span><span class="br0">&#91;</span><span class="nu0">4</span><span class="br0">&#93;</span>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python2">
                <div class="pythonOutput">
                    [1, 2, 3, 4, 5]<br>
                    [1, 2, 3, 4, 5, 6]<br>
                    [1, 3, 4, 5, 6]<br>
                    [1, 3, 3.5, 4, 5, 6]<br>
                    8
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                Honestly that wasn't that exciting of an example, but it shows the capabilities of arrays. 
                There is something else new in the above example, though: function calls. Once we initialized 
                the array the variable has functions inherently associated with it. To call these functions 
                you put a "." after the variable name then the function and inputs. In IDLE if you add the "." 
                and wait a second all available functions will be listed automatically then after you type the 
                function and first parenthesis IDLE will list the inputs needed. Very helpful for when you forget 
                what functions are available.
           </p>
        </div>
        <h3 style="padding-top: 15px" id="typeCasting">Type Casting</h3>
        <div>
            <p class="bodyparagraph">
                Now that we've gone over some basic variable types, we need to know how to convert from one 
                to the other. The easiest is converting things to strings. You can do this simply by 
                surrounding an expression with <code>str(<i>variable</i>)</code>. Boom, done. You can reassign this 
                to another variable or add it to other strings just like it was a string (mostly cause it 
                is a string).
            </p>
            <p class="bodyparagraph">
                Turning strings into numbers is a bit more difficult. Anything can be converted into a string, but 
                what happens when you try to turn letters into a number? Bad things, that's what. Let's check it out.
            </p>
            <div class="python">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            number=<span class="nu0">4</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            word=<span class="st0">&quot;Check out this number: 4.5&quot;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> word<span class="br0">&#91;</span>:<span class="nu0">23</span><span class="br0">&#93;</span>+<span class="kw2">str</span><span class="br0">&#40;</span>number<span class="br0">&#41;</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="kw1">print</span> number+<span class="kw2">float</span><span class="br0">&#40;</span>word<span class="br0">&#91;</span><span class="nu0">23</span>:<span class="br0">&#93;</span><span class="br0">&#41;</span>
                        </div>
                    </li>
                    <li class="li2">
                        <div class="de2">
                            <span class="kw1">print</span> number+<span class="kw2">int</span><span class="br0">&#40;</span>word<span class="br0">&#91;</span><span class="nu0">23</span><span class="br0">&#93;</span><span class="br0">&#41;</span>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Output:
            </p>
            <div class="python2">
                <div class="pythonOutput">
                    Check out this number: 4<br>
                    8.5<br>
                    8
                    <div class="pythonEnd">
                        >>>
                    </div>
                </div>
            </div>
            <p class="bodyparagraph">
                So there are a couple ways to convert strings to numbers: <code>float(<i>string</i>)</code> and int(<i>string</i>).
                Float converts an integer or a float (a number with decimal places) within a string into a decimal 
                number. Int converts only integers within a string into integers, so be careful when trying to convert 
                any number into an int directly from a string; it will throw an error. To convert a float to an int from a 
                string you have to do a two step process of <code>int(float(<i>string</i>))</code>. Int and float can also be used to 
                convert numbers from one type to the other.
            </p>
        </div>
        
    </div>
    <h2 style="padding-top: 15px" id="functions">Functions</h2>
    <div>
        <p class="bodyparagraph">
            Now that we've covered some commands and variable types it's time to look at functions.
        </p>
        <h3 style="padding-top: 15px" id="import">Import</h3>
        <div>
            
        </div>
    </div>
</div>

<?php include("../Templates/Bottom.php"); ?>